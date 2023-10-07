@extends('layouts.auth  ') @section('body_class') login forget_pass @endsection @section('content')
@section('content')

      <!-- Content Page-->
      <div class="login_content">
         <div class="container-fluid">
            <div class="content_ row">
                <div class="col-md-12">
               
                                    @if (session('status'))
                         <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                @if(session()->has('success'))
                    <div class="alert alert-success"> {{ session()->get('success') }} </div>
                @endif

               <div class="image">
                  <a href="{{route('home')}}"><img src="{{asset('images/infinity.svg')}}" class="img-fluid" alt=" " /></a>
               </div>
               <div class="title">
                  <h2  class="title-">نسيت كلمة المرور</h2>
                  <p class="subtitle">أدخل رقم جوالك  للحصول على كلمة المرور.</p>
                   <form method="POST" action="{{ url('/forget-password') }}">
                        @csrf
                     <p>
                        <label> رقم الجوال</label>
                        <input type="tel" class="form-control  @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" autocomplete="phone" autofocus required  />
                                                         @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                     </p>
                     <button class="submit" type="submit">      إعادة تعين كلمة المرور</button>
                     <div class="forgot-pass text-center">
                        تريد العودة? <a href="{{route('login')}}">تسجيل الدخول</a>
                     </div>
                  </form>
               </div>
            </div>
                </div>
         </div>
      </div>

@endsection
