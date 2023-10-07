@extends('layouts.auth') @section('body_class') register @endsection @section('content')

<section>
    <div class="container">
      <div class="row">


        <div class="content-pages col-xs-12">
          <div class="form-reg new-reg" action="">
            <h2>تسجيل الدخول</h2>
            <p>إذا كان لديك حساب معنا ، الرجاء سجل دخولك</p>
            <form method="POST" action="{{ route('login') }}">
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
            
                
                <div class="rows col-xs-12">
                    <input type="tel" class="input @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="name" autofocus placeholder="رقم الجوال"/> 
                        @error('phoneNumber') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror 
                </div>
                
                <div class="rows col-xs-12">
                    <input type="password" class="input @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="name" autofocus placeholder="كلمة المرور"/> 
                        @error('password') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                        @enderror 
                </div>


                <div class="rows col-xs-12">
                <input type="checkbox"  name="remember" class="checkbox" {{ old( 'remember') ? 'checked' : '' }}>
                <i class="fa fa-check-square"></i>  
                    <p > تذكرنى </p>
                    @error('remember')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                    @enderror

                </div>

                <div class="rows col-xs-12">
                <input type="submit" class="submit" value="تسجيل دخول"> 
                </div>  

                <div class="rows col-xs-12">
                    <p class="ww-100"><a href="{{route('forget')}}">هل نسيت كلمة المرور ؟</a></p>
                </div>

            </form>
          </div> <!-- form-reg -->
        </div><!-- content-pages -->

      </div><!-- row -->
    </div><!-- container -->  
</section>


@endsection