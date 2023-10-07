@extends('layouts.app')
@section('content')

         <div class="container-fluid contact_page">

            <div class="branch " >
               <div class="row">
                   <div class="col-md-12">
                  @if(session()->has('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}
                    </div>
                    @endif

                @if(session()->has('error'))
                    <div class="alert alert-success">
                    {{ session()->get('error') }}
                    </div>
                    @endif


                   </div>

               </div>
            </div>
            <div class="contacts">
                <form method="post" action="{{route('sendContact')}}" >
                    @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="alert alert-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                     <p>
                        <span><input type="text" name="name"  placeholder="اسمك" required="required" ></span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                     </p>
                     
                     <p>
                        <span><input type="email" name="email"  placeholder="بريدك الإلكتروني" required="required" ></span>
                                                 @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                     </p>
                     
                        <p>
                        <span><input type="tel" name="phone" value="" size="40"  placeholder="الجوال" required="required"  ></span>
                                                @error('phone') 
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>        
                        </span> 
                        @enderror                
    
                     </p>   
                    <p>
                        <span><input type="text" name="subject" value="" size="40"  placeholder="الموضوع" required="required"  ></span>
                                                @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                     </p>


                     <p class="diff">

                        <span><textarea name="message"  placeholder="رسالتك" required="required"  ></textarea></span>
                                                 @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                     </p>
                     <p><input type="submit" value="إرسال" class="wpcf7-form-control wpcf7-submit btn btn-default"></p>
                  </form>
            </div>
            <div class="maps">
            <div style="width: 100%">
                
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3098.9013370627176!2d43.937366915034254!3d26.407083283347806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjbCsDI0JzI1LjUiTiA0M8KwNTYnMjIuNCJF!5e1!3m2!1sen!2seg!4v1606166198704!5m2!1sen!2seg" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>            
            </div>
     
          </div>
          <div class="contact-group">
       <div class="row">
         <div class="col-sm">
           <div class="contact-nums">
                     <i class="fa fa-map"></i>
                    <p>القصيم / بريدة / حي النهضة / طريق الملك عبدالله</p>
            </div>
         </div>
           <div class="col-sm">
           <div class="contact-nums">
               <a href="#">
                <i class="fa fa-mobile"></i>
                 </a><a href="tel:0564292025">  
                   0564292025   
                  </a> 
               
            </div>
         </div>
           <div class="col-sm">
           <div class="contact-nums">
               <a href="#">
                    <i class="fa fa-envelope"></i>
                    </a><a href="mailto:info@alwefaaq.net">info@alwefaaq.net</a>
               
          
            </div>
         </div>
    </div>
              </div>
          
         </div>
@endsection
