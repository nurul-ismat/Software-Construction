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
                        
                    </div>


                    <h2 class="pageheader-title text-primary mb-3">Enquery List</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Enquery List</a>
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
                        <h4 class="card-header text-success">Enquery list</h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = $data->enqueries->perPage() * ($data->enqueries->currentPage() - 1);
                                        $i++;
                                        @endphp
                                        @foreach ($data->enqueries as $enquery)
                                        <tr>
                                            <th scope="row"> {{ $i }} @php($i++)</th>
                                            <td>{{ $enquery->email }}</td>
                                            <td>{{ $enquery->mobile }}</td>
                                            <td>{{ $enquery->subject }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($enquery->message, 50, $end='...')  }}</td>
                                            <td>{{ $enquery->created_at }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-25 mx-auto">
                        {{ $data->enqueries->links() }}
                    </div>
    
                </div>
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    @include("layouts.footer")
