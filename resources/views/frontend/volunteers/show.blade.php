@extends('layouts.app')
@section('content')



      <div class="single__  global-page">
         <div class="container">
                     @if(session()->has('success'))

            <div class="alert alert-success"> {{ session()->get('success') }} </div> @endif

                        @if(isset ($errors) && count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>

                            @endforeach
                        @endif

                        <div class="title">
                            <h2 class="mb-0">
                            {{$volunteer->name}}
                            </h2>
                            <br>
                            <h3>كود التطوع : {{$volunteer->code}}</h3>
                            <p class="data">{{ date('Y-m-d', strtotime($volunteer->created_at)) }}</p>
                            <p>شرط التقدم للتطوع :</p>
                            <p>{!! $volunteer->condition !!}</p>
                        </div>


             <!-- Button to Open the Modal -->
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                 تقديم
             </button>
             <!-- The Modal -->
          <div class="modal"
     id="myModal">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <!-- Modal Header -->
                         <div class="modal-header">
                             <h4 class="modal-title">برجاء ملئ البيانات</h4>
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                         </div>
                         <!-- Modal body -->
                         <div class="modal-body">
                             @if(isset ($errors) && count($errors) > 0)
                                 @foreach($errors->all() as $error)
                                     <div class="alert alert-danger">
                                         {{ $error }}
                                     </div>
                                 @endforeach
                             @endif
                             <form action={{url('/volunteer-applications')}} method="POST" enctype='multipart/form-data'>
                                 @csrf
                                 @method('POST')
                                 <div class="form-group" >
                                     <label for="full_name">الاسم الثلاثي</label>
                                     <input type="text" name="full_name" id="full_name" class="form-control" required="required">
                                 </div>

                                 <div class="form-group">
                                     <label for="email">الايميل</label>
                                     <input type="text" name="email" id="email" class="form-control" required="required">
                                 </div>

                                 <div class="form-group">
                                     <label for="cv">السيرة الذاتية</label>
                                     <input type="file" name="cv" id="cv" class="form-control" required="required" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf" >
                                 </div>


                                 <input type="hidden" name="volunteer_id" value="{{$id}}">
                                 <div class="form-group">
                                     <button type="submit" class="btn btn-primary">تقديم</button>
                                 </div>
                             </form>
                         </div>
                         <!-- Modal footer -->
                         <div class="modal-footer">
                             <button type="button" class="btn btn-danger" data-dismiss="modal">الغاء</button>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- #comments -->
         </div>
      </div>


@endsection

@section('customScripts')
    @if(isset ($errors) && count($errors) > 0)
    <script>
        $("#myModal").modal()
    </script>
    @endif
@endsection
