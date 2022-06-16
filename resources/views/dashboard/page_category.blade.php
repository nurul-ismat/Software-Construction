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
                            <h2 class="pageheader-title">{{__('messages.ln122')}}</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln122')}}</li>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">{{__('messages.ln123')}}
                                <button style="float:right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">{{__('messages.ln124')}}</button>
                                <form action="{{route('category.store')}}" method="POST">
                                    @csrf
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{__('messages.ln124')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input class="form-control" type="text" name="category" placeholder="{{__('messages.ln118')}}"> 
                                      </div>
                                      <div class="modal-footer">
                                        <input type="button" value="{{__('messages.ln108')}}" class="btn btn-secondary" data-dismiss="modal">
                                        <input type="submit" name="submit" class="btn btn-primary" value="{{__('messages.ln109')}}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </form>
                            </h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr style="">
                                            <th style="font-size: 16px;" class="text-muted"> <label class="custom-control custom-checkbox">
                                                <input id="ck1" name="ck1" type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input"><span class="custom-control-label"><b>{{__('messages.name')}}</b></span>
                                                </label></th>
                                            <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln125')}}</b></th>
                                            <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln44')}}</b></th>
                                        </tr>
                                        @foreach($data->category as $category)
                                        <tr>
                                            <td> 
                                                <label class="custom-control custom-checkbox">
                                                <input id="ck1" name="ck1" type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input"><span class="custom-control-label">{{$category->category}}</span>
                                                </label>
                                            </td>
                                            
                                            <td>{{$category->created_at}}</td>
                                            <td><a style="text-decoration: none;" href="{{route('category.edit',[$category->id])}}"><button class="btn btn-success btn-sm btn-block mb-2"><i class="fas fa-edit">&nbsp;</i> Edit</button></a>
                                                <form action=" {{ route('category.destroy', [$category->id]) }} " method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash-alt">&nbsp;</i> Delete</button>
                                                </form>
                                            </td>
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
