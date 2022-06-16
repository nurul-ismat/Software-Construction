<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')
<body>
@include('frontend.includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h2 class="pt-5">Performance analysis for Cmt8940337 - 03</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h4>Course Statistic</h4>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 mt-5 bg-light">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs mt-3" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#table">Table</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#chart">Chart</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="table" class="container tab-pane active"><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-light text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Test Name</th>
                                    <th scope="col">Average</th>
                                    <th scope="col">Minimum</th>
                                    <th scope="col">Maximum</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Chapter-1</td>
                                    <td>40%</td>
                                    <td>20%</td>
                                    <td>50%</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Chapter-2</td>
                                    <td>40%</td>
                                    <td>20%</td>
                                    <td>50%</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Chapter-3</td>
                                    <td>40%</td>
                                    <td>20%</td>
                                    <td>50%</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div id="chart" class="container tab-pane fade">
                      <h5 class="pt-3">Chapter-1</h5>
                      <dl class="chart" style="--scale: 100;">

                        <dt class="date">Average</dt>
                        <dd class="bar" style="--start: 56;">
                          <span class="value">45%</span>
                        </dd>
                      
                        <dt class="date">Minimum</dt> 
                        <dd class="bar" style="--start: 1;">
                          <span class="value">100%</span> 
                        </dd>
                      
                        <dt class="date">Maximum</dt> 
                        <dd class="bar" style="--start: 38;">
                          <span class="value">63%</span> 
                        </dd>
                      </dl>
                      <h5 class="pt-3">Chapter-2</h5>
                      <dl class="chart" style="--scale: 100;">

                        <dt class="date">Average</dt>
                        <dd class="bar" style="--start: 55;">
                          <span class="value">45%</span>
                        </dd>
                      
                        <dt class="date">Minimum</dt> 
                        <dd class="bar" style="--start: 50;">
                          <span class="value">50%</span> 
                        </dd>
                      
                        <dt class="date">Maximum</dt> 
                        <dd class="bar" style="--start: 90;">
                          <span class="value">10%</span> 
                        </dd>
                      </dl>
                    </div>
                </div>
            </div>
        </div>
      </div>
    @include('frontend.includes.footer')
</body>
</html>