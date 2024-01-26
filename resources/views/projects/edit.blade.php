@extends('layouts.admin.layouts.design')

@section('main-content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Project/create</li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
      
        @include('includes.msg')

        <div class="box-body">
          <div class="row">
            <form role="form" action="{{url('project/'.$project->id.'/update')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}


              <div class="col-md-4">

                <div class="form-group"  style="margin-bottom: 40px;">
                  <label for="name">Name<span class="text-red">*</span></label>
                  <input type="text" class="form-control" id="name" value="{{ $project->name }}" name ="name" placeholder="project Name" style="width: 300px;" required>
                </div>

              </div>

              <div class="col-md-4">
        
                <div class="form-group"  style="margin-bottom: 40px;">
                  <label for="description">Description<span class="text-red">*</span></label>
                  <input type="text" class="form-control" id="description" value="{{ $project->description }}" name ="description" placeholder="Description" style="width: 300px;" required>
                </div>

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