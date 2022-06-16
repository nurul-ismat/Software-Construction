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
                      <h5 class="card-title">Student sign in</h5>
                      @include('layouts.front_errors')
                      <form class="pt-3" action=" {{ route('front-login') }} " method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Username/ID" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="submit">
                            <button type="submit" class="btn btn-secondary d-inline-block"><i class="fa fa-sign-in-alt"></i> Sign in</button>
                            <a href="{{ route('signup') }}" class="btn btn-secondary d-inline-block"><i class="fa fa-user-plus"></i> Sign up new account</a>
                        </div>
                    </form>
                    <!--<div class="forgot_password">
                        <a href="#">Forgot your password?</a>
                    </div>-->
                    </div>
                </div> 
            </div>
        </div>
    </div>
@include('frontend.includes.footer')
</body>
</html>