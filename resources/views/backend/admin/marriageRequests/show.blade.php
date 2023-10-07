@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.marriageRequests'))
@section('page-heading', trans('app.marriageRequests'))
@else
    @section('page-title', trans('app.add_marriageRequests'))
@section('page-heading', trans('app.add_marriageRequests'))
@endif

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ mix('/vendor/libs/bootstrap-markdown/bootstrap-markdown.css') }}">
    <link rel="stylesheet" href="{{ mix('/vendor/libs/quill/typography.css') }}">
    <link rel="stylesheet" href="{{ mix('/vendor/libs/quill/editor.css') }}">
@endsection

@section('scripts')
    @parent
    <!-- Dependencies -->
    <script src="{{ mix('/vendor/libs/markdown/markdown.js') }}"></script>
    <script src="{{ mix('/vendor/libs/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
    <script>
        // Quill does not support IE 10 and below so don't load it to prevent console errors
        if (typeof document.documentMode !== 'number' || document.documentMode > 10) {
            document.write('\x3Cscript src="{{ mix('/vendor/libs/quill/quill.js') }}">\x3C/script>');
        }
    </script>

    <script type="application/javascript">
        // Quill
        $(function () {
            if (!window.Quill) {
                return $('#quill-editor,#quill-toolbar,#quill-bubble-editor,#quill-bubble-toolbar').remove();
            }
            var editor = new Quill('#quill-editor', {
                modules: {
                    toolbar: '#quill-toolbar'
                },
                placeholder: 'Type something',
                theme: 'snow',
            });

            // Get HTML content:
            //
            var form = document.getElementById('page-form');
            form.onsubmit = function() {
                // Populate hidden form on submit
                var content = document.querySelector('input[name=content]');
                content.value = (editor.root.innerHTML);
            };
        });
    </script>
@endsection

@section('content')
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.marriageRequest_details')
        </h6>
        <div class="card-body">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">

                        <table class="table table-hover">
                            <h2>بيانات المستخدم</h2>

                            <tbody>
                            <tr>
                                <td width="20%"><strong>رقم الطلب</strong></td>
                                <td>{{$request->unique_id}}</td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>اسم المستخدم</strong></td>
                                <td>{{ $request->user->first_name.' '.$request->user->middle_name.' '.$request->user->last_name }}</td>
                            </tr>

                            <tr>
                                <td><strong>تاريخ الميلاد</strong></td>
                                <td>{{ date('Y-m-d' , strtotime($request->birthday)) }}</td>
                            </tr>

                            <tr>
                                <td><strong>النوع</strong></td>
                                <td>{{  $request->user->gender == 'female' ? 'انثى' : 'ذكر'}}</td>
                            </tr>

                            <tr>
                                <td><strong>رقم الهاتف</strong></td>
                                <td>{{ $request->user->phoneNumber }}</td>
                            </tr>
                            @if($request->nationality_id != null )
                                <tr>
                                    <td><strong>الجنسية</strong></td>
                                    <td>{{ $request->nationality->name }}</td>
                                </tr>
                            @endif
                            @if($request->user->gender == 'male')
                                @if($request->qualification_id != null )

                                    <tr>
                                        <td><strong>المؤهل</strong></td>
                                        <td>{{ $request->qualification->name }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>المحافظة</strong></td>
                                        <td>{{ $request->province }}</td>
                                    </tr>
                                @endif
                            @endif
                            <tr>
                                <td><strong>المدينة</strong></td>
                                <td>{{ $request->city->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>القبيلة</strong></td>
                                <td>{{ ($request->tripe) ? "نعم" : "لا" }}</td>
                            </tr>
                            @if($request->user->gender == 'female')
                                <tr>
                                    <td><strong>غطاء الرأس</strong></td>
                                    <td>{{ ($request->head_cover) ? "نعم" : "لا" }}</td>
                                </tr>

                                <tr>
                                    <td><strong>غطاء الوجة</strong></td>
                                    <td>{{ ($request->face_cover) ? "نعم" : "لا" }}</td>
                                </tr>

                                <tr>
                                    <td><strong>غطاء اليد</strong></td>
                                    <td>{{ ($request->hand_cover) ? "نعم" : "لا" }}</td>
                                </tr>
                                <tr>
                                    <td><strong>النقاب</strong></td>
                                    <td>{{ ($request->body_cover) ? "نعم" : "لا" }}</td>
                                </tr>

                            @endif
                            <tr>
                                <td><strong>الشكل</strong></td>
                                <td>{{ $request->shape }}</td>
                            </tr>
                            @if($request->user->gender == 'male')

                                <tr>
                                    <td><strong>الشعر</strong></td>
                                    <td>{{ $request->hair }}</td>
                                </tr>

                                <tr>
                                    <td><strong>اللحية</strong></td>
                                    <td>{{ $request->beared }}</td>
                                </tr>

                            @endif
                            <tr>
                                <td><strong>التدخين</strong></td>
                                <td>{{ ($request->smoked) ? "نعم" : "لا" }}</td>
                            </tr>
                            @if($request->user->gender == 'male')

                                <tr>
                                    <td><strong>التدين</strong></td>
                                    <td>{{ $request->religion }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td><strong>الوزن</strong></td>
                                <td>{{ $request->weight }}</td>
                            </tr>
                            <tr>
                                <td><strong>الطول</strong></td>
                                <td>{{ $request->height }}</td>
                            </tr>
                            <tr>
                                <td><strong>لون البشرة</strong></td>
                                <td>{{ $request->skin_color }}</td>
                            </tr>
                            <tr>
                                <td><strong>الحالة الصحية</strong></td>
                                <td>{{ $request->health_status }}</td>
                            </tr>
                            @if($request->health_status == 'مريض')
                                <tr>
                                    <td><strong>نوع المرض</strong></td>
                                    <td>{{ $request->disease }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td><strong>الحالة الاجتماعية</strong></td>
                                <td>{{ $request->social_status }}</td>
                            </tr>
                            <tr>
                                <td><strong>الحالة المادية</strong></td>
                                <td>{{ $request->financial_status }}</td>
                            </tr>
                            <tr>
                                <td><strong> المسمى الوظيفى</strong></td>
                                <td>{{ $request->job_title }}</td>
                            </tr>
                            <tr>
                                <td><strong>جهة العمل</strong></td>
                                <td>{{ $request->job_in }}</td>
                            </tr>
                            <tr>
                                <td><strong>نوع الوظيفة</strong></td>
                                <td>{{ $request->job_type }}</td>
                            </tr>
                            <tr>
                                <td><strong>الدخل الشهرى</strong></td>
                                <td>{{ $request->monthly_income }}</td>
                            </tr>
                            <tr>
                                <td><strong>ملاحظة</strong></td>
                                <td>{{ $request->note }}</td>
                            </tr>
                            <!--<tr>-->
                            <!--    <td><strong>حالة الطلب</strong></td>-->
                            <!--    <td>{{ ($request->status) ? "تم" : "فى الانتظار" }}  </td>-->
                            <!--</tr>-->


                            </tbody>

                        </table>
                    </div>
                    <div class="col-md-6">

@if($partner)
                        <table class="table table-hover">

                            <h2>بيانات شريك الحياة</h2>
                            <tbody>
{{--                            <tr>--}}
{{--                                <td width="20%"><strong>رقم الطلب</strong></td>--}}
{{--                                <td>{{$partner->unique_id}}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td width="20%"><strong>اسم المستخدم</strong></td>--}}
{{--                                <td>{{ $partner->user->first_name.' '.$partner->user->middle_name.' '.$partner->user->last_name }}</td>--}}
{{--                            </tr>--}}

{{--                            <tr>--}}
{{--                                <td><strong>تاريخ الميلاد</strong></td>--}}
{{--                                <td>{{ date('Y-m-d' , strtotime($partner->user->birthday)) }}</td>--}}
{{--                            </tr>--}}

{{--                            <tr>--}}
{{--                                <td><strong>الجنسية</strong></td>--}}
{{--                                <td>{{  $partner->user->gender == 'female' ? 'انثى' : 'ذكر' }}</td>--}}
{{--                            </tr>--}}

{{--                            <tr>--}}
{{--                                <td><strong>رقم الهاتف</strong></td>--}}
{{--                                <td>{{ $partner->user->phoneNumber }}</td>--}}
{{--                            </tr>--}}
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
                                <td><strong>المدينة</strong></td>
                                <td>{{ $partner->city->name }}</td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td><strong>المحافظة</strong></td>--}}
{{--                                <td>{{ $partner->province }}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td><strong>نوع تاريخ الميلاد</strong></td>--}}
{{--                                <td>{{ $partner->birthday_type }}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td><strong>تاريخ ميلاد الطلب</strong></td>--}}
{{--                                <td>{{  date('Y-m-d' , strtotime( $partner->birthday)) }}</td>--}}
{{--                            </tr>--}}
                            <tr>
                                <td><strong>العمر</strong></td>
                                <td>{{ $partner->age }}</td>
                            </tr>
                            <tr>
                                <td><strong>القبيلة</strong></td>
                                <td>{{ ($partner->tripe) ? "نعم" : "لا" }}</td>
                            </tr>
                            @if($partner->user->gender == 'male')
                                <tr>
                                    <td><strong>غطاء الرأس</strong></td>
                                    <td>{{ ($partner->head_cover) ? "نعم" : "لا" }}</td>
                                </tr>

                                <tr>
                                    <td><strong>غطاء الوجة</strong></td>
                                    <td>{{ ($partner->face_cover) ? "نعم" : "لا" }}</td>
                                </tr>

                                <tr>
                                    <td><strong>غطاء اليد</strong></td>
                                    <td>{{ ($partner->hand_cover) ? "نعم" : "لا" }}</td>
                                </tr>
                                <tr>
                                    <td><strong>النقاب</strong></td>
                                    <td>{{ ($partner->body_cover) ? "نعم" : "لا" }}</td>
                                </tr>

                            @endif
                            <tr>
                                <td><strong>الشكل</strong></td>
                                <td>{{ $partner->shape }}</td>
                            </tr>
                            @if($partner->hair != null )
                            <tr>
                                <td><strong>الشعر</strong></td>
                                <td>{{ $partner->hair }}</td>
                            </tr>
                            @endif
                            @if($partner->user->gender == 'female')

                                <tr>
                                    <td><strong>اللحية</strong></td>
                                    <td>{{ $partner->beared }}</td>
                                </tr>

                            @endif
                            <tr>
                                <td><strong>التدخين</strong></td>
                                <td>{{ ($partner->smoked) ? "نعم" : "لا" }}</td>
                            </tr>
                            @if($partner->religion != null )
                            <tr>
                                <td><strong>التدين</strong></td>
                                <td>{{ $partner->religion }}</td>
                            </tr>
                            @endif
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
                            <!--<tr>-->
                            <!--    <td><strong>ملاحظة</strong></td>-->
                            <!--    <td>{{ $partner->note }}</td>-->
                            <!--</tr>-->
                            <!--<tr>-->
                            <!--    <td><strong>حالة الطلب</strong></td>-->
                            <!--    <td>{{ $partner->status ? "فى الانتظار" : "تم" }}</td>-->
                            <!--</tr>-->

                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div class="col-md-12">
                        @if($edit)
                            {!! Form::open(['route' => ['marriageRequests.update',$request->id], 'method' => 'PUT','files' => true, 'id' => 'page-form']) !!}
                        @else
                            {!! Form::open(['route' => 'marriageRequests.store', 'files' => true, 'id' => 'page-form']) !!}
                        @endif

{{--                        <div class="form-group row">--}}
{{--                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.status')</label>--}}
{{--                            <div class="col-sm-10">--}}

{{--                                <select class="form-control" name="status" required>--}}
{{--                                    <option value="0">بالانتظار</option>--}}
{{--                                    <option value="1">تم الموافقة</option>--}}
{{--                                    <option value="2">تم الالغاء</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="form-group row">--}}
{{--                            <div class="col-sm-10 ml-sm-auto">--}}
{{--                                <button type="submit" class="btn rounded-pill btn-success">--}}
{{--                                    @if($edit)--}}
{{--                                        @lang('app.update')--}}
{{--                                    @else--}}
{{--                                        @lang('app.save')--}}
{{--                                    @endif--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
