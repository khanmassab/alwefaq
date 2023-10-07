<!Doctype html>
<html>
    <head>
        <title>
            TEST
        </title>
    </head>
    <body>
    @if(Session::get('success', false))
        <h3>
            {{  Session::get('success') }}
        </h3>
        @endif

        <div class="container">
            @foreach($sadakat as $sadaka)
                <form action={{url('/cart')}} method="POST">
                    @csrf
                    @method('POST')


                        <h1>
                            {{ $sadaka->name }}
                        </h1>
                        <h1>
                            {{ $sadaka->price }}
                        </h1>


                    <input type="number" name="quantity" value="1">
                    <input type="hidden" name="type" value="sadakat">
                    <input type="hidden" name="zakah_id" value="{{$sadaka->id}}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </div>
                </form>
            @endforeach
        </div>
    </body>
</html>
