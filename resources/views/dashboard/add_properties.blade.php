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
                        <h2 class="pageheader-title">{{__('messages.ln30')}}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln30')}}</li>
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
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 offset-md-2">
                    <div class="card">
                        <h5 class="card-header">{{__('messages.ln149')}}</h5>
                        <div class="card-body">
                            <form action="{{route('properties.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                               {{__('messages.title')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="title" type="text"
                                            placeholder="Properties Title" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.owner_name')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="owner_name" type="text"
                                            placeholder="Owner Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.categories')}}
                                            </span>
                                        </div>
                                        <select class="form-control" id="category" name="category">
                                            <option value="0"> choose category </option>
                                            @foreach($data->categories as $category)
                                            <option value="{{$category->propertiescategories_id}}"> {{$category->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                 {{__('messages.ln148')}}
                                            </span>
                                        </div>
                                        <select id="sub_category" class="form-control" name="sub_category">
                                            <option value="0">--choose category first--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.phone')}}
                                            </span>
                                        </div>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                 {{__('messages.city')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="city" type="text"
                                            placeholder="City" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                 {{__('messages.neighborhood')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="neighborhood_name" type="text"
                                            placeholder="Neighborhood Name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.street')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="street_name" type="text"
                                            placeholder="Street Name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                               {{__('messages.building')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="building_no" type="text"
                                            placeholder="Building No" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                 {{__('messages.age')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="age" type="text"
                                            placeholder="Age" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.direction')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="direction" type="text"
                                            placeholder="Direction" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                               {{__('messages.number_of_street')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="number_of_street" type="text"
                                            placeholder="Number Of Street" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                               {{__('messages.district')}} 
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="district" type="text"
                                            placeholder="District" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.to_be_used')}}
                                            </span>
                                        </div>
                                        <select class="form-control" name="to_be_used">
                                            <option value="commercial">For Commercial</option>
                                            <option value="residential">For Residential</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                               {{__('messages.size')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="size" type="text"
                                            placeholder="Size" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                              {{__('messages.price')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="price" type="text"
                                            placeholder="Price" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.original')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="original_price" type="text"
                                            placeholder="Original Price" autocomplete="off">
                                    </div>
                                </div>

                                <div id="map" class="mb-4" style="width: 700px; height: 400px;"></div>

                                <script>
                                    var count = 0;

                                    var map = L.map('map').setView([1, 1], 1);
                                
                                    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                                    }).addTo(map);
                                
                                    var searchControl = new L.esri.Controls.Geosearch().addTo(map);
                                
                                    var results = new L.LayerGroup().addTo(map);
                                
                                    searchControl.on('results', function(data){
                                        
                                    results.clearLayers();

                                    });


                                    map.on('click', function(e) {
                                    addMarker(e);
                                });


                                    function addMarker(e) {

                                        var Marker = L.marker(e.latlng,{
                                            draggable: true,
                                        })

                                        // if(!count > 0){

                                        $( "#forlatlang" ).append( "<input type='hidden' name='lat[]' value='" + e.latlng.lat + "'>" );
                                        $( "#forlatlang" ).append( "<input type='hidden' name='long[]' value='" + e.latlng.lng + "'>" );

                                        Marker.addTo(map);

                                        // count++;
                                        // }


                                    }


                                </script>

                                <div id="forlatlang">

                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.image')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="image" type="file"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                               {{__('messages.brochure')}}
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="brochure" type="file"
                                            placeholder="Original Price" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                {{__('messages.description')}}
                                            </span>
                                        </div>
                                        <textarea cols="5" rows="5" class="form-control" name="description"
                                            placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">

                                </div>
                                <input type="submit" name="submit" value="{{__('messages.ln109')}}"
                                    class="btn btn-primary btn-lg btn-block">
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

        <script>
            $(function () {

            var category = $('#category');
            var subcategory = $('#sub_category');

            category.change(function() {
                var id= $(this).val();

                if(id > 0){
                    subcategory.attr('disabled','disabled');

                    $.get('{{url('/dropdown/category/?cat_id=')}}'+id)
                        .done(function(data){
                            console.log(data.data);
                            
                            var s='<option value="">---select--</option>';
                            data.data.forEach(function(row){
                                console.log(row);
                                
                                s +='<option value="'+row.propertiescategories_id+'">'+row.name+'</option>'
                            });
                            subcategory.removeAttr('disabled')
                            subcategory.html(s);
                        });
                }else{
                    subcategory.empty();
                }

            });
        });

        </script>