<!DOCTYPE html>
<html lang="en">

@include('backend.header')

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        
         <x-backend.layouts.sidebar />

        <!-- Right side: header + scrollable content -->
        <div class="main-area">
            
            <x-backend.layouts.navbar />

            <!-- Scrollable content -->
            @yield('content')

           
        </div>
    </div>
    <!-- Bootstrap jS -->
  
    @include('backend.script')

    @stack('scripts')

</body>

</html>