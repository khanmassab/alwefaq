مرحبا <i>{{ $demo->username }}</i>,
<p>لقد تم تسجيلك بنجاح في الوفاق!</p>

<p><u>برجاء تفعيل حسابك لتتمكن من تسجيل الدخول</u></p>

<div>
{{--    <p><b>Demo One:</b>&nbsp;{{ $demo->username }}</p>--}}
    <p><a href="{{ $demo->urlVerfiy }}" target="_blank"><b>انقر هنا لتفعيل الحساب</b></a> </p>
</div>

شكرا لك,
<br/>
{{--<i>{{ $demo->sender }}</i>--}}
<i>جمعية الوفاق</i>
