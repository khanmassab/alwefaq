مرحبا, <i>{{ $demo->username }}</i>,
<p>يوجد لديكم شكوى/ بلاغ جديد</p>

<p><u>موضوع الشكوى/ البلاغ : {{$demo->subject}}</u></p>

<div>
{{--    <p><b>Demo One:</b>&nbsp;{{ $demo->username }}</p>--}}
    <p>محتوى الشكوى/ البلاغ :</p>
    <p>{{$demo->content}}</p>
</div>

<br/>
<i>المرسل : {{$demo->from}}</i>
