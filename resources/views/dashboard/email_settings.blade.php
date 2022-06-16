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
                            <h2 class="pageheader-title"> {{ __('messages.ln16')}} </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{ __('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('messages.ln16')}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                @include('layouts.errors')
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 offset-md-2">
                        <div class="card">
                            <h5 class="card-header">{{__('messages.ln91')}}</h5>
                            <div class="card-body">
                                <form action="{{ route('email') }}" method="POST">
                                    @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="fa fa-pencil-alt"></i>
                                            </span>
                                        </div>
                                    <input value="{{$data->esettings->mail_drivers}}" name="mail_drivers" class="form-control form-control-lg" id="mail_drivers" type="text" placeholder="{{__('messages.ln92')}}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="fa fa-pencil-alt"></i>
                                            </span>
                                        </div>
                                        <input value="{{$data->esettings->mail_host}}" name="mail_host" class="form-control form-control-lg" id="mail_host" type="text" placeholder="{{__('messages.ln93')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="fa fa-pencil-alt"></i>
                                            </span>
                                        </div>
                                        <input value="{{$data->esettings->mail_port}}"  name="mail_port" class="form-control form-control-lg" id="mail_port" type="text" placeholder="{{__('messages.ln93')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        <input value="{{$data->esettings->user_name}}" name="user_name" class="form-control form-control-lg" id="user_name" type="text" placeholder="{{__('messages.ln45')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="fa fa-key"></i>
                                            </span>
                                        </div>
                                        <input value="{{$data->esettings->password}}" name="password" class="form-control form-control-lg" id="password" type="password" placeholder="{{__('messages.ln46')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="fa fa-pencil-alt"></i>
                                            </span>
                                        </div>
                                        <input value="{{$data->esettings->mail_encryption}}" name="mail_encryption" class="form-control form-control-lg" id="mail_encryption" type="text" placeholder="{{__('messages.ln95')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="fa fa-pencil-alt"></i>
                                            </span>
                                        </div>
                                        <input value="{{$data->esettings->mail_address}}" name="mail_address" class="form-control form-control-lg" id="mail_address" type="text" placeholder="{{__('messages.ln96')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="fa fa-pencil-alt"></i>
                                            </span>
                                        </div>
                                        <input value="{{$data->esettings->mail_from_name}}" name="mail_from_name" class="form-control form-control-lg" id="mail_from_name" type="text" placeholder="{{__('messages.ln97')}}">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block">{{__('messages.ln86')}}</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include("layouts.footer")