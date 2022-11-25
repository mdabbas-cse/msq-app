<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            Dear:
            @if (Auth()->user()->role === 1)
                {{ 'Admin' }}
            @else
                {{ 'User' }}
            @endif
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCat"
            aria-expanded="true" aria-controls="collapseCat">
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <i class="fas fa-fw fa-folder"></i>
            <span>ক্যাটাগরি বিভাগ</span>
        </a>
        <div id="collapseCat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.salcat.all') }}">সেলারি ক্যাটাগরি</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <i class="fas fa-fw fa-folder"></i>
            <span>আয়ের খাত</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.bank.all') }}">ব্যাংক</a>
                <a class="collapse-item" href="{{ route('admin.gngc.all') }}">সরকারী/বেসরকারী</a>
                <a class="collapse-item" href="{{ route('admin.snhrent.all.credit') }}">দোকান/ঘর ভাড়া</a>
                <a class="collapse-item" href="{{ route('admin.collection.all.credit') }}">জুমা/দান বাক্স/মাসিক বাজার
                    কালেকশন/আকদ</a>
                <a class="collapse-item" href="{{ route('admin.donation.all.credit') }}">মাসিক চাঁদা/ সদস্য চাঁদা/
                    অনুদান</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>ব্যয়ের খাত</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.salary.all.debit') }}">বেতন/ভাতা</a>
                <a class="collapse-item" href="{{ route('admin.snhrent.all.debit') }}">দোকান/ঘর ভাড়া</a>
                <a class="collapse-item" href="{{ route('admin.donation.all.debit') }}">অনুদান</a>
                <a class="collapse-item" href="#">অফিস/ওয়াকফ/বিল/চিকিৎসা খরচ</a>
                <a class="collapse-item" href="#">বিল</a>
                <a class="collapse-item" href="#">ঋণ পরিশোধ</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar)
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div> -->

</ul>
