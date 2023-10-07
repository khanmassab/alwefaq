@extends('layouts.user')
@section('body_class')
    fill_data height_shop check__
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/style-new.css') }}">
<style>
    .select2-container {
        width: 60% !important;
    }
    .content-pages {
        background: #fff;
        border-radius: 0;
        margin-top: 0;
        margin-right: 0;
    }
</style>
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success"> {{ session()->get('success') }} </div>
    @endif

    @if (isset($errors) && count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if ($edit)
        {!! Form::open([
            'route' => ['marriage.update', $request->id],
            'method' => 'PUT',
            'files' => true,
            'id' => 'belongsTo_type-form',
            'class' => 'row form-reg',
        ]) !!}
    @else
        {!! Form::open(['route' => 'marriage.store', 'files' => true, 'id' => 'belongsTo_type-form', 'class' => 'row form-reg']) !!}
    @endif

    @csrf
    @php
        $gender = Auth::user()->gender;
    @endphp
    <h1> برجاء ملئ البيانات</h1>
    <h1 class="tit">البيانات الشخصية </h1>     
    <input type="hidden" value="1" name="request_type">
    <div class="rows col-12">
        <label for="first_name" >الاسم الاول</label>
        <div class="custom-input-field">
            <input id="first_name" type="text" class="input @error('first_name') is-invalid @enderror"
                name="first_name" readonly value="{{ Auth::user()->first_name }}" required autocomplete="name" autofocus>
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="rows col-12">
        <label for="middle_name" >الاسم الثانى</label>
        <div class="custom-input-field">
            <input id="middle_name" type="text" class="input @error('middle_name') is-invalid @enderror"
                name="middle_name" readonly value="{{ Auth::user()->middle_name }}" required autocomplete="name" autofocus>
            @error('middle_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="rows col-12">
        <label for="last_name" >اسم العائلة</label>
        <div class="custom-input-field">
            <input id="last_name" type="text" class="input @error('last_name') is-invalid @enderror"
                name="last_name" readonly value="{{ Auth::user()->last_name }}" required autocomplete="name" autofocus>
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="rows col-12">
        <label for="nationality" >الجنسية</label>
        <div class="custom-input-field">
            <select name="nationality_id" id="nationality" class="input select_" required="">
                <option value="">اختر الجنسية</option>
                @foreach ($nationalities as $nationality)
                    {{--                                    <option value="{{$nationality->id}}">{{$nationality->name}}</option> --}}
                    @if ($edit)
                        <option @if ($request->nationality_id == $nationality->id || $nationality->id == old('nationality_id')) selected="selected" @endif value="{{ $nationality->id }}">
                            {{ $nationality->name }}</option>
                    @else
                        <option @if ($nationality->id == old('nationality_id')) selected="selected" @endif
                            value="{{ $nationality->id }}">{{ $nationality->name }}</option>
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
    @if ($gender == 'male')
        <div class="rows col-12">
            <label for="qualification" >المؤهل</label>
            <div class="custom-input-field">
                <select name="qualification_id" id="qualification" class="input select_" required="">
                    <option value="">اختر المؤهل</option>
                    @foreach ($qualifications as $qualification)
                        {{--                                    <option value="{{$qualification->id}}">{{$qualification->name}}</option> --}}
                        @if ($edit)
                            <option @if ($request->qualification_id == $qualification->id || $qualification->id == old('qualification_id')) selected="selected" @endif
                                value="{{ $qualification->id }}">{{ $qualification->name }}</option>
                        @else
                            <option @if ($qualification->id == old('qualification_id')) selected="selected" @endif
                                value="{{ $qualification->id }}">{{ $qualification->name }}</option>
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
    @endif
    <div class="rows col-12">
        <label for="birthday_type" >نوع التاريخ</label>
        <div class="custom-input-field">
            <select name="birthday_type" id="btype" required class="input select_">
                <option value="">اختر نوع التاريخ</option>

                <option @if ((isset($request->birthday_type) && $request->birthday_type == 'ميلادى') || old('birthday_type') == 'ميلادى') selected @endif value="ميلادى">ميلادى</option>
                <option @if ((isset($request->birthday_type) && $request->birthday_type == 'هجرى') || old('birthday_type') == 'هجرى') selected @endif value="هجرى">هجرى</option>

            </select> @error('birthday_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="rows col-12" style="display:none;" id="birthdate">
        <label for="birthday" >تاريخ الميلاد</label>
        <div class="custom-input-field">
            <input id="birthday1" type="date" class="input @error('birthday') is-invalid @enderror"
                name="birthday"
                style="visibility:hidden;height:0px !important; width:0px !important;"
                value="{{ date('Y-m-d', strtotime(isset($request->birthday) ? $request->birthday : date('Y-m-d'))) ?: old('birthday') }}"
                @if ((isset($request->birthday) && $request->religion == 'متوسط') || old('religion') == 'متوسط') checked @endif autocomplete="date" autofocus readonly>

            <input id="birthday2" style="display:none;" type="text"
                style="visibility:hidden;height:0px !important; width:0px !important;"
                class="input @error('birthday') is-invalid @enderror" disabled="disabled" name="birthday"
                value="{{ isset($request->birthday) ?: old('birthday') }}" autocomplete="date" autofocus>


            @error('birthday')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


        </div>
    </div>
    <div class="rows col-12 marriage">
        <label >القبيلة</label>
        <div class="custom-input-field">
            <select name="tripe" id="btype" required class="input select_">
                <option value="">القبيلة</option>

                <option @if ((isset($request->tripe) && $request->tripe == 'نعم') || old('tripe') == 'نعم') selected @endif value="نعم">نعم</option>
                <option @if ((isset($request->tripe) && $request->tripe == 'لا') || old('tripe') == 'لا') selected @endif value="لا">لا</option>

            </select> 
            @error('tripe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <h1 class="tit">بيانات السكن  </h1>   


    <div class="rows col-12">
        <label for="city" >المنطقة</label>
        <div class="custom-input-field">
            <select name="city_id" id="city" class="input select_" required="">
                <option value="">اختر المنطقة</option>
                @foreach ($cities as $city)
                    {{--                                    <option value="{{$city->id}}">{{$city->name}}</option> --}}
                    @if ($edit)
                        <option @if ($request->city_id == $city->id || $city->id == old('city_id')) selected="selected" @endif value="{{ $city->id }}">
                            {{ $city->name }}</option>
                    @else
                        <option @if ($city->id == old('city_id')) selected="selected" @endif value="{{ $city->id }}">
                            {{ $city->name }}</option>
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
    <div class="rows col-12">
        <label for="province" >المحافظة</label>
        <div class="custom-input-field">
            {!! Form::text('province', $edit ? $request->province : old('province'), [
                'class' => 'input ',
                'required' => 'required',
            ]) !!}

            @error('province')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <h1 class="tit"> الصفات الشخصية  </h1>   
    
    
    @if ($gender == 'female')
        <div class="rows col-12 marriage">
            <label >غطاء للرأس</label>
            <div class="custom-input-field">
                <select name="head_cover" id="btype" required class="input select_">
                    <option value="">غطاء للرأس</option>

                    <option @if ((isset($request->head_cover) && $request->head_cover == 'نعم') || old('head_cover') == 'نعم') selected @endif value="نعم">نعم</option>
                    <option @if ((isset($request->head_cover) && $request->head_cover == 'لا') || old('head_cover') == 'لا') selected @endif value="لا">لا</option>

                </select>
                @error('head_cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="rows col-12 marriage">
            <label >النقاب</label>
            <div class="custom-input-field">
                <select name="body_cover" id="btype" required class="input select_">
                    <option value="">النقاب</option>

                    <option @if ((isset($request->body_cover) && $request->body_cover == 'نعم') || old('body_cover') == 'نعم') selected @endif value="نعم">نعم</option>
                    <option @if ((isset($request->body_cover) && $request->body_cover == 'لا') || old('body_cover') == 'لا') selected @endif value="لا">لا</option>

                </select>
                @error('body_cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="rows col-12 marriage">
            <label > غطاء للوجه</label>
            <div class="custom-input-field">
                <select name="face_cover" id="btype" required class="input select_">
                    <option value="">غطاء للوجه</option>

                    <option @if ((isset($request->face_cover) && $request->face_cover == 'نعم') || old('face_cover') == 'نعم') selected @endif value="نعم">نعم</option>
                    <option @if ((isset($request->face_cover) && $request->face_cover == 'لا') || old('face_cover') == 'لا') selected @endif value="لا">لا</option>

                </select>
                @error('face_cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="rows col-12 marriage">
            <label >غطاء لليدين</label>
            <div class="custom-input-field">
                <select name="hand_cover" id="btype" required class="input select_">
                    <option value="">غطاء لليدين</option>

                    <option @if ((isset($request->hand_cover) && $request->hand_cover == 'نعم') || old('hand_cover') == 'نعم') selected @endif value="نعم">نعم</option>
                    <option @if ((isset($request->hand_cover) && $request->hand_cover == 'لا') || old('hand_cover') == 'لا') selected @endif value="لا">لا</option>

                </select>
                @error('hand_cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    @endif
    <div class="rows col-12 marriage">
        <label >الشكل</label>
        <div class="custom-input-field">
            <select name="shape" id="btype" required class="input select_">
                <option value="">الشكل</option>

                <option @if ((isset($request->shape) && $request->shape == 'مقبول') || old('shape') == 'مقبول') selected @endif value="مقبول">مقبول</option>
                <option @if ((isset($request->shape) && $request->shape == 'جميل') || old('shape') == 'جميل') selected @endif value="جميل">جميل</option>
                <option @if ((isset($request->shape) && $request->shape == 'جميل جدا') || old('shape') == 'جميل جدا') selected @endif value="جميل جدا">جميل جدا</option>

            </select>
            @error('shape')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @if ($gender == 'male')
        <div class="rows col-12 marriage">
            <label >الشعر</label>
            <div class="custom-input-field">
                <select name="hair" id="btype" required class="input select_">
                    <option value="">الشعر</option>

                    <option @if ((isset($request->hair) && $request->hair == 'ناعم') || old('hair') == 'ناعم') selected @endif value="ناعم">ناعم</option>
                    <option @if ((isset($request->hair) && $request->hair == 'خشن') || old('hair') == 'خشن') selected @endif value="خشن">خشن</option>
                    <option @if ((isset($request->hair) && $request->hair == 'عادى') || old('hair') == 'عادى') selected @endif value="عادى">عادى</option>

                </select>
                @error('hair')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="rows col-12 marriage">
            <label >التدين</label>
            <div class="custom-input-field">
                <select name="religion" id="btype" required class="input select_">
                    <option value="">التدين</option>

                    <option @if ((isset($request->religion) && $request->religion == 'عالى') || old('religion') == 'عالى') selected @endif value="عالى">عالى</option>
                    <option @if ((isset($request->religion) && $request->religion == 'متوسط') || old('religion') == 'متوسط') selected @endif value="متوسط">متوسط</option>
                    <option @if ((isset($request->religion) && $request->religion == 'عادى') || old('religion') == 'عادى') selected @endif value="عادى">عادى</option>

                </select>
                @error('religion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="rows col-12 marriage">
            <label for="beared" >اللحية</label>
            <div class="custom-input-field">
                <select name="beared" required class="input select_">
                    <option value="">برجاء اختيار نوع اللحية</option>
                    <option @if ((isset($request->beared) && $request->beared == 'بدون لحية') || old('beared') == 'بدون لحية') selected @endif value="بدون لحية">بدون لحية</option>
                    <optgroup label="بلحية">
                        <option @if ((isset($request->beared) && $request->beared == 'لحية طويلة') || old('beared') == 'لحية طويلة') selected @endif value="لحية طويلة">لحية طويلة</option>
                        <option @if ((isset($request->beared) && $request->beared == 'لحية قصيرة') || old('beared') == 'لحية قصيرة') selected @endif value="لحية قصيرة">لحية قصيرة</option>
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
    <div class="rows col-12 marriage">
        <label >مدخن</label>
        <div class="custom-input-field">
            <select name="smoked" id="btype" required class="input select_">
                <option value="">مدخن</option>
                <option @if ((isset($request->smoked) && $request->smoked == 'نعم') || old('smoked') == 'نعم') selected @endif value="نعم">نعم</option>
                <option @if ((isset($request->smoked) && $request->smoked == 'لا') || old('smoked') == 'لا') selected @endif value="لا">لا</option>
            </select>
            @error('smoked')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="rows col-12 marriage">
        <label for="weight" >الوزن</label>
        <div class="custom-input-field">
            <select name="weight" required class="input select_">
                <option value="">اختر الوزن</option>
                <option value="50 – 60" @if ((isset($request->weight) && $request->weight == '50 – 60') || old('weight') == '50 – 60') selected @endif>50 – 60</option>
                <option value="61 – 70" @if ((isset($request->weight) && $request->weight == '61 – 70') || old('weight') == '61 – 70') selected @endif>61 – 70</option>
                <option value="71 – 80" @if ((isset($request->weight) && $request->weight == '71 – 80') || old('weight') == '71 – 80') selected @endif>71 – 80</option>
                <option value="81 – 90" @if ((isset($request->weight) && $request->weight == '81 – 90') || old('weight') == '81 – 90') selected @endif>81 – 90</option>
                <option value="91 – 100" @if ((isset($request->weight) && $request->weight == '91 – 100') || old('weight') == '91 – 100') selected @endif>91 – 100</option>
                <option value="101 – 110" @if ((isset($request->weight) && $request->weight == '101 – 110') || old('weight') == '101 – 110') selected @endif>101 – 110</option>
                <option value="111 – 120" @if ((isset($request->weight) && $request->weight == '111 – 120') || old('weight') == '111 – 120') selected @endif>111 – 120</option>
                <option value="121 – 130" @if ((isset($request->weight) && $request->weight == '121 – 130') || old('weight') == '121 – 130') selected @endif>121 – 130</option>
                <option value="131 – 140" @if ((isset($request->weight) && $request->weight == '131 – 140') || old('weight') == '131 – 140') selected @endif>131 – 140</option>
                <option value="141 – 150" @if ((isset($request->weight) && $request->weight == '141 – 150') || old('weight') == '141 – 150') selected @endif>141 – 150</option>
                <option value="151 – 160" @if ((isset($request->weight) && $request->weight == '151 – 160') || old('weight') == '151 – 160') selected @endif>151 – 160</option>
                <option value="161 – 170" @if ((isset($request->weight) && $request->weight == '161 – 170') || old('weight') == '161 – 170') selected @endif>161 – 170</option>
                <option value="171 – 180" @if ((isset($request->weight) && $request->weight == '171 – 180') || old('weight') == '171 – 180') selected @endif>171 – 180</option>

            </select>
            @error('weight')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="rows col-12 marriage">
        <label for="height" >الطول</label>
        <div class="custom-input-field">
            <select name="height" required class="input select_">
                <option value="">اختر الطول</option>
                <option value="140 – 130" @if ((isset($request->height) && $request->height == '140 – 130') || old('height') == '140 – 130') selected @endif>140 – 130</option>
                <option value="150 – 141" @if ((isset($request->height) && $request->height == '150 – 141') || old('height') == '150 – 141') selected @endif>150 – 141</option>
                <option value="160 – 151" @if ((isset($request->height) && $request->height == '160 – 151') || old('height') == '160 – 151') selected @endif>160 – 151</option>
                <option value="170 – 161" @if ((isset($request->height) && $request->height == '170 – 161') || old('height') == '170 – 161') selected @endif>170 – 161</option>
                <option value="180 – 171" @if ((isset($request->height) && $request->height == '180 – 171') || old('height') == '180 – 171') selected @endif>180 – 171</option>
                <option value="190 – 181" @if ((isset($request->height) && $request->height == '190 – 181') || old('height') == '190 – 181') selected @endif>190 – 181</option>
                <option value="200 – 191" @if ((isset($request->height) && $request->height == '200 – 191') || old('height') == '200 – 191') selected @endif>200 – 191</option>
                <option value="210 – 201" @if ((isset($request->height) && $request->height == '210 – 201') || old('height') == '210 – 201') selected @endif>210 – 201</option>

            </select>
            @error('height')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="rows col-12 marriage">
        <label for="skin_color" >لون البشرة</label>
        <div class="custom-input-field">
            <select name="skin_color" required class="input select_">
                <option value="">اختر لون البشرة</option>
                <option value="ابيض" @if ((isset($request->skin_color) && $request->skin_color == 'ابيض') || old('skin_color') == 'ابيض') selected @endif>ابيض</option>
                <option value="قمحى" @if ((isset($request->skin_color) && $request->skin_color == 'قمحى') || old('skin_color') == 'قمحى') selected @endif>قمحى</option>
                <option value="بنى" @if ((isset($request->skin_color) && $request->skin_color == 'بنى') || old('skin_color') == 'بنى') selected @endif>بنى</option>
                <option value="اسود" @if ((isset($request->skin_color) && $request->skin_color == 'اسود') || old('skin_color') == 'اسود') selected @endif>اسود</option>
            </select>
            @error('skin_color')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <h1 class="tit"> الحالة الصحية   </h1>   

    <div class="rows col-12 marriage">
        <label for="health_status" >الحاله الصحية</label>
        <div class="custom-input-field">

            <select name="health_status" id="health_status" required class="input select_">
                <option value="">اختر الحاله الصحية</option>
                <option value="صحى" @if ((isset($request->health_status) && $request->health_status == 'صحى') || old('health_status') == 'healthy') selected @endif>صحى</option>
                <option value="مريض" @if ((isset($request->health_status) && $request->health_status == 'مريض') || old('health_status') == 'sick') selected @endif>مريض</option>
            </select>
            @error('health_status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>

    <h1 class="tit"> الحالة الاجتماعية   </h1>   

    <div class="rows col-12" id="diseaseForm" style="display: none">
        <label for="disease" >نوع المرض</label>
        <div class="custom-input-field">
            <input id="disease" type="text" class="input" name="disease" autocomplete="name"
                style="display: none">
        </div>
    </div>

    <div class="rows col-12">
        <label for="social_status" >الحاله الاجتماعية</label>
        <div class="custom-input-field">
            <select name="social_status" required class="input select_">
                <option value="">برجاء اختيار الحاله الاجتماعية</option>
                <option value="اعزب" @if ((isset($request->social_status) && $request->social_status == 'اعزب') || old('social_status') == 'اعزب') selected @endif>اعزب \ عزباء</option>
                @if ($gender == 'male')
                    <option value="متزوج" @if ((isset($request->social_status) && $request->social_status == 'متزوج') || old('social_status') == 'متزوج') selected @endif>متزوج</option>
                @endif
                <option value="منفصل" @if ((isset($request->social_status) && $request->social_status == 'منفصل') || old('social_status') == 'منفصل') selected @endif>منفصل \ منفصلة</option>
                <option value="مطلق" @if ((isset($request->social_status) && $request->social_status == 'مطلق') || old('social_status') == 'مطلق') selected @endif>مطلق \ مطلقة</option>
                <option value="مطلق مع اولاد" @if (
                    (isset($request->social_status) && $request->social_status == 'مطلق مع اولاد') ||
                        old('social_status') == 'مطلق مع اولاد') selected @endif>مطلق \ مطلقة (مع اولاد)
                </option>
                <option value="ارمل" @if ((isset($request->social_status) && $request->social_status == 'ارمل') || old('social_status') == 'ارمل') selected @endif>ارمل \ ارملة</option>
                <option value="ارمل مع اولاد" @if (
                    (isset($request->social_status) && $request->social_status == 'ارمل مع اولاد') ||
                        old('social_status') == 'ارمل مع اولاد') selected @endif>ارمل \ ارملة (مع اولاد)
                </option>
            </select>
            @error('social_status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <h1 class="tit"> البيانات المادية   </h1>   

    <div class="rows col-12">
        <label for="financial_status" >الحاله المادية</label>
        <div class="custom-input-field">
            <select name="financial_status" required class="input select_">
                <option value="">اختر الحاله المادية</option>
                <option value="ضعيفة" @if ((isset($request->financial_status) && $request->financial_status == 'ضعيفة') || old('financial_status') == 'ضعيفة') selected @endif>ضعيفة</option>
                <option value="متوسطة" @if (
                    (isset($request->financial_status) && $request->financial_status == 'متوسطة') ||
                        old('financial_status') == 'متوسطة') selected @endif>متوسطة</option>
                <option value="ممتازة" @if ((isset($request->social_status) && $request->financial_status == 'ممتازة') || old('financial_status') == 'ممتازة') selected @endif>ممتازة</option>
                <option value="ممتازة جدا" @if (
                    (isset($request->financial_status) && $request->financial_status == 'ممتازة جدا') ||
                        old('financial_status') == 'ممتازة جدا') selected @endif>ممتازة جدا</option>

            </select>
            @error('financial_status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="rows col-12">
        <label for="monthly_income" >الدخل الشهرى</label>
        <div class="custom-input-field">
            <select name="monthly_income" required class="input select_">
                <option value="">اختر الدخل الشهرى</option>
                <option value="1 – 3000" @if ((isset($request->monthly_income) && $request->monthly_income == '1 – 3000') || old('monthly_income') == '1 – 3000') selected @endif>1 – 3000</option>
                <option value="3100 – 6000" @if (
                    (isset($request->monthly_income) && $request->monthly_income == '3100 – 6000') ||
                        old('monthly_income') == '3100 – 6000') selected @endif>3100 – 6000</option>
                <option value="6100 – 9000" @if (
                    (isset($request->monthly_income) && $request->monthly_income == '6100 – 9000') ||
                        old('monthly_income') == '6100 – 9000') selected @endif>6100 – 9000</option>
                <option value="9100 – 12000" @if (
                    (isset($request->monthly_income) && $request->monthly_income == '9100 – 12000') ||
                        old('monthly_income') == '9100 – 12000') selected @endif>9100 – 12000</option>
                <option value="12000 – 15000" @if (
                    (isset($request->monthly_income) && $request->monthly_income == '12000 – 15000') ||
                        old('monthly_income') == '12000 – 15000') selected @endif>12000 – 15000</option>
                <option value="اكثر من 15000" @if (
                    (isset($request->monthly_income) && $request->monthly_income == 'اكثر من 15000') ||
                        old('monthly_income') == 'اكثر من 15000') selected @endif>اكثر من 15000</option>
            </select>
            @error('monthly_income')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <h1 class="tit"> البيانات الوظيفية   </h1>   

    <div class="rows col-12">
        <label for="job_type" >نوع الوظيفة</label>
        <div class="custom-input-field">
            <select name="job_type" required class="input select_">
                <option value="طالب" @if ((isset($request->job_type) && $request->job_type == 'طالب') || old('job_type') == 'طالب') selected @endif>طالب</option>
                <option value="حكومى" @if ((isset($request->job_type) && $request->job_type == 'حكومى') || old('job_type') == 'حكومى') selected @endif>حكومى</option>
                <option value="خاص" @if ((isset($request->job_type) && $request->job_type == 'خاص') || old('job_type') == 'خاص') selected @endif>خاص</option>
                <option value="بدون عمل" @if ((isset($request->job_type) && $request->job_type == 'بدون عمل') || old('job_type') == 'بدون عمل') selected @endif>بدون عمل</option>

            </select>
            @error('job_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    

    <div class="rows col-12">
        <label for="job_title" >المسمى الوظيفى</label>
        <div class="custom-input-field">
            {!! Form::text('job_title', $edit ? $request->job_title : old('job_title'), [
                'class' => 'input',
                'required' => 'required',
            ]) !!}
            @error('job_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="rows col-12">
        <label for="job_in" >جهة العمل</label>
        <div class="custom-input-field">
            {!! Form::text('job_in', $edit ? $request->job_in : old('job_in'), [
                'class' => 'input',
                'required' => 'required',
            ]) !!}

            @error('job_in')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <h1 class="tit"> أخرى    </h1>   
    <div class="rows col-12">
        <label for="note" >الملاحظات</label>
        <div class="custom-input-field">
            <textarea id="note" placeholder="لكتابة الملاحظات والإضافات للطلب" rows="4"
                class="input  @error('note') is-invalid @enderror " autofocus name="note">{{ old('note') }}</textarea>
            @error('note')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 mb-0">
        <button type="submit" class="submit"> انتقل إلي مواصفات شريك حياتك </button>
    </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            if ($('#btype').val()) {
                $("#birthdate").show()

            }
            if ($('#btype').val() === "ميلادى") {

                $(".year").show();
                $(".month").show();
                $(".day").show();

            } else {
                $(".year").hide();
                $(".month").hide();
                $(".day").hide();

            }


        })
        // $(function(){

        $("#birthday1").dropdownDatepicker({
            wrapperClass: 'date-dropdowns',
            dropdownClass: null,
            dayLabel: 'يوم',
            monthLabel: 'شهر',
            yearLabel: 'سنه',
        });
        $('#btype').on('change', function() {
            $("#birthdate").hide()
            if (this.value == 'ميلادى') {
                $("#birthdate").show();
                $("#birthday2").hide();
                $("#birthday1").show();
                $(".year").show();
                $(".month").show();
                $(".day").show();
                $("#birthday1").prop("disabled", false);
                $("#birthday2").prop("disabled", true);
                $("#birthday1").on('change', function() {
                    var val = this.value.split('-');
                    if (val[0] > new Date().getFullYear()) {
                        $("#birthday1").val('');
                    }
                })
            }
            if (this.value == 'هجرى') {
                $("#birthdate").show();
                $("#birthday1").hide();
                $(".year").hide();
                $(".month").hide();
                $(".day").hide();
                $("#birthday2").show();
                $("#birthday1").prop("disabled", true);
                $("#birthday2").prop("disabled", false);
                $("#birthday2").hijriDatePicker({
                    hijri: true,
                    format: 'MM/DD/YYYY',
                    hijriFormat: 'iMM/iDD/iYYYY',
                    showSwitcher: false,
                    showClose: true,
                    showTodayButton: true,

                });

            }


        });
    </script>

    <script>
        $ = jQuery;
        var value = $('#health_status').val();
        $('#health_status').on('change', function() {
            console.log($('#health_status').val());
            if ($(this).val() == 'مريض') {
                $('#diseaseForm').show();
                $('#disease').show();
                $('#disease').prop('required', true);


            } else {
                $('#diseaseForm').hide();
                $('#disease').hide();
                $('#disease').prop('required', false);


            }
        });
    </script>
@endsection
