<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- User profile -->
    <div
      class="user-profile position-relative">
      <!-- User profile image -->
      <div class="profile-img">
        <img
          src="{{ asset('storage/' . Auth::user()->profile_image) }}"
          alt="user"
          class=" rounded-circle"
          style="width: 57px; height: 57px;" />
      </div>
      <!-- User profile text-->
      <div class="profile-text pt-1 dropdown">
        <a
          href="#"
          class="
                  dropdown-toggle
                  u-dropdown
                  w-100
                  text-white
                  d-block
                  position-relative
                "
          id="dropdownMenuLink"
          data-bs-toggle="dropdown"
          aria-expanded="false">{{Auth::user()->name}}</a>
        <div
          class="dropdown-menu animated flipInY"
          aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="{{route('userprofile')}}"><i
              data-feather="user"
              class="feather-sm text-info me-1 ms-1"></i>
            My Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('account.logout')}}"><i
              data-feather="log-out"
              class="feather-sm text-danger me-1 ms-1"></i>
            Logout</a>
          <div class="dropdown-divider"></div>
          <div class="ps-4 p-2">
            <a href="{{route('userprofile')}}" class="btn d-block w-100 btn-info rounded-pill">View Profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End User profile text-->
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Personal</span>
        </li>
        <li class="sidebar-item">
          <a
            class="sidebar-link  waves-effect waves-dark"
            href="/account/index"
            aria-expanded="false">
            <i class="mdi mdi-gauge"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a
            class="sidebar-link waves-effect waves-dark"
            href="/userprofile"
            aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span>User Profile</span></a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-account-multiple"></i>
            <span class="hide-menu">Master</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{route('ServiceType.index')}}" class="sidebar-link sublink">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <iconify-icon icon="solar:stop-circle-line-duotone"></iconify-icon>
                </div>
                <span class="hide-menu">Service Type</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{route('Category.index')}}" class="sidebar-link sublink">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <iconify-icon icon="solar:stop-circle-line-duotone"></iconify-icon>
                </div>
                <span class="hide-menu">Category</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{route('Accomodation.index')}}" class="sidebar-link sublink">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <iconify-icon icon="solar:stop-circle-line-duotone"></iconify-icon>
                </div>
                <span class="hide-menu">Accomodation</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{route('DifficultyLevel.index')}}" class="sidebar-link sublink">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <iconify-icon icon="solar:stop-circle-line-duotone"></iconify-icon>
                </div>
                <span class="hide-menu">Difficulty Level</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link waves-dark" href="/roles" aria-expanded="false">
            <i class="mdi mdi-account-multiple"></i>
            <span>Role List</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a
            class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{route('account.logout')}}"
            aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a>
        </li>
        
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
</aside>