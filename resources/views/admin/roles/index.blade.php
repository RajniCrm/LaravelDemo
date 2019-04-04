@extends("admin.include.header")
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <!--   <canvas class="w-100" id="myChart" width="900" height="auto"></canvas> -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{url('/roles/create')}}" class="btn btn-sm btn-outline-secondary">Create</a>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $sr = 1; ?>
          @if(count($rolesData) >0) 
          @foreach($rolesData as $row)
          <?php $status_class = 'btn-danger';  ?>
            <tr>
              <td>{{ $sr++}}</td>
              <td>{{$row['title']}}</td>
              <td>
                    <?php if($row['status'] == 'Active')  $status_class = 'btn-success'; ?>
                    
                  <a  href="" class="btn btn-xs {{$status_class}}"   id="confirm" data-toggle="modal" data-target="#exampleModal" onclick="getstatus('{{$row['id']}}');"> {{$row['status']}}  </a>
              </td>
              <td>
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <a href="{{action('RolesController@edit', $row['id'])}}" class="btn btn-xs btn-success">Update</a>
                  <a href="{{action('RolesController@delete_form',['id'=> encrypt($row['id'])] )}}" class="btn btn-xs btn-danger delete_form"  >Delete  </a>
              </td>
            </tr>
          @endforeach
          @endif
          </tbody>
        </table>
      </div>
    </main>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <form method="post" action="{{route('change_status')}}">
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
          <button type="submit" class="btn btn-xs btn-primary">Yes</button>
          <button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">No</button>
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