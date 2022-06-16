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
                            <h2 class="pageheader-title"> {{__('messages.ln209')}} </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/utm-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> {{__('messages.ln209')}} </li>
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
                            <h5 class="card-header">{{__('messages.ln209')}}</h5>
                            <div class="card-body">
                                <form action="{{route('course_notification.update',[$data->notification->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln203')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="topic" type="text" placeholder="Notification Topic" autocomplete="off" value="{{$data->notification->topic}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln225')}}
                                            </span>
                                        </div>
                                        <select class="form-control" name="type">
                                            <option value="">--Select One--</option>
                                            <option value="1" @if($data->notification->type == 1) {{'selected' }}
                                                @endif>Cancel Class</option>
                                            <option value="2" @if($data->notification->type == 2) {{'selected' }}
                                                @endif>Extra Class</option>
                                            <option value="3" @if($data->notification->type == 3) {{'selected' }}
                                                @endif>Exam</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln204')}}
                                            </span>
                                        </div>
                                        <textarea class="form-control" col="5" rows="8" name="notification_content" placeholder="Notification Content">{{$data->notification->notification_message}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln205')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="date" type="date" placeholder="Date" autocomplete="off" value="{{$data->notification->date}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln206')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="time" type="time" placeholder="Time" autocomplete="off" value="{{$data->notification->time}}">
                                    </div>
                                </div>
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
                                            <option value="{{ $course->id }}" @if($course->id == $data->notification->course_name) {{'selected'}}
                                            @endif>{{ $course->course_name }}</option>
                                            @endforeach
                                        </select>
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
                                            <option value="1" @if($data->notification->status == 1) {{'selected' }}
                                                @endif>Publish</option>
                                            <option value="0" @if($data->notification->status == 0) {{'selected' }}
                                                @endif>Unpublish</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    
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
