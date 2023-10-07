@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_albumImages'))
@section('page-heading', trans('app.edit_albumImages'))
@else
    @section('page-title', trans('app.add_albumImages'))
@section('page-heading', trans('app.add_albumImages'))
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
        {!! Form::open(['route' => ['albumImages.update',$albumImage->id], 'method' => 'PUT','files' => true, 'id' => 'page-form']) !!}
    @else
        {!! Form::open(['route' => 'albumImages.store', 'files' => true, 'id' => 'page-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.page_details')
        </h6>
        <div class="card-body">
            @if($edit)
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>
                    <div class="img-thumbnail">
                        <img src="{{ $albumImage->image }}" alt="" class="card-img-top" style="max-height: 400px">
                    </div>
                </div>
            @endif
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>
                <input {{ $edit ? '' : 'required'}} type="file" name="image">
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.title')</label>
                <div class="col-sm-10">
                    <select class="form-control" name="album_image_id">
                        <option value="">choose album</option>
                        @foreach($albums as $album)
                        @if($edit)
                        <option @if($albumImage->album_image_id == $album->id || $album->id == old('album_image_id')) selected="selected" @endif value="{{ $album->id }}">{{ $album->name }}</option>
                            @else
                                <option @if($album->id == old('album_image_id')) selected="selected" @endif value="{{ $album->id }}">{{ $album->name }}</option>

                            @endif
                            @endforeach
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
        </div>
    </div>
    {!! Form::close() !!}
@stop
