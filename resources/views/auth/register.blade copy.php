@extends('layouts.auth') @section('body_class') register @endsection @section('content')
<style>
    .login_content .content_ .title p, .register_content .content_ .title p
    {
            vertical-align: top;
    }
    .login_content .content_ form p, .register .content_ form p {
    width: 46.5%;
    }
</style>
<div class="container-fluid">
    <div class="image"><a href="{{route('home')}}"><img src="{{ asset('images/infinity.svg') }}" class="img-fluid" alt=" " /></a>  </div>
</div>
<!-- Content Page-->
<div class="register_content ">
    <div class="container-fluid">
        <div class="content_">
            <div class="title">
                <h2>انشاء حساب جديد </h2>
                <p>إذا كان لديك حساب معنا ، الرجاء الدخول إلى صفحة <a href="{{route('login')}}">تسجيل الدخول</a>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="alert alert-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session()->has('success'))
                        <div class="alert alert-success"> {{ session()->get('success') }} </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                        @endif
                        <div class="row">
                            <p class="col-md-3">
                                <label>الاسم الاول</label>
                                <input type="text" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus /> @error('first_name') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror </p>
                            <p class="col-md-4">
                                <label>الاسم الاوسط</label>
                                <input type="text" class="form-control  @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="name" autofocus /> @error('middle_name') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror </p>
                            <p class="col-md-4">
                                <label>اسم العائلة</label>
                                <input type="text" class="form-control  @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus /> @error('last_name') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror </p>
                        </div>
                        <p>
                            <label> البريد الإلكتروني</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" /> @error('email') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror </p>
                        <p>
                            <label> رقم الجوال </label>
                            <input type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phone" autofocus /> @error('phoneNumber') <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong></span> @enderror </p>
                            <p class="diff">
                            <!-- <p class="date" > -->
                            <label> تاريخ الميلاد</label>
                            <input id="date" type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus > @error('birthday') <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span> @enderror
                            <!-- </p> -->
 
                        </p>

                        <p>

                            <label> الجنس</label>
                            <select class="form-control select_" name="gender" required="" >
                                <option value="male" {{ old( 'male') ? 'selected' : '' }}>ذكر</option>
                                <option value="female" {{ old( 'female') ? 'selected' : '' }}>انثى</option>
                            </select> @error('gender') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror </p>
                        <p>
                            <label> كلمة المرور </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror </p>
                        <p>
                            <label> تأكيد كلمة المرور </label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> @error('password_confirmation') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror </p>

                       <div class="col-md-12">
                            <p class="check_box check_box_w check_box_d " style="display:inline-block;margin-top: 10px;;">
                             <input type="checkbox" class="hidden-input form-check-input"  name="terms" value="1" required> 
                         <span class="checkmark"></span></p>
                         

                                  <label  style="display:inline-block;width: 80%;">
                                      <p style="width:100%">                                  لقد قرأت ووافقت على <a href="{{route('page','privacy-policy')}}" target="_blank">شروط الخصوصية</a></p>
                                </label>
                                  @error('terms')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                       </div>

                        <button class="submit" type="submit"> تسجيل </button>
                    </form>
            </div>
        </div>
    </div>
</div>


@endsection



@section('scripts')


  <script>
    $(function() {

    $( "#date" ).datepicker({
      changeMonth: true,
      changeYear: true,
    });
  });
//   jQuery(document).ready(function($) {
//    $( "#date" ).datepicker({
//      changeMonth: true,
//      changeYear: true
//    });});
   </script>



    



@endsection