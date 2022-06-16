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
                        <h2 class="pageheader-title">
                            {{__('messages.ln20')}} &nbsp;
                            <a href="{{ route('page.create') }}"><button class="btn btn-success btn-small">{{__('messages.ln65')}}</button></a>
                        </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln20')}}</li>
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
                        <h5 class="card-header">{{__('messages.ln110')}}</h5>
                        <h6 class="card-header"> {{__('messages.ln175')}}&nbsp;({{$data->count}}) </h6>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr style="">
                                        <th style="font-size: 16px;" class="text-muted">
                                            {{-- <label class="custom-control custom-checkbox">
                                                <input id="ck1" name="ck1" type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input">
                                            </label>   --}}
                                            <span><b>{{__('messages.title')}}</b></span>
                                        </th>
                                        {{-- <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln43')}}</b></th> --}}
                                        <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln114')}}</b></th>
                                        <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln73')}}</b></th>
                                        <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln44')}}</b></th>
                                    </tr>
                                    @foreach($data->pages as $page)
                                    <tr>
                                        <td>
                                            {{-- <label class="custom-control custom-checkbox">
                                                <input id="ck1" name="ck1" type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input">
                                            </label> --}}
                                            <span>{{ $page->page_name }}</span>
                                        </td>
                                        {{-- <td>
                                            @if($page->status == 1)
                                            <button class="btn btn-success btn-sm">Publish</button>
                                            @elseif($page->status == 0)
                                            <button class="btn btn-danger btn-sm">Unpublish</button>
                                            @else
                                            <h6> Status Not Found </h6>
                                            @endif
                                        </td> --}}
                                        <td>{{ $page->created_at }}</td>
                                        <td>{{ $page->updated_at }}</td>
                                        <td>
                                            @if (check(8,3, $permissions))
                                            <a style="text-decoration: none;"
                                                href="{{route('page.edit',[$page->id])}}"><button
                                                    class="btn btn-success btn-sm btn-block mb-2"><i
                                                        class="fas fa-edit">&nbsp;</i> Edit</button></a>
                                            @endif
                                            @if (check(8,4, $permissions))
                                            <form action=" {{ route('page.destroy', [$page->id]) }} " method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger btn-block btn-sm"><i
                                                        class="fas fa-trash-alt">&nbsp;</i> Delete</button>
                                            </form>
                                        </td>
                                        @endif
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