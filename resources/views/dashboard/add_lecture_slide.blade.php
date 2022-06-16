@php
$permissions = Session::get('permissions');
@endphp

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
                        <h2 class="pageheader-title">{{__('messages.ln212')}}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/utm-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln212')}}</li>
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
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <p> {{Session::get('success')}} </p>
                </div>
            @endif
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 offset-md-2">
                    <div class="card">
                        <h4 class="card-header text-success">{{ __('messages.ln212')}} </h4>
                        <div class="card-body">
                            <form action=" {{ route('lecture_slide.store') }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln213')}}
                                            </span>
                                            </div>
                                            <input name="title" type="text" class="form-control"
                                                placeholder="{{__('messages.ln213')}}" focus>
                                        </div>
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
                                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln214')}}
                                            </span>
                                            </div>
                                            <input name="upload_file" type="file" class="form-control" required>
                                        </div>
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
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h4 class="card-header text-success"> {{ __('messages.ln215')}}&nbsp;({{$data->count}}) </h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('messages.ln40')}}</th>
                                            <th scope="col">{{ __('messages.ln213')}}</th>
                                            <th scope="col">{{ __('messages.ln182')}}</th>
                                            <th scope="col">{{ __('messages.ln214')}}</th>
                                            <th scope="col">{{ __('messages.ln43')}}</th>
                                            <th scope="col">{{ __('messages.ln44')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($data->courselectures as $courselecture)
                                        <tr>
                                            <th scope="row"> {{ $i }} @php($i++)</th>
                                            <td>{{ $courselecture->title }}</td>
                                            <td> 
                                            @foreach($data->courses as $course)
                                                @if($course->id == $courselecture->course_name)
                                                    {{ $course->course_name }}
                                                @endif
                                            @endforeach
                                            </td>
                                            <td> 
                                            <iframe src="{{ asset('storage/file/lecture/'.$courselecture->file) }}" width="100%" height="260">
                                                <a href="{{ asset('storage/file/lecture/'.$courselecture->file) }}">Download PDF</a>
                                            </iframe>
                                            </td>
                                            <td>
                                                @if($courselecture->status == 1)
                                                <button class="btn btn-success btn-sm">Publish</button>
                                                @elseif($courselecture->status == 0)
                                                <button class="btn btn-danger btn-sm">Unpublish</button>
                                                @else
                                                <h6> Status Not Found </h6>
                                                @endif
                                            </td>
                                            <td>
                                            @if (check(22,4, $permissions))
                                            <form action=" {{ route('lecture_slide.destroy',[$courselecture->id]) }} " method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger btn-block btn-sm"><i
                                                        class="fas fa-trash-alt">&nbsp;</i> Delete</button>
                                            </form>
                                           @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-25 mx-auto">
                        {{-- $data->users->links() --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")
