@extends('backend.layouts.layout-blank')

@section('page-title', trans('Login'))

@section('styles')
    @parent
    <!-- Page -->
    <link rel="stylesheet" href="{{ mix('/vendor/css/pages/authentication.css') }}">
@endsection

@section('content')
    <div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" style="background-image: url({{ asset('/img/bg/1.jpg') }});">
        <div class="ui-bg-overlay bg-dark opacity-25"></div>

        <div class="authentication-inner py-5">
            <div class="card">
                <div class="p-4 p-sm-5">
                    <!-- Logo -->
                    <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
                        <div class="">
                            <div class="position-relative">
                                <img src="{{asset('frontend/images/logo.png')}}" alt="{{ env('APP_NAME') }}" style="max-width: 120px">
                            </div>
                        </div>
                    </div>
                    <!-- / Logo -->

                    <h5 class="text-center text-muted font-weight-normal mb-4">الدخول لحساب المسؤول</h5>

                    <!-- Form -->
                    <form role="form" action="{{ route('admin.login.post') }}" method="POST" id="login-form" autocomplete="off" class="mt-3">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email" class="form-label">@lang('app.email')</label>
                            <input id="email" name="email" type="text" class="form-control" {{ ((env('APP_ENV') == 'dev')? 'value=admin@admin.com' : '') }}>
                        </div>
                        <div class="form-group">
                            <label class="form-label d-flex justify-content-between align-items-end">
                                <div>@lang('auth.Password')</div>
                                <a href="{{ route('admin.password.remind') }}" class="d-block small">@lang('auth.I forgot my password')</a>
                            </label>
                            <input name="password" type="password" class="form-control" {{ ((env('APP_ENV') == 'dev')? 'value=123456' : '') }}>
                        </div>
                        <div class="d-flex justify-content-between align-items-center m-0">
                            <label class="custom-control custom-checkbox m-0">
                                <input name="remember" type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">@lang('auth.Remember me?')</span>
                            </label>
                            <button type="submit" class="btn btn-primary">دخول</button>
                        </div>
                    </form>
                    <!-- / Form -->
                </div>
            </div>

        </div>
    </div>
@endsection
