@extends('backend.layouts.layout-2')

@if($edit)
    @section('page-title', trans('app.edit_slider'))
@section('page-heading', trans('app.edit_slider'))
@else
    @section('page-title', trans('app.add_slider'))
@section('page-heading', trans('app.add_slider'))
@endif

@section('content')
    @if($edit)
        {!! Form::open(['route' => ['sliders.update',$slider->id], 'method' => 'PUT','files' => true, 'id' => 'slider-form']) !!}
    @else
        {!! Form::open(['route' => 'sliders.store', 'files' => true, 'id' => 'slider-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.slider_details')
        </h6>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.title')</label>
                <div class="col-sm-10">
                    {!! Form::text('title',$edit ? $slider->title : old('title'),['class' => 'form-control','placeholder' => trans('app.title')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.content')</label>
                <div class="col-sm-10">
                    {!! Form::text('content',$edit ? $slider->content : old('content'),['class' => 'form-control','placeholder' => trans('app.content')]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.url')</label>
                <div class="col-sm-10">
                    {!! Form::url('url',$edit ? $slider->url : old('url'),['class' => 'form-control','placeholder' => trans('app.url')]) !!}
                </div>
            </div>

            @if($edit)
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>
                    <div class="img-thumbnail">
                        <img src="{{ $slider->image }}" alt="" class="card-img-top" style="max-height: 400px">
                    </div>
                </div>
            @endif
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image')</label>
                <input {{ $edit ? '' : 'required'}} type="file" name="image">
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
