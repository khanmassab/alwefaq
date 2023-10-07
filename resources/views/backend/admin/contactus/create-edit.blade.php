@extends('backend.layouts.layout-2')

@if($show)
    @section('page-title', trans('app.contactus'))
@section('page-heading', trans('app.contactus'))
@else
    @section('page-title', trans('app.add_contactus'))
@section('page-heading', trans('app.add_contactus'))
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
    @if($show)
        {!! Form::open(['route' => ['contactus.show',$contactus->id], 'method' => 'PUT','files' => true, 'id' => 'page-form']) !!}
{{--    @else--}}
{{--        {!! Form::open(['route' => 'contactus.store', 'files' => true, 'id' => 'page-form']) !!}--}}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.contactus_details')
        </h6>
        <div class="card-body">
            <table class="table table-hover">

                <tbody>
                <tr>
                    <td width="20%"><strong>اسم المستخدم</strong></td>
                    <td>{{ $contactus->name }}</td>
                </tr>

                <tr>
                    <td><strong>رقم الجوال</strong></td>
                    <td>{{ $contactus->phone }}</td>
                </tr>

                <tr>
                    <td><strong>البريد الالكتروني</strong></td>
                    <td>{{ $contactus->email }}</td>
                </tr>

                <tr>
                    <td><strong>الموضوع</strong></td>
                    <td>{{ $contactus->subject }}</td>
                </tr>

                <tr>
                    <td><strong>المحتوى</strong></td>
                    <td>{{ $contactus->message }}</td>
                </tr>


                </tbody>

            </table>



            <div class="form-group row">
                <div class="col-sm-10 ml-sm-auto">
{{--                    <button type="submit" class="btn rounded-pill btn-success">--}}
{{--                        @if($show)--}}
{{--                            @lang('app.update')--}}
{{--                        @else--}}
{{--                            @lang('app.save')--}}
{{--                        @endif--}}
{{--                    </button>--}}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop
