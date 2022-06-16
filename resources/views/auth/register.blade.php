@include('layouts.header')
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
</style>
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="splash-container">


    @include('layouts.errors')


    <div class="card ">
{{-- TODO : change login page logo --}}
        <div class="card-header text-center">

            @if (isset(session()->get('settings')->general_settings->site_logo))

            <a href="/">
                <img style="width:150px; margin-top: 0px;" class="logo" src=" {{ asset('img/LOGO-UTM.png') }} "
                alt="">
            </a>

            @else

            <h1>Kitchen</h1>

            @endif

                <span class="splash-description">Please enter your
                user information.</span></div>
        <div class="card-body">
            <form action=" {{ route('register') }} " method="POST">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">
                                <i class="fa fa-pencil-alt"></i>
                            </span>
                        </div>
                        <input name="fname" class="form-control form-control-lg"
                            id="fname" type="text" placeholder="Enter First Name" autocomplete="off" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">
                                <i class="fa fa-pencil-alt"></i>
                            </span>
                        </div>
                        <input name="lname" class="form-control form-control-lg"
                            id="lname" type="text" placeholder="Enter Last Name" autocomplete="off" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <input name="uname" class="form-control form-control-lg"
                            id="uname" type="text" placeholder="Enter UserName" autocomplete="off" autofocus required>
                    </div>
                </div>


                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">
                               <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <input name="email" class="form-control form-control-lg"
                            id="email" type="email" placeholder="Enter Email" autocomplete="off" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">
                              <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <input class="form-control form-control-lg"
                            id="password" type="password" name="password" required placeholder="Enter Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <input class="form-control form-control-lg"
                            id="c_password" type="password" name="password_confirmation" required placeholder="Confirm Password">
                    </div>
                </div>


                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="remember" id="remember" type="checkbox"
                            {{ old('remember') ? 'checked' : '' }}><span class="custom-control-label">Remember
                            Me</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </form>
        </div>



        @if (Route::has('password.request'))
        <div class="card-footer bg-white p-0 text-center">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="{{ route('password.request') }}" class="footer-link">Forgot Password</a>
            </div>
        </div>
        @endif

    </div>
</div>

{{-- @include('layouts.footer') --}}
