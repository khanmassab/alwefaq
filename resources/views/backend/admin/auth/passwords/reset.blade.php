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
        <div class="authentication-wrapper authentication-2 px-4">
            <div class="authentication-inner py-5">
                <!-- Form -->
                {!! Form::open(['route' => 'admin.password.reset.post', 'files' => false, 'id' => 'reset-password-form','class'=>'card']) !!}
                <input type="hidden" name="token" value="{{ $token }}">
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
                    <h5 class="text-center text-muted font-weight-normal mb-4">@lang('app.reset_your_password')</h5>
                    <hr class="mt-0 mb-4">
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" placeholder="@lang('app.password')">
                    </div>
                    <div class="form-group">
                        <input name="password_confirmation" type="password" class="form-control" placeholder="@lang('app.password_confirmation')">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">@lang('app.update_password')</button>
                </div>
                </form>
                <!-- / Form -->
            </div>
        </div>
    </div>
@endsection
