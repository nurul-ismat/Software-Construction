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
                        <h2 class="pageheader-title text-primary">{{__('messages.ln33')}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln33')}}</li>
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
                        <h4 class="card-header text-success">{{__('messages.ln33')}}</h4>
                        <div class="card-body">
                        <form action="{{ route('agent.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="fname" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{__('messages.ln41')}}"
                                                aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please choose a firstname.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="lname" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln42')}}"
                                                aria-describedby="inputGroupPrepend" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="uname" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln45')}}"
                                                aria-describedby="inputGroupPrepend" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-envelope"></i></span>
                                            </div>
                                            <input name="email" type="email" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.email')}}"
                                                aria-describedby="inputGroupPrepend" required>

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-key"></i></span>
                                            </div>
                                            <input name="password" type="password" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln46')}}"
                                                aria-describedby="inputGroupPrepend" required>

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-key"></i></span>
                                            </div>
                                            <input name="password_confirmation" type="password" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln47')}}"
                                                aria-describedby="inputGroupPrepend" required>

                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">{{ __('messages.ln67')}}</span>
                                            </div>
                                            <select name="member_type" class="custom-select">
                                                <option value="1"> Gold </option>
                                                <option value="2"> Silver </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-phone"></i></span>
                                            </div>
                                            <input name="mobile" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln48')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-print"></i></span>
                                            </div>
                                            <input name="fax" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln49')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-address-card"></i></span>
                                            </div>
                                            <input name="license" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln50')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="street1" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln51')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="street2" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln52')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-building"></i></span>
                                            </div>
                                            <input name="city" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln53')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="state" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln54')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="province" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln55')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-barcode"></i></span>
                                            </div>
                                            <input name="postal_code" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln56')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-flag"></i></span>
                                            </div>
                                            <input name="country" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln57')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-globe"></i></span>
                                            </div>
                                            <input name="website" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln58')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="msn" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln59')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fab fa-skype"></i></span>
                                            </div>
                                            <input name="skype" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln60')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fab fa-twitter"></i></span>
                                            </div>
                                            <input name="twitter" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln61')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="other" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln62')}}"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <textarea name="bio" cols="10" rows="5" class="form-control"
                                                aria-describedby="inputGroupPrepend" placeholder="{{ __('messages.ln63')}}"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fas fa-file-image"></i></span>
                                            </div>
                                            <input name="profile_picture" type="file" class="form-control"
                                                title="{{__('messages.ln152')}}" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <textarea name="other_information" cols="10" rows="5" class="form-control"
                                                aria-describedby="inputGroupPrepend"
                                                placeholder="{{ __('messages.ln64')}}"></textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary btn-block" type="submit">{{ __('messages.ln65')}}</button>
                                        <button class="btn btn-danger btn-block" type="reset">{{ __('messages.ln66')}}</button>
                                    </div>
                                </div>
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