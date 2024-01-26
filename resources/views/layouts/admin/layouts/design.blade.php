<!DOCTYPE html>
<html>
  <head>
    @include('layouts.admin.layouts.head')
  </head>


  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      @include('layouts.admin.layouts.nav')
        @include('layouts.admin.layouts.sidebar')

        @yield('main-content')
          
        @include('layouts.admin.layouts.footer')




    </div>
  </body>
   @yield('style')
   @yield('script')

   
</html>
