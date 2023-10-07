@extends('backend.layouts.application')

@section('layout-content')
<!-- Layout wrapper -->
<div class="layout-wrapper layout-1 layout-without-sidenav">
    <div class="layout-inner">

        <!-- Layout navbar -->
        @include('backend.layouts.includes.layout-navbar', ['hide_layout_sidenav_toggle' => true])

        <!-- Layout container -->
        <div class="layout-container">

            <!-- Layout content -->
            <div class="layout-content">
              <!-- Layout sidenav -->
                @include('backend.layouts.includes.layout-sidenav', ['layout_sidenav_horizontal' => true])

                <!-- Content -->
                <div class="container-fluid flex-grow-1 container-p-y">
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
</div>
<!-- / Layout wrapper -->
@endsection
