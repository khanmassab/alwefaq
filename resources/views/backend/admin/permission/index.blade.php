@extends('backend.layouts.layout-2')

@section('page-title', trans('app.permissions'))
@section('page-heading', trans('app.permissions'))

@section('content')
    <div class="card">
        <h6 class="card-header">
            <div class="card-title with-elements">
                <h5 class="m-0 mr-2">@lang('app.permissions')</h5>
                {{--                <div class="card-title-elements ml-md-auto">--}}
                {{--                    <a type="button" href="{{ route('permissions.create')}}" class="btn btn-sm btn-primary">--}}
                {{--                        <span class="ion ion-md-add"></span> @lang('app.add_permission')--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </div>
        </h6>
<<<<<<< HEAD
        {!! Form::open(['route' => 'permission.save' ]) !!}

=======
>>>>>>> 89ecfffb1dd38072e6d42ca145c90215a2793557
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="permissionsTable">
                <thead>
                <tr>
                    <th class="min-width-200">@lang('app.name')</th>
                    @foreach ($roles as $role)
                        <th class="text-center min-width-100">{{ $role->name }}</th>
                    @endforeach
<<<<<<< HEAD
                    <!--<th class="text-center min-width-100">@lang('app.action')</th>-->
=======
                    <th class="text-center min-width-100">@lang('app.action')</th>
>>>>>>> 89ecfffb1dd38072e6d42ca145c90215a2793557
                </tr>
                </thead>
                <tbody>
                @if ($permissions->count() > 0)
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->display_name ?: trans('app.' . $permission->name )}}</td>

                            @foreach ($roles as $role)
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        {!!
                                            Form::checkbox(
                                                "roles[{$role->id}][]",
                                                $permission->id,
                                                $role->hasPermissionTo($permission->name),
                                                [
                                                    'class' => 'custom-control-input',
                                                    'id' => "cb-{$role->id}-{$permission->id}"
                                                ]
                                            )
                                        !!}
                                        <label class="custom-control-label d-inline"
                                               for="cb-{{ $role->id }}-{{ $permission->id }}"></label>
                                    </div>
                                </td>
                            @endforeach

                            <td class="text-center">
                                @if(\Auth::user()->can('permissions.edit'))
                                    <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-icon"
                                       title="@lang('app.edit_permission')" data-toggle="tooltip" data-placement="top">
                                        <i class="fas fa-edit"></i>
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
        @if ($permissions->count() > 0)
            <div class="row">
                <div class="col-md-3 ml-auto">
                    <button type="submit" class="btn btn-primary">
                        @lang('app.save_permissions')
                    </button>
                </div>
            </div>
        @endif
<<<<<<< HEAD
        {!! Form::close() !!}

=======
>>>>>>> 89ecfffb1dd38072e6d42ca145c90215a2793557
    </div>
@stop
