مرحبا, <i>{{ $demo->username }}</i>,
<p>يوجد لديكم رسالة جديدة</p>

<p><u>الموضوع : {{$demo->subject}}</u></p>

<div>
{{--    <p><b>Demo One:</b>&nbsp;{{ $demo->username }}</p>--}}
    <p>محتوى الرسالة :</p>
    <p>{{$demo->content}}</p>
</div>

<br/>
<i>المرسل : {{$demo->from}}</i>
