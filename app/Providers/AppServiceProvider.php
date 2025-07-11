<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;

use Spatie\Analytics\AnalyticsClient;
use Spatie\Analytics\Analytics;
use Illuminate\Contracts\Cache\Repository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {

        
        $this->app->bind(Analytics::class, function ($app) {
            $propertyId = config('analytics.property_id');
            $credentialsPath = config('analytics.service_account_credentials_json');
            $betaAnalyticsDataClient = new BetaAnalyticsDataClient([
                'credentials' => $credentialsPath,
            ]);
            $configRepository = $app->make(Repository::class);
            $analyticsClient = new AnalyticsClient($betaAnalyticsDataClient, $configRepository);
            return new Analytics($analyticsClient, $propertyId);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength('191');
        Paginator::useBootstrapFive();


       
         Str::macro('readTime', function ($text) {
             $word_count = str_word_count(strip_tags($text));
             $minutes = ceil($word_count / 200);
             return $minutes;
         });
     

      
    }
}
