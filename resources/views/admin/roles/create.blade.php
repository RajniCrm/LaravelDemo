 @extends("admin.include.header")
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

 @if(count($errors) > 0)  

    <div class="row col-md-6">
      <div class="alert alert-danger">
       <ul style="list-style-type: none;">
       @foreach($errors->all() as $error)
        <li>{{$error}}</li> <!--  // Display  server side validation errors -->
       @endforeach
       </ul>
      </div>
    </div>
  @endif
   @if(\Session::has('successMsg'))  <!--  // check for session variable creation -->
   <div class="row col-md-6">
      <div class="alert alert-success">
       <p>{{ \Session::get('successMsg') }}</p>  <!--  // show session messege -->
      </div>
    </div>
  @endif
   @if(\Session::has('errorMsg'))  <!--  // check for session variable creation -->
   <div class="row col-md-6">
      <div class="alert alert-danger">
       <p>{{ \Session::get('errorMsg') }}</p>  <!--  // show session messege -->
      </div>
    </div>
  @endif

  <div class="col-sm-4">
    <form class="form-signin" action="{{ url('roles') }}" method="POST">
    {{csrf_field()}} 

      <div class="mb-4">
        <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">{{$title}}</h1>
      </div>

        <label for="inputTitle">Title</label>
        <div class="form-label-group">
          <input type="text" id="inputTitle" class="form-control" placeholder="Enter role title" name="title" required autofocus>
        </div> <br>
        <button class="btn btn-xs btn-primary btn-block" type="submit" name="submit">Create</button>
    </form>
    
  </div>
</main>

@endsection