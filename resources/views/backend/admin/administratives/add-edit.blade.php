@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_administrative'))
@section('page-heading', trans('app.edit_administrative'))
@else
    @section('page-title', trans('app.add_administrative'))
@section('page-heading', trans('app.add_administrative'))
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
        {!! Form::open(['route' => ['administratives.update',$administrative->id], 'method' => 'PUT','files' => true, 'id' => 'curriculum-form']) !!}
    @else
        {!! Form::open(['route' => 'administratives.store', 'files' => true, 'id' => 'curriculum-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.administratives_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                <div class="col-sm-10">
                    {!! Form::text('name',$edit ? $administrative->name : old('name'),['class' => 'form-control','placeholder' => trans('app.name')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.positions')</label>
                <div class="col-sm-10">
                    {!! Form::text('positions',$edit ? $administrative->positions : old('positions'),['class' => 'form-control','placeholder' => trans('app.positions')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.order')</label>
                <div class="col-sm-10">
                    {!! Form::number('order',$edit ? $administrative->order : old('order') ?? 0,['class' => 'form-control','placeholder' => trans('app.order')]) !!}
                </div>
            </div>
            @if($edit)
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>
                    <div class="img-thumbnail">
                        <img src="{{ $administrative->image }}" alt="" class="card-img-top" style="max-height: 400px">
                    </div>
                </div>
            @endif
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>
                <input {{ $edit ? '' : 'required'}} type="file" name="image">
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
