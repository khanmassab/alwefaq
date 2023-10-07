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
            <table class="table table-hover">

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
                    <td>{{ date('Y-m-d', strtotime($request->user->birthday)) }}</td>
                </tr>

                <tr>
                    <td><strong>النوع</strong></td>
                    <td>{{ $request->user->gender == 'female' ? 'انثى' : 'ذكر' }}</td>
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
                    @if($request->qualification_id != null )

                <tr>
                    <td><strong>المؤهل</strong></td>
                    <td>{{ $request->qualification->name }}</td>
                </tr>
                    @endif
                <tr>
                    <td><strong>المدينة</strong></td>
                    <td>{{ $request->city->name }}</td>
                </tr>
                <tr>
                    <td><strong>المحافظة</strong></td>
                    <td>{{ $request->province }}</td>
                </tr>
                <tr>
                    <td><strong>نوع تاريخ الميلاد</strong></td>
                    <td>{{ $request->birthday_type }}</td>
                </tr>
                <tr>
                    <td><strong>تاريخ ميلاد الطلب</strong></td>
                    <td>{{ date('Y-m-d' , strtotime( $request->birthday))}}</td>
                </tr>
                <tr>
                    <td><strong>العمر</strong></td>
                    <td>{{ $request->age }}</td>
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
                    <td><strong>غطاء اليدين</strong></td>
                    <td>{{ ($request->hand_cover) ? "نعم" : "لا" }}</td>
                </tr>
                <tr>
                    <td><strong>النقاب</strong></td>
                    <td>{{ ($request->body_cover) ? "نعم" : "لا" }}</td>
                </tr>

                @endif
                <tr>
                    <td><strong>المظهر</strong></td>
                    <td>{{ $request->shape }}</td>
                </tr>
                <tr>
                    <td><strong>الشعر</strong></td>
                    <td>{{ $request->hair }}</td>
                </tr>
                @if($request->user->gender == 'male')

                <tr>
                    <td><strong>اللحية</strong></td>
                    <td>{{ $request->beared }}</td>
                </tr>

                @endif
                <tr>
                    <td><strong>التدخين</strong></td>
                    <td>{{ ($request->smoked) ? "نعم" : "لا" }}</td>
                </tr>
                <tr>
                    <td><strong>التدين</strong></td>
                    <td>{{ $request->religion }}</td>
                </tr>
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
                <tr>
                    <td><strong>حالة الطلب</strong></td>
                    <td>{{ ($request->status) ? "فى الانتظار" : "تم" }}</td>
                </tr>


                </tbody>

            </table>

        </div>
    </div>
@stop
