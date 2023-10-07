@extends('layouts.user')
@section('body_class')
    marriage_requests
@endsection

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class=" accordion bg_marriage_crequests" id="accordionExamplee">
        <div class="card" style="background:transparent">
            <div class="card-header" id="headingg">
                <h2 class="mb-0">
                    {{-- <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tabs" aria-expanded="true" aria-controls="tabs"> --}}
                    <div class="top_requests">
                        <div class="title_">
                            <h2>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30.5" height="30.473"
                                        viewBox="0 0 30.5 30.473">
                                        <g id="wedding-rings" transform="translate(0 -0.232)">
                                            <path id="Path_11761" data-name="Path 11761"
                                                d="M318.571,10.16a.952.952,0,0,0,.719,0c.227-.092,5.56-2.31,5.56-6.217A3.742,3.742,0,0,0,321.086.232,3.792,3.792,0,0,0,318.93.9a3.792,3.792,0,0,0-2.155-.669,3.742,3.742,0,0,0-3.764,3.712C313.011,7.85,318.344,10.068,318.571,10.16Zm-1.8-8.024a1.877,1.877,0,0,1,1.431.654.952.952,0,0,0,1.448,0,1.877,1.877,0,0,1,1.431-.654,1.836,1.836,0,0,1,1.859,1.807c0,1.987-2.623,3.636-4.008,4.291-1.04-.5-4.021-2.135-4.021-4.291a1.836,1.836,0,0,1,1.859-1.807Z"
                                                transform="translate(-294.382)" fill="#fff" />
                                            <path id="Path_11762" data-name="Path 11762"
                                                d="M20.733,100.861A11.445,11.445,0,0,0,8.127,96.578,11.624,11.624,0,0,0,.27,105.061a11.187,11.187,0,0,0,.416,6.292,11.47,11.47,0,0,0,8.579,7.388l.009,0a11.009,11.009,0,0,0,1.7.2.952.952,0,1,0,0-1.9,9.514,9.514,0,0,1-8.492-6.323l0-.007a9.292,9.292,0,0,1,1.984-9.632,9.492,9.492,0,0,1,13.987,0,10,10,0,1,0,2.285-.21Zm-.232,18.09A8.044,8.044,0,0,1,16.4,117.83a11.451,11.451,0,0,0,6.445-11.275,11.306,11.306,0,0,0-.352-2.007l0-.016a.952.952,0,0,0-1.859.412c0,.012.01.047.025.1a9.365,9.365,0,0,1,.291,1.666v.007a9.538,9.538,0,0,1-6.256,9.763,8.09,8.09,0,1,1,5.813,2.468Zm1.985-14.413c0,.015.006.027.007.033C22.492,104.56,22.489,104.549,22.487,104.538Z"
                                                transform="translate(0 -90.151)" fill="#fff" />
                                        </g>
                                    </svg>
                                </span>
                                طلبات الزواج
                            </h2>
                        </div>
                        <div class="id_">
                            <span> رقم العضوية : </span>
                            <span>{{ Auth::user()->id }}</span>
                        </div>
                        <div class="id_">
                            <span> رقم الطلب : </span>
                            <span># {{ $request->unique_id }}</span>
                        </div>
                        <div class="id_">
                            <span> <a href="{{ url('marriage-request/edit/' . $request->id) }}">تعديل الطلب</a> </span>
                        </div>

                        <div class="id_">
                            <span> <a href="{{ url('marriage-request/delete/' . $request->id) }}">حذف الطلب</a> </span>
                        </div>

                        {{-- <div class="icon_" align="left"> --}}
                        {{--    <svg xmlns="http://www.w3.org/2000/svg" width="46.617" height="46.617" viewBox="0 0 46.617 46.617"> --}}
                        {{-- <g id="Group_779" data-name="Group 779" transform="translate(-239.383 -261.678)"> --}}
                        {{--    <rect id="Rectangle_593" data-name="Rectangle 593" width="46.617" height="46.617" rx="15" transform="translate(239.383 261.678)" fill="#fff" opacity="0.1" /> --}}
                        {{--    <path id="Path_11496" data-name="Path 11496" d="M0,21.5,10.75,10.75,0,0" transform="translate(273.5 280.549) rotate(90)" fill="rgba(255,255,255,0.22)" /> --}}
                        {{-- </g> --}}
                        {{--    </svg> --}}
                        {{-- </div> --}}
                    </div>
                    {{-- </button> --}}
                </h2>
            </div>
            <div id="tabs" class="collapse show " aria-labelledby="headingg" data-parent="#accordionExamplee">
                <div class="card-body">
                    <div class="bg_marriage_crequests">

                        @if (count($suggests) > 0)
                            @foreach ($suggests as $key => $suggest)
                                @php
                                    
                                    $checkMatchDone = App\Models\MatchRequest::where('match_request_id', $suggest->id)
                                        ->where('request_id', $request->id)
                                        ->where('user_id', auth()->user()->id)
                                        ->first();
                                @endphp

                                <div class="marriage_requests_content d-flex">
                                    <div class="item">{{ ++$key }}</div>
                                    <div class="item"> المرشح {{ $key }}</div>
                                    <div class="item"><span>رقم طلب المرشح : </span>
                                        <span>#{{ $suggest->unique_id }}</span></div>
                                    @if ($checkMatchDone)
                                        <div class="item"><span> تم تقديم طلب للتوافق برقم : </span>
                                            <span>#{{ $checkMatchDone->id }}</span></div>
                                    @endif

                                    <div class="item">
                                        <div class="dropdown">
                                            {{-- <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"> --}}
                                            {{--                                       <svg xmlns="http://www.w3.org/2000/svg" width="4.609" height="19.975" viewBox="0 0 4.609 19.975"> --}}
                                            {{--                                             <g id="Group_611" data-name="Group 611" transform="translate(-18.053 -10.371)"> --}}
                                            {{--                                        <path id="Path_11787" data-name="Path 11787" d="M1784.609,302.3a2.3,2.3,0,1,1-2.3-2.3A2.3,2.3,0,0,1,1784.609,302.3Z" transform="translate(-1761.947 -289.629)" fill="#585858" /> --}}
                                            {{--                                                  <path id="Path_11788" data-name="Path 11788" d="M1784.609,312.3a2.3,2.3,0,1,1-2.3-2.3A2.3,2.3,0,0,1,1784.609,312.3Z" transform="translate(-1761.947 -291.947)" fill="#585858" /> --}}
                                            {{--                                                   <path id="Path_11789" data-name="Path 11789" d="M1784.609,322.3a2.3,2.3,0,1,1-2.3-2.3A2.3,2.3,0,0,1,1784.609,322.3Z" transform="translate(-1761.947 -294.264)" fill="#585858" /> --}}
                                            {{--                                                </g> --}}
                                            {{--                                            </svg> --}}
                                            {{--                                       </button> --}}
                                            {{--                                       <div class="dropdown-menu"> --}}
                                            <a href="{{ route('marriageRequest.show', $suggest->id) }}">
                                                {{--                                                <span class="svg"> --}}
                                                {{--                                                    <svg id="edit" xmlns="http://www.w3.org/2000/svg" width="9.434" height="9.434" viewBox="0 0 9.434 9.434"> --}}
                                                {{--                                                        <g id="Group_635" data-name="Group 635"> --}}
                                                {{--                                                           <path id="Path_11871" data-name="Path 11871" d="M8.881.553a1.887,1.887,0,0,0-2.669,0L.937,5.828a.369.369,0,0,0-.094.162L.014,8.966a.368.368,0,0,0,.456.453l2.977-.846a.368.368,0,0,0,.16-.615L1.73,6.077,6.1,1.7,7.728,3.331,4.381,6.669a.369.369,0,0,0,.52.522L8.881,3.222a1.887,1.887,0,0,0,0-2.669ZM2.642,8.036.9,8.531l.488-1.753ZM8.36,2.7l-.11.11L6.623,1.183l.109-.109A1.15,1.15,0,0,1,8.36,2.7Z" transform="translate(0 0)" fill="#3e4954" /> --}}
                                                {{--                                                        </g> --}}
                                                {{--                                                    </svg> --}}
                                                {{--                                                </span> --}}
                                                عرض المواصفات
                                            </a>
                                            {{--                                        </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h2 class="py-3 text-center">لا يوجد مرشحين</h2>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
