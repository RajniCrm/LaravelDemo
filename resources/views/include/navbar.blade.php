<?php 
  use App\Cms; // USE CMS MODULE
  use Illuminate\Support\Facades\DB; // RUN QUERIES

  $segment1 =  Request::segment(1);  
  $segment2 =  Request::segment(2);  

  // GET PARENT MENUS DATA ONLY FOR TOP MENUS
  $parentData = Cms::orderBy('title', 'Asc')
                    ->where('status','Active')
                    ->where('parent_id','=', '0')
                    ->get();
?>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ url('') }}">{{config('app.name', 'Laravel')}}</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item <?php if($segment2 == '' && $segment1 == 'pages') echo 'active'; ?>">
          <a class="nav-link" href="{{ url('/admin') }}">Dashboard</a>
        </li>


        <!--FIRST <li class="nav-item <?php if($segment2 == 'services' ) echo 'active'; ?>">
          <a class="nav-link" href="{{ url('/pages/services') }}">Services</a>
        </li>
        <li class="nav-item <?php if($segment2 == 'about' ) echo 'active'; ?>">
          <a class="nav-link" href="{{ url('/pages/about') }}">About Us</a>
        </li>
        <li class="nav-item <?php if($segment2 == 'contact' ) echo 'active'; ?>">
          <a class="nav-link" href="{{ url('/pages/contact') }}">Contact Us</a>
        </li> -->

        
         <!--SECOND  @if(count($parentData) > 0)
            @foreach($parentData as $cms)
              <li class="nav-item <?php if($segment2 == 'services' ) echo 'active'; ?>">
                <a class="nav-link" href="{{ url('/pages/slug/'.$cms->slug) }}">{{$cms->title}}</a>
              </li>
            @endforeach
          @endif -->

          <!-- THIRD -->
          @if(count($parentData) > 0)
            @foreach($parentData as $cms)
            <li class="nav-item dropdown <?php if($segment2 == 'services' ) echo 'active'; ?>">
              <a class="nav-link" href="{{ url('/pages/slug/'.$cms->slug) }}">{{$cms->title}}</a>
              <div class="dropdown-content" aria-labelledby="navbarDropdownMenuLink">

              <!--  // GET CHILDMENUS DATA FOR TOP MENUS ACCORDING TO PARENT MENUS -->
                <?php $childData = Cms::orderBy('title', 'Asc')
                    ->where('status','Active')
                    ->where('parent_id','=', $cms->id)
                    ->get();
                ?>
                @if(count($childData) > 0)
                  @foreach($childData as $child)
                  <a href="{{ url('/pages/slug/'.$child->slug) }}">{{$child->title}}</a>
                  @endforeach
                @endif
              </div>
            </li>
            @endforeach
          @endif


        <!--  // LOGOUT IF AUTH IS PRESENT -->
        @if (Route::has('login'))
          @auth   
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
          @else <!--  // IF AUTH IS NOT PRESENT THEN ASK FOR LOGIN AND REGISTRATION -->
          <li class="nav-item  <?php if($segment1 == 'register' ) echo 'active'; ?>">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
          <li class="nav-item  <?php if($segment1 == 'login' ) echo 'active'; ?>">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          @endauth
        @endif

      </ul>
      <!-- <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </nav>
</header>