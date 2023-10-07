@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_info'))
@section('page-heading', trans('app.edit_info'))
@else
    @section('page-title', trans('app.add_info'))
@section('page-heading', trans('app.add_info'))
@endif

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ mix('/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ mix('/vendor/libs/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ mix('/vendor/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection

@section('scripts')
    @parent
    <!-- Dependencies -->
    <script src="{{ mix('/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ mix('/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ mix('/vendor/libs/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script>
        $(function () {
            $('.selectpicker').selectpicker();
        });
    </script>
@endsection

@section('content')
    @if($edit)
        {!! Form::open(['route' => ['information.update',$information->id], 'method' => 'PUT','files' => true, 'id' => 'curriculum-form']) !!}
    @else
        {!! Form::open(['route' => 'information.store', 'files' => true, 'id' => 'curriculum-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.information_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.title')</label>
                <div class="col-sm-10">
                    {!! Form::text('title',$edit ? $information->title : old('title'),['class' => 'form-control','placeholder' => trans('app.title')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.content')</label>
                <div class="col-sm-10">
                    {!! Form::text('content',$edit ? $information->content : old('content'),['class' => 'form-control','placeholder' => trans('app.content')]) !!}
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
@stop
