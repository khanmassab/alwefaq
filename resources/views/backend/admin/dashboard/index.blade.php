@extends('backend.layouts.layout-2')

@section('page-title', __('Dashboard'))
@section('page-heading', __('Dashboard'))

@section('scripts')
    @parent
    <!-- Dependencies -->
    <script src="{{ mix('/vendor/libs/chartjs/chartjs.js') }}"></script>
@endsection

@section('content')
<h4 class="font-weight-bold">
        @lang('app.wefaq')



    </h4>
    <!-- Counters -->
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="lnr lnr-cart display-4 text-success"></div>
                        <div class="ml-3">
                            <div class="text-muted small">@lang('app.total_requests')</div>
                            <div class="text-large">{{ $data['help_requests_count'] ?? ''}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="lnr lnr-earth display-4 text-info"></div>
                        <div class="ml-3">
                            <div class="text-muted small">@lang('app.marriage_requests')</div>
                            <div class="text-large">{{ $data['marriage_requests_count'] ?? ''}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="lnr lnr-gift display-4 text-danger"></div>
                        <div class="ml-3">
                            <div class="text-muted small">@lang('app.job_applications')</div>
                            <div class="text-large">{{ $data['job_applications_count'] ?? ''}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="lnr lnr-users display-4 text-warning"></div>
                        <div class="ml-3">
                            <div class="text-muted small">@lang('app.users')</div>
                            <div class="text-large">{{ $data['help_requests_count'] ?? ''}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- / Counters -->

    <!-- Statistics -->
{{--    <div class="card mb-4">--}}
{{--        <h6 class="card-header with-elements">--}}
{{--            <div class="card-header-title">@lang('app.student_registration_history')</div>--}}
{{--        </h6>--}}
{{--        <div class="row no-gutters row-bordered">--}}
{{--            <div class="col-md-12 col-lg-12 col-xl-12">--}}
{{--                <div class="card-body">--}}
{{--                    <div style="height: 360px;">--}}
{{--                        {!! $StudentChart->container() !!}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- / Statistics -->
@stop
