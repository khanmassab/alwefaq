@extends('layouts.user')
@section('body_class')
 fill_data shp
@endsection

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
        <h1>تم الدفع بنجاح</h1>

@endsection
