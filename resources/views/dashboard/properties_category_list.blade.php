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
                        <h2 class="pageheader-title">{{__('messages.ln31')}}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln31')}}</li>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">{{__('messages.ln123')}}
                            <button style="float:right;" type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">{{__('messages.ln124')}}</button>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">{{__('messages.ln124')}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('propertiescategory.store')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend">
                                                                {{__('messages.ln150')}}
                                                            </span>
                                                        </div>
                                                        <select class="form-control" name="parent_id">
                                                            <option value=""> {{__('messages.ln151')}} </option>
                                                            @foreach($data->category as $category)
                                                            <option value="{{$category->propertiescategories_id}}">
                                                                {{$category->name}} </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <input class="form-control" type="text" name="category"
                                                        placeholder="{{__('messages.ln118')}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{__('messages.ln108')}}</button>
                                                    <input type="submit" name="submit" value="{{__('messages.ln109')}}"
                                                        class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr style="">
                                        <th style="font-size: 16px;" class="text-muted"> <label
                                                class="custom-control custom-checkbox">

                                                <span><b>{{__('messages.name')}}</b></span>
                                            </label></th>
                                    </tr>
                                    @foreach($data->category as $category)
                                    <tr>
                                        <td>
                                            <label class="custom-control custom-checkbox">

                                                <span>
                                                    <h5>
                                                        <b>{{$category->name}}</b>
                                                        @unless ($category->propertiescategories_id == 100000)

                                                        - <a class="text-primary" type="button" data-toggle="modal"
                                                            data-target="#exampleModal-{{ $category->propertiescategories_id }}">Edit</a>
                                                        &nbsp;&nbsp;
                                                        <form class="d-inline"
                                                            action="{{ route('propertiescategory.destroy', [$category->propertiescategories_id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <a onclick="this.parentElement.submit()" type="submit"
                                                                class="text-danger">Delete</a>
                                                        </form>

                                                        @endunless
                                                    </h5>
                                                </span>
                                            </label>


                                            {{-- parent_cat modal modal start --}}

                                            <div class="modal fade"
                                                id="exampleModal-{{$category->propertiescategories_id}}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form
                                                        action="{{ route('propertiescategory.update', [$category->propertiescategories_id] ) }}"
                                                        method="POST">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Category</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">


                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <input name="name" type="text" class="form-control"
                                                                        i placeholder="Edit Category Name"
                                                                        value="{{$category->name}}">
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                            </div>

                            {{-- parent_cat modal end --}}



                            @foreach ($category->childrenCategories as $child)

                            <div class="ml-4">
                                <label class="custom-control custom-checkbox">
                                    <span>
                                        {{ $child->name }} - <a class="text-primary" type="button" data-toggle="modal"
                                            data-target="#exampleModal-{{ $child->propertiescategories_id }}">Edit</a>
                                        &nbsp;&nbsp;
                                        <form class="d-inline"
                                            action="{{ route('propertiescategory.destroy', [$child->propertiescategories_id]) }}"
                                            method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <a onclick="this.parentElement.submit()" class="text-danger">Delete</a>
                                        </form>
                                    </span>
                                </label>
                            </div>


                            {{-- child_cat modal modal start --}}

                            <div class="modal fade" id="exampleModal-{{$child->propertiescategories_id}}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form
                                            action="{{ route('propertiescategory.update', [$child->propertiescategories_id] ) }}"
                                            method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">

                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <input name="name" type="text" class="form-control"
                                                        i placeholder="Edit Category Name"
                                                        value="{{$child->name}}">
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- child_cat modal end --}}

                            @endforeach


                            </td>
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