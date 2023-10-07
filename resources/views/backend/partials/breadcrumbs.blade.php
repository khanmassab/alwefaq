<?php $routeName = Route::currentRouteName(); ?>
@if($routeName != 'dashboard')
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">
            {{--@lang('app.dashboard')--}}
            @for($i = 1; $i <= count(Request::segments()) ; $i++)
                @if(is_numeric(Str::replaceArray('-',[' '],Request::segment($i))))
                    @continue
                @endif
                @if($i < count(Request::segments()) && $i > 0)
                     {{trans('app.' . Str::replaceArray('-',[' '],Request::segment($i)))}} /
                @else
                     </span>{{trans('app.' . Str::replaceArray('-',[' '],Request::segment($i)))}}
                @endif
            @endfor
    </h4>
@endif

