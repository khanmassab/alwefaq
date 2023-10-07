@extends('layouts.authold') @section('body_class') login forget_pass @endsection @section('content')
@section('content')
<div class="login_content">
         <div class="container-fluid">
            <div class="content_ row">
                <div class="col-md-12">
                @if(session()->has('success'))
                    <div class="alert alert-success"> {{ session()->get('success') }} </div>
                @endif

               <div class="image">
                  <a href="{{route('home')}}"><img src="{{asset('images/infinity.svg')}}" class="img-fluid" alt=" "></a>
               </div>

               <div class="title">
                  <h2 class="title-">تأكيد كلمة المرور  </h2>
                          <form method="POST" action="{{ url('/reset-password') }}">
                                                         @csrf
                           <input type="hidden" name="token" value="{{ $token }}">

                     <p>
                        <label>  كلمة المرور</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required>
                                                         @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                     </p>
                      <p>
                        <label>   تأكيد كلمة المرور</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror " name="password_confirmation" required>
                                                                                   @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                     </p>
                     <button class="submit" type="submit">       تأكيد كلمة المرور</button>
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
