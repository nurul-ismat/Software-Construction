@php
$permissions = Session::get('permissions');
@endphp

@include("layouts.header")
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
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
                            <h2 class="pageheader-title"> {{__('messages.ln196')}} </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/utm-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> {{__('messages.ln196')}} </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->.

                @include('layouts.errors')
                
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{Session::get('success')}} </p>
                    </div>
                @endif
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 offset-md-2">
                        <div class="card">
                            <h5 class="card-header">{{__('messages.ln196')}}</h5>
                            <div class="card-body">
                                <form action="{{route('upload_marks.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln182')}}
                                            </span>
                                        </div>
                                        <select class="form-control" name="course_name">
                                            <option value="">--Select One--</option>
                                            @foreach($data->courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln226')}}
                                            </span>
                                        </div>
                                        <select class="form-control" name="test_name">
                                            <option value="">--Select One--</option>
                                            @foreach($data->notifications as $notification)
                                            <option value="{{ $notification->id }}">{{ $notification->topic }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln227')}}
                                            </span>
                                        </div>
                                        <select class="form-control" name="student_id">
                                            <option value="">--Select One--</option>
                                            @foreach($data->front_users as $front_user)
                                            <option value="{{ $front_user->id }}">{{ $front_user->username }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln228')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="marks" type="text" placeholder="Enter Mark" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln43')}}
                                            </span>
                                        </div>
                                        <select class="form-control" name="status">
                                            <option value="">--Select One--</option>
                                            <option value="1">Publish</option>
                                            <option value="0">Unpublish</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" name="submit" value="{{__('messages.ln109')}}" class="btn btn-primary btn-lg btn-block">
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
