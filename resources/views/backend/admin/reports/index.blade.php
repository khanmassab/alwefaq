@extends('backend.layouts.layout-2')

@section('page-title', trans('app.reports'))
@section('page-heading', trans('app.reports'))

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
            $('#reportsTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('reports.getReports') !!}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'subject', name: 'subject'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                    {data: 'action', name: 'action', orderable: false, searchable: false}

                ]
            });
        });
    </script>
    @include('backend.partials.deleteMode',['routeName'=>'reports.destroy'])
@endsection

@section('content')
    <div class="card">
        <h6 class="card-header">
            <div class="card-title with-elements">
                <h5 class="m-0 mr-2">@lang('app.reports')</h5>
            </div>
        </h6>
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="reportsTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('app.name')</th>
                    <th>@lang('app.subject')</th>
                    <th>@lang('app.email')</th>
                    <th>@lang('app.phone')</th>
                    <th>@lang('app.created_at')</th>
                    <th>@lang('app.action')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
