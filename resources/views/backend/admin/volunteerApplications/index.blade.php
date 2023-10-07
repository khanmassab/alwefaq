@extends('backend.layouts.layout-2')

@section('page-title', trans('app.volunteerApplications'))
@section('page-heading', trans('app.volunteerApplications'))

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ mix('/vendor/libs/datatables/datatables.css') }}">
@endsection

@section('scripts')
    @parent
    <!-- Dependencies -->
    <script src="{{ mix('/vendor/libs/datatables/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#volunteerApplicationsTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ !empty($id) ? route('volunteerApplications.getDatatableByVolunteerId', $id) : route('volunteerApplications.getDatatable') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'volunteer_id', name: 'volunteer_id'},
                    {data: 'cv', name: 'cv'},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    @include('backend.partials.deleteMode',['routeName'=>'volunteerApplications.destroy'])
@endsection

@section('content')
    <div class="card">
{{--        <h6 class="card-header">--}}
{{--            <div class="card-title with-elements">--}}
{{--                <h5 class="m-0 mr-2">@lang('app.volunteerApplications')</h5>--}}
{{--                <div class="card-title-elements ml-md-auto">--}}
{{--                    <a type="button" href="{{ route('volunteers.create')}}" class="btn btn-sm btn-primary">--}}
{{--                        <span class="ion ion-md-add"></span> @lang('app.add_volunteer')--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </h6>--}}
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="volunteerApplicationsTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('app.full_name')</th>
                    <th>@lang('app.volunteer_id')</th>
                    <th>@lang('app.cv')</th>
                    <th>@lang('app.created_at')</th>
                    <th>@lang('app.action')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
