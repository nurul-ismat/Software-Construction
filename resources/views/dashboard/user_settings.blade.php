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
                            <h2 class="pageheader-title"> {{ __('messages.ln15')}} </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{ __('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('messages.ln15')}}</li>
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
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 offset-md-2">
                        <div class="card">
                            <h5 class="card-header">{{ __('messages.ln87')}}</h5>
                            <div class="card-body">
                                <form action=" {{ route('user') }} " method="POST">
                                    @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{ __('messages.ln88')}}
                                            </span>
                                        </div>
                                        <select class="form-control" name="new_user_register">
                                            <option value="1"
                                            @if ($data->usettings->new_user_register == 1)
                                                {{ 'selected' }}
                                            @endif
                                            > ON </option>
                                            <option value="0"
                                            @if ($data->usettings->new_user_register == 0)
                                                {{ 'selected' }}
                                            @endif
                                            > OFF </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                               {{ __('messages.ln89')}}
                                            </span>
                                        </div>
                                        <select class="form-control" name="new_user_group">
                                            @foreach ($data->groups as $group)
                                        <option value="{{ $group->id }}"
                                            @if ($data->usettings->new_user_group == $group->id)
                                            {{ 'selected' }}
                                        @endif
                                            >{{ $group->group_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                               {{ __('messages.ln90')}}
                                            </span>
                                        </div>
                                        <select class="form-control" name="new_user_status">
                                            <option value="1"
                                            @if ($data->usettings->new_user_status == 1)
                                                {{ 'selected' }}
                                            @endif
                                            >Active</option>
                                            <option value="0"
                                            @if ($data->usettings->new_user_status == 0)
                                                {{ 'selected' }}
                                            @endif
                                            >Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('messages.ln86')}}</button>
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
