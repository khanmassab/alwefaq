@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_system'))
@section('page-heading', trans('app.edit_system'))
@else
    @section('page-title', trans('app.add_system'))
@section('page-heading', trans('app.add_system'))
@endif

@section('content')
    @if($edit)
        {!! Form::open(['route' => ['systems.update',$system->id], 'method' => 'PUT','files' => true, 'id' => 'system-form']) !!}
    @else
        {!! Form::open(['route' => 'systems.store', 'files' => true, 'id' => 'system-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.system_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.title')</label>
                <div class="col-sm-10">
                    {!! Form::text('title',$edit ? $system->title : old('title'),['class' => 'form-control','placeholder' => trans('app.title')]) !!}
                </div>
            </div>
{{--            <div class="form-group row">--}}
{{--                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.content')</label>--}}
{{--                <div class="col-sm-10">--}}
{{--                    {!! Form::text('content',$edit ? $system->content : old('content'),['class' => 'form-control','placeholder' => trans('app.content')]) !!}--}}
{{--                </div>--}}
{{--            </div>--}}
            <!--<div class="form-group row">-->
            <!--    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.content')</label>-->
            <!--    <div class="col-sm-10">-->
            <!--        {!! Form::text('content',$edit ? $system->content : old('content'),['class' => 'form-control','placeholder' => trans('app.content')]) !!}-->
            <!--    </div>-->
            <!--</div>-->
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.url')</label>
                <div class="col-sm-10">
                    {!! Form::url('url',$edit ? $system->url : old('url'),['class' => 'form-control','placeholder' => trans('app.url')]) !!}
                </div>
            </div>

{{--            @if($edit)--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>--}}
{{--                    <div class="img-thumbnail">--}}
{{--                        <img src="{{ $system->image }}" alt="" class="card-img-top" style="max-height: 400px">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="form-group row">--}}
{{--                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>--}}
{{--                <input {{ $edit ? '' : 'required'}} type="file" name="image">--}}
{{--            </div>--}}
            @if($edit)
                <!--<div class="form-group row">-->
                <!--    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>-->
                <!--    <div class="img-thumbnail">-->
                <!--        <img src="{{ $system->image }}" alt="" class="card-img-top" style="max-height: 400px">-->
                <!--    </div>-->
                <!--</div>-->
            @endif
            <!--<div class="form-group row">-->
            <!--    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>-->
            <!--    <input {{ $edit ? '' : 'required'}} type="file" name="image">-->
            <!--</div>-->
                    <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.parent')</label>
                <div class="col-sm-10">
                    <select class="form-control" name="parent">
                        <option value="0">choose parent</option>
                        @foreach($parents as $parent)
                        @if($edit)
                        <option @if($system->parent == $parent->id || $parent->id == old('parent')) selected="selected" @endif value="{{ $parent->id }}">{{ $parent->title }}</option>
                            @else
                                <option @if($parent->id == old('parent')) selected="selected" @endif value="{{ $parent->id }}">{{ $parent->title }}</option>

                            @endif
                            @endforeach
                    </select>
                </div>
            </div>
        
            <div class="form-group row">
                <div class="col-sm-10 ml-sm-auto">
                    <button type="submit" class="btn rounded-pill btn-success">
                        @if($edit)
                            @lang('app.update')
                        @else
                            @lang('app.save')
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop
