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
                        <h2 class="pageheader-title text-primary">{{ __('messages.ln4')}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{ __('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active">{{ __('messages.ln4')}}</li>
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
                        <h4 class="card-header text-success"> {{ __('messages.ln4')}}&nbsp;({{$data->count}}) </h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('messages.ln40')}}</th>
                                            <th scope="col">{{ __('messages.ln41')}}</th>
                                            <th scope="col">{{ __('messages.ln42')}}</th>
                                            <th scope="col">{{ __('messages.email')}}</th>
                                            <th scope="col">{{ __('messages.ln6')}}</th>
                                            <th scope="col">{{ __('messages.ln43')}}</th>
                                            <th scope="col">{{ __('messages.ln44')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $i = $data->users->perPage() * ($data->users->currentPage() - 1);
                                            $i++;
                                        @endphp
                                        @foreach ($data->users as $user)
                                        <tr>
                                            <th scope="row"> {{ $i }} @php($i++)</th>
                                            <td> {{ $user->fname }} </td>
                                            <td>{{ $user->lname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->group->group_name }}</td>
                                            <td>
                                                @if (check(1,3, $permissions))
                                                @if ($user->status != 1)
                                                <a href="userstatus/{{ $user->id }}"><button
                                                    class="btn btn-danger btn-block btn-sm mb-2">Inactive</button></a>
                                                @else
                                                <a href="userstatus/{{ $user->id }}"><button
                                                        class="btn btn-primary btn-block btn-sm mb-2">Active</button></a>
                                                @endif
                                                @endif

                                            </td>
                                            <td>
                                                @if (check(1,3, $permissions))
                                                <a href="{{ route('user.edit', [$user->id]) }}" class="btn btn-success btn-block btn-sm mb-2"><i class="fas fa-edit">&nbsp;</i> Edit</a>
                                                @endif

                                                @if (check(1,4, $permissions))
                                                <form action=" {{ route('user.destroy', [$user->id]) }} " method="POST">
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
                        {{ $data->users->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")
