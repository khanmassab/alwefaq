@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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


            <div class="card">

                <div class="card-header">{{ __('Add Partner Request1') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('partner.store') }}">
                        @csrf
                        @php
                            $gender = Auth::user()->gender;
                        @endphp

                        <input type="hidden"  value="2" name="request_type">
                        @if($gender == 'female')
                        <div class="form-group row">
                            <label for="qualification" class="col-md-4 col-form-label text-md-right">Qualification</label>

                            <div class="col-md-4">
                                <select name="qualification_id" id="qualification" class="form-control" required="required">
                                    <option value="">Select Qualification</option>
                                    @foreach($qualifications as $qualification)
                                    <option value="{{$qualification->id}}">{{$qualification->name}}</option>
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

                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">Nationality</label>

                            <div class="col-md-4">
                                <select name="nationality_id" id="nationality" class="form-control" required="required">
                                    <option value="">Select Nationality</option>
                                    @foreach($nationalities as $nationality)
                                    <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                    @endforeach
                                </select>

                                @error('nationality_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-4">
                                <select name="city_id" id="city" class="form-control" required="required">
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>

                                @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>

                            <div class="col-md-4">
                                <select name="age" required="required" id="age" class="form-control" >
                                    <option value="">Select Age</option>
                                    <option value="23 - 18" >23 - 18</option>
                                    <option value="29 - 24" >29 - 24</option>
                                    <option value="35 - 30" >35 - 30</option>
                                    <option value="41 - 36" >41 - 36</option>
                                    <option value="47 - 42" >47 - 42</option>
                                    <option value="53 - 48" >53 - 48</option>
                                    <option value="69 - 54" >69 - 54</option>
                                    <option value="75 - 70" >75 - 70</option>
                                    <option value="81 - 76" >81 - 76</option>
                                    <option value="87 - 82" >87 - 82</option>
                                    <option value="93 - 88" >93 - 88</option>
                                    <option value="100 – 94" >100 – 94</option>
                                </select>
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-left">Tripe</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="tripe" id="tripeyes" value="1" required>
                                  <label class="form-check-label" for="tripeyes">yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="tripe" id="tripeno" value="0">
                                  <label class="form-check-label" for="tripeno">no</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="tripe" id="tripenull" value="">
                                  <label class="form-check-label" for="tripenull">Doesn't Matter</label>
                                </div>

                                @error('tripe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if($gender == 'male')
                        <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-left">Head Cover</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="head_cover" id="head1" value="1" required >
                                  <label class="form-check-label" for="head1">yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="head_cover" id="head2" value="0">
                                  <label class="form-check-label" for="head2">no</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="head_cover" id="head3" value="">
                                  <label class="form-check-label" for="head3">Doesn't Matter</label>
                                </div>

                                @error('head_cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-left">Body Cover</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="body_cover" id="body1" value="1" required >
                                  <label class="form-check-label" for="body1">yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="body_cover" id="body2" value="0">
                                  <label class="form-check-label" for="body2">no</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="body_cover" id="body3" value="">
                                  <label class="form-check-label" for="body3">Doesn't Matter</label>
                                </div>

                                @error('body_cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-left">Face Cover</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="face_cover" id="face1" value="1" required >
                                  <label class="form-check-label" for="face1">yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="face_cover" id="face2" value="0">
                                  <label class="form-check-label" for="face2">no</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="face_cover" id="face3" value="">
                                  <label class="form-check-label" for="face3">Doesn't Matter</label>
                                </div>

                                @error('face_cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-left">Hand Cover</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="hand_cover" id="hand1" value="1" required >
                                  <label class="form-check-label" for="hand1">yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="hand_cover" id="hand2" value="0">
                                  <label class="form-check-label" for="hand2">no</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="hand_cover" id="hand3" value="">
                                  <label class="form-check-label" for="hand3">Doesn't Matter</label>
                                </div>


                                @error('hand_cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @endif
                                           @if($gender == 'female')

                        <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-left">Hair</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="hair" id="hair1" value="smooth" required >
                                  <label class="form-check-label" for="hair1">Smooth</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="hair" id="hair2" value="rought">
                                  <label class="form-check-label" for="hair2">Rought</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="hair" id="hair3" value="normal">
                                  <label class="form-check-label" for="hair3">Normal</label>
                                </div>

                                @error('hair')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-left">Religion</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="religion" id="religion1" value="high" required >
                                  <label class="form-check-label" for="religion1">High</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="religion" id="religion2" value="medium">
                                  <label class="form-check-label" for="religion2">Medium</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="religion" id="religion3" value="normal">
                                  <label class="form-check-label" for="religion3">Normal</label>
                                </div>

                                @error('hair')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="beared" class="col-md-4 col-form-label text-md-right">Beared</label>

                            <div class="col-md-4">
                                <select name="beared" required class="form-control" >
                                    <option value="">Select Beared Type</option>

                                    <option value="بدون لحية" >Without Beared</option>
                                    <optgroup label="بلحية">
                                        <option value="Long Beared">Long Beared</option>
                                        <option value="Short Beared">Short Beared</option>
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
                        <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-left">Shape</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="shape" id="shape1" value="accepted" required >
                                  <label class="form-check-label" for="shape1">accepted</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="shape" id="shape2" value="beautiful">
                                  <label class="form-check-label" for="shape2">beautiful</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="shape" id="shape3" value="very beautiful">
                                  <label class="form-check-label" for="shape3">very beautiful</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="shape" id="shape4" value="">
                                  <label class="form-check-label" for="shape4">Doesn't Matter</label>
                                </div>

                                @error('shape')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-left">Smooker</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="smoked" id="smoked2" value="1" required >
                                  <label class="form-check-label" for="smoked2">yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="smoked" id="smoked1" value="0">
                                  <label class="form-check-label" for="smoked1">no</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="smoked" id="smoked3" value="">
                                  <label class="form-check-label" for="smoked3">Doesn't Matter</label>
                                </div>

                                @error('smoked')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">Weight</label>

                            <div class="col-md-4">
                                <select name="weight" required class="form-control" >
                                    <option value="">Select Weight</option>
                                    <option value="50 – 60" >50 – 60</option>
                                    <option value="61 – 70" >61 – 70</option>
                                    <option value="71 – 80" >71 – 80</option>
                                    <option value="81 – 90" >81 – 90</option>
                                    <option value="91 – 100" >91 – 100</option>
                                    <option value="101 – 110" >101 – 110</option>
                                    <option value="111 – 120" >111 – 120</option>
                                    <option value="121 – 130" >121 – 130</option>
                                    <option value="131 – 140" >131 – 140</option>
                                    <option value="141 – 150" >141 – 150</option>
                                    <option value="151 – 160" >151 – 160</option>
                                    <option value="161 – 170" >161 – 170</option>
                                    <option value="171 – 180" >171 – 180</option>
                                </select>
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">Height</label>

                            <div class="col-md-4">
                                <select name="height" required class="form-control" >
                                    <option value="">Select Height</option>
                                    <option value="140 – 130" >140 – 130</option>
                                    <option value="150 – 141" >150 – 141</option>
                                    <option value="160 – 151" >160 – 151</option>
                                    <option value="170 – 161" >170 – 161</option>
                                    <option value="180 – 171" >180 – 171</option>
                                    <option value="190 – 181" >190 – 181</option>
                                    <option value="200 – 191" >200 – 191</option>
                                    <option value="210 – 201" >210 – 201</option>
                                </select>
                                @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="skin_color" class="col-md-4 col-form-label text-md-right">Skin Color</label>

                            <div class="col-md-4">
                                <select name="skin_color"  class="form-control" >
                                    <option value="">Select Skin Color</option>
                                    <option value="wight" >Wight</option>
                                    <option value="wheatgrass" >Wheatgrass</option>
                                    <option value="brown" >Brown</option>
                                    <option value="black" >Black</option>
                                    <option value="" >Doesn't Matter</option>
                                </select>
                                @error('skin_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="health_status" class="col-md-4 col-form-label text-md-right">Health Status</label>

                            <div class="col-md-4">
                                <select name="health_status"  class="form-control" >
                                    <option value="">Select Health Status</option>
                                    <option value="healthy" >healthy</option>
                                    <option value="sick" >sick</option>
                                        <option value="" >Doesn't Matter</option>

                                </select>
                                @error('health_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="social_status" class="col-md-4 col-form-label text-md-right">Social Status</label>

                            <div class="col-md-4">
                                <select name="social_status"  class="form-control" >
                                    <option value="">Select Social Status</option>
                                    <option value="single" >Single</option>
                                    <option value="married" >Married</option>
                                    <option value="broke" >Broke</option>
                                    <option value="divorced" >Divorced</option>
                                    <option value="divorced with kides" >Divorced with Kides</option>
                                    <option value="widower" >Widower</option>
                                    <option value="widower with kides" >Widower with Kides</option>
                                            <option value="" >Doesn't Matter</option>

                                </select>
                                @error('social_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="financial_status" class="col-md-4 col-form-label text-md-right">Financial Status</label>

                            <div class="col-md-4">
                                <select name="financial_status"  class="form-control" >
                                    <option value="">Select Financial Status</option>
                                    <option value="weak" >Weak</option>
                                    <option value="medium" >Medium</option>
                                    <option value="excellent" >Excellent</option>
                                    <option value="very excellent" >Very Excellent</option>
                                            <option value="" >Doesn't Matter</option>

                                </select>
                                @error('financial_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="job_title" class="col-md-4 col-form-label text-md-right">Job Title</label>

                            <div class="col-md-4">
                                <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autocomplete="name" autofocus>

                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="job_in" class="col-md-4 col-form-label text-md-right">Employeer</label>

                            <div class="col-md-4">
                                <input id="job_in" type="text" class="form-control @error('job_in') is-invalid @enderror" name="job_in" value="{{ old('job_in') }}" required autocomplete="name" autofocus>

                                @error('job_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="job_type" class="col-md-4 col-form-label text-md-right">Job Type</label>

                            <div class="col-md-4">
                                <select name="job_type" required class="form-control" >
                                    <option value="">Select Job Type</option>
                                    <option value="student" >Student</option>
                                    <option value="govenimental" >Governimental</option>
                                    <option value="private" >Private</option>
                                    <option value="without Job" >Without Job</option>
                                </select>
                                @error('job_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="monthly_income" class="col-md-4 col-form-label text-md-right">Monthly Income</label>

                            <div class="col-md-4">
                                <select name="monthly_income"  class="form-control" >
                                    <option value="">Select Monthly Income</option>
                                    <option value="1 – 3000" >1 – 3000</option>
                                    <option value="3100 – 6000" >3100 – 6000</option>
                                    <option value="6100 – 9000" >6100 – 9000</option>
                                    <option value="9100 – 12000" >9100 – 12000</option>
                                    <option value="12000 – 15000" >12000 – 15000</option>
                                    <option value="More than 15000" >More than 15000</option>
                                    <option value="" >Doesn't Matter</option>

                                </select>
                                @error('monthly_income')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
