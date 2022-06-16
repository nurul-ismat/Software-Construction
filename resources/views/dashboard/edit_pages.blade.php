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
                        <h2 class="pageheader-title"> {{__('messages.ln143')}} {{$data->pages->page_name}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}} </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> {{__('messages.ln143')}} 
                                        {{$data->pages->page_name}} </li>
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

            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p> {{\Session::get('success')}} </p>
            </div>
            @endif
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 offset-md-2">
                    <div class="card">
                        <h5 class="card-header">{{__('messages.ln143')}}  {{$data->pages->page_name}} {{__('messages.ln147')}} </h5>
                        <div class="card-body">
                            <form action="{{route('page.update',[$data->pages->id])}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln116')}} 
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="page_name" type="text"
                                            placeholder="Page Title" autocomplete="off"
                                            value="{{ $data->pages->page_name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                               {{__('messages.ln117')}} 
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="slug" type="text"
                                            placeholder="Slug" value="{{$data->pages->slug}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln118')}} 
                                            </span>
                                        </div>
                                        <select class="form-control" name="category">
                                            @foreach($data->category as $category)
                                            <option value="{{$category->id}}" @if($category->id ==
                                                $data->pages->category_id) {{'selected' }}
                                                @endif
                                                >{{$category->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln119')}} 
                                            </span>
                                        </div>
                                        <select class="form-control" name="language">
                                            <option value="English">English</option>
                                            <option value="Arabic">Arabic</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.ln120')}} 
                                            </span>
                                        </div>
                                        <textarea class="form-control" name="editor1"
                                            placeholder="Add Your Page Content">{{$data->pages->page_content}}</textarea>
                                        <script>
                                            CKEDITOR.replace( 'editor1' );
                                        </script>
                                    </div>
                                </div>

                                @if (!empty($data->pages->feature_image))
                                <img style="width:100px; height:100px;" class="slider-list-image mb-2"
                                    src="{{ asset('storage/pageimage/'.$data->pages->feature_image) }}" alt="Not Found">
                                @endif

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                               {{__('messages.ln121')}} 
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="image" type="file"
                                            placeholder="Feature Image" autocomplete="off">
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
                                            <option value="1" @if($data->pages->status == 1) {{'selected' }}
                                                @endif>Publish</option>
                                            <option value="0" @if($data->pages->status == 0) {{'selected' }}
                                                @endif>Unpublish</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">

                                </div>
                                <input type="submit" name="submit" value="{{__('messages.ln109')}} "
                                    class="btn btn-primary btn-lg btn-block">
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