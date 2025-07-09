<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\RunReportRequest;

class DashboardController extends Controller
{

    public function dashboard(Request $request, Analytics $analytics)
    {
        $days = $request->input('days', 30);

        $period = Period::days($days);

        // dump($period);

        $totalVisitors = $this->getTotalVisitors($analytics, $period);

        return view('dashboard', compact('totalVisitors'));
    }

    // public function getData(Request $request, Analytics $analytics)
    // {
    //     $days = $request->input('days', 30); 

    //     $period = Period::days($days);

    //     $totalVisitors = $this->getTotalVisitors($analytics, $period);

    //     return response()->json($totalVisitors);

    // }


    public function getTotalVisitors(Analytics $analytics, Period $period)
    {
        $metrics = ['totalUsers'];
        $dimensions = [];
        $maxResults = 1;

        $result = $analytics->get(
            $period,
            $metrics,
            $dimensions,
            $maxResults
        );

        return $result->first()['totalUsers'] ?? 0;
    }

    // public function websiteTrafficAndConversions(Analytics $analytics, Period $period)
    // {


    //     $metrics = [
    //         'totalUsers',
    //         'sessions',
    //         'bounceRate',
    //         'conversions',
    //         'sessionConversionRate'
    //     ];

    //     $dimensions = ['day'];
    //     $maxResults = 1000;

    //     $results = $analytics->get(
    //         $period,
    //         $metrics,
    //         $dimensions,
    //         $maxResults
    //     );


    //     return $results;
    // }


    public function getData(Request $request , Analytics $analytics)
    {
        $range = $request->query('range');
        $from = $request->query('from');
        $to = $request->query('to');

        $today = Carbon::today();

        switch ($range) {
            case 'today':
                return $this->buildResponse([$today],$analytics);

            case 'yesterday':
                return $this->buildResponse([$today->copy()->subDay()],$analytics);

            case 'thisWeek': {
                    $start = $today->copy()->startOfWeek();
                    $end = $today;
                    return $this->buildResponse($this->dateRange($start, $end),$analytics);
                }

            case 'lastWeek': {
                    $start = $today->copy()->startOfWeek()->subWeek();
                    $end = $start->copy()->endOfWeek();
                    return $this->buildResponse($this->dateRange($start, $end),$analytics);
                }

            case 'last7':
            case 'last14':
            case 'last28':
            case 'last30':
            case 'last60':
            case 'last90': {
                    $days = (int) str_replace('last', '', $range);
                    $start = $today->copy()->subDays($days - 1);
                    return $this->buildResponse($this->dateRange($start, $today),$analytics);
                }

            case 'qtd': {
                    $month = $today->month;
                    $startMonth = $month - (($month - 1) % 3);
                    $months = range($startMonth, $month);
                    return $this->buildMonthlyResponse($months, $today->year);
                }

            case 'thisYear': {
                    $months = range(1, $today->month);
                    return $this->buildMonthlyResponse($months, $today->year);
                }

            case 'lastYear': {
                    return $this->buildMonthlyResponse(range(1, 12), $today->year - 1);
                }

            case 'last12mo': {
                    $months = [];
                    for ($i = 11; $i >= 0; $i--) {
                        $months[] = $today->copy()->subMonths($i);
                    }

                    return $this->buildMonthlyFromDates($months);
                }

            case 'custom': {
                    if (!$from || !$to) {
                        return response()->json(['categories' => [], 'data' => []]);
                    }

                    $fromDate = Carbon::createFromFormat('d-m-Y', $from);
                    $toDate = Carbon::createFromFormat('d-m-Y', $to);
                    $diffInMonths = $fromDate->diffInMonths($toDate);

                    if ($diffInMonths === 0) {
                        return $this->buildResponse($this->dateRange($fromDate, $toDate),$analytics);
                    } else {
                        $months = [];
                        $current = $fromDate->copy()->startOfMonth();
                        while ($current <= $toDate) {
                            $months[] = $current->copy();
                            $current->addMonth();
                        }
                        return $this->buildMonthlyFromDates($months);
                    }
                }

            default:
                return response()->json(['categories' => [], 'data' => []]);
        }
    }

    private function dateRange($start, $end)
    {
        $dates = [];
        while ($start <= $end) {
            $dates[] = $start->copy();
            $start->addDay();
        }
        return $dates;
    }

    private function buildResponse($dates,$analytics)
    {
        $start = $dates[0];
        $end = end($dates);

        $period = Period::create($start, $end);
        // $analytics = app(Analytics::class);

        $results = $this->websiteTrafficAndConversions($analytics, $period);

        $mapped = collect($results)->map(function ($item) {

            // dd($item);

            return [
                'day' => $item['day'] ?? '',
                'value' => $item['totalUsers'] ?? 0
            ];
        });

        $categories = $mapped->pluck('day')->map(function ($d) {
            return Carbon::createFromFormat('Ymd', $d)->format('d M');
        });

        $data = $mapped->pluck('value');

        return response()->json([
            'categories' => $categories,
            'data' => $data
        ]);
    }

    private function buildMonthlyResponse($months, $year)
    {
            $start = Carbon::create($year, min($months), 1)->startOfMonth();
            $end = Carbon::create($year, max($months), 1)->endOfMonth();

            $period = Period::create($start, $end);
            $analytics = app(Analytics::class);

            $results = $this->websiteTrafficAndConversions($analytics, $period);

            $grouped = collect($results)->groupBy(function ($item) {
                return Carbon::createFromFormat('Ymd', $item['day'])->format('M Y');
            });

            $categories = [];
            $data = [];

            foreach ($months as $month) {
                $label = Carbon::create($year, $month, 1)->format('M Y');
                $categories[] = $label;
                $total = $grouped->get($label, collect())->sum('totalUsers');
                $data[] = $total;
            }

            return response()->json([
                'categories' => $categories,
                'data' => $data
            ]);
    }

    private function buildMonthlyFromDates($monthDates)
    {
        $start = $monthDates[0]->copy()->startOfMonth();
        $end = end($monthDates)->copy()->endOfMonth();

        $period = Period::create($start, $end);
        $analytics = app(Analytics::class);

        $results = $this->websiteTrafficAndConversions($analytics, $period);

        $grouped = collect($results)->groupBy(function ($item) {
            return Carbon::createFromFormat('Ymd', $item['day'])->format('M Y');
        });

        $categories = [];
        $data = [];

        foreach ($monthDates as $month) {
            $label = $month->format('M Y');
            $categories[] = $label;
            $total = $grouped->get($label, collect())->sum('totalUsers');
            $data[] = $total;
        }

        return response()->json([
            'categories' => $categories,
            'data' => $data
        ]);
    }

    public function websiteTrafficAndConversions(Analytics $analytics, $period)
    {

        // dd($period);

        $metrics = [
            'totalUsers',
            'sessions',
            'bounceRate',
            'conversions',
            'sessionConversionRate'
        ];

        $dimensions = ['day'];
        $maxResults = 1000;

        $results = $analytics->get(
            $period,
            $metrics,
            $dimensions,
            $maxResults
        );

        // dd($results);

        return $results;
    }
}
