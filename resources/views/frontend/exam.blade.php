<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')
<body>
@include('frontend.includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h2 class="pt-5">Cmt8940337 - 03 Exam</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="table-responsive mt-5">
                <table class="table table-bordered table-light text-center">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Topic</th>
                        <th scope="col">Exam Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Chapter-1</td>
                        <td>24-04-2022 16:00pm</td>
                        <td><button class="btn btn-info btn-sm"><i class="fa fa-download"></i> Download</button></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Chapter-2</td>
                        <td>24-04-2022 16:00pm</td>
                        <td><button class="btn btn-info btn-sm"><i class="fa fa-download"></i> Download</button></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Chapter-3</td>
                        <td>24-04-2022 16:00pm</td>
                        <td><button class="btn btn-info btn-sm"><i class="fa fa-download"></i> Download</button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
  @include('frontend.includes.footer')
</body>
</html>