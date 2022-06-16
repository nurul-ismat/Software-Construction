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
                            <h2 class="pageheader-title text-primary">{{__('messages.ln153')}}</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item"><a href="/kt-admin/agent" class="breadcrumb-link">{{__('messages.ln32')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln153')}}</li>
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
                                <h4 class="card-header text-success">{{__('messages.ln153')}}</h4>
                                <div class="card-body">
                                    <form action=" {{ route('agent.update', [$data->user->id]) }} " method="POST" class="needs-validation" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input value=" {{ $data->user->fname }} " name="fname" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln41')}}" aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a firstname.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->lname }}" name="lname" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln42')}}" aria-describedby="inputGroupPrepend" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->uname }}" name="uname" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln45')}}" aria-describedby="inputGroupPrepend" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->email }}" name="email" type="email" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.email')}}" aria-describedby="inputGroupPrepend" required>

                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-key"></i></span>
                                                    </div>
                                                    <select name="user_group" class="custom-select">
                                                        @foreach ($data->groups as $group)
                                                        <option value="{{ $group->id }}"
                                                            @if ($group->id == $data->user->user_group)
                                                            {{ 'selected' }}
                                                            @endif
                                                        >
                                                         {{ $group->group_name }} </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->mobile }}" name="mobile" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln48')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-print"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->fax }}" name="fax" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln49')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-address-card"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->license }}" name="license" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln50')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->street1 }}" name="street1" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln51')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->street2 }}" name="street2" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln52')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-building"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->city }}" name="city" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln53')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->state }}" name="state" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln54')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->province }}" name="province" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln55')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-barcode"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->postal_code }}" name="postal_code" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln56')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-flag"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->country }}" name="country" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln57')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-globe"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->website }}" name="website" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln58')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->msn }}" name="msn" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln59')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fab fa-skype"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->skype }}" name="skype" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln60')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fab fa-twitter"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->twitter }}" name="twitter" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln61')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input value="{{ $data->user->other }}" name="other" type="text" class="form-control" id="validationCustomUsername" placeholder="{{ __('messages.ln62')}}" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <textarea name="bio" cols="10" rows="5" class="form-control" aria-describedby="inputGroupPrepend" placeholder="{{ __('messages.ln63')}}" >{{ $data->user->bio }}</textarea>

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-file-image"></i></span>
                                                    </div>
                                                    <input name="profile_picture" type="file" class="form-control" title="{{__('messages.ln152')}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend" >

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <textarea name="other_information" cols="10" rows="5" class="form-control" aria-describedby="inputGroupPrepend" placeholder="{{ __('messages.ln64')}}">{{ $data->user->other_information }}</textarea>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary btn-block" type="submit">{{ __('messages.ln73')}}</button>
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
