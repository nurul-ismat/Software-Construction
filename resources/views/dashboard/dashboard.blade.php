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
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title text-center">
                                {{ session()->get('settings')->general_settings->site_name }}
                                {{__('messages.ln1')}} </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div id="properties"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div id="showreq"></div>
                            </div>
                        </div>
                       <div class="row mt-5">
                    <div class="col-12 col-md-3">
                        <div class="card card_albijadi text-center">
                            <div class="card-body">
                                <h4>{{__('messages.ln159')}}</h4>
                                <h4 style="padding-top: 20px;">{{$data->property['published']}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="card card_albijadi text-center">
                            <div class="card-body">
                                <h4>{{__('messages.ln160')}}</h4>
                                <h4 style="padding-top: 20px;">{{$data->property['requested']}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="card card_albijadi text-center">
                            <div class="card-body">
                                <h4>{{__('messages.ln161')}}</h4>
                                <h4 style="padding-top: 20px;">{{$data->showreq['published']}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="card card_albijadi text-center">
                            <div class="card-body">
                                <h4>{{__('messages.ln162')}}</h4>
                                <h4 style="padding-top: 20px;">{{$data->showreq['requested']}}</h4>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            //  properties piechart start

            google.charts.load('current', { 'packages': ['corechart'] });

            google.charts.setOnLoadCallback(property);

            function property() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([
                    ['{{__('messages.ln165')}}', {{ $data-> property['published']}}],
            ['{{__('messages.ln166')}}', {{ $data-> property['requested']}}],
            ]);

            var options = {
                'title': "{{__('messages.ln163')}}",
            };

            var chart = new google.visualization.PieChart(document.getElementById('properties'));
            chart.draw(data, options);
            }

            // properties piechart end



            // showreq piechart start

            google.charts.load('current', { 'packages': ['corechart'] });

            google.charts.setOnLoadCallback(ShowReq);

            function ShowReq() {

                var data2 = new google.visualization.DataTable();
                data2.addColumn('string', 'Topping');
                data2.addColumn('number', 'Slices');
                data2.addRows([
                    ['{{__('messages.ln167')}}', {{ $data-> showreq['published']}}],
            ['{{__('messages.ln166')}}', {{ $data-> showreq['requested']}}],
                ]);

            var options = {
                'title': "{{__('messages.ln164')}}",
            };

            var chart = new google.visualization.PieChart(document.getElementById('showreq'));
            chart.draw(data2, options);

            }

            // showreq piechart end //
        </script>

        <style>
            .card_albijadi {
                height: 150px;
                box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
                background: linear-gradient(90deg, rgb(53, 50, 111) 0%, rgb(42, 37, 117) 35%, rgb(77, 80, 157) 100%);
            }

            .card_albijadi h4 {
                color: #fff;
            }

            .card_albijadi h2 {
                color: #fff;
            }
        </style>
@include("layouts.footer")

