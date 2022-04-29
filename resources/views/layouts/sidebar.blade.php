<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">
      Dear:
      @if(Auth()->user()->role === 1)
      {{'Admin'}}
      @else
      {{'User'}}
      @endif
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>আয়ের খাত</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="buttons.html">ব্যাংক</a>
        <a class="collapse-item" href="cards.html">সরকারী/বেসরকারী</a>
        <a class="collapse-item" href="cards.html">দোকান/ঘর ভাড়া</a>
        <a class="collapse-item" href="cards.html">জুমা/দান বাক্স/মাসিক বাজার কালেকশন/ আকদ</a>
        <a class="collapse-item" href="cards.html">মাসিক চাঁদা/ সদস্য চাঁদা/ অনুদান</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span> ব্যয়ের খাত</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="login.html">বেতন/ভাতা</a>
        <a class="collapse-item" href="register.html">দোকান/ঘর ভাড়া</a>
        <a class="collapse-item" href="forgot-password.html">চিকিৎসা</a>
        <a class="collapse-item" href="forgot-password.html">অনুদান</a>
        <a class="collapse-item" href="forgot-password.html">অফিস খরচ/ওয়াকফ</a>
        <a class="collapse-item" href="forgot-password.html">বিল</a>
        <a class="collapse-item" href="forgot-password.html">ঋণ পরিশোধ</a>
      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>