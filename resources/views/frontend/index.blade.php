@extends('layouts.app')
@section('content')

         <div class="sliders col-xs-12" style="max-height: 731px;">
            @foreach($sliders as $slider)
               <div class="item"><img alt="{{$slider->title}}" src="{{$slider->image}}"></div>
            @endforeach
         </div>
         
   <section class="login-reg">
      
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-body">
               <iframe width="100%" height="400" src="https://www.youtube.com/embed/LvlC0tge2Eg"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
            </div>
         </div>
      </div>
   </div>


      
    <div class="cover">
    <div class="container">
      <div class="row">

        <div class="block col-xs-12 col-md-8">
          <div class="slider-text">
              <p>
                <strong> الجمعية للدور المأمول منها</strong> <br>
               تستشعر الجمعية للدور المأمول منها وتبذل الوسع في تحقيقه بالمبادرة لابتكار حلول نوعية تخدم حاجة المستفيد 
              </p>

               <p>
                <strong> الجمعية للدور المأمول منها</strong> <br>
               تستشعر الجمعية للدور المأمول منها وتبذل الوسع في تحقيقه بالمبادرة لابتكار حلول نوعية تخدم حاجة المستفيد 
              </p>

               <p>
                <strong> الجمعية للدور المأمول منها</strong> <br>
               تستشعر الجمعية للدور المأمول منها وتبذل الوسع في تحقيقه بالمبادرة لابتكار حلول نوعية تخدم حاجة المستفيد 
              </p>


          </div><!-- slider-text -->
        </div><!-- block -->


        <div class="block col-xs-12 col-md-4">
          <div class="box">
          <a href="{{ route('login') }}">تسجيل الدخول</a>
          <a href="{{ route('register') }}">انشاء حساب </a>
          </div><!-- box -->
        </div><!-- block -->

     </div><!-- row -->  
    </div><!-- container -->  
    </div><!-- cover -->  
  </section>

  <section class="about">
    <div class="container">
      <div class="row">

        <h1 class="title">نبذة عنا</h1>


         <div class="tab_content">
               
         </div>

        <div class="blocks col-xs-12">
            @foreach($information as $info)
               <div class="block col-xs-12 col-md-3">
                  
                  @if($info->title == 'من نحن')
                     <i class="fa fa-eye"></i>
                  @elseif($info->title == 'الرسالة')
                     <i class="fa fa-envelope-o"></i>
                  @elseif($info->title == 'القيم')
                     <i class="fa fa-trophy"></i>
                  @else
                     <i class="fa fa-bullseye"></i>
                  @endif
                  <h3>{{$info->title}}</h3>
                  <p><?=$info->content?></p>
               </div>
            @endforeach
        </div><!-- blocks -->



     </div><!-- row -->  
    </div><!-- container -->  
  </section>
  <section class="serviess">
    <div class="container">
      <div class="row">

        <h1 class="title"> الخدمات  </h1>

        <ul>

          <li class="col-xs-12 col-sm-4 col-md-3"> 
            <div class="box">
            <img src="img/icon.png">
            التوعية فى الحد من ظاهرة التأخير فى الزواج 
            <p>   التوعية فى الحد من ظاهرة التأخير فى الزواج    التوعية فى الحد من ظاهرة التأخير فى الزواج    التوعية فى الحد من ظاهرة التأخير فى الزواج    التوعية فى الحد من ظاهرة التأخير فى الزواج </p>
            </div>
          </li>
          
           <li class="col-xs-12 col-sm-4 col-md-3"> 
            <div class="box">
            <img src="img/icon.png">
            تأهيل المقبلين على الزواج والمتزوجين بالقضايا الأسرية 
            <p>تأهيل المقبلين على الزواج والمتزوجين بالقضايا الأسرية تأهيل المقبلين على الزواج والمتزوجين بالقضايا الأسرية تأهيل المقبلين على الزواج والمتزوجين بالقضايا الأسرية تأهيل المقبلين على الزواج والمتزوجين بالقضايا الأسرية </p>
            </div>
          </li>
          
          
           <li class="col-xs-12 col-sm-4 col-md-3"> 
            <div class="box">
            <img src="img/icon.png">
            التوفيق بين الراغبين بالزواج بطريقة موثقة 
            <p>التوفيق بين الراغبين بالزواج بطريقة موثقة التوفيق بين الراغبين بالزواج بطريقة موثقة التوفيق بين الراغبين بالزواج بطريقة موثقة التوفيق بين الراغبين بالزواج بطريقة موثقة </p>
            </div>
          </li>
          
          
           <li class="col-xs-12 col-sm-4 col-md-3"> 
            <div class="box">
            <img src="img/icon.png">
            تقديم الخدمات التثقيفية والإرشاد الأسري للمقبلين على الزواج 
            <p> تقديم الخدمات التثقيفية والإرشاد الأسري للمقبلين على الزواج  تقديم الخدمات التثقيفية والإرشاد الأسري للمقبلين على الزواج  تقديم الخدمات التثقيفية والإرشاد الأسري للمقبلين على الزواج  تقديم الخدمات التثقيفية والإرشاد الأسري للمقبلين على الزواج </p>
            </div>
          </li>
          
         <li class="col-xs-12 col-sm-4 col-md-3"> 
            <div class="box">
            <img src="img/icon.png">
            الاستشارات
            <p> <a href="file1.pdf">اضغط هنا   </a>
              </p>
            </div>
          </li>
          
         

        </ul>


     </div><!-- row -->  
    </div><!-- container -->  
  </section>
  <section class="num">
    <div class="container">
      <div class="row">
        <h1 class="title">الجمعية فى ارقام</h1>


        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="2807">0</span></h1>
            <h3>عدد المسجلين </h3>
          </div>
        </div>

        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="2138">0</span></h1>
            <h3> رجال </h3>
          </div>
        </div>

        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="679">0</span></h1>
            <h3> نساء </h3>
          </div>
        </div>

        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="3326">0</span></h1>
            <h3> طلبات الزواج </h3>
          </div>
        </div>

        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="2216">0</span></h1>
            <h3> الربط </h3>
          </div>
        </div>

        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="1063">0</span></h1>
            <h3> تحت الدراسة </h3>
          </div>
        </div>

        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="1115">0</span></h1>
            <h3> السؤال </h3>
          </div>
        </div>

        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="535">0</span></h1>
            <h3> الملغية </h3>
          </div>
        </div>

        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="613">0</span></h1>
            <h3> المرفوضة </h3>
          </div>
        </div>

        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="63">0</span></h1>
            <h3> الملكة </h3>
          </div>
        </div>

        <div class="number col-xs-12 col-sm-3 col-md-3">
          <div class="box">
            <h1> <span class="counter-number " data-count="59">0</span></h1>
            <h3> احتياجات </h3>
          </div>
        </div>

 

     </div><!-- row -->  
    </div><!-- container -->  
  </section>
  <section class="serviess media">
    <div class="container">
      <div class="row">
        <h1 class="title"> المركز الاعلامي </h1>
        <ul>

         @foreach($news as $new)
            <li class="col-xs-12 col-sm-4 col-md-3"> 
               <div class="box">
                  <img src="{{ $new->image }}" alt="" style="width:100%;min-height:100%" />
                  <a href="{{route('news-center.show', $new->id)}}">{{$new->title}}</a>
                  <p>{{ mb_strimwidth(strip_tags($new->content),0,74,'','utf-8') }} </p>
               </div>
            </li>
         @endforeach
        </ul>
     </div><!-- row -->  
    </div><!-- container -->  
  </section>

  <section class="contact">
    <div class="container">
      <div class="row">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">تواصل معنا</a></li>
        <!--<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">تبرع معنا</a></li>-->
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">

            <div class="block col-xs-12 col-md-4">
              <form>
                <input type="text" class="text" placeholder="الاسم *">
                <input type="mail" class="text" placeholder="البريد الالكتروني *">
                <input type="text" class="text" placeholder="العنوان *">
                <textarea class="text" placeholder="الرسالة *"></textarea>
                <input type="submit" class="submit" value="ارسال">

              </form> 
            </div><!-- block -->

        </div>
        
        <!--<div role="tabpanel" class="tab-pane" id="profile">-->
        <!--    <div class="block col-xs-12 col-md-6">-->
        <!--      <div class="box col-xs-12">-->
        <!--        <h3>بنك الراجحى</h3>-->
        <!--        SA16 8000 0663 6080 1000 4446-->
        <!--        <i class="fa fa-files-o copy1" aria-hidden="true"></i>-->
        <!--        <input class="cop" onclick="this.select(); document.execCommand('copy');" type='text' value='SA1680000663608010004446' />-->
        <!--      </div>-->
        <!--      <div class="box col-xs-12">-->
        <!--        <h3>بنك الانماء</h3>-->
        <!--        SA95 0500 0068 2027 5670 6000-->
        <!--        <i class="fa fa-files-o copy2" aria-hidden="true"></i>-->
        <!--        <input class="cop" onclick="this.select(); document.execCommand('copy');" type='text' value='SA9505000068202756706000' />-->
        <!--      </div>-->
        <!--      <div class="box col-xs-12">-->
        <!--        <h3>بنك البلاد</h3>     -->
        <!--        SA51 1500 0999 1312 0162 0006-->
        <!--        <i class="fa fa-files-o copy3" aria-hidden="true"></i>-->
        <!--        <input class="cop" onclick="this.select(); document.execCommand('copy');" type='text' value='SA5115000999131201620006' />-->
        <!--      </div>-->

        <!--    </div>-->
        <!--</div>-->
        
        
      </div>


     </div><!-- row -->  
    </div><!-- container -->  
  </section>














  <section class="serviess media">
    <div class="container">
      <div class="row">
        <h1 class="title">  الشركاء </h1>
            <div class="slider-logo">
               @foreach($partners as $partner)
                  <div class="item"><img alt="" src="{{ $partner->image }}" style="width:100%"> </div>
               @endforeach
            </div>
     </div><!-- row -->  
    </div><!-- container -->  
  </section>


@endsection

