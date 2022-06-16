@include("layouts.header")
<style>
    .table th,
    .table td {
        text-align-last: left !important;
        padding-left: 30px !important;
    }
</style>
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
                        <h2 class="pageheader-title text-primary">{{__('messages.ln169')}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                            <li class="breadcrumb-item"><a href="/kt-admin/group"
                                                class="breadcrumb-link">{{__('messages.ln67')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln169')}}</li>
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
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 offset-md-2">
                    <div class="card">
                        <h4 class="card-header text-success">{{__('messages.ln169')}}</h4>
                        <div class="card-body">

                            <form action=" {{ route('group.update', [$data->groups->id]) }} " method="POST">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <!--<label for="validationCustomUsername">First name</label>-->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="group_name" type="text" class="form-control"
                                        id="validationCustomUsername" placeholder="{{__('messages.ln68')}}" value="{{ $data->groups->group_name }}" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="card">
                                            <h4 class="card-header text-danger">{{__('messages.ln9')}}</h4>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table text-center">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">
                                                                    <input class="form-check-input position-static"
                                                                        type="checkbox" id="blankCheckbox"
                                                                        value="option1" aria-label="..."> &nbsp; {{__('messages.ln70')}}
                                                                </th>
                                                                <th scope="col">{{__('messages.ln71')}}</th>
                                                                <th scope="col">{{__('messages.ln72')}}</th>
                                                                <th scope="col">{{__('messages.ln73')}}</th>
                                                                <th scope="col">{{__('messages.ln74')}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data->modules as $module)

                                                            <tr>
                                                                <td>
                                                                    <input class="form-check-input position-static"
                                                                        type="checkbox" id="blankCheckbox"> &nbsp;
                                                                    {{ $module->module_name }}
                                                                </td>

                                                                <td>
                                                                    <div class="form-check">
                                                                        <input name="permissions[]"
                                                                            class="form-check-input position-static"
                                                                            type="checkbox" id="blankCheckbox"
                                                                            value="{{ $module->id }}-1"
                                                                            @foreach($data->groups->permission as $p)
                                                                            @if ($p->module_id == $module->id &&
                                                                            $p->permission_id == 1)
                                                                            {{ 'checked' }}
                                                                            @endif
                                                                            @endforeach
                                                                        >
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-check">
                                                                        <input name="permissions[]"
                                                                            class="form-check-input position-static"
                                                                            type="checkbox" id="blankCheckbox"
                                                                            value="{{ $module->id }}-2"
                                                                            @foreach($data->groups->permission as $p)
                                                                            @if ($p->module_id == $module->id &&
                                                                            $p->permission_id == 2)
                                                                            {{ 'checked' }}
                                                                            @endif
                                                                            @endforeach
                                                                            >
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-check">
                                                                        <input name="permissions[]"
                                                                            class="form-check-input position-static"
                                                                            type="checkbox" id="blankCheckbox"
                                                                            value="{{ $module->id }}-3"
                                                                            @foreach($data->groups->permission as $p)
                                                                            @if ($p->module_id == $module->id &&
                                                                            $p->permission_id == 3)
                                                                            {{ 'checked' }}
                                                                            @endif
                                                                            @endforeach
                                                                            >
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-check">
                                                                        <input name="permissions[]"
                                                                            class="form-check-input position-static"
                                                                            type="checkbox" id="blankCheckbox"
                                                                            value="{{ $module->id }}-4"
                                                                            @foreach($data->groups->permission as $p)
                                                                            @if ($p->module_id == $module->id &&
                                                                            $p->permission_id == 4)
                                                                            {{ 'checked' }}
                                                                            @endif
                                                                            @endforeach
                                                                            >
                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            @endforeach


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <button class="btn btn-primary btn-block" type="submit">{{__('messages.ln65')}}</button>
                                <button class="btn btn-danger btn-block" type="submit">{{__('messages.ln66')}}</button>
                            </div>
                        </div>
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
