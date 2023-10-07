@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_albums'))
@section('page-heading', trans('app.edit_albums'))
@else
    @section('page-title', trans('app.add_albums'))
@section('page-heading', trans('app.add_albums'))
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
            form.onsubmit = function () {
                // Populate hidden form on submit
                var description = document.querySelector('input[name=description]');
                description.value = (editor.root.innerHTML);
            };
        });
    </script>
@endsection

@section('content')
    @if($edit)
        {!! Form::open(['route' => ['albums.update',$album->id], 'method' => 'PUT','files' => true, 'id' => 'page-form']) !!}
    @else
        {!! Form::open(['route' => 'albums.store', 'files' => true, 'id' => 'page-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.album_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                <div class="col-sm-10">
                    {!! Form::text('name',$edit ? $album->name : old('name'),['class' => 'form-control','placeholder' => trans('app.title')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.date')</label>
                <div class="col-sm-10">
                    {!! Form::date('album_date',$edit ? $album->album_date : old('album_date'),['class' => 'form-control','placeholder' => trans('app.album_date')]) !!}

                    {{--                    <input type="date" name="album_date" class="form-control" value="{{$edit ? date('Y-m-d', strtotime($album->album_date)) : old('album_date')}}">--}}
                </div>
            </div>
            @if($edit)
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.imageAlbum')</label>
                    <div class="img-thumbnail">
                        <img src="{{ $album->imageAlbum }}" alt="" class="card-img-top" style="max-height: 400px">
                    </div>
                </div>
            @endif
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.imageAlbum')</label>
                <input {{ $edit ? '' : 'required'}} type="file" name="imageAlbum">
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.description')</label>
                <input name="description" type="hidden">
                <div class="col-sm-10">
                    <div id="quill-toolbar">
                        <span class="ql-formats">
                            <select class="ql-font"></select>
                            <select class="ql-size"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-bold"></button>
                            <button class="ql-italic"></button>
                            <button class="ql-underline"></button>
                            <button class="ql-strike"></button>
                        </span>
                        <span class="ql-formats">
                            <select class="ql-color"></select>
                            <select class="ql-background"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-script" value="sub"></button>
                            <button class="ql-script" value="super"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-header" value="1"></button>
                            <button class="ql-header" value="2"></button>
                            <button class="ql-blockquote"></button>
                            <button class="ql-code-block"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-list" value="ordered"></button>
                            <button class="ql-list" value="bullet"></button>
                            <button class="ql-indent" value="-1"></button>
                            <button class="ql-indent" value="+1"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-direction" value="rtl"></button>
                            <select class="ql-align"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-clean"></button>
                        </span>
                    </div>
                    <div id="quill-editor">
                        {!! $edit ? $album->description : old('description') !!}
                    </div>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 ml-sm-auto">
                    <button type="submit" class="btn rounded-pill btn-success">
                        {{ $edit ? trans('app.update') : trans('app.save') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}


    @if($edit)
        @include('backend.admin.albums.dropzone')
    @endif
@stop
