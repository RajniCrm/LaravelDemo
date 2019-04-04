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

  <div class="col-sm-4">
    <form class="form-signin" action="{{ url('cms') }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}} 

      <div class="mb-4">
        <h1 class="h3 mb-3 font-weight-normal">{{$title}}</h1>
      </div>

        <label for="inputTitle">Title<span class="text-danger"> * </span></label>
        <div class="form-label-group">
          <input type="text" id="inputTitle" class="form-control" placeholder="Enter cms title" name="title" required autofocus oninput="getSlug();">
        </div><br>

        <label for="inputTitle">Slug<span class="text-danger"> * </span></label>
        <div class="form-label-group">
          <input type="text" id="inputSlug" class="form-control" name="slug" required readonly="">
        </div> <br>

        <label for="parent_id">Select Parent Menu</label>
        <div class="form-label-group">
            <select class="form-control" name="parent_id" id="parent_id">
            <option value="0">Select Parent Menu</option>
            @foreach ($parentData as $parentrow)
              <option value="{{ $parentrow->id }}">{{ ucfirst($parentrow->title) }}</option>
            @endforeach
            </select>
        </div><br>  

        <!-- <label for="inputTitle">Position<span class="text-danger"> * (It should be numeric)</span></label>
        <div class="form-label-group">
          <input type="text" id="inputPosition" class="form-control" placeholder="Select position" name="position" required min="1" max="10" maxlength="2" onkeydown="return isNumberKey(event);">
        </div> <br> -->

        <label for="inputTitle">Description<span class="text-danger"> * </span></label>
        <div class="form-label-group">
          <textarea id="editor" class="form-control" placeholder="Enter description" name="description" style="resize:none;" required ></textarea>
        </div> <br>

        <label for="inputTitle">Image</label>
        <div class="form-label-group">
          <input type="file" class="form-control" name="cover_image"/>
        </div> <br>

        <button class="btn btn-xs btn-primary btn-block" type="submit" name="submit">Create</button>
    </form>
    
  </div>
</main>

@endsection
<script type="text/javascript">
  function getSlug()
  {
    var inputTitle = $('#inputTitle').val();
    //alert(inputTitle);
     // inputTitle=inputTitle.replace(" ","_");
     inputTitle=inputTitle.split(' ').join('_');
   // $("#url_key").val(key);
    $('#inputSlug').val(inputTitle.toLowerCase());
  }

  function isNumberKey(evt){
      var charCode = (evt.which) ? evt.which : evt.keyCode
      return !(charCode > 31 && (charCode < 48 || charCode > 57));
  }
</script>
