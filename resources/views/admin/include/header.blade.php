<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>{{config('app.name')}} Dashboard</title>

  <!--   <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/"> -->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}">  
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin_css.css')}}">  <!-- Custom added css file  from public/css/custom.css -->

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/pages')}}">{{config('app.name')}}</a>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  @auth
  <div class="navbar-nav px-3 white">
    <span align="center">{{auth()->user()->name}}</span>
    <span>{{auth()->user()->email}}</span>
    
  </div>
  @endauth

  <!-- <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
       <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} 
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
  </ul> -->
</nav>

<div class="container-fluid">
  <div class="row ">
    @include('admin.include.leftpanel')
        @yield('content')   

  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{asset('js/jquery-slim.min.js')}}"><\/script>')</script>
    
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" ></script>
  <!--  integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"  -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

    <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
             setTimeout(function() {
              $('.msgHide').fadeOut();
                  }, 2000);

            /*  $('.delete_form').click(function(){
                    if(confirm("Are you sure you want to delete it?"))
                    {
                     return true;
                    }
                    else
                    {
                     return false;
                    }
               });*/


          
        });
    </script>
       <!--  <script src="dashboard.js"></script> -->
    </body>
</html>