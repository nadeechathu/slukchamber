<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <!-- Google tag (gtag.js) -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-R0TF6W9GFZ"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());

         gtag('config', 'G-R0TF6W9GFZ');
      </script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="google-site-verification" content="TfD6wLRLj2AucW55Xz5DVy91wTIutEjNmKLGFR13f3A" />
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>SL-UK Chamber of Commerce | Promoting Bilateral Trade Between Sri Lanka and the UK</title>
      <meta name="keywords" content="SL-UK Chamber ,Chamber of Commerce London , Business networking , Bilateral trade promotion ,  Sri Lanka-UK relations , Professional networking , Industry advocacy ,Business development opportunities" >
      <meta name="description" content="Join SL-UK Chamber of Commerce for networking opportunities and business development between Sri Lanka and the United Kingdom. Grow your business, gain insights, and expand your reach.">
      <!-- Google Font: Source Sans Pro -->
      <link href='https://fonts.googleapis.com/css?family=Manrope' rel='stylesheet'>
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="{{asset('themes/default/plugins/fontawesome-free/css/all.min.css')}}">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="{{asset('themes/default/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('themes/default/dist/css/cmsadmin.min.css')}}">
      <!-- Bootstrap 5.3.2 -->
      <link rel="stylesheet" href="{{asset('themes/default/dist/css/bootstrap.min.css')}}">
      <!-- admin custom css -->
      <link rel="stylesheet" href="{{asset('themes/default/css/custom_c.css')}}">
      {{--
      <link rel="stylesheet" href="{{asset('themes/default/css/admin-custom.css')}}">
      --}}
      <link rel="stylesheet" href="{{asset('themes/default/css/admin-custom.css')}}">
      <link rel="stylesheet" href="{{asset('themes/default/css/owl.carousel.min.css')}}">
      <link rel="icon" href="{{asset('favicon.ico')}}">
      <link href="{{asset('themes/default/css/hover.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('themes/default/css/chamber.css')}}">
      <link rel="stylesheet" href="{{asset('themes/default/css/responsive-chamber.css')}}">
      <link rel="stylesheet" href="{{asset('themes/default/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.min.css')}}">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
      @yield('css')
      <!-- Scripts -->
      <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
   </head>
   <body>
      {{-- @include('web.layouts.preloader.preloader') --}}
      @include('web.layouts.headers.header')
      @yield('content')
      @include('web.layouts.footers.footer')
      <!-- REQUIRED SCRIPTS -->
      <!-- jQuery -->
      <script src="{{asset('themes/default/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('themes/default/plugins/jquery-ui/jquery-ui.js')}}"></script>
      <!-- PAGE PLUGINS -->
      <!-- jQuery Mapael -->
      <script src="{{asset('themes/default/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
      <script src="{{asset('themes/default/plugins/raphael/raphael.min.js')}}"></script>
      <script src="{{asset('themes/default/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
      <script src="{{asset('themes/default/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
      <!-- ChartJS -->
      <script src="{{asset('themes/default/plugins/chart.js/Chart.min.js')}}"></script>
      <!-- Bootstrap 5.3.2-->
      <script src="{{asset('themes/default/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- overlayScrollbars -->
      <script src="{{asset('themes/default/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('themes/default/dist/js/cmsadmin.js')}}"></script>
      <!-- PAGE PLUGINS -->
      <!-- jQuery Mapael -->
      <script src="{{asset('themes/default/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
      <script src="{{asset('themes/default/plugins/raphael/raphael.min.js')}}"></script>
      <script src="{{asset('themes/default/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
      <script src="{{asset('themes/default/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
      <!-- ChartJS -->
      <script src="{{asset('themes/default/plugins/chart.js/Chart.min.js')}}"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="{{asset('themes/default/dist/js/cms.js')}}"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="{{asset('themes/default/dist/js/pages/dashboard2.js')}}"></script>
      <!-- Custom javascript jquery -->
      <script src="{{asset('themes/default/js/owl.carousel.min.js')}}"></script>
      <script src="{{asset('themes/default/js/admin-custom.js')}}"></script>
      <!--Tags -->
      <script src="{{asset('themes/default/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      @yield('scripts')
   </body>
   <script>
      $('.event-Carousel').owlCarousel({
           margin: 30,
           loop: true,
           dots: true,
           nav: false,
           autoplay: false,
           smartSpeed: 6000,
           animateOut: 'fadeOut',
           autoplayTimeout: 6000,
           responsive: {
               0: {
                   items: 1
               },
               600: {
                   items: 1
               },
               1000: {
                   items: 2
               }
           }
       });
       $('.news-Carousel').owlCarousel({
           margin: 30,
           loop: true,
           dots: true,
           nav: false,
           autoplay: false,
           smartSpeed: 6000,
           animateOut: 'fadeOut',
           autoplayTimeout: 6000,
           responsive: {
               0: {
                   items: 1
               },
               600: {
                   items: 2
               },
               1000: {
                   items: 4
               }
           }
       });
       window.addEventListener('scroll', e => {
           var el = document.getElementById('jsScroll');
           if (window.scrollY > 300) {
               el.classList.add('visible');
           } else {
               el.classList.remove('visible');
           }
       });

       function scrollToTop() {
           window.scrollTo({
               top: 0,
               behavior: 'smooth'
           });
       }
       $(function () {
      var shrinkHeader = 200;
      $(window).scroll(function () {
       var scroll = getCurrentScroll();
       if (scroll >= shrinkHeader) {


           $('.header-div').addClass('shink-header-full');



       }
       else {

           $('.header-div').removeClass('shink-header-full');


       }
      });
      function getCurrentScroll() {
       return window.pageYOffset || document.documentElement.scrollTop;
      }
      });
   </script>
   <script>
      $(document).ready(function() {

          // Get the value of the hidden input field
          var scrollToElement = $('#scrollToElement').val();

          // Check if the value is not empty and the element exists
          if (scrollToElement && $('#membership-' + scrollToElement).length) {
              // Scroll to the element with the specified ID
              $('html, body').animate({
                  scrollTop: $('#membership-' + scrollToElement).offset().top
              }, 1000); // Adjust the duration of the scroll animation as needed
          }
      });
   </script>
</html>
