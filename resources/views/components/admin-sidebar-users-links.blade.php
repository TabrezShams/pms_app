<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-cog"></i>
      <span>Users Management</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Users:</h6>
        <a class="collapse-item" href="{{route('user.index')}}"> All Users</a>
        <a class="collapse-item" href="{{route('user.create')}}">Create New User</a>
      </div>
    </div>
  </li>