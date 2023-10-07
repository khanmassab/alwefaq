@extends('backend.layouts.application')

@section('layout-content')
<!-- Layout wrapper -->
<div class="layout-wrapper layout-1">
    <div class="layout-inner">

        <!-- Layout navbar -->
        @include('backend.layouts.includes.layout-navbar')

        <!-- Layout container -->
        <div class="layout-container">
            <!-- Layout sidenav -->
            @include('backend.layouts.includes.layout-sidenav')

            <!-- Layout content -->
            <div class="layout-content">

                <!-- Content -->
                <div class="container-fluid d-flex align-items-stretch flex-grow-1 p-0">
                    @yield('content')
                </div>
                <!-- / Content -->

                <!-- Layout footer -->
                @include('backend.layouts.includes.layout-footer')
            </div>
            <!-- Layout content -->

        </div>
        <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-sidenav-toggle"></div>
</div>
<!-- / Layout wrapper -->
@endsection
