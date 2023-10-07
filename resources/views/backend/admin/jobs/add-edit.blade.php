@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_job'))
@section('page-heading', trans('app.edit_job'))
@else
    @section('page-title', trans('app.add_job'))
@section('page-heading', trans('app.add_job'))
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
        {!! Form::open(['route' => ['jobs.update',$job->id], 'method' => 'PUT','files' => true, 'id' => 'curriculum-form']) !!}
    @else
        {!! Form::open(['route' => 'jobs.store', 'files' => true, 'id' => 'curriculum-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.job_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                <div class="col-sm-10">
                    {!! Form::text('name',$edit ? $job->name : old('name'),['class' => 'form-control','placeholder' => trans('app.name')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.code')</label>
                <div class="col-sm-10">
                    {!! Form::text('code',$edit ? $job->code : old('code'),['class' => 'form-control','placeholder' => trans('app.code')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.start_date')</label>
                <div class="col-sm-10">
                    {!! Form::date('start_date',$edit ? $job->start_date : old('start_date') ?? 0,['class' => 'form-control','placeholder' => trans('app.start_date')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.end_date')</label>
                <div class="col-sm-10">
                    {!! Form::date('end_date',$edit ? $job->end_date : old('end_date') ?? 0,['class' => 'form-control','placeholder' => trans('app.end_date')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.condition')</label>
                <div class="col-sm-10">
                    {!! Form::textarea('condition',$edit ? $job->condition : old('condition') ?? null,['class' => 'form-control','placeholder' => trans('app.condition')]) !!}
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
