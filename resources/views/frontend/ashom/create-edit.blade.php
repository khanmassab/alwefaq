<!Doctype html>
<html>
<head>
    <title>
        TEST
    </title>
</head>
<body>
<div class="col-md-9 offset-md-2">
    <br>
    <h3> Edit Profile </h3>
    <hr>

    @if(isset ($errors) && count($errors) > 0)
        var positionClass = (($('body').attr('dir') === 'rtl') ? 'toast-top-left' : 'toast-top-right');
        @foreach($errors->all() as $error)
            <h3>
                {{ $error }}
            </h3>
        @endforeach
            @endif


    <form action={{url('/helpRequests')}} method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">first_name</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">middle_name</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">last_name</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">phoneNumber</label>
            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">value_request</label>
            <input type="text" name="value_request" id="value_request" class="form-control">
        </div>

{{--        <div class="form-group">--}}
{{--            <label for="title">item</label>--}}
{{--            <input type="text" name="value_request" id="value_request" class="form-control">--}}
{{--        </div>--}}

        <input type="checkbox" name="items[]" value="7">
        <input type="checkbox" name="items[]" value="5">
        <input type="checkbox" name="items[]" value="9">

        <input type="hidden" name="type" value="item">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create request</button>
        </div>
    </form>
{{--    <a href="{{url('/profile/changePassword')}}" class="btn btn-primary">Change Password</a>--}}
</div>
</body>
</html>
