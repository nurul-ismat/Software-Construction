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
                        <h2 class="pageheader-title">
                            {{__('messages.ln179')}} &nbsp;
                            <a href="{{ route('course.create') }}"><button class="btn btn-success btn-small">{{__('messages.ln178')}}</button></a>
                        </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/utm-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln179')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">{{__('messages.ln179')}}</h5>
                        <h6 class="card-header"> {{__('messages.ln180')}}&nbsp;({{$data->count}}) </h6>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%">
                                    <tr style="">
                                        <th style="font-size: 16px;" class="text-muted">
                                            {{-- <label class="custom-control custom-checkbox">
                                                <input id="ck1" name="ck1" type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input">
                                            </label>   --}}
                                             <span>{{__('messages.ln40')}}</span> 
                                        </th>
                                        {{-- <th style="font-size: 17px;" class="text-muted">{{__('messages.ln182')}}</th> --}}
                                        <th style="font-size: 17px;" class="text-muted">{{__('messages.ln182')}}</th>
                                        <th style="font-size: 17px;" class="text-muted">{{__('messages.ln183')}}</th>
                                        <th style="font-size: 17px;" class="text-muted">{{__('messages.ln184')}}</th>
                                        <th style="font-size: 17px;" class="text-muted">{{__('messages.ln185')}}</th>
                                        <th style="font-size: 17px;" class="text-muted">{{__('messages.ln186')}}</th>
                                        <th style="font-size: 17px;" class="text-muted">{{__('messages.ln187')}}</th>
                                        <th style="font-size: 17px;" class="text-muted">{{__('messages.ln43')}}</th>
                                        <th style="font-size: 17px;" class="text-muted">{{__('messages.ln44')}}</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                               
                                    @foreach($data->courses as $course)
                                    <tr>
                                        <td>
                                            {{-- <label class="custom-control custom-checkbox">
                                                <input id="ck1" name="ck1" type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input">
                                            </label> --}}
                                            <span>{{ $i }} @php($i++)</span>
                                        </td>
                                        <td> {{ $course->course_name }} </td>
                                        <td> 
                                            @foreach($data->users as $row)
                                                @if($row->id == $course->responsible_professor)
                                                    {{ $row->fname.' '.$row->lname }}
                                                @endif
                                            @endforeach  
                                        </td>
                                        <td>
                                        <a style="text-decoration: none;"
                                                href="{{route('course.edit',[$course->id])}}"><button
                                                    class="btn btn-info btn-sm btn-block mb-2 text-light">{{__('messages.ln184')}}</button></a>
                                        </td>
                                        <td>
                                        <a style="text-decoration: none;"
                                                href="{{route('course.edit',[$course->id])}}"><button
                                                    class="btn btn-primary btn-sm btn-block mb-2">{{__('messages.ln185')}}</button></a>
                                        </td>
                                        <td>
                                        <a style="text-decoration: none;"
                                                href="{{route('course.edit',[$course->id])}}"><button
                                                    class="btn btn-success btn-sm btn-block mb-2">{{__('messages.ln186')}}</button></a>
                                        </td>
                                        <td>
                                        <a style="text-decoration: none;"
                                                href="{{route('course.edit',[$course->id])}}"><button
                                                    class="btn btn-secondary btn-sm btn-block mb-2">{{__('messages.ln187')}}</button></a>
                                        </td>
                                        <td>
                                            @if($course->status == 1)
                                            <button class="btn btn-success btn-sm">Publish</button>
                                            @elseif($course->status == 0)
                                            <button class="btn btn-danger btn-sm">Unpublish</button>
                                            @else
                                            <h6> Status Not Found </h6>
                                            @endif
                                        </td>
                                        <td>
                                            @if (check(22,3, $permissions))
                                            <a style="text-decoration: none;"
                                                href="{{route('course.edit',[$course->id])}}"><button
                                                    class="btn btn-success btn-sm btn-inline-block mb-2"><i
                                                        class="fas fa-edit">&nbsp;</i> Edit</button></a>
                                            @endif
                                            @if (check(22,4, $permissions))
                                            <form action=" {{ route('course.destroy', [$course->id]) }} " method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger btn-inline-block btn-sm"><i
                                                        class="fas fa-trash-alt">&nbsp;</i> Delete</button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </table>
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