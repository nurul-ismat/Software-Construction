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
                        <h2 class="pageheader-title text-primary">{{ __('messages.ln7')}}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{ __('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.ln7')}}</li>
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
                        <h4 class="card-header text-success">{{ __('messages.ln7')}}&nbsp;({{$data->count}})</h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <span>{{ __('messages.ln68')}}</span>
                                            </th>
                                            <th scope="col" class="mt-0">{{ __('messages.ln69')}}</th>
                                            <th class="mt-0">{{ __('messages.ln44')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data->groups as $group)

                                        @unless ($group->id == 4 || $group->id == 1)

                                        <tr>
                                            <th scope="row">
                                                <span>{{$group->group_name}}</span>
                                            </th>
                                            <td>1</td>
                                            <td>
                                                @if (check(2,3, $permissions))
                                                <a href="{{ route('group.edit', [$group->id]) }}" class="btn btn-success btn-block btn-sm mb-2"><i class="fas fa-edit">&nbsp;</i> Edit</a>
                                                @endif
                                                @if (check(2,4, $permissions))
                                                <form action=" {{ route('group.destroy', [$group->id]) }} " method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash-alt">&nbsp;</i> Delete</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endunless

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="w-25 mx-auto">
                            {{ $data->groups->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include("layouts.footer")
