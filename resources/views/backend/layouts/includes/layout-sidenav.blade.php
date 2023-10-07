<?php $routeName = Route::currentRouteName(); ?>

<!-- Layout sidenav -->
<div id="layout-sidenav"
     class="{{ isset($layout_sidenav_horizontal) ? 'layout-sidenav-horizontal sidenav-horizontal container-p-x flex-grow-0' : 'layout-sidenav sidenav-vertical' }} sidenav bg-sidenav-theme">
@empty($layout_sidenav_horizontal)
    <!-- Brand demo (see assets/css/demo/demo.css) -->
        <div class="app-brand demo">
        <span class="app-brand-logo demo" style="background: #8a5498">
            <img style="width: 30px; height: 24px;" src="{{asset('frontend/images/infinity.svg')}}" alt="">
        </span>
            <a href="{{ url('/') }}" target="_blank" class="app-brand-text demo sidenav-text font-weight-normal ml-2">{{ env('APP_NAME') }}</a>
            <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                <i class="ion ion-md-menu align-middle"></i>
            </a>
        </div>

        <div class="sidenav-divider mt-0"></div>
@endempty

<!-- Links -->
    <ul class="sidenav-inner{{ empty($layout_sidenav_horizontal) ? ' py-1' : '' }}">

        <li class="sidenav-header small font-weight-semibold">@lang('app.website')</li>
        <li class="sidenav-item{{ Str::contains($routeName , ['dashboard']) ? ' active' : '' }}">
            <a href="{{ route('admin.dashboard.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-quote"></i>
                <div>@lang('app.dashboard')</div>
            </a>
        </li>

        <li class="sidenav-item{{ Str::contains($routeName, ['partners']) ? ' active' : '' }}">
            <a href="{{ route('partners.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-people"></i>
                <div>@lang('app.partners')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['footers']) ? ' active' : '' }}">
            <a href="{{ route('footers.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-people"></i>
                <div>@lang('app.footers')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['users']) ? ' active' : '' }}">
            <a href="{{ route('users.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-people"></i>
                <div>@lang('app.users')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['cities']) ? ' active' : '' }}">
            <a href="{{ route('cities.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-home"></i>
                <div>@lang('app.cities')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['nationalities']) ? ' active' : '' }}">
            <a href="{{ route('nationalities.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-flag"></i>
                <div>@lang('app.nationalities')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['qualifications']) ? ' active' : '' }}">
            <a href="{{ route('qualifications.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-school"></i>
                <div>@lang('app.qualifications')</div>
            </a>
        </li>
        <li class="sidenav-divider mb-1"></li>

        <li class="sidenav-item{{ Str::contains($routeName, ['jobs']) ? ' active' : '' }}">
            <a href="{{ route('jobs.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-laptop"></i>
                <div>@lang('app.jobs')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['jobApplications']) ? ' active' : '' }}">
            <a href="{{ route('jobApplications.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-contacts"></i>
                <div>@lang('app.jobApplications')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['volunteers']) ? ' active' : '' }}">
            <a href="{{ route('volunteers.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-laptop"></i>
                <div>@lang('app.volunteers')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['volunteerApplications']) ? ' active' : '' }}">
            <a href="{{ route('volunteerApplications.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-contacts"></i>
                <div>@lang('app.volunteerApplications')</div>
            </a>
        </li>
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-item{{ Str::contains($routeName, ['marriageRequests']) ? ' active' : '' }}">
            <a href="{{ route('marriageRequests.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-heart-empty"></i>
                <div>@lang('app.marriageRequests')</div>
            </a>
        </li>
{{--        <li class="sidenav-item{{ Str::contains($routeName, ['partnerRequests']) ? ' active' : '' }}">--}}
{{--            <a href="{{ route('partnerRequests.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-heart-half"></i>--}}
{{--                <div>@lang('app.partnerRequests')</div>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="sidenav-item{{ Str::contains($routeName, ['matchRequests']) ? ' active' : '' }}">
            <a href="{{ route('matchRequests.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-heart"></i>
                <div>@lang('app.matchRequests')</div>
            </a>
        </li>

        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-item{{ Str::contains($routeName, ['orders']) ? ' active' : '' }}">
            <a href="{{ route('orders.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-cart"></i>
                <div>@lang('app.orders')</div>
            </a>
        </li>

        <li class="sidenav-divider mb-1"></li>

        <li class="sidenav-item{{ Str::contains($routeName, ['sadakat']) ? ' active' : '' }}">
            <a href="{{ route('sadakat.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-flower"></i>
                <div>@lang('app.sadakat')</div>
            </a>
        </li>

        <li class="sidenav-item{{ Str::contains($routeName, ['ashom']) ? ' active' : '' }}">
            <a href="{{ route('ashom.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-paper-plane"></i>
                <div>@lang('app.ashom')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['items']) ? ' active' : '' }}">
            <a href="{{ route('items.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-basket"></i>
                <div>@lang('app.items')</div>
            </a>
        </li>

        <li class="sidenav-item{{ Str::contains($routeName, ['helpRequests']) ? ' active' : '' }}">
            <a href="{{ route('helpRequests.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-hand"></i>
                <div>@lang('app.helpRequests')</div>
            </a>
        </li>

        <li class="sidenav-divider mb-1"></li>
<!-- news.index - news.edit - news.create - ... /// explode = ['news', 'create']-->
        <li class="sidenav-item{{ explode('.', $routeName)[0] == 'news' ? ' active' : '' }}">
            <a href="{{ route('news.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-logo-designernews"></i>
                <div>@lang('app.news')</div>
            </a>
        </li>

        <li class="sidenav-item{{ Str::contains($routeName, ['newsCategories']) ? ' active' : '' }}">
            <a href="{{ route('newsCategories.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-albums"></i>
                <div>@lang('app.newsCategories')</div>
            </a>
        </li>

        <li class="sidenav-item{{ Str::contains($routeName, ['albums']) ? ' active' : '' }}">
            <a href="{{ route('albums.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-images"></i>
                <div>@lang('app.albums')</div>
            </a>
        </li>

        <li class="sidenav-item{{ Str::contains($routeName, ['videos']) ? ' active' : '' }}">
            <a href="{{ route('videos.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-videocam"></i>
                <div>@lang('app.videos')</div>
            </a>
        </li>

        <li class="sidenav-divider mb-1"></li>

        <li class="sidenav-item{{ Str::contains($routeName, ['administratives']) ? ' active' : '' }}">
            <a href="{{ route('administratives.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-person"></i>
                <div>@lang('app.administratives')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['contactus']) ? ' active' : '' }}">
            <a href="{{ route('contactus.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-mail-unread"></i>
                <div>@lang('app.contactus')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['reports']) ? ' active' : '' }}">
            <a href="{{ route('reports.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-mail-unread"></i>
                <div>@lang('app.reports')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['sliders']) ? ' active' : '' }}">
            <a href="{{ route('sliders.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-barcode"></i>
                <div>@lang('app.sliders')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['systems']) ? ' active' : '' }}">
            <a href="{{ route('systems.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-barcode"></i>
                <div>@lang('app.systems')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['initiatives']) ? ' active' : '' }}">
            <a href="{{ route('initiatives.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-barcode"></i>
                <div>@lang('app.initiatives')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['programs']) ? ' active' : '' }}">
            <a href="{{ route('programs.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-barcode"></i>
                <div>@lang('app.programs')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['abouts']) ? ' active' : '' }}">
            <a href="{{ route('abouts.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-barcode"></i>
                <div>@lang('app.about_us')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['pages']) ? ' active' : '' }}">
            <a href="{{ route('pages.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-paper"></i>
                <div>@lang('app.pages')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['information']) ? ' active' : '' }}">
            <a href="{{ route('information.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-paper"></i>
                <div>@lang('app.information')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['services']) ? ' active' : '' }}">
            <a href="{{ route('services.index') }}" class="sidenav-link"><i class="sidenav-icon fas fa-hands-helping d-block"></i>
                <div>@lang('app.services')</div>
            </a>
        </li>


        <li class="sidenav-divider mb-1"></li>

        <li class="sidenav-header small font-weight-semibold">@lang('app.system')</li>
        @if(env('APP_ENV') === 'dev')
            <li class="sidenav-item{{ Str::contains($routeName, ['log-viewer']) ? ' active open' : '' }}">
                <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon fas fa-user-shield d-block"></i>
                    <div>@lang('app.log_system')</div>
                </a>
                <ul class="sidenav-menu">
                    <li class="sidenav-item{{ Route::is('log-viewer::dashboard') ? ' active' : '' }}">
                        <a href="{{ route('log-viewer::dashboard') }}" class="sidenav-link">
                            <div>@lang('app.overview')</div>
                        </a>
                    </li>
                    <li class="sidenav-item{{ Route::is('log-viewer::logs.list') ? ' active' : '' }}">
                        <a href="{{ route('log-viewer::logs.list') }}" class="sidenav-link">
                            <div>@lang('app.logs')</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidenav-item{{ Str::contains($routeName , ['activityLog'])? ' active' : '' }}">
                <a href="{{ route('admin.activityLog.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-logo-game-controller-b"></i>
                    <div>@lang('app.activity')</div>
                </a>
            </li>
        @endif
        <li class="sidenav-item{{ Str::contains($routeName, ['admins']) ? ' active' : '' }}">
            <a href="{{ route('settings.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-settings"></i>
                <div>@lang('app.settings')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['admins']) ? ' active' : '' }}">
            <a href="{{ route('admins.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-people"></i>
                <div>@lang('app.admins')</div>
            </a>
        </li>
        <li class="sidenav-item{{ Str::contains($routeName, ['roles.','permissions.']) === 0 ? ' active open' : '' }}">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon fas fa-user-shield d-block"></i>
                <div>@lang('app.Roles & Permissions')</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item{{ $routeName == 'roles.index' ? ' active' : '' }}">
                    <a href="{{ route('role.index') }}" class="sidenav-link">
                        <div>@lang('app.roles')</div>
                    </a>
                </li>
                <li class="sidenav-item{{ $routeName == 'permissions.index' ? ' active' : '' }}">
                    <a href="{{ route('permission.index') }}" class="sidenav-link">
                        <div>@lang('app.permissions')</div>
                    </a>
                </li>
            </ul>
        </li>
{{--        <li class="sidenav-item{{ Str::contains($routeName, ['settings']) ? ' active' : '' }}">--}}
{{--            <a href="{{ route('settings.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-settings"></i>--}}
{{--                <div>@lang('app.settings')</div>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</div>
<!-- / Layout sidenav -->
