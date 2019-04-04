<?php 
	$segment1 =  Request::segment(1);  
	$segment2 =  Request::segment(2);  
	$full_height = '';
	if($segment2 == ''){
		$full_height = 'full-height';
	}
    if($segment1 != 'admin'){
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'Laravel')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}">  
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">  <!-- Custom added css file  from public/css/custom.css -->
        
    </head>
    <body>
        @include('include.navbar')
        @if($segment2 != ''  && $segment1 != 'password' && $segment1 != 'admin')
        <div class="jumbotron text-center">
        	
            <div class="content">
                <div class="title m-b-sm">
                    {{config('app.name')}}
                </div>
               <!--  <div class="links">
                    <a href="https://laravel.com/docs">Home</a>
                    <a href="https://laracasts.com">About Us</a>
                    <a href="https://laravel-news.com">Services</a>
                    <a href="https://nova.laravel.com">Contact Us</a>
                    <a href="https://forge.laravel.com">Our Parteners</a>
                </div> -->
            </div>
        </div>
        @endif
        <div class="full-height">
        	@yield('content')        	
        </div>

    </body>
</html>
<?php } ?>