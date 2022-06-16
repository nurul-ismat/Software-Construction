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
                        @if (check(13,2, $permissions))
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#exampleModal">
                            {{__('messages.ln132')}}
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{route('vgalleries.store')}}" method="POST">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{__('messages.ln132')}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            @csrf

                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">{{__('messages.ln133')}}</label>
                                                <input name="name" id="inputText3" type="text" class="form-control">
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{__('messages.ln108')}}</button>
                                            <button type="submit" class="btn btn-primary">{{__('messages.ln109')}}</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>


                    <h2 class="pageheader-title text-primary mb-3">{{__('messages.ln137')}}</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('messages.ln137')}}</a>
                                </li>
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
                    <h4 class="card-header text-success">{{__('messages.ln137')}}&nbsp;({{$data->count}})</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('messages.ln40')}}</th>
                                        <th scope="col">{{__('messages.name')}}</th>
                                        <th scope="col">{{__('messages.ln114')}}</th>
                                        <th scope="col">{{__('messages.ln44')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = $data->vgallerys->perPage() * ($data->vgallerys->currentPage() - 1);
                                    $i++;
                                    @endphp
                                    @foreach ($data->vgallerys as $vgallery)
                                    <tr>
                                        <th scope="row"> {{ $i }} @php($i++)</th>
                                        <td>{{ $vgallery->name }}</td>
                                        <td>{{ $vgallery->created_at }}</td>
                                        <td>
                                            @if (check(13,3, $permissions))
                                            <a href="{{ route('vgalleries.show', [$vgallery->id]) }}" class="btn btn-success btn-block btn-sm mb-2">View</a>
                                            @endif
                                            @if (check(13,4, $permissions))
                                            <form action="{{ route('vgalleries.destroy', [$vgallery->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger btn-block btn-sm">Delete</button>
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
                    {{ $data->vgallerys->links() }}
                </div>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    @include("layouts.footer")
