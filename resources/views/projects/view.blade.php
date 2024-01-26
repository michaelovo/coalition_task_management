@extends('layouts.admin.layouts.design')

@section('main-content')
  <?php use Carbon\Carbon;?>

  <div class="content-wrapper">
        @include('includes.msg')

      <section class="content">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Projects</h3>
            <a class="col-lg-offset-5 btn btn-primary" href="{{url('project/create')}}"><i class="fa fa-fw fa-plus"></i>Add New Project </a>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>

          </div>
          <div class="box-body">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="box-body table-responsive">
                      <table id="dept" class="table table-bordered table-striped" style="font-size:1em;">
                        <thead>
                          <tr>
                            <th>DEPARTMENT</th>
                            <th>DESCRIPTION</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($projects as $project)
                          <tr>
                            <td>{{$project->name}}</td>
                            <td>{{$project->description}}</td>
                            
                            <td>{{Carbon::parse($project->created_at ?? '')->format('Y-m-d H:i:s')}}</td>
                            <td>{{Carbon::parse($project->updated_at ?? '')->format('Y-m-d H:i:s')}}</td>

                              <td class="">
                                  <a href="{{url('/project/'.$project->id.'/edit')}}" class="btn btn-primary btn-xs" title="Edit Project Details"><i class="fa fa-fw fa-edit text-white fa-lg"></i></a>
                                  <a href="{{url('/project/'.$project->id.'/tasks')}}"  class="btn btn-success btn-xs" title="View Project Tasks"><i class="fa fa-fw fa-eye text-white fa-lg"></i></a>
                                  <a rel="{{$project->id}}" del="project" href="javascript:" class="btn btn-danger btn-xs deleteRecord" title="Delete Project"><i class="fa fa-fw fa-trash fa-lg text-white fa-lg deleteRecord"></i></a>

                              </td>
                          </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>DEPARTMENT</th>
                            <th>DESCRIPTION</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                            <th>Actions</th>
                           
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </section>
  </div>
  
@endsection



@section('style')
  <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endsection

@section('script')

  <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <script>
    $(function () {
      $('#dept').DataTable()
    })
  </script>

  <script>
    // Use toggle button to switch user status between Active/Inactive and autorefresh page 
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var house_id = $(this).data('id'); 
          
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/admin/changeBranchStatus',
              data: {'status': status, 'house_id': house_id},
              success: function(data){
                console.log(data.success)
                window.location.reload();

              }
          });
      })
    })
  </script>
@endsection