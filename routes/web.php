<?php

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\FaqGuideController;
use App\Http\Controllers\Backend\GalleryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Frontend Routes

Route::get('/', function () {
    return view('welcome');
})->name('homepage');


Route::get('/about-us', function () {
    return view('frontend/about');
})->name('about');


Route::get('/blog', function () {
    return view('frontend/blog');
})->name('blog');

Route::get('/blog_detail', function () {
    return view('frontend/blog_detail');
})->name('blogDeatils');

Route::get('/fan', function () {
    return view('frontend/fan');
})->name('fan');


Route::get('/get-quote', function () {
    return view('frontend/get_quote');
})->name('getQuote');

Route::get('/quote', function () {
    return view('frontend/quote_steps');
})->name('quoteSteps');

Route::get('/results', function () {
    return view('frontend/pet_protection');
})->name('results');

Route::get('/faq', function () {
    return view('frontend/faq');
})->name('faq');

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Backend Routes 

Route::prefix('admin')
    ->middleware(['auth'])
    ->as('admin.')
    ->group(function () {

        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');


        //blogs 
        Route::controller(BlogController::class)
        ->group(function(){
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
        ->group(function(){
            Route::get('gallery', 'getGalleryListing')->name('gallery');
            Route::get('create-new-gallery', 'createNewGallery')->name('createNewGallery');
            Route::post('save-gallery', 'saveGalleryData')->name('saveGalleryData');
            Route::get('edit-gallery/{gallery}', 'editGallery')->name('editGallery');
            Route::put('update-gallery/{gallery}', 'updateGallery')->name('updateGallery');
            Route::get('delete-gallery/{gallery}', 'deleteGallery')->name('deleteGallery');
            
           
        });

        // Route::get('faq-guide', function () {
        //     return view('backend.faq_guide.faq_listing');
        // })->name('faqGuide');

        // Route::get('create-new-faq', function () {
        //     return view('backend.faq_guide.create_new_faq');
        // })->name('createNewFaq');

        Route::controller(FaqGuideController::class)
        ->group(function(){
            Route::get('{type}', 'getFaqGuideListing')->name('faqGuide');
            Route::get('create-new-{type}', 'createNewFaqGuide')->name('createNewFaqGuide');
            Route::post('save-{type}', 'saveFaqGuideData')->name('saveFaqGuideData');
            Route::get('edit-{type}/{faqguide}', 'editFaqGuide')->name('editFaqGuide');
            Route::put('update-{type}/{faqguide}', 'updateFaqGuide')->name('updateFaqGuide');
            Route::get('delete-{type}/{faqguide}', 'deleteFaqGuide')->name('deleteFaqGuide');
            Route::get('search-{type}/{faqguide?}', 'searchFaqGuide')->name('searchFaqGuide');          
        });

      
        // fan gallery

        // Route::get('fan-gallery', function () {
        //     return view('backend.fan_gallery.gallery_listing');
        // })->name('fanGallery');

        // Route::get('create-new-gallery', function () {
        //     return view('backend.fan_gallery.create_new_gallery');
        // })->name('createNewGallery');


        // faq guide

        // Route::get('faq-guide', function () {
        //     return view('backend.faq_guide.faq_listing');
        // })->name('faqGuide');

        // Route::get('create-new-faq', function () {
        //     return view('backend.faq_guide.create_new_faq');
        // })->name('createNewFaq');

        //setting 

        Route::get('settings', function () {
            return view('backend.settings');
        })->name('settings');

        // analytics
        Route::get('analytics', function () {
            return view('backend.analytics');
        })->name('analytics');

        //Affilate
        Route::get('affilate', function () {
            return view('backend.affilate');
        })->name('affilate');
        
    });
