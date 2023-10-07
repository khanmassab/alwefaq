@extends('layouts.user')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if(session()->has('success'))
                   <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                   <div class="alert alert-success">
                        {{ session()->get('error') }}
                    </div>
                @endif

            <div class="card">

                <div class="item"><h2>شريك الحياه المرشح رقم
                 <strong>#{{ $partner->unique_id }}</strong></h2></div>

                <hr>
                <div class="card-body">
{{--                    {{$partner->id}}--}}
                    <form method="post" action="{{ route('matchRequest.store') }}">
                        @csrf
                        <input type="hidden" name="match_request_id" value="{{$partner->id}}" >
                        <input type="hidden" name="request_id" value="{{$request_id}}" >
                        <h3>
                            <table class="table table-bordered">

                            <tr>
                                <td><strong>تاريخ الميلاد</strong></td>
                                <td>{{ date('Y-m-d', strtotime($partner->user->birthday)) }}</td>
                            </tr>

                            <tr>
                                <td><strong>النوع</strong></td>
                                <td>{{ $partner->user->gender == 'female' ? 'انثى' : 'ذكر' }}</td>
                            </tr>


                            @if($partner->nationality_id != null )

                                <tr>
                                    <td><strong>الجنسية</strong></td>
                                    <td>{{ $partner->nationality->name }}</td>
                                </tr>
                            @endif
                            @if($partner->qualification_id != null )

                                <tr>
                                    <td><strong>المؤهل</strong></td>
                                    <td>{{ $partner->qualification->name }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td><strong>المنطقة</strong></td>
                                <td>{{ $partner->city->name }}</td>
                            </tr>
                                @if($partner->user->gender == 'male')

                                    <tr>
                                    <td><strong>المحافظة</strong></td>
                                    <td>{{ $partner->province }}</td>
                                    </tr>
                                @endif
                            <tr>
                                <td><strong>نوع تاريخ الميلاد</strong></td>
                                <td>{{ $partner->birthday_type }}</td>
                            </tr>
                            <tr>
                                <td><strong>تاريخ ميلاد الطلب</strong></td>
                                <td>{{ date('Y-m-d', strtotime($partner->user->birthday)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>العمر</strong></td>
                                <td>{{ $partner->age }}</td>
                            </tr>
                            <tr>
                                <td><strong>القبيلة</strong></td>
                                <td>{{ ($partner->tripe) ? "نعم" : "لا" }}</td>
                            </tr>
                            @if($partner->user->gender == 'female')
                                <tr>
                                    <td><strong>غطاء الرأس</strong></td>
                                    <td>{{ ($partner->head_cover) ? "نعم" : "لا" }}</td>
                                </tr>

                                <tr>
                                    <td><strong>غطاء الوجة</strong></td>
                                    <td>{{ ($partner->face_cover) ? "نعم" : "لا" }}</td>
                                </tr>

                                <tr>
                                    <td><strong>غطاء اليدين</strong></td>
                                    <td>{{ ($partner->hand_cover) ? "نعم" : "لا" }}</td>
                                </tr>
                                <tr>
                                    <td><strong>النقاب</strong></td>
                                    <td>{{ ($partner->body_cover) ? "نعم" : "لا" }}</td>
                                </tr>

                            @endif
                            <tr>
                                <td><strong>المظهر</strong></td>
                                <td>{{ $partner->shape }}</td>
                            </tr>

                            <tr>
                                <td><strong>الشعر</strong></td>
                                <td>{{ $partner->hair }}</td>
                            </tr>
                            @if($partner->user->gender == 'male')

                                <tr>
                                    <td><strong>اللحية</strong></td>
                                    <td>{{ $partner->beared }}</td>
                                </tr>

                            @endif
                            <tr>
                                <td><strong>التدخين</strong></td>
                                <td>{{ ($partner->smoked) ? "نعم" : "لا" }}</td>
                            </tr>
                            <tr>
                                <td><strong>التدين</strong></td>
                                <td>{{ $partner->religion }}</td>
                            </tr>
                            <tr>
                                <td><strong>الوزن</strong></td>
                                <td>{{ $partner->weight }}</td>
                            </tr>
                            <tr>
                                <td><strong>الطول</strong></td>
                                <td>{{ $partner->height }}</td>
                            </tr>
                            <tr>
                                <td><strong>لون البشرة</strong></td>
                                <td>{{ $partner->skin_color }}</td>
                            </tr>
                            <tr>
                                <td><strong>الحالة الصحية</strong></td>
                                <td>{{ $partner->health_status }}</td>
                            </tr>
                                @if($partner->health_status == 'مريض')
                                    <tr>
                                        <td><strong>نوع المرض</strong></td>
                                        <td>{{ $partner->disease }}</td>
                                    </tr>
                                @endif
                            <tr>
                                <td><strong>الحالة الاجتماعية</strong></td>
                                <td>{{ $partner->social_status }}</td>
                            </tr>
                            <tr>
                                <td><strong>الحالة المادية</strong></td>
                                <td>{{ $partner->financial_status }}</td>
                            </tr>
                            <tr>
                                <td><strong> المسمى الوظيفى</strong></td>
                                <td>{{ $partner->job_title }}</td>
                            </tr>
                            <tr>
                                <td><strong>جهة العمل</strong></td>
                                <td>{{ $partner->job_in }}</td>
                            </tr>
                            <tr>
                                <td><strong>نوع الوظيفة</strong></td>
                                <td>{{ $partner->job_type }}</td>
                            </tr>
                            <tr>
                                <td><strong>الدخل الشهرى</strong></td>
                                <td>{{ $partner->monthly_income }}</td>
                            </tr>
                            <tr>
                                <td><strong>ملاحظة</strong></td>
                                <td>{{ $partner->note }}</td>
                            </tr>
                            <tr>

                        </table>
                        </h3>
                        
                        @if(!$matched)

                        @if(!$checkMatchDone)
                        <p class="lead" style="display: inline-block;width: 60%;position: relative;top: 8px;">                        هل شريك الحياه المرشح لكم متوافق معك ؟
</p>
                        <button class="btn btn-primary" type="submit">متوافق معي</button>
                        @else
                        <div class="alert alert-success text-center">
                        <!--<p class="lead">-->
                             تم تقديم طلب التوافق بنجاح برقم
                             <strong>#{{$checkMatchDone->id}}</strong>
                        <!--</p>/-->
                        </div>
                        @endif
                        @else
                        
                        <div class="alert alert-success text-center">
                        <!--<p class="lead">-->
                             تم عمل توافق بالفعل مع شريك 
                        <!--</p>/-->
                        </div>
                        
                        @endif
                        
                    </form>
                    @if(!$checkMatchDone)

                    <form method="post" action="{{ route('mismatchRequest.store') }}">
                        @csrf
                        <input type="hidden" name="mismatch_request_id" value="{{$partner->id}}" >
                        <input type="hidden" name="request_id" value="{{$request_id}}" >
                                                <p class="lead" style="display: inline-block;width: 60%;position: relative;top: 8px;">                        اذا كان هذا المشرح غير متوافق معك يمكنك الضغط هنا لازلتة من قائمة المرشحين
</p>
                        <button class="btn btn-primary btn-danger" style="    background-color: #dc3545;" type="submit">الغاء المرشح</button>

                        
                    </form>
                        @endif

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
