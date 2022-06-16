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
                    <h2 class="pageheader-title text-primary">{{__('messages.ln154')}}</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('messages.ln154')}}</a>
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
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h4 class="card-header text-success">{{__('messages.ln154')}}</h4>
                        <h6 class="card-header">{{__('messages.ln111')}}&nbsp;({{$data->count}}) || {{__('messages.ln129')}}&nbsp;({{$data->active}}) || {{__('messages.ln176')}}&nbsp;({{$data->inactive}})
                        </h6>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{__('messages.ln40')}}</th>
                                            <th scope="col">{{__('messages.ln155')}}</th>
                                            <th scope="col">{{__('messages.ln156')}}</th>
                                            <th scope="col">{{__('messages.ln157')}}</th>
                                            <th scope="col">{{__('messages.ln158')}}</th>
                                            <th scope="col">{{__('messages.ln125')}}</th>
                                            <th scope="col">{{__('messages.ln43')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = $data->reqs->perPage() * ($data->reqs->currentPage() - 1);
                                        $i++;
                                        @endphp

                                        @foreach ($data->reqs as $req)
                                        @foreach ($req->showreq as $item)

                                        <tr>
                                            <th scope="row"> {{ $i }} @php($i++)</th>
                                            <td>{{ $req->title }}</td>
                                            <td>{{ $item->client_name }}</td>
                                            <td>{{ $item->client_phone }}</td>
                                            <td>{{ $item->request }}</td>
                                            <td>{{ $item->created_at }}</td>

                                            <td>

                                                @if ($item->status == 0)
                                                <a href="showreqstatus/{{ $item->id }}"><button
                                                    class="btn btn-danger btn-block btn-sm mb-2">Inactive</button></a>
                                                @else

                                                <a href="showreqstatus/{{ $item->id }}"><button
                                                    class="btn btn-primary btn-block btn-sm mb-2">Active</button></a>
                                                </td>
                                                @endif

                                            </tr>

                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-25 mx-auto">
                        {{ $data->reqs->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    @include("layouts.footer")
