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
                            <h2 class="pageheader-title"> {{__('messages.ln230')}} </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/utm-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> {{__('messages.ln230')}} </li>
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
                            <h5 class="card-header">{{__('messages.ln230')}}</h5>
                            <div class="card-body">
                                <form action="{{route('upload_marks.update', [$data->upload_marks->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
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
                                            <option value="{{ $course->id }}" @if($course->id == $data->upload_marks->course_name) {{'selected' }}
                                                @endif>{{ $course->course_name }}</option>
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
                                            <option value="{{ $notification->id }}" @if($notification->id == $data->upload_marks->test_name) {{'selected' }}
                                                @endif>{{ $notification->topic }}</option>
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
                                            <option value="{{ $front_user->id }}" @if($front_user->id == $data->upload_marks->student_id) {{'selected' }}
                                                @endif>{{ $front_user->username }}</option>
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
                                        <input class="form-control form-control-lg" name="marks" type="text" placeholder="Enter Mark" value="{{$data->upload_marks->marks}}" autocomplete="off">
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
                                            <option value="1" @if($data->upload_marks->status == 1) {{'selected' }}
                                                @endif>Publish</option>
                                            <option value="0" @if($data->upload_marks->status == 0) {{'selected' }}
                                                @endif>Unpublish</option>
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
