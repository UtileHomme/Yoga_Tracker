<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset(Storage::disk('local')->url($trainee_image)) }}" class="img-circle" alt="User Image" style="margin-left:60px; ">
      </div>

    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
          <li class=""><a href="{{route('workout.create')}}"><i class="fa fa-circle-o"></i> Log My Workout</a></li>
          <li class=""><a href="{{route('workout.display')}}"><i class="fa fa-circle-o"></i> View My Workouts</a></li>
          <li class=""><a href="{{route('workout.statistics')}}"><i class="fa fa-circle-o"></i> Your Workout Statistics</a></li>
      </li>
      <li>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
