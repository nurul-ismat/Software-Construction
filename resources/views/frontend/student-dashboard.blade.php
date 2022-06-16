<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')
<body>
@include('frontend.includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h2 class="pt-5">Hello, {{session('front_user')}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_subtitle">
                    <h2 class="pt-5">Courses Lists</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        @foreach($data->courses as $course)
            <div class="col-12 col-md-4">
                <div class="courses_list">
                    <h4 class="text-center course_title"><a class="text-info" href="{{ route('course-details', [$course->id])}}"><span>Course Name:</span> {{ $course->course_name }}</a></h4>
                    <h5 class="text-center course_subtitle text-muted">
                        @foreach($data->users as $row)
                            @if($row->id == $course->responsible_professor)
                                {{'Lecturer Name: '.$row->fname.' '.$row->lname }}
                            @endif
                        @endforeach 
                    </h5>
                    <hr>
                    <div class="option_lists text-center">
                        <a href="{{ route('course-details', [$course->id])}}" class="btn btn-secondary btn-sm">More Details</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    @include('frontend.includes.footer') 
</body>
</html>