@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_attribute'))
@section('page-heading', trans('app.edit_attributes'))
@else
    @section('page-title', trans('app.add_attribute'))
@section('page-heading', trans('app.add_attribute'))
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
        {!! Form::open(['route' => ['attributes.update',$attribute->id], 'method' => 'PUT','files' => true, 'id' => 'belongsTo_type-form']) !!}
    @else
        {!! Form::open(['route' => 'attributes.store', 'files' => true, 'id' => 'belongsTo_type-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.belongsTo_type_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                <div class="col-sm-10">
                    {!! Form::text('name',$edit ? $attribute->name : old('name'),['class' => 'form-control','placeholder' => trans('app.name')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.type')</label>
                <div class="col-sm-10">
                    {!! Form::text('type',$edit ? $attribute->type : old('type'),['class' => 'form-control','placeholder' => trans('app.type')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.belongsTo_type')</label>
                <div class="col-sm-10">
                    {!! Form::text('belongsTo_type',$edit ? $attribute->belongsTo_type : old('belongsTo_type'),['class' => 'form-control','placeholder' => trans('app.belongsTo_type')]) !!}
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
