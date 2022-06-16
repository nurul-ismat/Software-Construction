<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 offset-md-8 all-center">
                <div class="card px-md-5 py-md-4 card-design">
                    <div class="card-body std_login">
                      <img src="img/LOGO-UTM.png" alt="logo" width="100%" height="100%">
                      <h5 class="card-title">Student sign up</h5>
                      @include('layouts.front_errors')
                      <form class="pt-3" action=" {{ route('front-register') }} " method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Username/ID" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-lock"></i></span>
                            <input type="password" name="con_pass" class="form-control" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="submit">
                            <button type="submit" class="btn btn-secondary btn-block"><i class="fa fa-user-plus"></i> Sign up</button>
                        </div>
                    </form>
                    <div class="already_login">
                        <span>Already signed up?</span> <a href="{{ route('home') }}">Login here</a>
                    </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    @include('frontend.includes.footer')
</body>
</html>