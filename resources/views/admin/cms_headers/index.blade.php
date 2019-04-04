@extends("admin.include.header")
    <style>
      .btn-xs {
        padding: 1px 5px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
      }
    </style>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <!--   <canvas class="w-100" id="myChart" width="900" height="auto"></canvas> -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{url('/cms/create')}}" class="btn btn-xs btn-outline-secondary">Create</a>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Title</th>
              <th>Sub-Menus</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $sr = 1; ?>
          @if(count($cmsData) >0) 
              @foreach($cmsData as $row)
              <?php $status_class = 'btn-danger';  ?>
                <tr>
                  <td>{{ $sr++}}</td>
                  <td> 
                  @if(!empty($row['image']))
                    <img width="50px" height="50px" src="{{config('app.url')}}/storage/images/cms/{{$row['image']}}" alt="xaxax">
                  @else
                    <img width="50px" height="50px" src="{{config('app.url')}}/storage/images/cms/no_image.png" alt="xaxax">
                  @endif
                  </td>
                  <td>{{$row['title']}}</td>
                  <td>
                    <?php 
                       $data = DB::table('cms')
                              ->select(DB::raw("GROUP_CONCAT(title SEPARATOR ' | ') as `names`"))
                              ->where('parent_id',$row['id'])
                              ->get(); ?>

                    @if(empty($data[0]->names)) {{'N/A'}}
                    @else {{$data[0]->names}}
                    @endif
                  </td>
                  <td>
                      <?php if($row['status'] == 'Active')  $status_class = 'btn-success'; ?>                        
                      <a  href="" class="btn btn-xs {{$status_class}}"   id="confirm" data-toggle="modal" data-target="#exampleModal" onclick="getstatus('{{$row['id']}}');"> {{$row['status']}}  </a>
                  </td>
                  <td>
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                      <a href="{{action('CmsController@show', $row['id'])}}" class="btn btn-xs btn-primary">Show</a>
                      <a href="{{action('CmsController@edit', $row['id'])}}" class="btn btn-xs btn-success">Update</a>
                      <a href="{{action('CmsController@delete_form',['id'=> encrypt($row['id'])] )}}" class="btn btn-xs btn-danger delete_form"> Delete  </a>
                  </td>
                </tr>
              @endforeach
              {{$cmsData->links()}}
          @else  
            <tr>
                <td colspan="6" align="center"><p>No Record Found</p></td>
            </tr>
            
          @endif
          </tbody>
        </table>
      </div>
    </main>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <form method="post" action="{{action('CmsController@change_status')}}">
      {{csrf_field()}} 
      <input type="hidden" name="_id" id="_id" value="">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">  Are you sure to change status?  </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
      </div>
    </form>

  </div>
</div>

<script type="text/javascript">
  function getstatus(id)
  {
    $('#_id').val(id);
  }
</script>