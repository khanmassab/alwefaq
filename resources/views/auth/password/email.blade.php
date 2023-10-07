@extends('layouts.auth  ') @section('body_class') login forget_pass @endsection @section('content')
@section('content')


<section>
    <div class="container">
      <div class="row">


        <div class="content-pages col-xs-12">
          <div class="form-reg new-reg" action="">
            <h2>تسجيل الدخول</h2>
            <p>إذا كان لديك حساب معنا ، الرجاء سجل دخولك</p>
            <form method="POST" action="{{ url('/forget-password') }}">
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
                <input type="submit" class="submit" value="إعادة تعين كلمة المرور"> 
                </div>  

                <div class="rows col-xs-12">
                    <p class="ww-100">تريد العودة? <a href="{{route('login')}}">تسجيل الدخول</a></p>
                </div>

            </form>
          </div> <!-- form-reg -->
        </div><!-- content-pages -->

      </div><!-- row -->
    </div><!-- container -->  
</section>

@endsection
