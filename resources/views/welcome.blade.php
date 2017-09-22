<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('partials.welcome.head')  

</head>
<body id="top-1">
<div id="menu-0" custom-code="true"> <!-- No borrar -->
    
    @include('partials.welcome.nav')

    @include('partials.welcome.main-section')

    @include('partials.welcome.overview-section')

    @include('partials.welcome.overview-description-section')

    @include('partials.welcome.pictures-carts-section')

    @include('partials.welcome.video-section')

    @include('partials.welcome.icons-section')

    @include('partials.welcome.quotes-section')

    @include('partials.welcome.price-section')

    @include('partials.welcome.download-section')

    @include('partials.welcome.footer')

    @include('partials.welcome.scripts')  

  </body>
</html>