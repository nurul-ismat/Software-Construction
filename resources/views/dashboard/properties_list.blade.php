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
                                {{__('messages.ln144')}}  &nbsp; <a href="{{ route('properties.create') }}"><button class="btn btn-success btn-small">{{__('messages.ln65')}}</button></a>
                            </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln144')}}</li>
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
                            <h5 class="card-header">{{__('messages.ln145')}}</h5>
                            <h6 class="card-header"> {{__('messages.ln111')}}&nbsp;({{$data->count}}) || {{__('messages.ln112')}}&nbsp;({{$data->publish}}) || {{__('messages.ln113')}}&nbsp;({{$data->unpublish}})</h6>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr style="">
                                            <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.image')}}</b></th>
                                            <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.name')}}</b></th>
                                            <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.price')}}</b></th>
                                            <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln146')}}</b></th>
                                            <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln43')}}</b></th>
                                            <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln44')}}</b></th>
                                        </tr>
                                        @foreach($data->properties as $properti)
                                        <tr>
                                            <td>
                                                <img style="width:100px;height:80px;" class="slider-list-image" src="{{ asset('storage/properties_image/'.$properti->image) }}" alt="Not Found">
                                            </td>
                                            <td>{{$properti->title}}</td>
                                            <td>${{$properti->price}}</td>
                                            <td>
                                                @if ($properti->added_by > 0)
                                                    {{$properti->user->fname}} {{$properti->user->lname}}
                                                @else
                                                    {{ "Not registered" }}
                                                @endif
                                            </td>
                                            <td>
                                               @if($properti->status == 1)
                                                    <a href="{{route('toogle_properties_permission',[$properti->id])}}"><button class="btn btn-success btn-sm ">Publish</button></a>
                                               @endif
                                               @if($properti->status == 0)
                                                    <a href="{{route('toogle_properties_permission',[$properti->id])}}"><button class="btn btn-danger btn-sm ">Unpublish</button></a>
                                               @endif
                                            </td>
                                            <td>
                                                @if(check(16,3, $permissions))
                                                <a style="text-decoration: none;" href="{{route('properties.edit',[$properti->id])}}"><button class="btn btn-success btn-sm btn-block mb-2"><i class="fas fa-edit">&nbsp;</i> Edit</button></a>
                                                @endif
                                                @if(check(16,4, $permissions))
                                                <form action=" {{ route('properties.destroy', [$properti->id]) }} " method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash-alt">&nbsp;</i> Delete</button>
                                                </form></td>
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

