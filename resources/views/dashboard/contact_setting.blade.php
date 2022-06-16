@include("layouts.header")

<style>
    .input-group>.input-group-prepend>.input-group-text {
        width: 40px !important;
    }
</style>

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
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">

                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">{{__('messages.ln17')}}</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/kt-admin"
                                                class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('messages.ln17')}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->

                @include('layouts.errors')

                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 offset-md-2">
                        <div class="card">
                            <h4 class="card-header text-success">{{__('messages.ln17')}}</h4>
                            <div class="card-body">
                                <form action="{{ route('contactsetting.update', [$data->cs->id]) }}" method="POST">
                                    @csrf
                                    @method("PUT")

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                                </div>
                                                <input name="email" type="text" class="form-control" placeholder="{{__('messages.email')}}"
                                                    focus value="{{ $data->cs->email }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-mobile-alt"></i></span>
                                                </div>
                                                <input name="phone" type="text" class="form-control"
                                                    placeholder="{{__('messages.phone')}}" value="{{ $data->cs->phone }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-address-card"></i></span>
                                                </div>
                                                <input name="address" type="text" class="form-control"
                                                    placeholder="{{__('messages.ln98')}}" value="{{ $data->cs->address }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fab fa-facebook-f"></i></span>
                                                </div>
                                                <input name="facebook" type="text" class="form-control"
                                                    placeholder="{{__('messages.ln99')}}" value="{{ $data->cs->facebook }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                                </div>
                                                <input name="twitter" type="text" class="form-control"
                                                    placeholder="{{__('messages.ln61')}}" value="{{ $data->cs->twitter }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fab fa-instagram"></i></span>
                                                </div>
                                                <input name="instagram" type="text" class="form-control"
                                                    placeholder="{{__('messages.ln100')}}" value="{{ $data->cs->instagram }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fab fa-linkedin-in"></i></span>
                                                </div>
                                                <input name="linkedin" type="text" class="form-control"
                                                    placeholder="{{__('messages.ln101')}}" value="{{ $data->cs->linkedin }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                                </div>
                                                <input name="skype" type="text" class="form-control"
                                                    placeholder="{{__('messages.ln60')}}" value="{{ $data->cs->skype }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                                </div>
                                                <input name="youtube" type="text" class="form-control"
                                                    placeholder="{{__('messages.ln102')}}" value="{{ $data->cs->youtube }}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary btn-block" type="submit">{{__('messages.ln73')}}</button>
                                        </div>
                                    </div>

                                </form>
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