<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
// use App\Services\BlogService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //  $this->app->singleton(BlogService::class, fn () => new BlogService());
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
