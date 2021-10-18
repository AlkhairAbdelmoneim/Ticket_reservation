{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>@lang('site.title')</title>

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/skin-blue.min.css') }}">

    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE-rtl.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/rtl.css') }}">

    {{-- chanige style fonts --}}

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
    @else
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">
    @endif

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="login-page">

    <div class="login-box">

        <div class="login-logo">
            <a href="../../index2.html"><b>
                    <title>@lang('site.title')</title>
                </b></a>
        </div><!-- end of login lgo -->

        <div class="login-box-body">
            <p class="login-box-msg">تسجيل الدخول</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{ method_field('post') }}

                        @include('partials._errors')

                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="@lang('site.email')">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
        
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="@lang('site.password')">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
        
                        <div class="form-group">
                            <label style="font-weight: normal;"><input type="checkbox" name="remember">
                                @lang('site.remember_me')</label>
                        </div>
        
                        <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('site.login')</button>
        
                    </form><!-- end of form -->
        
                </div><!-- end of login body -->
        
            </div><!-- end of login-box -->
        
            {{--<!-- jQuery 3 -->--}}
            <script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>
        
            {{--<!-- Bootstrap 3.3.7 -->--}}
            <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
        
            {{--icheck--}}
            <script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>
        
            {{--<!-- FastClick -->--}}
            <script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>
        
        </body>
        
        </html>



