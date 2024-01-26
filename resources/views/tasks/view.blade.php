@extends('layouts.admin.layouts.design')

@section('main-content')
  <?php use Carbon\Carbon;?>

  <div class="content-wrapper">
        @include('includes.msg')

      <section class="content">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Tasks</h3>
            <a class="col-lg-offset-5 btn btn-primary" href="{{url('task/create')}}"><i class="fa fa-fw fa-plus"></i>Add New Task </a>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>

          {{-- Purchase records --}}
          <div class="box-body">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="box-body table-responsive">
                      <table id="tasks" class="table table-bordered table-striped" style="font-size:1em;">
                        <thead>
                          <tr>
                            <th>Priority ID</th>
                            <th>Task name</th>
                            <th>Task description</th>
                            <th>Task priority</th>
                            <th>Parent project</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tasks as $task)
                          <tr>
                            <td>{{$task->priority_id ?? ''}}</td>
                            <td>{{$task->name ?? ''}}</td>
                            <td>{{$task->description ?? ''}}</td>
                            <td>{{$task->priority->name ?? ''}}</td>
                            <td>{{$task->project->name ?? ''}}</td>
                           
                            <td>{{Carbon::parse($task->created_at ?? '')->format('Y-m-d H:i:s')}}</td>
                            <td>{{Carbon::parse($task->updated_at ?? '')->format('Y-m-d H:i:s')}}</td>

                              <td class="">
                                          <a href="{{url('/task/'.$task->id.'/edit')}}" class="btn btn-primary btn-xs" title="Edit task"><i class="fa fa-fw fa-edit text-white fa-lg"></i></a>
                                          <a rel="{{$task->id}}" del="task" href="javascript:" class="btn btn-danger btn-xs deleteRecord" title="Delete task"><i class="fa fa-fw fa-trash fa-lg text-white fa-lg deleteRecord"></i></a>
                              </td>
                          </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Priority ID</th>
                            <th>Task name</th>
                            <th>Task description</th>
                            <th>Task priority</th>
                            <th>Parent project</th>
                            <th>Created</th>
                            <th>Updated</th>
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
      $('#tasks').DataTable();
    })
  </script>


@endsection