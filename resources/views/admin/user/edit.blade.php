 @extends("admin.include.header")
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

 @if(count($errors) > 0)  

    <div class="row col-md-6 msgHide">
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
   <div class="row col-md-6 msgHide">
      <div class="alert alert-success">
       <p>{{ \Session::get('successMsg') }}</p>  <!--  // show session messege -->
      </div>
    </div>
  @endif
   @if(\Session::has('errorMsg'))  <!--  // check for session variable creation -->
   <div class="row col-md-6 msgHide">
      <div class="alert alert-danger">
       <p>{{ \Session::get('errorMsg') }}</p>  <!--  // show session messege -->
      </div>
    </div>
  @endif

  <div class="col-sm-6">
    <div class="card-body">
        <form method="POST" class="form-signin" action="{{action('UserController@update',$userRow->id)}}">
        
    {{csrf_field()}} 
      <input type="hidden" name="_method" value="PATCH" />

          <div class="mb-4">
            <h1 class="h3 mb-3 font-weight-normal">{{$title}}</h1>
          </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $userRow->name }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $userRow->email }}" readonly>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                 <label for="role_id" class="col-md-4 col-form-label text-md-right">Select Role</label>
                 <div class="col-md-6">

                      <select class="form-control" name="role_id" id="role_id" disabled="">
                      <option value="">Select Role</option>
                     @foreach ($roles as $role)
                      <option value="{{ $role->id }}" <?php if($userRow->role_id == $role->id) echo 'selected'; ?> >{{ ucfirst($role->title) }}</option>
                     @endforeach
                      </select>
                 </div>

            </div>


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-xs btn-primary">
                        {{ __('Update') }}
                    </button> 

                    <a href="{{route('roles.index')}}"> <input type="button" value="Back" class="btn btn-xs btn-default" /> </a>
                </div>
            </div>
        </form>
    </div>

  </div>
</main>

@endsection