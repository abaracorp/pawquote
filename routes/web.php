<?php

use App\Http\Controllers\Backend\AffilateController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FanStoriesController;
use App\Http\Controllers\Backend\FaqGuideController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\FanAndGalleryController;
use App\Http\Controllers\Frontend\FaqGuideController as FrontendFaqGuideController;
use App\Http\Controllers\Frontend\GetQuoteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Frontend Routes

Route::as('frontend.')
    ->group(function () {


        Route::controller(HomeController::class)
            ->group(function () {

                Route::get('/', 'getHomePage')->name('homepage');
            });



        Route::controller(AboutController::class)
            ->group(function () {
                Route::get('/about-us', 'getAboutPage')->name('about');
            });


        Route::controller(FrontendFaqGuideController::class)
            ->group(function () {

                Route::get('/faq', 'getFaqPage')->name('faq');
                Route::get('/helpful-guides', 'getGuidePage')->name('guide');
                Route::get('/search-faq', 'handleFaqSearch')->name('faqSearch');
            });

        Route::controller(FrontendBlogController::class)
            ->group(function () {


                Route::get('/blog', 'getBlogPage')->name('blog');
                Route::get('/blog-listing', 'getAllBlogPage')->name('allBlogs');
                Route::get('/blog-detail/{slug}', 'getBlogDeatil')->name('blogDeatil');
                Route::get('/search-blog', 'handleBlogSearch')->name('handleBlogSearch');
            });


        Route::controller(FanAndGalleryController::class)
            ->group(function () {


                Route::get('/fan', 'getFanGalleryPage')->name('fan');
                Route::get('/view-success-story/{slug}', 'getSuccessStoryPage')->name('successStory');
                Route::get('/view-all-success-story', 'getAllSuccessStories')->name('successStories');
            });




        Route::controller(GetQuoteController::class)
            ->group(function () {
                Route::post('quote-zipcode', 'quoteZipcode')->name('quoteZipcode');
                Route::get('quote', 'quoteSteps')->name('quoteSteps')->middleware('check.zip');
                Route::post('save-quote-steps-data', 'saveQuoteSteps')->name('saveQuoteSteps');

                Route::get('quote-allresults/{uuid}', 'quoteAllResults')->name('quoteAllResults');
            });
    });


Route::get('/get-quote', function () {
    return view('frontend/get_quote');
})->name('getQuote');



Route::get('/cookie-policy', function () {
    return view('frontend/cookie_policy');
})->name('policy');

Route::get('/terms-of-use', function () {
    return view('frontend/terms_of_use');
})->name('tos');


Route::get('/payment-plan', function () {
    return view('frontend/payment_plan');
})->name('paymentPlan');



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Backend Routes 

Route::prefix('admin')
    ->middleware(['auth'])
    ->as('admin.')
    ->group(function () {



        Route::controller(DashboardController::class)
            ->group(function () {
                Route::get('dashboard', 'dashboard')->name('dashboard');
                Route::get('dashboard-data', 'getData')->name('getData');
            });




        //blogs 
        Route::controller(BlogController::class)
            ->group(function () {
                Route::get('blogs', 'getBlogListing')->name('blogs');
                Route::get('create-new-blog', 'createNewBlog')->name('createNewBlog');
                Route::post('save-blog', 'saveBlogData')->name('saveBlogData');
                Route::get('edit-blog/{blog}', 'editBlog')->name('editBlog');
                Route::put('update-blog/{blog}', 'updateBlog')->name('updateBlog');
                Route::get('delete-blog/{blog}', 'deleteBlog')->name('deleteBlog');
                Route::get('search-blog/{blog?}', 'searchBlog')->name('searchBlog');
                Route::post('blog-bulk-action', 'handleBlogBulkAction')->name('blogBulkAction');
            });

        Route::controller(GalleryController::class)
            ->group(function () {
                Route::get('gallery', 'getGalleryListing')->name('gallery');
                Route::get('create-new-gallery', 'createNewGallery')->name('createNewGallery');
                Route::post('save-gallery', 'saveGalleryData')->name('saveGalleryData');
                Route::get('edit-gallery/{gallery}', 'editGallery')->name('editGallery');
                Route::put('update-gallery/{gallery}', 'updateGallery')->name('updateGallery');
                Route::get('delete-gallery/{gallery}', 'deleteGallery')->name('deleteGallery');
            });




        Route::controller(SettingController::class)
            ->group(function () {
                Route::get('settings', 'getSettings')->name('settings');
                Route::put('updateUser/{user}', 'updateSetting')->name('updateSetting');
            });

        Route::controller(AffilateController::class)
            ->group(function () {
                Route::get('affiliate', 'getAffilate')->name('affilate');
                Route::get('search-affiliate', 'searchAffiliate')->name('searchAffiliate');
                Route::get('view-pet-details', 'viewPetDetails')->name('viewPetDetails');
                Route::get('filter-pet-details', 'filterPetDetails')->name('filterPetDetails');
                // Route::put('updateUser/{user}', 'updateSetting')->name('updateSetting');

            });


        Route::controller(FanStoriesController::class)
            ->group(function () {
                Route::get('fan', 'getFanListing')->name('fan');
                Route::get('create-fan-story', 'createFan')->name('createFan');
                Route::post('save-fan-story', 'saveFanData')->name('saveFanData');
                Route::get('edit-fan/{fan}', 'editFan')->name('editFan');
                Route::put('update-fan/{fan}', 'updateFan')->name('updateFan');
                Route::get('delete-fan/{fan}', 'deleteFan')->name('deleteFan');
                Route::get('search-fan/{fan?}', 'searchFan')->name('searchFan');
                Route::post('fan-bulk-action', 'handleFanBulkAction')->name('fanBulkAction');
            });

        Route::controller(FaqGuideController::class)
            ->group(function () {
                Route::get('create-new-{type}', 'createNewFaqGuide')->name('createNewFaqGuide');
                Route::post('save-{type}', 'saveFaqGuideData')->name('saveFaqGuideData');
                Route::get('edit-{type}/{faqguide}', 'editFaqGuide')->name('editFaqGuide');
                Route::put('update-{type}/{faqguide}', 'updateFaqGuide')->name('updateFaqGuide');
                Route::get('delete-{type}/{faqguide}', 'deleteFaqGuide')->name('deleteFaqGuide');
                Route::get('search-{type}/{faqguide?}', 'searchFaqGuide')->name('searchFaqGuide');
                Route::get('listing/{type}', 'getFaqGuideListing')->name('faqGuide');
                Route::post('bulk-action', 'handleFaqGuideBulkAction')->name('faqGuideBulkAction');
            });



        // analytics
        Route::get('analytics', function () {
            return view('backend.analytics');
        })->name('analytics');
    });
