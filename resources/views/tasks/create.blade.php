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
          <h3 class="box-title"></h3>
            <a class="col-lg-offset-0 btn bg-maroon" href="{{url('project/view')}}"><i class="fa fa-fw fa-eye" title="View projects"></i>Projects </a>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
      
        @include('includes.msg')

        <div class="box-body">
          <div class="row">
            <form role="form" action="{{url('/task/store')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
             

              <div class="col-md-4">

                <div class="form-group"  style="margin-bottom: 40px;">
                  <label for="name">Task Name<span class="text-red">*</span></label>
                  <input type="text" class="form-control" id="name" value="{{ old('name') }}" name ="name" placeholder="Task Name" style="width: 300px;" required>
                </div>

                <div class="form-group">
                  <label>Task Priority <span class="text-red">*</span></label>
                  <select class="form-control" name="priority_id" style="width: 300px;" required>
                    <option value="" disabled selected>Select</option>
                    @foreach($priorities as $priority)
                       <option value="{{$priority->id}}" @if(old('priority_id')==$priority->id) selected @endif>{{$priority->name}}</option>
                    @endforeach
                  </select>               
               </div>

                

               

              </div>

              <div class="col-md-4">

                <div class="form-group">
                  <label>Parent Project <span class="text-red">*</span></label>
                  <select class="form-control" name="project_id" style="width: 300px;" required>
                    <option value="" disabled selected>Select</option>
                    @foreach($projects as $project)
                       <option value="{{$project->id}}" @if(old('project_id')==$project->id) selected @endif>{{$project->name}}</option>
                    @endforeach
                  </select>               
               </div>

                

              </div>

              <div class="col-md-4">
                <div class="form-group"  style="margin-bottom: 40px;">
                  <label for="description">Task Description<span></label>
                  <input type="text" class="form-control" id="description" value="{{ old('description') }}" name ="description" placeholder="Description" style="width: 300px;" required>
                </div>

                
              </div>
              
          
          </div>
        </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Create</button>
          </div> 

            </form>
        </div>
    </section>
  </div>
@endsection