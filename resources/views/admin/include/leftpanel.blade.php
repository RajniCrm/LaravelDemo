<?php 
  $segment1 =  Request::segment(1);  
  $segment2 =  Request::segment(2);  

  

  //print_r($segment1); print_r($segment2); exit;

?>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link  <?php if($segment2 == '' && $segment1 == 'admin') echo 'active'; ?>" href="{{ url('/admin')}}">
                  <span data-feather="home"></span>
                  Admin Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($segment1 == 'user') echo 'active'; ?>" href="{{ url('/user') }}">
                  <span data-feather="shopping-cart"></span>
                  Users
                </a>
              </li>
              @if(auth()->user()->id == '1')
              <li class="nav-item">
                <a class="nav-link <?php if($segment1 == 'roles') echo 'active'; ?>" href="{{ url('/roles') }}">
                  <span data-feather="file"></span> User Roles
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($segment1 == 'cms') echo 'active'; ?>" href="{{ url('/cms') }}">
                  <span data-feather="shopping-cart"></span> CMS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($segment1 == 'category') echo 'active'; ?>" href="{{ url('/category') }}">
                  <span data-feather="shopping-cart"></span> Categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($segment1 == 'helpers') echo 'active'; ?>" href="{{ url('/helpers') }}">
                  <span data-feather="shopping-cart"></span> Helpers
                </a>
              </li>
              @endif
              
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <span data-feather="shopping-cart"></span>
                  Logout
                </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              </li>
        </ul>
      </div>
    </nav>