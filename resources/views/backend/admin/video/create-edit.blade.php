@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_videos'))
@section('page-heading', trans('app.edit_videos'))
@else
    @section('page-title', trans('app.add_videos'))
@section('page-heading', trans('app.add_videos'))
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
        {!! Form::open(['route' => ['videos.update',$video->id], 'method' => 'PUT','files' => true, 'id' => 'page-form']) !!}
    @else
        {!! Form::open(['route' => 'videos.store', 'files' => true, 'id' => 'page-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.video_details')
        </h6>
        <div class="card-body">
            @if($edit)
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.video')</label>
                    <div class="img-thumbnail">
                        <video width="350" height="300" controls>
                            <source src="{{ $video->video }}">
                        </video>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>
                    <div class="img-thumbnail">
                        <img src="{{ $video->image }}" alt="" class="card-img-top" style="max-height: 400px">
                    </div>
                </div>
            @endif
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.video')</label>
                <input {{ $edit ? '' : 'required'}} type="file" name="video">
            </div>
                <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>
                    <input {{ $edit ? '' : 'required'}} type="file" name="image">
            </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                    <div class="col-sm-10">
                        {!! Form::text('name',$edit ? $video->name : old('name'),['class' => 'form-control','placeholder' => trans('app.title')]) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.date')</label>
                    <div class="col-sm-10">
                        <input type="date" name="video_date" class="form-control" value="{{$edit ? date('Y-m-d', strtotime($video->video_date)) : old('video_date')}}">
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
