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
                        <h2 class="pageheader-title text-primary">{{__('messages.ln25')}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('messages.ln25')}}</a>
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
                        <h4 class="card-header text-success">{{__('messages.ln25')}}&nbsp;({{$data->count}})</h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{__('messages.ln40')}}</th>
                                            <th scope="col">{{__('messages.image')}}</th>
                                            <th scope="col">{{__('messages.ln43')}}</th>
                                            <th scope="col">{{__('messages.ln44')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="slider_list">

                                        @php
                                        $i = $data->sliders->perPage() * ($data->sliders->currentPage() - 1);
                                        $i++;
                                        @endphp
                                        
                                        @foreach ($data->sliders->sortBy('position') as $slider)
                                        <tr data-id="{{ $slider->id }}">
                                            <td> {{ $i }} @php($i++)</td>

                                            <td style="width:300px">
                                                <img class="slider-list-image img-fluid" src="{{ asset('storage/slider/image/'.$slider->image) }}" alt="Not Found">
                                            </td>

                                            <td style="width:100px">
                                                @if ($slider->is_active)
                                                <a href="sliderstatus/{{ $slider->id }}"
                                                    class="btn btn-primary">Active</a>
                                                @else
                                                <a href="sliderstatus/{{ $slider->id }}"
                                                    class="btn btn-danger">Inactive</a>
                                                @endif
                                            </td>

                                            <td>
                                                @if (check(9,3, $permissions))
                                                <a href="{{ route('slider.edit', [$slider->id]) }}"
                                                    class="btn btn-success btn-block btn-sm mb-2"><i class="fas fa-edit">&nbsp;</i> Edit</a>
                                                @endif
                                                @if (check(9,4, $permissions))
                                                <form action=" {{ route('slider.destroy', [$slider->id]) }} "
                                                    method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger btn-block btn-sm"> <i class="fas fa-trash-alt">&nbsp;</i> Delete</button>
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
                        {{ $data->sliders->links() }}
                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")



<script>

    // images gallery videos position update
function updateToDatabase(idString){
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
     
    $.ajax({
       url:'{{url('/sliderimageslist/update')}}',
       method:'POST',
       data:{ids:idString},
       success:function(){
       }
    })
 }

 var target = $('.slider_list');
 target.sortable({
     update: function (e, ui){
        var sortData = target.sortable('toArray',{ attribute: 'data-id'})
        updateToDatabase(sortData.join(','))
     }
 })
    
</script>