<!DOCTYPE html>
<html lang="en">

    @include('frontend.header')

<body>

    
        <!-- Common Navbar -->
        <x-frontend.layouts.navbar />

        

        <!-- Dynamic Page Content -->
        @yield('content')

       
        <!-- Common Footer -->
        @if (!Route::is('quoteSteps'))
            <x-frontend.layouts.footer />
        @endif
    

    @include('frontend.scripts')
</body>
</html>

