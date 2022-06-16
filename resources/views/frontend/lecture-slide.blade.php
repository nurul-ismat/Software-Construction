<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')
<body>
@include('frontend.includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h2 class="pt-5">{{ $data->course->course_name}} Lecture slide</h2>
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
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach($data->lecture_slides as $lecture_slide)
                      <tr>
                        <th scope="row">{{ $i }} @php($i++)</th>
                        <td>{{$lecture_slide->title}}</td>
                        <td>
                        <iframe src="{{ asset('storage/file/lecture/'.$lecture_slide->file) }}" width="100%" height="260">
                            <a href="{{ asset('storage/file/lecture/'.$lecture_slide->file) }}">Download PDF</a>
                          </iframe>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
  @include('frontend.includes.footer') 
</body>
</html>