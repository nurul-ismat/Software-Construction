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
                        <h2 class="pageheader-title">{{ __('messages.ln12')}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{ __('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.ln12')}}</li>
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
                        <h4 class="card-header text-success">{{ __('messages.ln12')}}y </h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('messages.ln40')}}</th>
                                            <th scope="col">{{ __('messages.ln45')}}</th>
                                            <th scope="col">{{ __('messages.ln75')}}</th>
                                            <th scope="col">{{ __('messages.ln76')}}</th>
                                            <th scope="col">{{ __('messages.ln77')}}r</th>
                                            <th scope="col">{{ __('messages.ln78')}}</th>
                                            <th scope="col">{{ __('messages.ln79')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = $data->logs->perPage() * ($data->logs->currentPage() - 1);
                                        $i++;
                                    @endphp
                                        @foreach ($data->logs as $log)
                                        <tr>
                                            <th scope="row">{{ $i }} @php($i++)</th>
                                            <td>{{ $log->getuser->uname }}</td>
                                            <td>{{ Carbon\Carbon::createFromTimestamp($log->login_time)->toDateTimeString() }}</td>

                                            @if(isset($log->logout_time) && !empty(isset($log->logout_time)))
                                            <td>{{ Carbon\Carbon::createFromTimestamp($log->logout_time)->toDateTimeString() }}</td>
                                            @else
                                                <td>No Time</td>
                                            @endif

                                            <td>{{ $log->browser }}</td>
                                            <td>{{ $log->os }}</td>
                                            <td>{{ $log->ip_address }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-25 mx-auto">
                        {{ $data->logs->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")
