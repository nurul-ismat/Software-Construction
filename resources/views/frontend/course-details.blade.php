<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')
<body>
@include('frontend.includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h2 class="pt-5">{{ $data->course->course_name}} Details</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3"></div>
            <div class="col-12 col-md-3">
                <div class="course-details mt-5">
                    <h2 class="pb-4">Preparation</h2>
                    <a href="{{ route('lecture-slide', [$data->course->id]) }}" class="btn btn-secondary d-block mb-3">
                        <i class="fa fa-graduation-cap"></i> Lecture slide</a>
                    <a href="{{ route('activities') }}" class="btn btn-secondary d-block mb-3"><i class="fa fa-check">
                    </i> Activities</a>
                    <a href="{{ route('exam') }}" class="btn btn-secondary d-block mb-3"><i class="fa fa-question">
                    </i> Exams</a>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="course-details mt-5">
                    <h2 class="pb-4">Notices</h2>
                    <a href="{{ route('performance-analysis') }}" class="btn btn-info d-block mb-3">
                        <i class="fa fa-chart-bar"></i> Performance analysis</a>
                    <a href="{{ route('all-notification') }}" class="btn btn-info d-block mb-3">
                        <i class="fa fa-bell"></i> View all notification</a>
                </div>
            </div>
            <div class="col-12 col-md-3"></div>
        </div>
    </div>
    @include('frontend.includes.footer')
</body>
</html>