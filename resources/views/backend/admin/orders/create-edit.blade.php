@extends('backend.layouts.layout-2')

@section('page-title', 'الطلب')
@section('page-heading', 'الطلب')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ mix('/vendor/libs/bootstrap-markdown/bootstrap-markdown.css') }}">
    <link rel="stylesheet" href="{{ mix('/vendor/libs/quill/typography.css') }}">
    <link rel="stylesheet" href="{{ mix('/vendor/libs/quill/editor.css') }}">
@endsection

@section('scripts')
    @parent
    <!-- Dependencies -->
    <script src="{{ mix('/vendor/libs/markdown/markdown.js') }}"></script>
    <script src="{{ mix('/vendor/libs/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
    <script>
        // Quill does not support IE 10 and below so don't load it to prevent console errors
        if (typeof document.documentMode !== 'number' || document.documentMode > 10) {
            document.write('\x3Cscript src="{{ mix('/vendor/libs/quill/quill.js') }}">\x3C/script>');
        }
    </script>

    <script type="application/javascript">
        // Quill
        $(function () {
            if (!window.Quill) {
                return $('#quill-editor,#quill-toolbar,#quill-bubble-editor,#quill-bubble-toolbar').remove();
            }
            var editor = new Quill('#quill-editor', {
                modules: {
                    toolbar: '#quill-toolbar'
                },
                placeholder: 'Type something',
                theme: 'snow',
            });

            // Get HTML content:
            //
            var form = document.getElementById('page-form');
            form.onsubmit = function() {
                // Populate hidden form on submit
                var content = document.querySelector('input[name=content]');
                content.value = (editor.root.innerHTML);
            };
        });
    </script>
@endsection

@section('content')
    @if($edit)
        {!! Form::open(['route' => ['orders.update',$request->id], 'method' => 'PUT','files' => true, 'id' => 'page-form']) !!}
    @else
        {!! Form::open(['route' => 'orders.store', 'files' => true, 'id' => 'page-form']) !!}
    @endif
    <div class="card mb-4">
        <h6 class="card-header">
            @lang('app.page_details')
        </h6>
        <div class="card-body">
            <table class="table table-hover">

                <tbody>
                    <tr>
                    <td><strong>رقم الطلب</strong></td>
                    <td>{{ $request->id }}</td>
                </tr>

                <tr>
                    <td width="20%"><strong>اسم المستخدم</strong></td>
                    <td>{{ $request->user->first_name }}</td>
                </tr>

                <tr>
                    <td><strong>الاجمالى</strong></td>
                    <td>{{ $request->total }}</td>
                </tr>


                </tbody>
            </table>
            @if(count($order_items))

            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>اسم العنصر</th>
                        <th>النوع</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>الاجمالى</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_items as $item)
                        <tr>
                            @if($item->type == 'ashom')
                            <td>{{$item->item_name}}</td>
                            <td>اسهم</td>

                            @elseif($item->type == 'sadakat')
                            <td>{{$item->item_name}}</td>
                            <td>صدقة</td>
                            @else
                                <td>زكاه</td>
                                <td>زكاه</td>
                            @endif

                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->price*$item->quantity}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tr>
                    <td><strong>الحوالة</strong></td>
                    <td>
                        <a href="{{$request->transfer->image}}" target="_blank"  data-fancybox class="gallery">

                            <div class="item">
                                <img src="{{ $request->transfer->image}}" alt="" style="max-width: 120px"/>
                            </div>
                        </a>
                    </td>
                </tr>
            </table>
            @endif

            <div class="form-group row">
                <label class="col-form-label col-sm-2 text-sm-right">@lang('app.status')</label>
                <div class="col-sm-10">

                    <select class="form-control" name="status" required>
                        <option value="0">يتم المراجعة</option>
                        <option value="1">تم التاكيد</option>
                        <option value="2">تم الالغاء</option>
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
