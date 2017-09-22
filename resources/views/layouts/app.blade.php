<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- head -->
    @include('partials.admin.head')
    <!--  -->
</head>
<body>
    
    <div class="page home-page">
      <!-- Main Navbar-->
      @include('partials.admin.nav')
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        @include('partials.admin.sidebar')

        <div class="content-inner">
          <!-- Page Header-->
          @include('partials.admin.breadcrumb')
          <!-- Dashboard Counts Section-->
          @include('partials.admin.sections.features')

          <!--  -->
          <!--  -->
          <!-- Your main content here -->
          <!-- You can use any template and extend this file layout to have awesome look -->
          @yield('content')
          <!--  -->
          <!--  -->
          <!--  -->
      
          <!-- footer -->
          @include('partials.admin.footer')
          
        </div>
      </div>
    </div>

    <!-- Scripts -->
    @include('partials.admin.scripts')
</body>
</html>
