@extends('backend.layouts.layout-2')

@section('page-title', trans('app.albumImages'))
@section('page-heading', trans('app.albumImages'))



@section('content')
        {!! Form::open(['route' => ['settings.update',$setting->id], 'method' => 'PUT','files' => true, 'id' => 'page-form']) !!}
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.page_details')
        </h6>
        <div class="card-body">
            @if($setting->image1 != '')
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image') 1</label>
                    
                    <div class="img-thumbnail">
                        <a  class="btn btn-danger text-white" href="{{route('settings.destroy1')}}"><i class="ion ion-ios-trash "></i></a>
                        <img src="/public/uploads/setting/{{ $setting->image1 }}" alt="" class="card-img-top" style="max-height: 200px;width: auto;">
                    </div>
                </div>
                @endif
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image') 1</label>
                <input  type="file" name="image1">
            </div>
            @if($setting->image2 != '')
            
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image') 2</label>
                    <div class="img-thumbnail">
                        <a class="btn btn-danger text-white" href="{{route('settings.destroy2')}}"><i class="ion ion-ios-trash "></i></a>
                        <img src="/public/uploads/setting/{{ $setting->image2 }}" alt="" class="card-img-top" style="max-height: 200px;width: auto;">
                    </div>
                </div>
                
            @endif    
            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.image') 2</label>
                <input  type="file" name="image2">
            </div>
            <div class="form-group row">
                <div class="col-sm-10 ml-sm-auto">
                    <button type="submit" class="btn rounded-pill btn-success">
                            @lang('app.update')
                    </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@stop
