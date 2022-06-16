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
                            <h2 class="pageheader-title">{{__('messages.ln170')}} </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item"><a href="/kt-admin/module" class="breadcrumb-link">{{__('messages.ln9')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln170')}}</li>
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
                                <h4 class="card-header text-success">{{__('messages.ln170')}}</h4>
                                <div class="card-body">
                                    {{-- {{ dd($data->module) }} --}}
                                    <form action=" {{ route('module.update', [$data->module->id]) }} " method="POST" >
                                        @csrf
                                        @method("PUT")
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input name="module_name" type="text" class="form-control" id="validationCustomUsername" placeholder="{{__('messages.ln70')}}" aria-describedby="inputGroupPrepend" value=" {{ $data->module->module_name }} " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary btn-block" type="submit">{{__('messages.ln73')}}</button>
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
