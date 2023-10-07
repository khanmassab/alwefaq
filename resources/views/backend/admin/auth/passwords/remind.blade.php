@extends('backend.layouts.layout-blank')

@section('page-title', 'استعادة كلمة المرور')

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
                {!! Form::open(['route' => 'admin.password.remind.post', 'files' => false, 'id' => 'remind-password-form','class' => "card"]) !!}
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
                    <h5 class="text-center text-muted font-weight-normal mb-4">استعادة كلمة المرور</h5>
                    <hr class="mt-0 mb-4">
                    <p>
                        ادخل بريدك الالكترونى وسيتم ارسال رابط لاستعادة كلمة المرور.
                    </p>
                    <div class="form-group">
                        <input name="email" type="text" class="form-control" placeholder="ادخل بريدك الالكترونى">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">استعادة كلمة المرور</button>
                    <div class="mt-3 text-center">
                    <a href="{{route('admin.login')}}">الدخول</a>
                        
                    </div>
                </div>
                </form>
                <!-- / Form -->
            </div>
        </div>
    </div>
@endsection
