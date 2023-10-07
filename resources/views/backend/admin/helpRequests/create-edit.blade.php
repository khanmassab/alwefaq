@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.helpRequests'))
@section('page-heading', trans('app.helpRequests'))
@else
    @section('page-title', trans('app.add_helpRequests'))
@section('page-heading', trans('app.add_helpRequests'))
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
    @if($edit)
        {!! Form::open(['route' => ['helpRequests.update',$helpRequest->id], 'method' => 'PUT','files' => true, 'id' => 'page-form']) !!}
    @else
        {!! Form::open(['route' => 'helpRequests.store', 'files' => true, 'id' => 'page-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.helpRequest_details')
        </h6>
        <div class="card-body">
            <table class="table table-hover">

                <tbody>
                <tr>
                    <td width="20%"><strong>اسم المستخدم</strong></td>
                    <td>{{ $helpRequest->full_name }}</td>
                </tr>

                <tr>
                    <td><strong>رقم الجوال</strong></td>
                    <td>{{ $helpRequest->phoneNumber }}</td>
                </tr>

                <tr>
                    <td><strong>البريد الالكتروني</strong></td>
                    <td>{{ $helpRequest->email }}</td>
                </tr>

                <tr>
                    <td><strong>العنوان</strong></td>
                    <td>{{ $helpRequest->address }}</td>
                </tr>

                <tr>
                    <td><strong>نوع المساعدة</strong></td>
                    <td>{{ trans('app.' . $helpRequest->type) }}</td>
                </tr>

                @if($helpRequest->type == 'price')
                <tr>
                    <td><strong>المبلغ المطلوب</strong></td>
                    <td>{{ $helpRequest->value_request }}</td>
                </tr>
                @endif
                @if($helpRequest->type == 'item')
                <tr>
                <td><strong>المنتج المطلوب</strong></td>
            @if($helpRequest->help_request_items()->count())
            <!-- <div class="row"> -->
            <td>

                @foreach($helpRequest->help_request_items()->get() as $item)
                    <div class="col-3">
                        <h6>
                        {{ $item->item()->first()->name }}
    </h6>
                        <img src="{{ $item->item()->first()->image }}" alt="{{ $item->item()->first()->name }}"   width="200" height="200" >

                    </div>
                    @endforeach
            <!-- </div> -->
            <td>
            @endif
    </tr>
            @endif
                <tr>
                <!-- <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.status')</label> -->
                <td>
                <strong>@lang('app.status')</strong>
                
    </td>
    <td>
    {!! Form::select('status',$status ,$edit ? $helpRequest->status : old('name'),['class' => 'form-control']) !!}

    </td>
                <!-- <div class="col-sm-10">
                    {!! Form::select('status',$status ,$edit ? $helpRequest->status : old('name'),['class' => 'form-control']) !!}
                </div>
            </div> -->
            </tr>

                </tbody>

            </table>
           
         

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
        </div>
    </div>
    {!! Form::close() !!}
@stop
