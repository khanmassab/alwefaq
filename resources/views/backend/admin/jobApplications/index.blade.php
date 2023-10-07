@extends('backend.layouts.layout-2')

@section('page-title', trans('app.jobApplications'))
@section('page-heading', trans('app.jobApplications'))

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
            $('#jobApplicationsTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ !empty($id) ? route('jobApplications.getDatatableByJobId', $id) : route('jobApplications.getDatatable') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'job_id', name: 'job_id'},
                    {data: 'cv', name: 'cv'},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    @include('backend.partials.deleteMode',['routeName'=>'jobApplications.destroy'])
@endsection

@section('content')
    <div class="card">
{{--        <h6 class="card-header">--}}
{{--            <div class="card-title with-elements">--}}
{{--                <h5 class="m-0 mr-2">@lang('app.jobApplications')</h5>--}}
{{--                <div class="card-title-elements ml-md-auto">--}}
{{--                    <a type="button" href="{{ route('jobs.create')}}" class="btn btn-sm btn-primary">--}}
{{--                        <span class="ion ion-md-add"></span> @lang('app.add_job')--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </h6>--}}
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="jobApplicationsTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('app.full_name')</th>
                    <th>@lang('app.job_id')</th>
                    <th>@lang('app.cv')</th>
                    <th>@lang('app.created_at')</th>
                    <th>@lang('app.action')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
