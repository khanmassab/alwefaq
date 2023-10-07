@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.matchRequests'))
@section('page-heading', trans('app.matchRequests'))
@else
    @section('page-title', trans('app.add_matchRequests'))
@section('page-heading', trans('app.add_matchRequests'))
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
            @lang('app.matchRequest_details')
        </h6>
        <div class="card-body">
            <div class="container">
                <div class="row">

            <div class="col-md-6">

            <table class="table table-hover">

                <tbody>
                <tr>
                    <td width="20%"><strong>رقم الطلب</strong></td>
                    <td>{{$partner_request->unique_id}}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>اسم المستخدم</strong></td>
                    <td>{{ $partner_request->user->first_name.' '.$partner_request->user->middle_name.' '.$partner_request->user->last_name }}</td>
                </tr>

                <tr>
                    <td><strong>تاريخ الميلاد</strong></td>
                    <td>{{ date('Y-m-d' , strtotime($partner_request->user->birthday)) }}</td>
                </tr>

                <tr>
                    <td><strong>النوع</strong></td>
                    <td>{{  $partner_request->user->gender == 'female' ? 'انثى' : 'ذكر'}}</td>
                </tr>

                <tr>
                    <td><strong>رقم الهاتف</strong></td>
                    <td>{{ $partner_request->user->phoneNumber }}</td>
                </tr>
                @if($partner_request->nationality_id != null )
                <tr>
                    <td><strong>الجنسية</strong></td>
                    <td>{{ $partner_request->nationality->name }}</td>
                </tr>
                @endif
                @if($partner_request->user->gender == 'female')
                @if($partner_request->qualification_id != null )
                <tr>
                    <td><strong>المؤهل</strong></td>
                    <td>{{ $partner_request->qualification->name }}</td>
                </tr>
                @endif
                @endif
                <tr>
                    <td><strong>المدينة</strong></td>
                    <td>{{ $partner_request->city->name }}</td>
                </tr>
                <tr>
                    <td><strong>القبلية</strong></td>
                    <td>{{ ($partner_request->tripe) ? "نعم" : "لا" }}</td>
                </tr>
                @if($partner_request->user->gender == 'male')
                <tr>
                    <td><strong>غطاء الرأس</strong></td>
                    <td>{{ ($partner_request->head_cover) ? "نعم" : "لا" }}</td>
                </tr>

                <tr>
                    <td><strong>غطاء الوجة</strong></td>
                    <td>{{ ($partner_request->face_cover) ? "نعم" : "لا" }}</td>
                </tr>

                <tr>
                    <td><strong>غطاء الوجة</strong></td>
                    <td>{{ ($partner_request->hand_cover) ? "نعم" : "لا" }}</td>
                </tr>
                <tr>
                    <td><strong>النقاب</strong></td>
                    <td>{{ ($partner_request->body_cover) ? "نعم" : "لا" }}</td>
                </tr>

                @endif
                <tr>
                    <td><strong>المظهر</strong></td>
                    <td>{{ $partner_request->shape }}</td>
                </tr>
                    @if($partner_request->user->gender == 'female')

                <tr>
                    <td><strong>الشعر</strong></td>
                    <td>{{ $partner_request->hair }}</td>
                </tr>
                    @endif
                @if($partner_request->user->gender == 'female')

                <tr>
                    <td><strong>اللحية</strong></td>
                    <td>{{ $partner_request->beared }}</td>
                </tr>

                @endif
                <tr>
                    <td><strong>التدخين</strong></td>
                    <td>{{ ($partner_request->smoked) ? "نعم" : "لا" }}</td>
                </tr>
                @if($partner_request->user->gender == 'female')

                <tr>
                    <td><strong>التدين</strong></td>
                    <td>{{ $partner_request->religion }}</td>
                </tr>
                @endif
                <tr>
                    <td><strong>الوزن</strong></td>
                    <td>{{ $partner_request->weight }}</td>
                </tr>
                <tr>
                    <td><strong>الطول</strong></td>
                    <td>{{ $partner_request->height }}</td>
                </tr>
                <tr>
                    <td><strong>لون البشرة</strong></td>
                    <td>{{ $partner_request->skin_color }}</td>
                </tr>
                <tr>
                    <td><strong>الحالة الصحية</strong></td>
                    <td>{{ $partner_request->health_status }}</td>
                </tr>

                @if($partner_request->health_status == 'مريض')
                    <tr>
                        <td><strong>نوع المرض</strong></td>
                        <td>{{ $partner_request->disease }}</td>
                    </tr>
                @endif

                <tr>
                    <td><strong>الحالة الاجتماعية</strong></td>
                    <td>{{ $partner_request->social_status }}</td>
                </tr>
                <tr>
                    <td><strong>الحالة المادية</strong></td>
                    <td>{{ $partner_request->financial_status }}</td>
                </tr>
                <tr>
                    <td><strong> المسمى الوظيفى</strong></td>
                    <td>{{ $partner_request->job_title }}</td>
                </tr>
                <tr>
                    <td><strong>جهة العمل</strong></td>
                    <td>{{ $partner_request->job_in }}</td>
                </tr>
                <tr>
                    <td><strong>نوع الوظيفة</strong></td>
                    <td>{{ $partner_request->job_type }}</td>
                </tr>
                <tr>
                    <td><strong>الدخل الشهرى</strong></td>
                    <td>{{ $partner_request->monthly_income }}</td>
                </tr>
                <tr>
                    <td><strong>حالة الطلب</strong></td>
                    <td>{{ ($partner_request->status) ? "تم" : "فى الانتظار" }}  </td>
                </tr>
                @if($marriage_request->options != null ) 
                <tr>
                    <td><strong>عدم التنازل</strong></td>
                    <td>{{$marriage_request->options}}</td>
                </tr>
                @endif


                </tbody>

            </table>
            </div>
            <div class="col-md-6">


            <table class="table table-hover">

                <tbody>
                <tr>
                    <td width="20%"><strong>رقم الطلب</strong></td>
                    <td>{{$marriage_request->unique_id}}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>اسم المستخدم</strong></td>
                    <td>{{ $marriage_request->user->first_name.' '.$marriage_request->user->middle_name.' '.$marriage_request->user->last_name }}</td>
                </tr>

                <tr>
                    <td><strong>تاريخ الميلاد</strong></td>
                    <td>{{ date('Y-m-d' , strtotime($marriage_request->user->birthday)) }}</td>
                </tr>

                <tr>
                    <td><strong>الجنسية</strong></td>
                    <td>{{  $marriage_request->user->gender == 'female' ? 'انثى' : 'ذكر' }}</td>
                </tr>

                <tr>
                    <td><strong>رقم الهاتف</strong></td>
                    <td>{{ $marriage_request->user->phoneNumber }}</td>
                </tr>
                @if($marriage_request->nationality_id != null )

                <tr>
                    <td><strong>الجنسية</strong></td>
                    <td>{{ $marriage_request->nationality->name }}</td>
                </tr>
                    @endif
                    @if($marriage_request->qualification_id != null )

                <tr>
                    <td><strong>المؤهل</strong></td>
                    <td>{{ $marriage_request->qualification->name }}</td>
                </tr>
                    @endif
                <tr>
                    <td><strong>المدينة</strong></td>
                    <td>{{ $marriage_request->city->name }}</td>
                </tr>
                @if($marriage_request->user->gender == 'male')

                    <tr>
                    <td><strong>المحافظة</strong></td>
                    <td>{{ $marriage_request->province }}</td>
                </tr>
                @endif
                <tr>
                    <td><strong>نوع تاريخ الميلاد</strong></td>
                    <td>{{ $marriage_request->birthday_type }}</td>
                </tr>
                <tr>
                    <td><strong>تاريخ ميلاد الطلب</strong></td>
                    <td>{{  date('Y-m-d' , strtotime( $marriage_request->birthday)) }}</td>
                </tr>
                <tr>
                    <td><strong>العمر</strong></td>
                    <td>{{ $marriage_request->age }}</td>
                </tr>
                <tr>
                    <td><strong>القبلية</strong></td>
                    <td>{{ ($marriage_request->tripe) ? "نعم" : "لا" }}</td>
                </tr>
                @if($marriage_request->user->gender == 'female')
                <tr>
                    <td><strong>غطاء الرأس</strong></td>
                    <td>{{ ($marriage_request->head_cover) ? "نعم" : "لا" }}</td>
                </tr>

                <tr>
                    <td><strong>غطاء الوجة</strong></td>
                    <td>{{ ($marriage_request->face_cover) ? "نعم" : "لا" }}</td>
                </tr>

                <tr>
                    <td><strong>غطاء الوجة</strong></td>
                    <td>{{ ($marriage_request->hand_cover) ? "نعم" : "لا" }}</td>
                </tr>
                <tr>
                    <td><strong>النقاب</strong></td>
                    <td>{{ ($marriage_request->body_cover) ? "نعم" : "لا" }}</td>
                </tr>

                @endif
                <tr>
                    <td><strong>المظهر</strong></td>
                    <td>{{ $marriage_request->shape }}</td>
                </tr>
                <tr>
                    <td><strong>الشعر</strong></td>
                    <td>{{ $marriage_request->hair }}</td>
                </tr>
                @if($marriage_request->user->gender == 'male')

                <tr>
                    <td><strong>اللحية</strong></td>
                    <td>{{ $marriage_request->beared }}</td>
                </tr>

                @endif
                <tr>
                    <td><strong>التدخين</strong></td>
                    <td>{{ ($marriage_request->smoked) ? "نعم" : "لا" }}</td>
                </tr>
                <tr>
                    <td><strong>التدين</strong></td>
                    <td>{{ $marriage_request->religion }}</td>
                </tr>
                <tr>
                    <td><strong>الوزن</strong></td>
                    <td>{{ $marriage_request->weight }}</td>
                </tr>
                <tr>
                    <td><strong>الطول</strong></td>
                    <td>{{ $marriage_request->height }}</td>
                </tr>
                <tr>
                    <td><strong>لون البشرة</strong></td>
                    <td>{{ $marriage_request->skin_color }}</td>
                </tr>
                <tr>
                    <td><strong>الحالة الصحية</strong></td>
                    <td>{{ $marriage_request->health_status }}</td>
                </tr>
                @if($marriage_request->health_status == 'مريض')
                    <tr>
                        <td><strong>نوع المرض</strong></td>
                        <td>{{ $marriage_request->disease }}</td>
                    </tr>
                @endif
                <tr>
                    <td><strong>الحالة الاجتماعية</strong></td>
                    <td>{{ $marriage_request->social_status }}</td>
                </tr>
                <tr>
                    <td><strong>الحالة المادية</strong></td>
                    <td>{{ $marriage_request->financial_status }}</td>
                </tr>
                <tr>
                    <td><strong> المسمى الوظيفى</strong></td>
                    <td>{{ $marriage_request->job_title }}</td>
                </tr>
                <tr>
                    <td><strong>جهة العمل</strong></td>
                    <td>{{ $marriage_request->job_in }}</td>
                </tr>
                <tr>
                    <td><strong>نوع الوظيفة</strong></td>
                    <td>{{ $marriage_request->job_type }}</td>
                </tr>
                <tr>
                    <td><strong>الدخل الشهرى</strong></td>
                    <td>{{ $marriage_request->monthly_income }}</td>
                </tr>
                <tr>
                    <td><strong>ملاحظة</strong></td>
                    <td>{{ $marriage_request->note }}</td>
                </tr>
                <tr>
                    <td><strong>حالة الطلب</strong></td>
                    <td>{{ $marriage_request->status ? "فى الانتظار" : "تم" }}</td>
                </tr>
                @if($marriage_request->options != null ) 
                <tr>
                    <td><strong>عدم التنازل</strong></td>
                    <td>{{$marriage_request->options}}</td>
                </tr>
                @endif
                </tbody>
            </table>
            </div>
                    <div class="col-md-12">
                            @if($edit)
        {!! Form::open(['route' => ['matchRequests.update',$matchRequest->id], 'method' => 'PUT','files' => true, 'id' => 'page-form']) !!}
    @else
        {!! Form::open(['route' => 'matchRequests.store', 'files' => true, 'id' => 'page-form']) !!}
    @endif

            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.status')</label>
                <div class="col-sm-10">

                    <select class="form-control" name="status" required>
                        <option value="0" @if($matchRequest->status== 0)  selected @endif>بالانتظار</option>
                        <option value="1" @if($matchRequest->status== 1)  selected @endif>تم الموافقة</option>
                        <option value="2" @if($matchRequest->status== 2)  selected @endif>تم الالغاء</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 ml-sm-auto">
                    <button type="submit" class="btn rounded-pill btn-success">
                        @if($edit)
                            @lang('app.update')
                        @else
                            @lang('app.save')
                        @endif
                    </button>
                </div>
            </div>


    {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
