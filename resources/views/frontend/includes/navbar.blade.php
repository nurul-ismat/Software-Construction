<nav class="navbar sticky-top navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="/img/LOGO-UTM.png" alt="logo" width="150px" height="auto"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span>Howby, {{session('front_user')}} &nbsp;<i class="fa fa-sort-down"></i></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ismat98</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('student-dashboard')}}"><i class="fa fa-home"></i>&nbsp;Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('front-logout')}}"><i class="fa fa-sign-out-alt"></i>&nbsp;Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>