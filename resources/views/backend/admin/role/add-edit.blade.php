@extends('backend.layouts.layout-2')

@section('page-title', trans('app.roles'))
@section('page-heading', $edit ? $role->name : trans('app.create_new_role'))

@section('content')

    @if ($edit)
        {!! Form::open(['route' => ['role.update', $role->id], 'method' => 'PUT', 'id' => 'role-form']) !!}
    @else
        {!! Form::open(['route' => 'role.store', 'id' => 'role-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.role_details_big')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.title')</label>
                <div class="col-sm-10">
                    {!! Form::text('name',$edit ? $role->name : old('name'),['class' => 'form-control','placeholder' => trans('app.name')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 ml-sm-auto">
                    <button type="submit" class="btn rounded-pill btn-success">
                        {{ $edit ? trans('app.update_role') : trans('app.create_role') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

