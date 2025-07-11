<!DOCTYPE html>
<html lang="en">

    @include('frontend.header')

<body>

    
        <!-- Common Navbar -->
        <x-frontend.layouts.navbar />

        

        <!-- Dynamic Page Content -->
        @yield('content')

       
        {{-- @dump(Route::currentRouteName()) --}}

        <!-- Common Footer -->
        @if (!Route::is('frontend.quoteSteps'))
            <x-frontend.layouts.footer />
        @endif
    

    @include('frontend.scripts')

    @stack('scripts')
</body>
</html>

