<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GetQuotes;
use App\Models\PetDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AffilateController extends Controller
{

    public function getAffilate(){

        $affilates = GetQuotes::has('getPetDetails')->latest()->get();

        return view('backend.affilate',compact('affilates'));

    }

    public function viewPetDetails(Request $req){

        // dd($req->all());

        $petDetails = PetDetails::where('get_quote_id',$req->quote_id)->get();

        return response()->json($petDetails);

        // return view('backend.affilate',compact('affilates'));

    }

        public function searchAffiliate(Request $request)
    {
        $search = $request->input('search');

        $affilates = GetQuotes::whereHas('getPetDetails') 
            ->where(function ($query) use ($search) {
                $query->whereHas('getPetDetails', function ($q) use ($search) {
                    $q->where('pet_name', 'like', "%$search%")
                     ->orWhere('pet_breed', 'like', "%$search%");
                })
                ->orWhere('zip_code', 'like', "%$search%")
                ->orWhere('email_address', 'like', "%$search%")
                ->orWhere('phone_number', 'like', "%$search%");
            })
            ->latest()
            ->get();

        $tableData = view('backend.affiliate_comp', compact('affilates'))->render();

        return response()->json([
            'tableData' => $tableData,
        ]);
    }


    

        public function filterPetDetails(Request $request)
    {
        $searchQuery = $request->input('searchQuery');
        $selectDays = $request->input('selectDays'); 
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');

        
        $affilates = GetQuotes::where(function ($query) use ($searchQuery) {
            if (!empty($searchQuery)) {
               
                $query->whereHas('getPetDetails', function ($q) use ($searchQuery) {
                    $q->where('pet_name', 'like', "%$searchQuery%")
                    ->orWhere('pet_breed', 'like', "%$searchQuery%");
                });

                
                $query->orWhere('zip_code', 'like', "%$searchQuery%")
                    ->orWhere('email_address', 'like', "%$searchQuery%")
                    ->orWhere('phone_number', 'like', "%$searchQuery%");
            } else {
               
                $query->whereHas('getPetDetails');
            }
        });

        
        if ($selectDays === 'custom_date' && $dateFrom && $dateTo) {
            // try {
                $from = Carbon::createFromFormat('d-m-Y', $dateFrom)->startOfDay();
                $to = Carbon::createFromFormat('d-m-Y', $dateTo)->endOfDay();
                $affilates->whereBetween('created_at', [$from, $to]);
            // } catch (\Exception $e) {
            //     \Log::error('Invalid custom date format: ' . $e->getMessage());
            // }
        } elseif (is_numeric($selectDays)) {
            if ($selectDays == 0) {
                $affilates->whereDate('created_at', Carbon::today());
            } else {
                $affilates->whereBetween('created_at', [
                    Carbon::now()->subDays((int)$selectDays),
                    Carbon::now()
                ]);
            }
        }

        
        $affilates = $affilates->latest()->get();

        $tableData = view('backend.affiliate_comp', compact('affilates'))->render();

        return response()->json([
            'tableData' => $tableData,
        ]);
    }




}
