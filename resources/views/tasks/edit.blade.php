@extends('layouts.admin.layouts.design')

@section('main-content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Task/create</li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <a class="col-lg-offset-0 btn bg-maroon" href="{{url('task/view')}}"><i class="fa fa-fw fa-eye" title="View projects"></i>Task </a>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
      
        @include('includes.msg')

        <div class="box-body">
          <div class="row">
            <form role="form" action="{{url('task/'.$task->id.'/update')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}

              <div class="col-md-4">

                <div class="form-group"  style="margin-bottom: 40px;">
                  <label for="name">Task Name<span class="text-red">*</span></label>
                  <input type="text" class="form-control" id="name" value="{{ $task->name }}" name ="name" placeholder="task Name" style="width: 300px;" required>
                </div>

                <div class="form-group">
                  <label>Task Priority <span class="text-red">*</span></label>
                  <select class="form-control" name="priority_id" style="width: 300px;" required>
                    @foreach($priorities as $priority)
                       <option value="{{$priority->id}}" @if(!empty($task->priority->id) && $task->priority->id==$priority->id)selected @endif>{{$priority->name}}</option>
                    @endforeach
                  </select>    
               </div>

               

              </div>


              <div class="col-md-4">

                <div class="form-group">
                  <label>Parent Project <span class="text-red">*</span></label>
                  <select class="form-control" name="project_id" style="width: 300px;" required>
                    @foreach($projects as $project)
                       <option value="{{$project->id}}" @if(!empty($task->project->id) && $task->project->id==$project->id)selected @endif>{{$project->name}}</option>
                    @endforeach
                  </select>    
               </div>


              </div>

              <div class="col-md-4">
                <div class="form-group"  style="margin-bottom: 40px;">
                  <label for="description">task Description<span></label>
                  <input type="text" class="form-control" id="description" value="{{ $task->description}}" name ="description" placeholder="Description" style="width: 300px;" required>
                </div>

                
              </div>
              

             

             
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>  

            </form>
        </div>
      </div>
    </section>
  </div>
@endsection