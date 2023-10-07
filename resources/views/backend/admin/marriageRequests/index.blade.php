@extends('backend.layouts.layout-2')

@section('page-title', trans('app.marriageRequsts'))
@section('page-heading', trans('app.marriageRequsts'))

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
            $('#pageTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('marriageRequests.getDatatable') !!}',
                columns: [
                    {data: 'id', orderable: false, searchable: false},
                    {data: 'unique_id', name: 'unique_id'},
                    {data: 'full_name', name: 'name'},
                    {data: 'status', name: 'status',
        "render": function (data, type, row) {
 
        if (row.status === 1) {
            return 'تم الموافقة';
        }else {return 'بالانتظار';}}},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                    {data: 'updated_at', name: 'updated_at', orderable: false,},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    @include('backend.partials.deleteMode',['routeName'=>'marriageRequests.destroy'])
@endsection

@section('content')
    <div class="card">
 
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="pageTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('app.uniqueId')</th>
                    <th>@lang('app.name')</th>
                    <th>@lang('app.status')</th>
                    <th>@lang('app.created_at')</th>
                    <th>@lang('app.updated_at')</th>
                    <th>@lang('app.action')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
