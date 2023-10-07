@extends('backend.layouts.layout-2')

@section('page-title', trans('app.roles'))
@section('page-heading', trans('app.roles'))

@section('content')
    <div class="card">
        <h6 class="card-header">
            <div class="card-title with-elements">
                <h5 class="m-0 mr-2">@lang('app.permissions')</h5>
                <div class="card-title-elements ml-md-auto">
                    <a type="button" href="{{ route('role.create')}}" class="btn btn-sm btn-primary">
                        <span class="ion ion-md-add"></span> @lang('app.add_role')
                    </a>
                </div>
            </div>
        </h6>
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="permissionsTable">
                <thead>
                <tr>
                    <th class="min-width-100">@lang('app.name')</th>
                    <th class="min-width-150">@lang('app.users_with_this_role')</th>
<<<<<<< HEAD
                    <!--<th class="text-center">@lang('app.action')</th>-->
=======
                    <th class="text-center">@lang('app.action')</th>
>>>>>>> 89ecfffb1dd38072e6d42ca145c90215a2793557
                </tr>
                </thead>
                <tbody>
                @if ($roles->count() > 0)
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->users->count() }}</td>
                            <td class="text-center">
                                @if(\Auth::user()->can('roles.edit'))
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-icon"
                                       title="@lang('app.edit_role')" data-toggle="tooltip" data-placement="top">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif
                                @if(\Auth::user()->can('roles.delete'))
                                    <a href="{{ route('role.destroy', $role->id) }}" class="btn btn-icon"
                                       title="@lang('app.delete_role')"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       data-method="DELETE"
                                       data-confirm-title="@lang('app.please_confirm')"
                                       data-confirm-text="@lang('app.are_you_sure_delete_role')"
                                       data-confirm-delete="@lang('app.yes_delete_it')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4"><em>@lang('app.no_records_found')</em></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
