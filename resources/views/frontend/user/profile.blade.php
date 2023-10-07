@extends('layouts.user')
@section('body_class')
fill_data shop  invoice
@endsection

@section('content')
<div class=" accordion" id="heading_orderr">
                        <div class="card">
                           <div class="card-header" id="heading_order">
                              <h2 class="mb-0">
{{--                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab" aria-expanded="true" aria-controls="tab_order">--}}
                                    <div class="title">
                                       <h2>  الملف الشخصى</h2>
                                    </div>
{{--                                 </button>--}}
                              </h2>
                           </div>
                           <div id="tab_order" class="collapse show " aria-labelledby="heading_order" data-parent="#heading_orderr">
                              <div class="card-body">

                    <form method="POST" action="{{ route('updateProfile') }}">
                        @csrf
                @if(session()->has('success'))
                   <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                   <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">الاسم الاول</label>

                            <div class="col-md-4">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$user->first_name}}" required autocomplete="name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="middle_name" class="col-md-4 col-form-label text-md-right"> الاسم الاوسط</label>

                            <div class="col-md-4">
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{$user->middle_name}}" required autocomplete="name" autofocus>

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">اسم العائلة</label>

                            <div class="col-md-4">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$user->last_name}}" required autocomplete="name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">رقم الهاتف</label>

                            <div class="col-md-4">
                                <input id="phoneNumber" type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{$user->phoneNumber}}" required autocomplete="phone" autofocus>

                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">تاريخ الميلاد</label>

                            <div class="col-md-4">
                                                                @php $d = new DateTime($user->birthday); @endphp

                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $d->format('Y-m-d') }}" required autocomplete="birthday" autofocus>
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">الجنس</label>

                            <div class="col-md-4">
                                <select class="form-control" name="gender" required="">
                                    <option value="male" @if($user->gender=='male') selected @endif >ذكر</option>
                                    <option value="female" @if($user->gender=='female') selected @endif  >انثى</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">البريد الالكترونى</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0" style=" z-index: 999999; position: relative; ">
                            <div class="col-md-3 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   تعديل
                                </button>
                            </div>
                            <div class="col-md-3">
                                <a href="{{url('change-password')}}" class="btn btn-primary">
                                    تغيير كلمة السر
                                </a>
                            </div>
                        </div>



                    </form>

                              </div>
                           </div>
                        </div>
                     </div>

@endsection
