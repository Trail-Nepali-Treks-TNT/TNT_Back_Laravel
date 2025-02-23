
<header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="/account/index">
              <!-- Logo icon -->
              <b class="logo-icon">
                <!-- Light Logo icon -->
                <img
                height="50px"
                  src="/assets/images/background/logo.png"
                  alt="homepage"
                  class="light-logo"
                />
              </b>
              <!--End Logo icon -->
              
            </a>
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
              class="topbartoggler d-block d-md-none waves-effect waves-light"
              href="javascript:void(0)"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
              ><i class="ti-more"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto">
              <!-- This is  -->
              <li class="nav-item">
                <a
                  class="
                    nav-link
                    sidebartoggler
                    d-none d-md-block
                    waves-effect waves-dark
                  "
                  href="javascript:void(0)"
                  ><i class="ti-menu"></i
                ></a>
              </li>
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->
              <li class="nav-item d-none d-md-block search-box">
              
               
              </li>
              <!-- ============================================================== -->
              <!-- Mega Menu -->
              <!-- ============================================================== -->
</li>
</ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">
              <!-- ============================================================== -->
              <!-- Comment -->
              <!-- ============================================================== -->
            
              <!-- ============================================================== -->
              <!-- End Messages -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- Profile -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle waves-effect waves-dark"
                  href="#"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <img
                    src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                    alt="user"
                    width="30"
                   class=" rounded-circle"
                style="width: 33px; height: 33px;"
                  />
                </a>
                <div
                  class="
                    dropdown-menu dropdown-menu-end
                    user-dd
                    animated
                    flipInY
                  "
                >
                  <div
                    class="
                      d-flex
                      no-block
                      align-items-center
                      p-3
                      bg-info
                      text-white
                      mb-2
                    "
                  >
                    <div class="">
                      <img
                        src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                        alt="user"
                        class=" rounded-circle"
                style="width: 57px; height: 57px;"
                      />
                    </div>
                    <div class="ms-2">
                      <h4 class="mb-0 text-white">{{Auth::user()->name}}</h4>
                      <p class="mb-0">{{Auth::user()->email}}</p>
                    </div>
                  </div>
                  <a class="dropdown-item" href="{{route('userprofile')}}"
                    ><i
                      data-feather="user"
                      class="feather-sm text-info me-1 ms-1"
                    ></i>
                    My Profile</a
                  >
                  <a class="dropdown-item" href="/account/index"
                    ><i
                    data-feather="credit-card"
                    class="feather-sm text-info me-1 ms-1"
                  ></i>
                    User Lists</a
                  >

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/roles"
                    ><i
                      data-feather="folder"
                      class="feather-sm text-warning me-1 ms-1"
                    ></i>
                    Roles</a
                  >
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('account.logout')}}"
                    ><i
                      data-feather="log-out"
                      class="feather-sm text-danger me-1 ms-1"
                    ></i>
                    Logout</a
                  >
                  <div class="dropdown-divider"></div>
                  <div class="pl-4 p-2">
                    <a href="{{route('userprofile')}}" class="btn d-block w-100 btn-info rounded-pill"
                      >View Profile</a
                    >
                  </div>
                </div>
              </li>
              <!-- ============================================================== -->
              <!-- Language -->
             
            </ul>
          </div>
        </nav>
      </header>
