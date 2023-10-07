@extends('layouts.auth') @section('body_class') login @endsection @section('content')
<div class="login_content">
    <div class="container-fluid">
        <div class="content_">
            <div class="image"><a href="{{route('home')}}"><img src="{{ asset('images/infinity.svg') }}" class="img-fluid" alt=" " /></a>  </div>
            <div class="title">
                <h2>تسجيل الدخول</h2>
                <p>إذا كان لديك حساب معنا ، الرجاء سجل دخولك</p>
                @if(session()->has('success'))
                    <div class="alert alert-success"> {{ session()->get('success') }} </div>
                @endif

                <form method="POST" action="{{ route('login') }}"> @csrf @if(session()->has('error'))
                    <div class="alert alert-danger"> {!! session()->get('error') !!} </div> @endif
                    <p>
                        <label> رقم الهاتف</label>
                        <input type="tel" class="form-control @error('phoneNumber') is-invalid @enderror " name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phone" autofocus /> @error('phoneNumber') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror </p>
                    <p>
                        <label> كلمة المرور</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" /> @error('password') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror </p>
                    <p class="ww-100"><a href="{{route('forget')}}">هل نسيت كلمة المرور ؟</a></p>
                    <p class="check_box check_box_w">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
                         <span class="checkmark"></span>
                     <label class="form-check-label pd_ri" for="remember"> تذكرنى </label>
                     </p>
                    <button class="submit ww-100 " type="submit"> تسجيل دخول</button>
                </form>
            </div>
        </div>
    </div>
</div> @endsection
