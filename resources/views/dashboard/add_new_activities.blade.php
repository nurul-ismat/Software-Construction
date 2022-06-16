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
                            <h2 class="pageheader-title"> {{__('messages.ln216')}} </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/utm-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> {{__('messages.ln216')}} </li>
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
                            <h5 class="card-header">{{__('messages.ln216')}}</h5>
                            <div class="card-body">
                                <form action="{{route('course_activities.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln217')}} <span class="text-danger"> *</span>
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="course_material_name" type="text" placeholder="Course Material Name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln218')}} <span class="text-danger"> *</span>
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="course_material_code" type="text" placeholder="Course Material Code" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln221')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="due_date" type="date" placeholder="Date" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln222')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="course_material" type="file" autocomplete="off">
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
                                <div class="form-group">
                                    
                                </div>
                                <input type="submit" name="submit" value="{{__('messages.ln109')}}" class="btn btn-primary btn-lg btn-block">
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h4 class="card-header text-success"> {{ __('messages.ln223')}}&nbsp;({{$data->count}}) </h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('messages.ln40')}}</th>
                                            <th scope="col">{{ __('messages.ln217')}}</th>
                                            <th scope="col">{{ __('messages.ln218')}}</th>
                                            <th scope="col">{{ __('messages.ln219')}}</th>
                                            <th scope="col">{{ __('messages.ln214')}}</th>
                                            <th scope="col">{{ __('messages.ln182')}}</th>
                                            <th scope="col">{{ __('messages.ln43')}}</th>
                                            <th scope="col">{{ __('messages.ln44')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($data->coursedocuments as $coursedocument)
                                        <tr>
                                            <th scope="row"> {{ $i }} @php($i++)</th>
                                            <td>{{ $coursedocument->course_material_name }}</td>
                                            <td>{{ $coursedocument->course_material_code }}</td>
                                            <td>{{ $coursedocument->due_date }}</td>
                                            <td> 
                                            <iframe src="{{ asset('storage/file/activities/'.$coursedocument->course_material) }}" width="100%" height="260">
                                                <a href="{{ asset('storage/file/activities/'.$coursedocument->course_material) }}">Download PDF</a>
                                            </iframe>
                                            </td>
                                            <td> 
                                            @foreach($data->courses as $course)
                                                @if($course->id == $coursedocument->course_name)
                                                    {{ $course->course_name }}
                                                @endif
                                            @endforeach
                                            </td>
                                            <td>
                                                @if($coursedocument->status == 1)
                                                <button class="btn btn-success btn-sm">Publish</button>
                                                @elseif($coursedocument->status == 0)
                                                <button class="btn btn-danger btn-sm">Unpublish</button>
                                                @else
                                                <h6> Status Not Found </h6>
                                                @endif
                                            </td>
                                            <td>
                                            @if (check(22,4, $permissions))
                                            <form action=" {{ route('course_activities.destroy',[$coursedocument->id]) }} " method="POST">
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
