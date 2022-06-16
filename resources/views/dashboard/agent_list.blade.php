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
                        <h2 class="pageheader-title text-primary"> {{__('messages.ln34')}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.ln34')}}</li>
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
                        <h4 class="card-header text-success">{{__('messages.ln34')}}&nbsp;({{$data->count}}) </h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{__('messages.ln40')}}</th>
                                            <th scope="col">{{__('messages.ln41')}}</th>
                                            <th scope="col">{{__('messages.ln42')}}</th>
                                            <th scope="col">{{__('messages.email')}}</th>
                                            {{-- <th scope="col">Agent Category</th> --}}
                                            {{-- <th scope="col">Status</th> --}}
                                            <th scope="col">{{__('messages.ln44')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = $data->agents->perPage() * ($data->agents->currentPage() - 1);
                                            $i++;
                                        @endphp
                                        @foreach ($data->agents as $agent)
                                        <tr>
                                            <td>{{ $i }} @php($i++)</td>
                                            <td>{{ $agent->fname }}</td>
                                            <td>{{ $agent->lname }}</td>
                                            <td>{{ $agent->email }}</td>
                                            {{-- <td>{{ $agent->group->group_name }}</td> --}}

                                            {{-- <td>
                                                @if (check(1,3, $permissions))
                                                @if ($agent->status != 1)
                                                <a href="userstatus/{{ $agent->id }}"><button
                                                    class="btn btn-danger btn-block btn-sm mb-2">Inactive</button></a>
                                                @else
                                                <a href="userstatus/{{ $agent->id }}"><button
                                                        class="btn btn-primary btn-block btn-sm mb-2">Active</button></a>
                                                @endif
                                                @endif

                                            </td> --}}

                                            <td>
                                                @if (check(1,3, $permissions))
                                                <a href="{{ route('agent.edit', [$agent->id]) }}" class="btn btn-success btn-block btn-sm mb-2">Edit</a>
                                                @endif

                                                @if (check(1,4, $permissions))
                                                <form action=" {{ route('agent.destroy', [$agent->id]) }} " method="POST">
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

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")
