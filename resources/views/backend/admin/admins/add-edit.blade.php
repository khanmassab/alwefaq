@extends('backend.layouts.layout-2')

@section('page-title', trans('app.edit-admins'))
@section('page-heading', trans('app.edit-admins'))

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
        {!! Form::open(['route' => ['admins.update' , $admin->id], 'method' => 'PUT','files' => false, 'id' => 'admin-form']) !!}
    @else
        {!! Form::open(['route' => 'admins.store', 'files' => false, 'id' => 'admin-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.user_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="@lang('app.name')" value="{{ $edit ? $admin->name : old('name') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.roles')</label>
                <div class="col-sm-10">
                    {!! Form::select('role', $roles, $edit ? $admin->getRoleID() : old('role'), ['class' => 'selectpicker' ,'data-live-search'=>'true','data-style' => 'btn-default','id' => 'role']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.login_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.email')</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" value="{{ $edit ? $admin->email : old('email') }}" placeholder="@lang('app.email')">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">{{ $edit ? trans("app.new_password") : trans('app.password') }}</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" @if ($edit) placeholder="@lang('app.leave_blank_if_you_dont_want_to_change')" @endif>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">{{ $edit ? trans("app.password_confirmation") : trans('app.password_confirmation') }}</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control" @if ($edit) placeholder="@lang('app.leave_blank_if_you_dont_want_to_change')" @endif>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10 ml-sm-auto">
            <button type="submit" class="btn rounded-pill btn-success">@lang('app.save')</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop
