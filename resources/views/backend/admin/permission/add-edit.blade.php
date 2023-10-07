@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', $edit ? $permission->name : trans('app.create_new_permission'))
@section('page-heading', $edit ? $permission->name : trans('app.create_new_permission'))

@else
    @section('page-title', trans('app.permissions'))
@section('page-heading', trans('app.permissions'))
@endif


@section('content')
    @if ($edit)
        {!! Form::open(['route' => ['permission.update', $permission->id], 'method' => 'PUT', 'id' => 'permission-form']) !!}
    @else
        {!! Form::open(['route' => 'permission.store', 'id' => 'permission-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.permission_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                <div class="col-sm-10">
                    {!! Form::text('name',$edit ? $permission->name : old('name'),['class' => 'form-control','placeholder' => trans('app.name')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 ml-sm-auto">
                    <button type="submit" class="btn rounded-pill btn-success">
                        {{ $edit ? trans('app.update_permission') : trans('app.create_permission') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

