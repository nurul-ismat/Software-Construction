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
                        <h2 class="pageheader-title">{{__('messages.ln171')}}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item"><a href="/kt-admin/slider"
                                            class="breadcrumb-link">{{__('messages.ln130')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln171')}}</li>
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
                        <h4 class="card-header text-success">{{__('messages.ln171')}}</h4>
                        <div class="card-body">
                            <form action=" {{ route('slider.update', [$data->slider->id]) }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="text1" type="text" class="form-control"
                                                placeholder="{{__('messages.ln127')}}" value="{{ $data->slider->text1 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="text2" type="text" class="form-control"
                                                placeholder="{{__('messages.ln128')}}" value="{{ $data->slider->text2 }}">
                                        </div>
                                    </div>
                                </div>

                                <img class="slider-image mb-1" src="{{ asset('storage/slider/image/'.$data->slider->image) }}" alt="Not Found">

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="s_img" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <label class="custom-control custom-checkbox">
                                    <input name="is_active" type="checkbox" class="custom-control-input" @if ($data->slider->is_active)
                                    {{ 'checked' }}
                                    @endif >
                                    <span class="custom-control-label">{{__('messages.ln129')}}</span>
                                </label>

                                <div class="form-row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary btn-block" type="submit">{{__('messages.ln65')}}</button>
                                        <button class="btn btn-danger btn-block" type="reset">{{__('messages.ln66')}}</button>
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
