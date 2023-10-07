@extends('layouts.auth  ') @section('body_class') login forget_pass @endsection @section('content')
@section('content')

      <!-- Content Page-->
      <div class="login_content">
         <div class="container-fluid">
            <div class="content_ row">
                <div class="col-md-12">
               
                @if(session()->has('success'))
                    <div class="alert alert-success"> {{ session()->get('success') }} </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger"> {{ session()->get('error') }} </div>
                @endif

               <div class="image">
                  <a href="{{route('home')}}"><img src="{{asset('images/infinity.svg')}}" class="img-fluid" alt=" " /></a>
               </div>
               <div class="title">
                  <h2  class="title-">تفعيل الحساب</h2>
                  <p class="subtitle">أدخل الكود المرسل الى رقم الجوال.</p>
                   <form method="POST" action="{{ url('/activate') }}">
                        @csrf
                     <p>
                        <label> الكود</label>
                        <input type="number" class="form-control  @error('email') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" autofocus required  />
                                                         @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                     </p>
                     <button class="submit" type="submit"> تفعيل الحساب</button>
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
