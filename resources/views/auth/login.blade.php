@section('title', 'Login')
@include('main')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">


<body class="cat__pages__login">
    <!-- START: pages/login -->
    {{-- <div class="cat__pages__login cat__pages__login--fullscreen"
        style="background-image: url('https://e-student.kpru.ac.th/web2016/img/blur-background05.jpg?fbclid=IwAR2TxsipUFjrqSfiCbB7hW2Nka3elCrc3VEsGrWhLoS5WpWb2WYbe5Zhtao')">
        <div class="cat__pages__login__block ">
            <div class="row">
                <div class="col-xl-12">
                    
                    <div class="cat__pages__login__block__promo text-white text-center">
                        <img src="{{ asset('img/logo-kpru.png') }}" class="logo-kpru" alt="logo">
                    </div>
                    <div class="cat__pages__login__block__inner">
                        <div class="cat__pages__login__block__form">
                            <h4 class="text-uppercase">
                                <strong>Please log in</strong>
                            </h4>
                            <br />
                            @if (isset(Auth::user()->email))
                                <script>
                                    window.location = "/main/dashboard"
                                </script>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form id="form-validation" name="form-validation" method="POST"
                                action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input id="validation-email" class="form-control" placeholder="Email or Username"
                                        name="email" type="text" data-validation="[NOTEMPTY]">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input id="validation-password" class="form-control password" name="password"
                                        type="password" data-validation="[L>=6]"
                                        data-validation-message="$ must be at least 6 characters"
                                        placeholder="Password">
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary mr-3" name="login"
                                        value="login">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cat__pages__login__footer text-center">
            <ul class="list-unstyled list-inline">
                <li class="list-inline-item"><a href="javascript: void(0);">Terms of Use</a></li>
                <li class="active list-inline-item"><a href="javascript: void(0);">Compliance</a></li>
                <li class="list-inline-item"><a href="javascript: void(0);">Confidential Information</a></li>
                <li class="list-inline-item"><a href="javascript: void(0);">Support</a></li>
                <li class="list-inline-item"><a href="javascript: void(0);">Contacts</a></li>
            </ul>
        </div>
    </div> --}}

    <div class="contact-form">
        <img alt="" class="avatar" src="{{ asset('img/logo-kpru.png') }}">
        <h4>Research and Development Institute</h4>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>Username or Password Incorrect</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="form-validation" name="form-validation" method="POST" action="{{ route('login') }}">
            @csrf
            <label class="form-label">Username</label>
            <input id="validation-email" class="form-control" placeholder="Enter Username" name="email" type="email"
                data-validation="[NOTEMPTY]">
            <label class="form-label">Password</label>
            <input id="validation-password" class="form-control password" name="password" type="password"
                data-validation="[L>=6]" data-validation-message="$ must be at least 6 characters"
                placeholder="Enter Password">
            <div class="d-grid col-6 mx-auto">
                <button type="submit" value="Sign in" name="login">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
    <!-- END: pages/login-alpha -->

    <!-- START: page scripts -->
    <script>
        $(function() {

            // Form Validation
            $('#form-validation').validate({
                submit: {
                    settings: {
                        inputContainer: '.form-group',
                        errorListClass: 'form-control-error',
                        errorClass: 'has-danger'
                    }
                }
            });

        });
    </script>
    <!-- END: page scripts -->
</body>
