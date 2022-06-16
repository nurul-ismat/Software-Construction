@include("layouts.header")

    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        @include("layouts.navbar")
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        @include("layouts.leftsidebar")
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">User Profile </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 offset-md-2">
                        <div class="card">
                            <h3 class="card-header">
                                <div class="float-left" style="font-size: 40px"> {{ $data->user->fname . ' ' . $data->user->lname }} </div>
                                <div class="float-right"><a href=" {{ route('user.edit', [$data->user->id]) }} " class="btn btn-success text-dark">Edit Your Profile</a></div>
                            </h3>
                            <div class="card-body">
                                <div class="media">

                                    @if (isset($data->user->profile_picture))
                                    <img style="width:200px;height:200px;" class="mr-5" src="{{ asset('storage/users/profile_img/' . $data->user->profile_picture) }}" alt="Generic placeholder image">
                                    @endif


                                    <div class="media-body mt-4">
                                        <h3>Contact Information</h3>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0"><i class="fas fa-mobile-alt"></i>
                                                Phone : {{ $data->user->mobile }} </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0"><i class=" fas fa-envelope"></i>
                                                Email : {{ $data->user->email }}</h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0"><i class="fab fa-skype"></i>
                                                Skype : {{ $data->user->skype }} </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0"><i class="fab fa-twitter"></i>
                                                twitter : {{ $data->user->twitter }} </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0"><i class="fas fa-globe"></i>
                                                Website : {{ $data->user->website }} </h5>
                                            </div>
                                        </div>
                                        <h3 class="mt-4">General Information</h3>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                Last Login : {{ $data->login_time }} </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                Last Logout : {{ $data->logout_time }} </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                User Group : {{ $data->user->group->group_name }} </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                Status :  Active  </h5>
                                            </div>
                                        </div>
                                        <h3 class="mt-4">Addiational Information</h3>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                Street1 : {{ $data->user->street1 }} </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                Street2 : {{ $data->user->street2 }}  </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                City : {{ $data->user->city }}  </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                State : {{ $data->user->state }}  </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                Country : {{ $data->user->country }}  </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                Bio : {{ $data->user->bio }}  </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row bd-highlight mb-0">
                                            <div class="bd-highlight">
                                                <h5 class="mb-0">
                                                Other Information : {{ $data->user->other_information }}  </h5>
                                            </div>
                                        </div>
                                        </br></br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include("layouts.footer")
