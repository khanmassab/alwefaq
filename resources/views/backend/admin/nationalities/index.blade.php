@extends('backend.layouts.layout-2')

@section('page-title', trans('app.nationalities'))
@section('page-heading', trans('app.nationalities'))

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
            $('#nationalitiesTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('nationalities.getDatatable') !!}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                    {data: 'updated_at', name: 'updated_at', orderable: false,},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    @include('backend.partials.deleteMode',['routeName'=>'nationalities.destroy'])
@endsection

@section('content')
    <div class="card">
        <h6 class="card-header">
            <div class="card-title with-elements">
                <h5 class="m-0 mr-2">@lang('app.nationalities')</h5>
                <div class="card-title-elements ml-md-auto">
                    <a type="button" href="{{ route('nationalities.create')}}" class="btn btn-sm btn-primary">
                        <span class="ion ion-md-add"></span> @lang('app.add_nationalities')
                    </a>
                </div>
            </div>
        </h6>
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="nationalitiesTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('app.name')</th>
                    <th>@lang('app.created_at')</th>
                    <th>@lang('app.updated_at')</th>
                    <th>@lang('app.action')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
