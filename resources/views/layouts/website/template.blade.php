<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Yellow Store</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('website/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('website/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('website/images/yellow-store.png') }}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('website/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.min.css') }}">
      <link rel="stylesoeet" href="{{ asset('website/css/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="/"><img width="120" src="{{ asset('website/images/yellow-store.png') }}"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="/">Home</a>
                     <a href="/stores">Stores</a>
                     <a href="/products">Products</a>
                     @guest
                        @if (Route::has('register'))
                            <a href="/login">Login</a>
                        @endif
                        @else
                            <a href="/admin/dashboard">Dashboard</a>
                     @endguest
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="{{ asset('website/images/toggle-icon.png') }}"></span>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group mb-4">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
      </div>
      <!-- banner bg main end -->



      @yield('content')

      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{ asset('website/js/jquery.min.js') }}"></script>
      <script src="{{ asset('website/js/popper.min.js') }}"></script>
      <script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('website/js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('website/js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('website/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('website/js/custom.js') }}"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>
