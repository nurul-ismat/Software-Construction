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
                        <h2 class="pageheader-title text-primary">{{ __('messages.ln10')}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{ __('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{ __('messages.ln10')}}</a>
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
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h4 class="card-header text-success">{{ __('messages.ln10')}}&nbsp;({{$data->count}})</h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('messages.ln40')}}</th>
                                            <th scope="col">{{ __('messages.name')}}</th>
                                            <th scope="col">{{ __('messages.ln44')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @php
                                            $i = $data->modules->perPage() * ($data->modules->currentPage() - 1);
                                            $i++;
                                        @endphp
                                        @foreach ($data->modules as $module)
                                            <tr>
                                                <th scope="row"> {{ $i }} @php($i++)</th>
                                                <td> {{$module->module_name}} </td>

                                                <td>
                                                    @if (check(3,3, $permissions))
                                                    <a href="{{ route('module.edit', [$module->id]) }}"
                                                        class="btn btn-success btn-block btn-sm mb-2"><i class="fas fa-edit">&nbsp;</i> Edit</a>
                                                    @endif
                                                    @if (check(3,4, $permissions))
                                                    <form action=" {{ route('module.destroy', [$module->id]) }} "
                                                        method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash-alt">&nbsp;</i> Delete</button>
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
                        {{ $data->modules->links() }}
                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")
