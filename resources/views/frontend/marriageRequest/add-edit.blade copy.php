@extends('layouts.user')
@section('body_class')
fill_data specifications
@endsection

@section('content')
                @if(session()->has('success'))
                   <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                        @if(isset ($errors) && count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>

                            @endforeach
                        @endif

                  <div class="title_page">
                        <h2>  مواصفات شريك الحياة  </h2>
                         <a href="{{  url('marriage-request')}}">
                           الرجوع
                           <svg xmlns="http://www.w3.org/2000/svg" width="25.706" height="24.329" viewBox="0 0 25.706 24.329">
                              <g id="Group_714" data-name="Group 714" transform="translate(-198 -222.086)">
                                 <g id="Group_601" data-name="Group 601" transform="translate(-1363 -858)">
                                    <g id="Component_1_16" data-name="Component 1 – 16" transform="translate(1562 1081.5)">
                                       <path id="Path_11605" data-name="Path 11605" d="M1572.75,1103,1562,1092.25l10.75-10.75" transform="translate(-1562 -1081.5)" fill="none" stroke="#90599f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    </g>
                                    <path id="Path_11606" data-name="Path 11606" d="M1579.75,1103,1569,1092.25l10.75-10.75" transform="translate(5.542)" fill="none" stroke="#bfc9ce" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                 </g>
                              </g>
                           </svg>
                        </a> 
                     </div>
                        @if($edit)
                            {!! Form::open(['route' => ['partner.update',$request->id], 'method' => 'PUT','files' => true, 'id' => 'belongsTo_type-form','class'=>'row']) !!}
                        @else
                            {!! Form::open(['route' => 'partner.store', 'files' => true, 'id' => 'belongsTo_type-form','class'=>'row']) !!}
                        @endif

                        @csrf
                        @php
                            $gender = Auth::user()->gender;
                        @endphp


   <input type="hidden"  value="2" name="request_type">
                        <div class="form-group col-md-4">
                            <label for="qualification" class=" col-form-label text-md-left">المؤهل</label>

                            <div class="custom-input-field">
                                <select name="qualification_id" id="qualification" class="form-control" required="required">
                                    <option value="">اختر المؤهل</option>
                                    @foreach($qualifications as $qualification)
                                    @if($edit)
                                    <option  @if($request->qualification_id == $qualification->id || $qualification->id == old('qualification_id')) selected="selected" @endif value="{{$qualification->id}}">{{$qualification->name}}</option>
                                    @else
                                    <option @if($qualification->id == old('qualification_id')) selected="selected" @endif  value="{{$qualification->id}}">{{$qualification->name}}</option>
                                    @endif
                                    @endforeach

                                </select>

                                @error('qualification_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="nationality" class=" col-form-label text-md-left">الجنسية</label>

                            <div class="custom-input-field">
                                <select name="nationality_id" id="nationality" class="form-control" required="required">
                                    <option value="">اختر الجنسية</option>
                                    @foreach($nationalities as $nationality)

                                    @if($edit)
                                    <option  @if($request->nationality_id == $nationality->id || $nationality->id == old('nationality_id')) selected="selected" @endif value="{{$nationality->id}}">{{$nationality->name}}</option>
                                    @else
                                    <option @if($nationality->id == old('nationality_id')) selected="selected" @endif  value="{{$nationality->id}}">{{$nationality->name}}</option>
                                    @endif

                                    @endforeach

                                </select>

                                @error('nationality_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group col-md-4">
                            <label for="city" class=" col-form-label text-md-left">المنطقة</label>

                            <div class="custom-input-field">
                                <select name="city_id" id="city" class="form-control" required="required">
                                    <option value="">اختر المنطقة</option>
                                    @foreach($cities as $city)
                                    @if($edit)
                                    <option  @if($request->city_id == $city->id || $city->id == old('city_id')) selected="selected" @endif value="{{$city->id}}">{{$city->name}}</option>
                                    @else
                                    <option @if($city->id == old('city_id')) selected="selected" @endif  value="{{$city->id}}">{{$city->name}}</option>
                                    @endif

                                    @endforeach
                                </select>

                                @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="age" class=" col-form-label text-md-left">العمر</label>

                            <div class="custom-input-field">
                                <select name="age" required id="age" class="form-control" >
                                    <option value="">اختر العمر</option>
                                    @if($edit)
                                    <option  @if("23 - 18" == old('age') || $request->age == "23 - 18" ) selected="selected" @endif   value="23 - 18" >23 - 18</option>
                                    <option value="29 - 24"  @if("29 - 24" == old('age') || $request->age == "29 - 24" ) selected="selected" @endif   >29 - 24</option>
                                    <option value="35 - 30"  @if("35 - 30" == old('age') || $request->age == "35 - 30" ) selected="selected" @endif   >35 - 30</option>
                                    <option value="41 - 36"  @if("41 - 36" == old('age') || $request->age == "41 - 36" ) selected="selected" @endif  >41 - 36</option>
                                    <option value="47 - 42"  @if("47 - 42" == old('age') || $request->age == "47 - 42" ) selected="selected" @endif  >47 - 42</option>
                                    <option value="53 - 48"  @if("53 - 48" == old('age') || $request->age == "53 - 48" ) selected="selected" @endif   >53 - 48</option>
                                    <option value="69 - 54" @if("69 - 54" == old('age') || $request->age == "69 - 54" ) selected="selected" @endif  >69 - 54</option>
                                    <option value="75 - 70"  @if("75 - 70" == old('age') || $request->age == "75 - 70" ) selected="selected" @endif   >75 - 70</option>
                                    <option value="81 - 76"  @if("81 - 76" == old('age') || $request->age == "81 - 76" ) selected="selected" @endif  >81 - 76</option>
                                    <option value="87 - 82"  @if("87 - 82" == old('age') || $request->age == "87 - 82" ) selected="selected" @endif  >87 - 82</option>
                                    <option value="93 - 88"  @if("93 - 88" == old('age') || $request->age == "93 - 88" ) selected="selected" @endif   >93 - 88</option>
                                    <option value="100 – 94"  @if("100 – 94" == old('age') || $request->age == "100 – 94" ) selected="selected" @endif   >100 – 94</option>


                                    @else

                                    <option  @if("23 - 18" == old('age')) selected="selected" @endif   value="23 - 18" >23 - 18</option>
                                    <option value="29 - 24" @if("29 - 24" == old('age')) selected="selected" @endif  >29 - 24</option>
                                    <option value="35 - 30" @if("35 - 30" == old('age')) selected="selected" @endif >35 - 30</option>
                                    <option value="41 - 36" @if("41 - 36" == old('age')) selected="selected" @endif>41 - 36</option>
                                    <option value="47 - 42" @if("47 - 42" == old('age')) selected="selected" @endif >47 - 42</option>
                                    <option value="53 - 48" @if("69 - 54" == old('age')) selected="selected" @endif >53 - 48</option>
                                    <option value="69 - 54" @if("69 - 54" == old('age')) selected="selected" @endif >69 - 54</option>
                                    <option value="75 - 70" @if("75 - 70" == old('age')) selected="selected" @endif >75 - 70</option>
                                    <option value="81 - 76" @if("81 - 76" == old('age')) selected="selected" @endif >81 - 76</option>
                                    <option value="87 - 82" @if("87 - 82" == old('age')) selected="selected" @endif >87 - 82</option>
                                    <option value="93 - 88" @if("93 - 88" == old('age')) selected="selected" @endif >93 - 88</option>
                                    <option value="100 – 94" @if("100 – 94" == old('age')) selected="selected" @endif >100 – 94</option>




                                    @endif

                                </select>
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group marriage col-md-4">
                            <label  class="col-md-12 col-form-label text-md-left">القبيلة</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                   <div class="check_box">
                                  <input class="form-check-input" required type="radio" name="tripe" id="tripeyes" value="1" @if(isset($request->tripe) && $request->tripe == "1"  || old('tripe') == "1" ) checked @endif  >
                                   <span class="checkmark"></span>
                                   </div>
                                  <label class="form-check-label" for="tripeyes">نعم</label>
                                </div>

                                <div class="form-check form-check-inline">
                                                                         <div class="check_box">
                                  <input class="form-check-input" type="radio" name="tripe" id="tripeno" value="0" @if(isset($request->tripe) && $request->tripe == "0"  || old('tripe') == "0" ) checked @endif>
                                    <span class="checkmark"></span>
                                    </div>
                                  <label class="form-check-label" for="tripeno">لا</label>
                                </div>
                                <div class="form-check form-check-inline">
                                                                         <div class="check_box">
                                  <input class="form-check-input" type="radio" name="tripe" id="tripenull" value="غير مهم" @if(isset($request->tripe) && $request->tripe == "غير مهم" ) checked @endif >
                                   <span class="checkmark"></span>
                                   </div>
                                  <label class="form-check-label" for="tripenull">غير مهم</label>
                                </div>

                                @error('tripe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if($gender == 'male')
                        <div class="form-group marriage col-md-4">
                            <label  class="col-md-12 col-form-label text-md-left">غطاء الرأس</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                                                         <div class="check_box">
                                  <input class="form-check-input" required type="radio" name="head_cover" id="head1" value="1" @if(isset($request->head_cover) && $request->head_cover == "1"  || old('head_cover') == "1" ) checked @endif>
                                  <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="head1">نعم</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="check_box">
                                  <input class="form-check-input" type="radio" name="head_cover" id="head2" value="0" @if(isset($request->head_cover) && $request->head_cover == "0"  || old('head_cover') == "0" ) checked @endif>
                                <span class="checkmark"></span>
                                </div>
                                  <label class="form-check-label" for="head2">لا</label>
                                </div>
                                <div class="form-check form-check-inline">
                                 <div class="check_box">
                                  <input class="form-check-input" type="radio" name="head_cover" id="head3" value="غير مهم" @if(isset($request->head_cover) && $request->head_cover == "غير مهم" ) checked @endif>
                                  <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="head3">غير مهم</label>
                                </div>

                                @error('head_cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group marriage col-md-4">
                            <label  class="col-md-12 col-form-label text-md-left">النقاب</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <div class="check_box">
                                  <input class="form-check-input" required type="radio" name="body_cover" id="body1" value="1" @if(isset($request->body_cover) && $request->body_cover == "1"  || old('body_cover') == "1" ) checked  @endif>
                                     <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="body1">نعم</label>
                                </div>
                                <div class="form-check form-check-inline">
                            <div class="check_box">
                                  <input class="form-check-input" type="radio" name="body_cover" id="body2" value="0" @if(isset($request->body_cover) && $request->body_cover == "0"  || old('body_cover') == "0" ) checked  @endif>
                                   <span class="checkmark"></span>
                                   </div>
                                  <label class="form-check-label" for="body2">لا</label>
                                </div>
                                <div class="form-check form-check-inline">
                                 <div class="check_box">
                                  <input class="form-check-input" type="radio" name="body_cover" id="body3" value="غير مهم" @if(isset($request->body_cover) && $request->body_cover == "غير مهم"  ) checked  @endif>
                                   <span class="checkmark"></span>
                                   </div>
                                  <label class="form-check-label" for="body3">غير مهم</label>
                                </div>

                                @error('body_cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group marriage col-md-4">
                            <label  class="col-md-12 col-form-label text-md-left">غطاء الوجه</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                     <div class="check_box">
                                  <input class="form-check-input" required type="radio" name="face_cover" id="face1" value="1" @if(isset($request->face_cover) && $request->face_cover == "1"  || old('face_cover') == "1" ) checked  @endif>
                                  <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="face1">نعم</label>
                                </div>
                                <div class="form-check form-check-inline">
                                     <div class="check_box">
                                      <input class="form-check-input" type="radio" name="face_cover" id="face2" value="0" @if(isset($request->face_cover) && $request->face_cover == "0"  || old('face_cover') == "0" ) checked  @endif>
                                        
                                   </div>
                                  <label class="form-check-label" for="face2">لا</label>
                                </div>
                                <div class="form-check form-check-inline">
                                                                        <div class="check_box">
                                  <input class="form-check-input" type="radio" name="face_cover" id="face3" value="غير مهم" @if(isset($request->face_cover) && $request->face_cover == "غير مهم"  ) checked  @endif>
                                   <span class="checkmark"></span>
                                   </div>
                                  <label class="form-check-label" for="face3">غير مهم</label>
                                </div>

                                @error('face_cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group marriage col-md-4">
                            <label  class="col-md-12 col-form-label text-md-left">غطاء اليد</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                 <div class="check_box">
                                  <input class="form-check-input" required type="radio" name="hand_cover" id="hand1" value="1" @if(isset($request->hand_cover) && $request->hand_cover == "1"  || old('hand_cover') == "1"  ) checked  @endif>
                                   <span class="checkmark"></span>
                                   </div>
                                  <label class="form-check-label" for="hand1">نعم</label>
                                </div>
                                <div class="form-check form-check-inline">
                                 <div class="check_box">
                                  <input class="form-check-input" type="radio" name="hand_cover" id="hand2" value="0" @if(isset($request->hand_cover) && $request->hand_cover == "0"  || old('hand_cover') == "0"  ) checked  @endif>
                                   <span class="checkmark"></span>
                                   </div>
                                  <label class="form-check-label" for="hand2">لا</label>
                                </div>
                                <div class="form-check form-check-inline">
                                   <div class="check_box">
                                  <input class="form-check-input" type="radio" name="hand_cover" id="hand3" value="غير مهم" @if(isset($request->hand_cover) && $request->hand_cover == "غير مهم"  ) checked  @endif>
                                  <span class="checkmark"></span>
                                 </div>
                                  <label class="form-check-label" for="hand3">غير مهم</label>
                                </div>


                                @error('hand_cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @endif

                        <div class="form-group marriage col-md-4">
                            <label  class="col-md-12 col-form-label text-md-left">الشعر</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <div class="check_box">
                                  <input class="form-check-input" required type="radio" name="hair" id="hair1" value="ناعم" @if(isset($request->hair) && $request->hair == "ناعم"  || old('hair') == "ناعم"  ) checked  @endif>
                                  <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="hair1">ناعم</label>
                                </div>
                                <div class="form-check form-check-inline">
                                 <div class="check_box">
                                  <input class="form-check-input" type="radio" name="hair" id="hair2" value="خشن" @if(isset($request->hair) && $request->hair == "خشن"  || old('hair') == "خشن"  ) checked  @endif>
                                  <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="hair2">خشن</label>
                                </div>
                                <div class="form-check form-check-inline">
                                 <div class="check_box">
                                  <input class="form-check-input" type="radio" name="hair" id="hair3" value="عادى" @if(isset($request->hair) && $request->hair == "عادى"  || old('hair') == "عادى"   ) checked  @endif>
                                 <span class="checkmark"></span>
                                 </div>
                                  <label class="form-check-label" for="hair3">عادي</label>
                                </div>

                                @error('hair')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                           @if($gender == 'female')

                        <div class="form-group marriage col-md-4">
                            <label  class="col-md-12 col-form-label text-md-left">التدين</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                      <div class="check_box">
                                  <input class="form-check-input" required type="radio" name="religion" id="religion1" value="عالى" @if(isset($request->religion) && $request->religion == "عالى"  || old('religion') == "عالى"   ) checked  @endif>
                                <span class="checkmark"></span>
                                </div>
                                  <label class="form-check-label" for="religion1">عالى</label>
                                </div>
                                <div class="form-check form-check-inline">
                                   <div class="check_box">
                                  <input class="form-check-input" type="radio" name="religion" id="religion2" value="متوسط" @if(isset($request->religion) && $request->religion == "متوسط"  || old('religion') == "متوسط"   ) checked  @endif>
                                   <span class="checkmark"></span>
                                   </div>
                                  <label class="form-check-label" for="religion2">متوسط</label>
                                </div>
                                <div class="form-check form-check-inline">
                                 <div class="check_box">
                                  <input class="form-check-input" type="radio" name="religion" id="religion3" value="عادى" @if(isset($request->religion) && $request->religion == "عادى"  || old('عادى') == "normal"   ) checked  @endif>
                                   <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="religion3">عادى</label>
                                </div>

                                @error('hair')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="beared" class=" col-form-label text-md-left">اللحية</label>

                            <div class="custom-input-field">
                                <select name="beared" required class="form-control" >
                                    <option value="">اختر نوع اللحية</option>

                                    <option @if(isset($request->beared) && $request->beared == "بدون لحية"  || old('beared') == "بدون لحية" ) selected  @endif   value="بدون لحية" >بدون لحية</option>
                                    <optgroup label="بلحية">
                                        <option @if(isset($request->beared) && $request->beared == "لحية طويلة"  || old('beared') == "لحية طويلة" ) selected  @endif  value="لحية طويلة">لحية طويلة</option>
                                        <option @if(isset($request->beared) && $request->beared == "لحية قصيرة"  || old('beared') == "لحية قصيرة" ) selected  @endif  value="لحية قصيرة">لحية قصيرة</option>
                                    </optgroup>
                                </select>
                                @error('beared')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <div class="form-group marriage col-md-4">
                            <label  class="col-md-12 col-form-label text-md-left">الشكل</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <div class="check_box">
                                  <input class="form-check-input" required type="radio" name="shape" id="shape1" value="مقبول" @if(isset($request->shape) && $request->shape == "مقبول"  || old('shape') == "مقبول"   ) checked  @endif>
                                  <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="shape1">مقبول</label>
                                </div>
                                <div class="form-check form-check-inline">
                                     <div class="check_box">
                                  <input class="form-check-input" type="radio" name="shape" id="shape2" value="جميل" @if(isset($request->shape) && $request->shape == "جميل"  || old('shape') == "جميل"   ) checked  @endif>
                                  <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="shape2">جميل</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <div class="check_box">
                                  <input class="form-check-input" type="radio" name="shape" id="shape3" value="جميل جدا" @if(isset($request->shape) && $request->shape == "جميل جدا"  || old('shape') == "جميل جدا"   ) checked  @endif>
                                  <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="shape3">جميل جدا</label>
                                </div>
                                <div class="form-check form-check-inline">
                                 <div class="check_box">
                                  <input class="form-check-input" type="radio" name="shape" id="shape4" value="غير مهم" @if(isset($request->shape) && $request->shape == "غير مهم"    ) checked  @endif>
                                   <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="shape4">غير مهم</label>
                                </div>

                                @error('shape')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group marriage col-md-4">
                            <label  class="col-md-12 col-form-label text-md-left">التدخين</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                     <div class="check_box">
                                  <input class="form-check-input" required type="radio" name="smoked" id="smoked2" value="1" @if(isset($request->smoked) && $request->smoked == "1"  || old('smoked') == "1"   ) checked  @endif>
                                  <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="smoked2">نعم</label>
                                </div>
                                <div class="form-check form-check-inline">
                                 <div class="check_box">
                                  <input class="form-check-input" type="radio" name="smoked" id="smoked1" value="0" @if(isset($request->smoked) && $request->smoked == "0"  || old('smoked') == "0"   ) checked  @endif>
                                  <span class="checkmark"></span>
                                  </div>
                                  <label class="form-check-label" for="smoked1">لا</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <div class="check_box">
                                  <input class="form-check-input" type="radio" name="smoked" id="smoked3" value="غير مهم" @if(isset($request->smoked) && $request->smoked == "غير مهم"   ) checked  @endif>
                                <span class="checkmark"></span>
                                </div>
                                  <label class="form-check-label" for="smoked3">غير مهم</label>
                                </div>

                                @error('smoked')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group col-md-4">
                            <label for="weight" class=" col-form-label text-md-left">الوزن</label>

                            <div class="custom-input-field">
                                <select name="weight" required class="form-control" >
                                    <option value="">اختر الوزن</option>
                                    <option value="50 – 60" @if(isset($request->weight) && $request->weight == "50 – 60"  || old('weight') == "50 – 60" ) selected  @endif  >50 – 60</option>
                                    <option value="61 – 70" @if(isset($request->weight) && $request->weight == "61 – 70"  || old('weight') == "61 – 70" ) selected  @endif  >61 – 70</option>
                                    <option value="71 – 80" @if(isset($request->weight) && $request->weight == "71 – 80"  || old('weight') == "71 – 80" ) selected  @endif  >71 – 80</option>
                                    <option value="81 – 90" @if(isset($request->weight) && $request->weight == "81 – 90"  || old('weight') == "81 – 90" ) selected  @endif  >81 – 90</option>
                                    <option value="91 – 100" @if(isset($request->weight) && $request->weight == "91 – 100"  || old('weight') == "91 – 100" ) selected  @endif  >91 – 100</option>
                                    <option value="101 – 110" @if(isset($request->weight) && $request->weight == "101 – 110"  || old('weight') == "101 – 110" ) selected  @endif  >101 – 110</option>
                                    <option value="111 – 120" @if(isset($request->weight) && $request->weight == "111 – 120"  || old('weight') == "111 – 120" ) selected  @endif  >111 – 120</option>
                                    <option value="121 – 130" @if(isset($request->weight) && $request->weight == "121 – 130"  || old('weight') == "121 – 130" ) selected  @endif  >121 – 130</option>
                                    <option value="131 – 140" @if(isset($request->weight) && $request->weight == "131 – 140"  || old('weight') == "131 – 140" ) selected  @endif  >131 – 140</option>
                                    <option value="141 – 150" @if(isset($request->weight) && $request->weight == "141 – 150"  || old('weight') == "141 – 150" ) selected  @endif  >141 – 150</option>
                                    <option value="151 – 160" @if(isset($request->weight) && $request->weight == "151 – 160"  || old('weight') == "151 – 160" ) selected  @endif  >151 – 160</option>
                                    <option value="161 – 170" @if(isset($request->weight) && $request->weight == "161 – 170"  || old('weight') == "161 – 170" ) selected  @endif  >161 – 170</option>
                                    <option value="171 – 180" @if(isset($request->weight) && $request->weight == "171 – 180"  || old('weight') == "171 – 180" ) selected  @endif  >171 – 180</option>
                                </select>
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="height" class=" col-form-label text-md-left">الطول</label>

                            <div class="custom-input-field">
                                <select name="height" required class="form-control"  >
                                    <option value="">اختر الطول</option>
                                    <option value="140 – 130"  @if(isset($request->height) && $request->height == "140 – 130"  || old('height') == "140 – 130" ) selected  @endif  >140 – 130</option>
                                    <option value="150 – 141"  @if(isset($request->height) && $request->height == "150 – 141"  || old('height') == "150 – 141" ) selected  @endif >150 – 141</option>
                                    <option value="160 – 151"  @if(isset($request->height) && $request->height == "160 – 151"  || old('height') == "160 – 151" ) selected  @endif >160 – 151</option>
                                    <option value="170 – 161"  @if(isset($request->height) && $request->height == "170 – 161"  || old('height') == "170 – 161" ) selected  @endif >170 – 161</option>
                                    <option value="180 – 171"  @if(isset($request->height) && $request->height == "180 – 171"  || old('height') == "180 – 171" ) selected  @endif >180 – 171</option>
                                    <option value="190 – 181"  @if(isset($request->height) && $request->height == "190 – 181"  || old('height') == "190 – 181" ) selected  @endif >190 – 181</option>
                                    <option value="200 – 191"  @if(isset($request->height) && $request->height == "200 – 191"  || old('height') == "200 – 191" ) selected  @endif >200 – 191</option>
                                    <option value="210 – 201"  @if(isset($request->height) && $request->height == "210 – 201"  || old('height') == "210 – 201" ) selected  @endif >210 – 201</option>
                                </select>
                                @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="skin_color" class=" col-form-label text-md-left">لون البشرة</label>

                            <div class="custom-input-field">
                                <select name="skin_color"  class="form-control" required >
                                    <option value="">اختر لون البشرة</option>
                                    <option value="ابيض"   @if(isset($request->skin_color) && $request->skin_color == "ابيض"  || old('skin_color') == "ابيض" ) selected  @endif>ابيض</option>
                                    <option value="قمحى"  @if(isset($request->skin_color) && $request->skin_color == "قمحى"  || old('skin_color') == "قمحى" ) selected  @endif >قمحى</option>
                                    <option value="بنى"  @if(isset($request->skin_color) && $request->skin_color == "بنى"  || old('skin_color') == "بنى" ) selected  @endif >بنى</option>
                                    <option value="اسود"  @if(isset($request->skin_color) && $request->skin_color == "اسود"  || old('skin_color') == "اسود" ) selected  @endif  >اسود</option>
                                    <option value="غير مهم"   @if(isset($request->skin_color) && $request->skin_color == "غير مهم"  ) selected  @endif>غير مهم</option>
                                </select>
                                @error('skin_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="health_status" class=" col-form-label text-md-left">الحاله الصحية</label>

                            <div class="custom-input-field">
                                <select name="health_status"  class="form-control" id="health_status" required >
                                    <option value="">اختر الحاله الصحية</option>
                                    <option value="صحى"  @if(isset($request->health_status) && $request->health_status == "صحى"  || old('health_status') == "healthy" ) selected  @endif   >صحى</option>
                                    <option value="مريض" @if(isset($request->health_status) && $request->health_status == "مريض"  || old('health_status') == "sick" ) selected  @endif  >مريض</option>
                                        <option value="غير مهم" @if(isset($request->health_status) && $request->health_status == "غير مهم"   ) selected  @endif   >غير مهم</option>

                                </select>
                                @error('health_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-4" id="diseaseForm" style="display: none">
                                <label for="disease" class="col-form-label text-md-left">نوع المرض</label>
                                <div class="custom-input-field">
                                    <input id="disease" type="text" class="form-control" name="disease" autocomplete="name" style="display: none" >
                                </div>
                            </div>
                        <div class="form-group col-md-4">
                            <label for="social_status" class=" col-form-label text-md-left">الحاله الاجتماعية</label>

                            <div class="custom-input-field">
                                <select name="social_status"  class="form-control" required >
                                    <option value="">اختر الحاله الاجتماعية</option>
                                    <option value="اعزب" @if(isset($request->social_status) && $request->social_status == "اعزب"  || old('social_status') == "اعزب"   ) selected  @endif >اعزب \ عزباء</option>
                                    @if($gender == 'female')
                                    <option value="متزوج" @if(isset($request->social_status) && $request->social_status == "متزوج"  || old('social_status') == "متزوج"   ) selected  @endif>متزوج</option>
                                    @endif
                                    <option value="منفصل"  @if(isset($request->social_status) && $request->social_status == "منفصل"  || old('social_status') == "منفصل"   ) selected  @endif >منفصل \ منفصلة</option>
                                    <option value="مطلق"  @if(isset($request->social_status) && $request->social_status == "مطلق"  || old('social_status') == "مطلق"   ) selected  @endif >مطلق \ مطلقة</option>
                                    <option value="مطلق مع اولاد" @if(isset($request->social_status) && $request->social_status == "مطلق مع اولاد"  || old('social_status') == "مطلق مع اولاد"   ) selected  @endif >مطلق \ مطلقة (مع اولاد)</option>
                                    <option value="ارمل" @if(isset($request->social_status) && $request->social_status == "ارمل"  || old('social_status') == "ارمل"   ) selected  @endif >ارمل \ ارملة</option>
                                    <option value="ارمل مع اولاد"  @if(isset($request->social_status) && $request->social_status == "ارمل مع اولاد"  || old('social_status') == "ارمل مع اولاد"   ) selected  @endif >ارمل \ ارملة (مع اولاد)</option>
                                    <option value="غير مهم"  @if(isset($request->social_status) && $request->social_status == "غير مهم"  ) selected  @endif >غير مهم</option>

                                </select>
                                @error('social_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="financial_status" class=" col-form-label text-md-left">الحالة المادية</label>

                            <div class="custom-input-field">
                                <select name="financial_status"  class="form-control" required >
                                    <option value="">اختر الحاله المادية</option>
                                    <option value="ضعيفة"  @if(isset($request->financial_status) && $request->financial_status == "ضعيفة"  || old('financial_status') == "ضعيفة" ) selected  @endif  >ضعيفة</option>
                                    <option value="متوسطة"  @if(isset($request->financial_status) && $request->financial_status == "متوسطة"  || old('financial_status') == "متوسطة") selected  @endif  >متوسطة</option>
                                    <option value="ممتازة"   @if(isset($request->social_status) && $request->financial_status == "ممتازة"  || old('financial_status') == "ممتازة") selected  @endif  >ممتازة</option>
                                    <option value="ممتازة جدا" @if(isset($request->financial_status) && $request->financial_status == "ممتازة جدا"  || old('financial_status') == "ممتازة جدا" ) selected  @endif   >ممتازة جدا</option>
                                    <option value="غير مهم"  @if(isset($request->financial_status) && $request->financial_status == "غير مهم"  ) selected  @endif  >غير مهم</option>

                                </select>
                                @error('financial_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="job_title" class=" col-form-label text-md-left">المسمى الوظيفى</label>

                            <div class="custom-input-field">
                                {!! Form::text('job_title',$edit ? $request->job_title : old('job_title'),['class' => 'form-control','required' => 'required']) !!}

                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="job_in" class=" col-form-label text-md-left">جهة العمل</label>

                            <div class="custom-input-field">
                                {!! Form::text('job_in',$edit ? $request->job_in : old('job_in'),['class' => 'form-control','required' => 'required']) !!}

                                @error('job_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="job_type" class=" col-form-label text-md-left">نوع الوظيفة</label>

                            <div class="custom-input-field">
                                <select name="job_type" required class="form-control" >
                                    <option value="">اختر نوع الوظيفة</option>
                                    <option value="طالب"  @if(isset($request->job_type) && $request->job_type == "طالب"  || old('job_type') == "طالب" ) selected  @endif   >طالب</option>
                                    <option value="حكومى"  @if(isset($request->job_type) && $request->job_type == "حكومى"  || old('job_type') == "حكومى" ) selected  @endif  >حكومى</option>
                                    <option value="خاص"  @if(isset($request->job_type) && $request->job_type == "خاص"  || old('job_type') == "خاص" ) selected  @endif  >خاص</option>
                                    <option value="بدون عمل"  @if(isset($request->job_type) && $request->job_type == "بدون عمل"  || old('job_type') == "بدون عمل" ) selected  @endif  >بدون عمل</option>
                                </select>
                                @error('job_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="monthly_income" class=" col-form-label text-md-left">الدخل الشهرى</label>

                            <div class="custom-input-field">
                                <select name="monthly_income"  class="form-control" required >
                                    <option value="">اختر الدخل الشهرى</option>
                                    <option value="1 – 3000" @if(isset($request->monthly_income) && $request->monthly_income == "1 – 3000"  || old('monthly_income') == "1 – 3000" ) selected  @endif >1 – 3000</option>
                                    <option value="3100 – 6000" @if(isset($request->monthly_income) && $request->monthly_income == "3100 – 6000"  || old('monthly_income') == "3100 – 6000" ) selected  @endif >3100 – 6000</option>
                                    <option value="6100 – 9000" @if(isset($request->monthly_income) && $request->monthly_income == "6100 – 9000"  || old('monthly_income') == "6100 – 9000" ) selected  @endif >6100 – 9000</option>
                                    <option value="9100 – 12000" @if(isset($request->monthly_income) && $request->monthly_income == "9100 – 12000"  || old('monthly_income') == "9100 – 12000" ) selected  @endif >9100 – 12000</option>
                                    <option value="12000 – 15000" @if(isset($request->monthly_income) && $request->monthly_income == "12000 – 15000"  || old('monthly_income') == "12000 – 15000" ) selected  @endif >12000 – 15000</option>
                                    <option value="اكثر من 15000" @if(isset($request->monthly_income) && $request->monthly_income == "اكثر من 15000"  || old('monthly_income') == "اكثر من 15000" ) selected  @endif >اكثر من 15000</option>
                                    <option value="غير مهم" @if(isset($request->monthly_income) && $request->monthly_income == "غير مهم" ) selected  @endif >غير مهم</option>

                                </select>
                                @error('monthly_income')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            @php
                            $options = array();
                            if(isset($request->options) && $request->options != null && $request->options != '')
                            {
                            
                            $options = explode(",",$request->options);
                            }

                            @endphp
                            
                            <label  class="col-sm-12 col-form-label text-md-left">عدم التنازل</label>

                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options1" @if(in_array("الجنسية",$options)) checked @endif  type="checkbox" name="options[]" value="الجنسية" >
                                  <label class="form-check-label" for="options1">الجنسية</label>
                                </div>

                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options2" @if(in_array("القبلية",$options)) checked @endif  type="checkbox" name="options[]" value="القبلية" >
                                  <label class="form-check-label" for="options2">القبلية</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options3" @if(in_array("المؤهل التعليمى",$options)) checked @endif  type="checkbox" name="options[]" value="المؤهل التعليمى" >
                                  <label class="form-check-label" for="options3">المؤهل التعليمى</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options4" @if(in_array("مكان الاقامة",$options)) checked @endif  type="checkbox" name="options[]" value="مكان الاقامة" >
                                  <label class="form-check-label" for="options4">مكان الاقامة</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options5"  @if(in_array("العمر",$options)) checked @endif type="checkbox" name="options[]" value="العمر" >
                                  <label class="form-check-label" for="options5">العمر</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options6" @if(in_array("التدين",$options)) checked @endif  type="checkbox" name="options[]" value="التدين" >
                                  <label class="form-check-label" for="options6">التدين</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options7" @if(in_array("الحالة الاجتماعية",$options)) checked @endif  type="checkbox" name="options[]" value="الحالة الاجتماعية" >
                                  <label class="form-check-label" for="options7">الحالة الاجتماعية</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options8" @if(in_array("طبيعة العمل",$options)) checked @endif  type="checkbox" name="options[]" value="طبيعة العمل" >
                                  <label class="form-check-label" for="options8">طبيعة العمل</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options9" @if(in_array("الحالة الصحية",$options)) checked @endif  type="checkbox" name="options[]" value="الحالة الصحية" >
                                  <label class="form-check-label" for="options9">الحالة الصحية</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options10" @if(in_array("التدخين",$options)) checked @endif  type="checkbox" name="options[]" value="التدخين" >
                                  <label class="form-check-label" for="options10">التدخين</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options11" @if(in_array("المسمى الوظيفى",$options)) checked @endif  type="checkbox" name="options[]" value="المسمى الوظيفى" >
                                  <label class="form-check-label" for="options11">المسمى الوظيفى</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options12" @if(in_array("جهة العمل",$options)) checked @endif  type="checkbox" name="options[]" value="جهة العمل" >
                                  <label class="form-check-label" for="options12">جهة العمل</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options14" @if(in_array("الحالة المادية",$options)) checked @endif  type="checkbox" name="options[]" value="الحالة المادية" >
                                  <label class="form-check-label" for="options14">الحالة المادية</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options15"  @if(in_array("الدخل الشهرى",$options)) checked @endif  type="checkbox" name="options[]" value="الدخل الشهرى" >
                                  <label class="form-check-label" for="options15">الدخل الشهرى</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options23"  @if(in_array("انواع الامراض",$options)) checked @endif type="checkbox" name="options[]" value="انواع الامراض" >
                                  <label class="form-check-label" for="options23">انواع الامراض</label>
                                </div>
                                
                                @if($gender == 'male')

                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options17" @if(in_array("عباءة الرأس",$options)) checked @endif  type="checkbox" name="options[]" value="عباءة الرأس" >
                                  <label class="form-check-label" for="options17">عباءة الرأس</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options18" @if(in_array("غطاء الوجة",$options)) checked @endif  type="checkbox" name="options[]" value="غطاء الوجة" >
                                  <label class="form-check-label" for="options18">غطاء الوجه</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options19" @if(in_array("تغطية الكفين",$options)) checked @endif  type="checkbox" name="options[]" value="تغطية الكفين" >
                                  <label class="form-check-label" for="options19">تغطية الكفين</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options20" @if(in_array("عدد الابناء",$options)) checked @endif  type="checkbox" name="options[]" value="عدد الابناء" >
                                  <label class="form-check-label" for="options20">عدد الابناء</label>
                                </div>

                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options26" @if(in_array("النقاب",$options)) checked @endif  type="checkbox" name="options[]" value="النقاب" >
                                  <label class="form-check-label" for="options26">النقاب</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options27" @if(in_array("الشعر",$options)) checked @endif  type="checkbox" name="options[]" value="الشعر" >
                                  <label class="form-check-label" for="options27">الشعر</label>
                                </div>
                                
                                @endif
                                @if($gender == 'female')
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options16" @if(in_array("التعدد",$options)) checked @endif  type="checkbox" name="options[]" value="التعدد" >
                                  <label class="form-check-label" for="options16">التعدد</label>
                                </div>
                                
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options24" @if(in_array("اللحية",$options)) checked @endif  type="checkbox" name="options[]" value="اللحية" >
                                  <label class="form-check-label" for="options24">اللحية</label>
                                </div>
                                @endif
                                
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options25" @if(in_array("الشكل",$options)) checked @endif  type="checkbox" name="options[]" value="الشكل" >
                                  <label class="form-check-label" for="options25">الشكل</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options26" @if(in_array("لون البشرة",$options)) checked @endif  type="checkbox" name="options[]" value="لون البشرة" >
                                  <label class="form-check-label" for="options26">لون البشرة</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options27" @if(in_array("الطول",$options)) checked @endif  type="checkbox" name="options[]" value="الطول" >
                                  <label class="form-check-label" for="options27">الطول</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options28" @if(in_array("الوزن",$options)) checked @endif  type="checkbox" name="options[]" value="الوزن" >
                                  <label class="form-check-label" for="options28">الوزن</label>
                                </div>
                                <div class="form-checkbox col-sm-3">
                                  <input class="form-check-input custom-checkbox" id="options29" @if(in_array("نوع الوظيفة",$options)) checked @endif  type="checkbox" name="options[]" value="نوع الوظيفة" >
                                  <label class="form-check-label" for="options29">نوع الوظيفة</label>
                                </div>

                        </div>

                        <button class="submit" type="submit">  انتقل الي مرحلة الاخيرة   </button>



                    {!! Form::close() !!}

@endsection
@section('scripts')

<script>
    $ = jQuery;
    var value = $('#health_status').val();
    $('#health_status').on('change', function() {
        console.log($('#health_status').val());
        if($(this).val() == 'مريض') {
            $('#diseaseForm').show();
            $('#disease').show();
            $('#disease').prop('required', true);


        }else {
            $('#diseaseForm').hide();
            $('#disease').hide();
            $('#disease').prop('required', false);


        }
    });
</script>
@endsection
