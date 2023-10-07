@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_ashom'))
@section('page-heading', trans('app.edit_ashom'))
@else
    @section('page-title', trans('app.add_ashom'))
@section('page-heading', trans('app.add_ashom'))
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
        {!! Form::open(['route' => ['ashom.update',$ashom->id], 'method' => 'PUT','files' => true, 'id' => 'ashom-form']) !!}
    @else
        {!! Form::open(['route' => 'ashom.store', 'files' => true, 'id' => 'ashom-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.ashom_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                <div class="col-sm-10">
                    {!! Form::text('name',$edit ? $ashom->name : old('name'),['class' => 'form-control','placeholder' => trans('app.name')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.stock_price')</label>
                <div class="col-sm-10">
                    {!! Form::number('price',$edit ? $ashom->price : old('price') ?? '',['class' => 'form-control','placeholder' => trans('app.price')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.total_stocks')</label>
                <div class="col-sm-10">
                    {!! Form::number('total_stocks',$edit ? $ashom->total_stocks : old('total_stocks') ?? '',['class' => 'form-control','placeholder' => trans('app.total_stocks')]) !!}
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
