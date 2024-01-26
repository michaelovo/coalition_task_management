<header class="main-header">
  <?php use Carbon\Carbon;?>

    <a href="#" class="logo">
      <span class="logo-mini"><b>Admin</b></span>
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            </a>
            <ul class="dropdown-menu" style="background-color: antiquewhite;">
              <!-- User image -->
              <li class="user-header">
                 
               
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('admin/user/profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">

                </div>
              </li>
            </ul>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>
