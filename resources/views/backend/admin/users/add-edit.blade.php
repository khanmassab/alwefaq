@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_user'))
@section('page-heading', trans('app.edit_user'))
@else
    @section('page-title', trans('app.add_user'))
@section('page-heading', trans('app.add_user'))
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
        {!! Form::open(['route' => ['users.update',$users->id], 'method' => 'PUT','files' => true, 'id' => 'curriculum-form']) !!}
    <input type="hidden" name="id" value="{{$users->id}}">
    @else
        {!! Form::open(['route' => 'users.store', 'files' => true, 'id' => 'curriculum-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.users')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.first_name')</label>
                <div class="col-sm-10">
                    {!! Form::text('first_name',$edit ? $users->first_name : old('first_name'),['class' => 'form-control','placeholder' => trans('app.first_name')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.middle_name')</label>
                <div class="col-sm-10">
                    {!! Form::text('middle_name',$edit ? $users->middle_name : old('middle_name'),['class' => 'form-control','placeholder' => trans('app.middle_name')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.last_name')</label>
                <div class="col-sm-10">
                    {!! Form::text('last_name',$edit ? $users->last_name : old('last_name'),['class' => 'form-control','placeholder' => trans('app.last_name')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.email')</label>
                <div class="col-sm-10">
                    {!! Form::text('email',$edit ? $users->email : old('email'),['class' => 'form-control','placeholder' => trans('app.content')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.phoneNumber')</label>
                <div class="col-sm-10">
                    {!! Form::number('phoneNumber',$edit ? $users->phoneNumber : old('phoneNumber'),['class' => 'form-control','placeholder' => trans('app.phoneNumber')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.gender')</label>
                <div class="col-sm-10">
                    <select class="form-control select_" name="gender" required="" >
                        <option value="male" {{ old( 'male') || ($edit && $users->gender == 'male') ? 'selected' : '' }}>رجل</option>
                        <option value="female" {{ old( 'female') || ($edit && $users->gender == 'female') ? 'selected' : '' }}>انثى</option>
                    </select>
{{--                    {!! Form::text('gender',$edit ? $users->gender : old('gender'),['class' => 'form-control','placeholder' => trans('app.gender')]) !!}--}}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.birthday')</label>
                <div class="col-sm-10">
                    {!! Form::date('birthday',$edit ? $users->birthday : old('birthday'),['class' => 'form-control','placeholder' => trans('app.birthday')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.password')</label>
                <div class="col-sm-10">
                    {!! Form::text('password', $edit ? '' : old('password') ,['class' => 'form-control','placeholder' => trans('app.password')]) !!}
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
