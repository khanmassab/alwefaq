@extends('layouts.auth') @section('body_class') register @endsection @section('content')

<section>
    <div class="container">
      <div class="row">


        <div class="content-pages col-xs-12">
          <div class="form-reg new-reg" action="">
            <h1>تسجيل حساب جديد</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                {{-- @dd($errors->all()) --}}
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
            
                <div class="rows col-xs-12">
                    <input type="text" class="input @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name"  placeholder="الاسم الاول"/> 
                        @error('first_name') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror 
                </div>
                <div class="rows col-xs-12">
                    <input type="text" class="input @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="name"  placeholder="الاسم الاوسط"/> 
                        @error('middle_name') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror 
                </div>
                <div class="rows col-xs-12">
                    <input type="text" class="input @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name"  placeholder="اسم العائلة"/> 
                        @error('last_name') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror 
                </div>
                <div class="rows col-xs-12">
                    <input type="mail" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="name"  placeholder="البريد الإلكتروني"/> 
                        @error('email') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror 
                </div>
                <div class="rows col-xs-12">
                    <input type="tel" class="input @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="name"  placeholder="رقم الجوال"/> 
                        @error('phoneNumber') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror 
                </div>
                <div class="rows col-xs-12">
                    
                    <label> تاريخ الميلاد</label>
                    <input type="date" id="date" class="date @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" style="visibility:hidden;height:0px !important;" required  placeholder="تاريخ الميلاد"/> 
                        @error('birthday') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror 
                </div>

                <div class="rows col-xs-12">
                    <select class="input select_" name="gender" required="" >
                        <option value="" {{ old( '') ? 'selected' : '' }}>الجنس</option>
                        <option value="male" {{ old( 'male') ? 'selected' : '' }}>ذكر</option>
                        <option value="female" {{ old( 'female') ? 'selected' : '' }}>انثى</option>
                    </select> 
                    @error('gender') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                    @enderror 
                </div>

                <div class="rows col-xs-6">
                    <input type="password" class="input @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="name"  placeholder="كلمة المرور"/> 
                        @error('password') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror 
                </div>

                <div class="rows col-xs-6">
                    <input id="password-confirm" type="password" class="input @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="name"  placeholder="تأكيد كلمة المرور"/> 
                        @error('password_confirmation') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror 
                </div>

                <div class="rows col-xs-12">
                <input type="checkbox"  name="terms" class="checkbox">
                <i class="fa fa-check-square"></i>  
                    <p > لقد قرأت ووافقت على <a href="{{route('page','privacy-policy')}}" target="_blank">شروط الخصوصية</a></p>
                    @error('terms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                    @enderror

                </div>

                <div class="rows col-xs-12">
                <input type="submit" class="submit" value="تسجيل الحساب"> 
                </div>  

                <div class="rows col-xs-12">
                    إذا كان لديك حساب أنقر هنا : <a href="#">تسجيل الدخول</a>
                </div>  

            </form>
          </div> <!-- form-reg -->
        </div><!-- content-pages -->

      </div><!-- row -->
    </div><!-- container -->  
</section>


@endsection