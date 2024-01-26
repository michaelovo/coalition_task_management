 <aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">


      </div>
      <div class="pull-left info">
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
  
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>

      <li>
        <a href="#">
          <i class="fa fa-dashboard fa-lg text-blue"></i>
           <span>Dashboard</span>
          </a>
      </li>
     

      <li class="treeview">
        <a href="#">
          <i class=" fa fa-fw fa-gear text-green fa-lg"></i> <span>Projects</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            <small class="label pull-right bg-green">2</small>
          </span>
        </a>

        <ul class="treeview-menu">
          <li><a href="{{url('project/create')}}"><i class="fa fa-fw fa-user-plus"></i>Create</a></li>

            <li><a href="{{url('project/view')}}"><i class="fa fa-fw fa-eye"></i> View</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class=" fa fa-fw fa-gear text-yellow fa-lg"></i> <span>Tasks</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            <small class="label pull-right bg-yellow">2</small>
          </span>
        </a>

        <ul class="treeview-menu">
          <li><a href="{{url('task/create')}}"><i class="fa fa-fw fa-user-plus"></i>Create</a></li>

            <li><a href="{{url('task/view')}}"><i class="fa fa-fw fa-eye"></i> View</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>