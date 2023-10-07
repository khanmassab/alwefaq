@extends('backend.layouts.layout-2')

@section('page-title', trans('app.footers'))
@section('page-heading', trans('app.footers'))

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
            $('#curriculumTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('footers.getFooters') !!}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'title', name: 'title'},
                    {data: 'url', name: 'url'},
                    // {data: 'image', name: 'image'},
                    {data: 'created_at', name: 'created_at', orderable: false,},
                    {data: 'updated_at', name: 'updated_at', orderable: false,},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    @include('backend.partials.deleteMode',['routeName'=>'footers.destroy'])
@endsection

@section('content')
    <div class="card">
        <h6 class="card-header">
            <div class="card-title with-elements">
                <h5 class="m-0 mr-2">@lang('app.footers')</h5>
                <div class="card-title-elements ml-md-auto">
                    <a type="button" href="{{ route('footers.create')}}" class="btn btn-sm btn-primary">
                        <span class="ion ion-md-add"></span> @lang('app.add_footer')
                    </a>
                </div>
            </div>
        </h6>
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered" id="curriculumTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('app.title')</th>
                    <th>@lang('app.url')</th>
{{--                    <th>@lang('app.image')</th>--}}
                    <th>@lang('app.created_at')</th>
                    <th>@lang('app.updated_at')</th>
                    <th>@lang('app.action')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
