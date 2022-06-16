<div class="dashboard-header">
    <nav class="navbar navbar-expand-md bg-white fixed-top">
        @if (isset(session()->get('settings')->general_settings->site_logo))
        <a class="navbar-brand" href="/kt-admin">
          <img style="height: 60px;" class="logo img-fluid" src=" {{ asset('storage/site/'.session()->get('settings')->general_settings->site_logo) }} "
            alt="">  
        </a>
         @endif
            <div class="responsive_header">
                <!--<a class="" href="{{ url('locale/ar') }}"> <img src="/images/front_image/icon/ar.gif" alt="Arabic Unitag (العربية الموحدة)" title="Arabic Unitag (العربية الموحدة)" class="img-fluid"> </a>||

                <a class="" href="{{ url('locale/en') }}"> <img src="/images/front_image/icon/en.gif" alt="English (UK)" title="English (UK)" class="img-fluid"> </a>|| -->

                <a class="nav-user-img mr-3" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/img/user_icon/icon.png" alt="" class="user-avatar-md rounded-circle"></a>
                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                    <div class="nav-user-info">
                        <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->uname }} </h5>
                            <span class="status"></span><span class="">{{ Auth::user()->email }}</span>
                    </div>
                    <a class="dropdown-item" href="{{ route('user.show', [Auth::user()->id]) }}"><i class="fas fa-user mr-2"></i>Account</a>
                    {{-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item connection">
                        <!---<a class="nav-link" href="{{ url('locale/ar') }}"> <img src="/images/front_image/icon/ar.gif" alt="Arabic Unitag (العربية الموحدة)" title="Arabic Unitag (العربية الموحدة)" class="img-fluid"> </a>-->
                        </li>
                    <li class="nav-item connection">
                        <!--<a class="nav-link" href="{{ url('locale/en') }}"> <img src="/images/front_image/icon/en.gif" alt="English (UK)" title="English (UK)" class="img-fluid"> </a>-->
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/img/user_icon/icon.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->uname }} </h5>
                                    <span class="status"></span><span class="">{{ Auth::user()->email }}</span>
                                </div>
                                <a class="dropdown-item" href="{{ route('user.show', [Auth::user()->id]) }}"><i class="fas fa-user mr-2"></i>Account</a>
                               {{-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
