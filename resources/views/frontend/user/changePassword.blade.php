@extends('layouts.user')
@section('body_class') 
fill_data shop  invoice
@endsection 


@section('content')

<div class=" accordion" id="heading_orderr">
                        <div class="card">
                           <div class="card-header" id="heading_order">
                              <h2 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab" aria-expanded="true" aria-controls="tab_order">
                                    <div class="title">
                                       <h2> تعديل الحساب</h2>
                                    </div>
                                 </button>
                              </h2>
                           </div>
                           <div id="tab_order" class="collapse show " aria-labelledby="heading_order" data-parent="#heading_orderr">
                              <div class="card-body">
                                  
                    <form method="POST" action="{{ route('updatePassword') }}">
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
                            <label for="old-password" class="col-md-4 col-form-label text-md-right">كلمة المرور القديمة</label>
                            <div class="col-md-4">
                                <input id="old-password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" autocomplete="old-password">

                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">كلمة المرور الجديدة</label>
                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                      <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تاكيد كلمة المرور</label>
                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                     <div class="form-group row mb-0">
                           <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    تعديل
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                           </div>
                        </div>
                     </div>

@endsection