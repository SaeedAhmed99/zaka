@extends('frontEnd.layout')
<link href="{{ URL::asset('assets/frontend/css/background-style-rtl.min9322.css') }}" rel="stylesheet"/>
@if(@Helper::currentLanguage()->code == 'en')
<style type="text/css">
    .text-justify1{
        text-align:end !important;
    }
.fa {
    display: unset !important;
    }
    .who{
        text-align: left !important;
    }
    #h3{
        margin-left: 20px;

    }
    #p{
        margin-left: 25px;
    }
    .PointAndImg img {
    margin-left: 20px;
    margin-bottom: 9px;
    margin-top: 24px;
}
</style>
@else
<style type="text/css">
    .text-justify1{
        text-align:justify; !important;
    }

</style>
@endif
<style type="text/css">
.containerPage {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 0;
    margin: 0;
}


/*  */

.container1 {
    width: 1320px;
    display: flex;
    justify-content: space-between;
}

.who {
    width: 50%;
    background-color: hsl(72deg 33% 97%);
}

.video {
    width: 50%;
    background-color: hsl(72deg 33% 97%);
}

@media only screen and (max-width:767px) {
    .container1 {
        display: block;
    }
    .who {
        width: 100% !important;
    }
    .video {
        width: 100% !important;
    }
}


/* who */

.who {
    padding: 30px;
    text-align: right;
}

.who label {
    font-size: 30px;
    font-weight: bold;
    font-family: smart4ds, sans-serif;
    display: flex;
}

.who label span {
    color: hsl(19deg 84% 55%);
    font-family: smart4ds, sans-serif;
}

.UnderLine {
    width: 31px;
    height: 2px;
    background-color: hsl(19deg 84% 55%);
    position: absolute;
    margin-top: 10px;
}

.who p {
    margin-top: 30px;
    font-size: 14px;
    line-height: 1.5;
    font-family: smart4ds, sans-serif;
    color: hsl(60deg 1% 42%);
    margin-bottom: 60px;
     display: flex;
}

.who .PointAndImg {
    display: flex;
    margin-top: 20px;
    font-family: smart4ds, sans-serif;
}

.PointAndImg h2 {
    LINE-HEIGHT: .7;
    MARGIN-BOTTOM: 15PX;
    color: hsl(72deg 6% 17%);
}

.PointAndImg p {
    font-size: 14px;
    margin: 0;
    color: hsl(60deg 1% 42%);
}

.PointAndImg img {
    margin-left: 20px;
    margin-bottom:9px;
}

.vedios {
    margin-top: 35px;
}

div#order1 {
    order: 0 !important;
    width: 100%;
}

div#order2 {
    order: 1 !important;
}

.showVideo {
    display: flex;
    flex-wrap: wrap;
}

@media only screen and (max-width: 500px) {
    .who {
        padding: 0px !important;
    }
    .who .PointAndImg {
        display: block;
    }
    .PointAndImg {
        padding: 10px;
    }
    .container1 {
        padding: 5px;
    }
    .who p {
        padding: 10px;
    }
}

@media only screen and (max-width: 767px) {
     .who {
        padding: 10px !important;
    }
    .who .PointAndImg {
        display: block;
    }
    .PointAndImg {
        padding: 10px;
    }
    .container1 {
        padding: 5px;
    }
    .who p {
        padding: 10px;
    }
    div#order1 {
        order: 1 !important;
    }
    div#order2 {
        order: 0 !important;
    }

}
</style>
@section('content')
  <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('Home') }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
                        </li>
                          <?php
                            $menu_title_var = "title_" . @Helper::currentLanguage()->code;
                            $menu_title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $slug_var = "seo_url_slug_" . @Helper::currentLanguage()->code;
                            $slug_var2 = "seo_url_slug_" . env('DEFAULT_LANGUAGE');
                            ?>
                           @foreach($websiteNavbar as $key => $value)
                            <?php
                            if ($value->$menu_title_var != "") {
                                $link_title = $value->$menu_title_var;
                            } else {
                                $link_title = $value->$menu_title_var2;
                            }

                            $url = URL(\Request::getPathInfo());

                            ?>
                            @if(URL($value->url) == $url)
                            <li>{{$link_title}}</li>
                            @endif
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
     @if(!empty($HomePage))
      
            <section class="content-row-no-bg" >
               
                   <div class="containerPage">
<div class="container1">
    @if(@Helper::currentLanguage()->code == 'ar')
     @foreach($HomePage->webmasterSection->customFields->where("in_listing",true) as $customField)
            @if($customField->lang_code == 'ar')
               @foreach ($HomePage->fields as $t_field)
       @if ($t_field->field_id == $customField->id)
        
     @if ($t_field->field_id == '25') 
<div class="who"><label><label>
    {{$t_field->field_value}}
</label></label>
<div class="UnderLine">&nbsp;</div>
@endif
@if($t_field->field_id == '27') 
<p style="text-align:right">{{$t_field->field_value}}</p>
@endif
@endif

@endforeach

@endif
@endforeach
@else
  @foreach($HomePage->webmasterSection->customFields->where("in_listing",true) as $customField)
            @if($customField->lang_code == 'en')
               @foreach ($HomePage->fields as $t_field)
       @if ($t_field->field_id == $customField->id)
        
     @if ($t_field->field_id == '26') 
<div class="who"><label><label>
    {{$t_field->field_value}}
</label></label>
<div class="UnderLine">&nbsp;</div>
@endif
@if($t_field->field_id == '28') 
<p class="text-justify">{{$t_field->field_value}}</p>
@endif
@endif

@endforeach

@endif
@endforeach

@endif

<div class="PointAndImg"><img src="https://zakatpal.ps/wp-content/uploads/2021/11/img1.png" alt="صورة" width="150" height="100" /><br />
<div>
<h3 id="h3">1. {{__('frontend.vision_title')}}</h3>
<p id="p">{{__('frontend.vision_desc')}}</p>
</div>
</div>
<div class="PointAndImg"><img src="https://zakatpal.ps/wp-content/uploads/2021/11/Screen-01-%E2%80%93-2-2.png" alt="صورة" width="150" height="100" /><br />
<div>
<h3 id="h3">2. {{__('frontend.message_title')}}</h3>
<p id="p">{{__('frontend.message_desc')}}</p>
</div>
</div>
</div>
<div class="who showVideo">
<div id="order1"><label><label>{{__('frontend.watch_video')}}</label></label>
<div class="UnderLine">&nbsp;</div>
<div class="vedios"><iframe src="https://www.youtube.com/embed/6GbLTNaNIJA" width="100%" height="250">
                    </iframe></div>
</div>
<div id="order2" class="PointAndImg"><img src="https://zakatpal.ps/wp-content/uploads/2021/11/Screen-01-%E2%80%93-2.png" alt="صورة" width="150" height="100" /><br />
<div>
<h3 id="h3">3. {{__('frontend.value_title')}}</h3>
<p id="p">{{__('frontend.value_desc')}}</p>
</div>
</div>
</div>
</div>
</div>
              
            </section>
       
    @endif
  

    
        <section class="content-row-no-bg">
          
            <div class="container">
                <div class="row">
                   <?php
                                    $title_var = "title_" . @Helper::currentLanguage()->code;
                                    $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                                    $details_var = "details_" . @Helper::currentLanguage()->code;
                                    $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                                    $section_url = "";
                                   
                                    ?>
                        <div id="owl-slider8" class="owl-carousel owl-theme listing">
                             @foreach($files as $HomeTopic)
                                <?php
                                if ($HomeTopic->$title_var != "") {
                                    $title = $HomeTopic->$title_var;
                                } else {
                                    $title = $HomeTopic->$title_var2;
                                }
                                if ($HomeTopic->$details_var != "") {
                                    $details = $details_var;
                                } else {
                                    $details = $details_var2;
                                }
                                if ($section_url == "") {
                                    $section_url = Helper::sectionURL($HomeTopic->webmaster_id);
                                }

                                   
                             ?>
                               <div class="item">
                                   
                                    @if($HomeTopic->photo_file !="")
                                        <img src="{{ URL::to('uploads/topics/'.$HomeTopic->photo_file) }}"
                                             alt="{{ $title }}"  style="border-radius:50%;width: 120px !important;display: initial !important;"  />
                                    @endif
                                    <h4 style="color: #2e3e4e !important;">{{ $title }}</h4>
                                           <?php
                                                $seo_url_slug_var = "seo_url_slug_" . @Helper::currentLanguage()->code;        
                                             ?>
                                             <a class="btn btn-lg submit-btn btn-theme" href="{{ URL::to('uploads/topics/'.$HomeTopic->attach_file) }}" target="_blank">{{__('frontend.show')}}</a>
                                   
                                        
                                
                                    
                                 <!--    <p class="text-justify1">{!! mb_substr(strip_tags($HomeTopic->$details),0, 80)."..." !!}
                                        &nbsp; <a
                                            href="{{ Helper::topicURL($HomeTopic->id) }}">{{ __('frontend.readMore') }}
                                            <i
                                                class="fa fa-caret-{{ @Helper::currentLanguage()->right }}"></i></a>
                                    </p> -->

                                </div>
                              

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>       
<!--         <section>   
 <div class="containerPage">
        <div class="container1">
<div class="who showVideo">
                <div id="order1">
                   @if(@Helper::currentLanguage()->code == 'ar')
     @foreach($aboutPage->webmasterSection->customFields->where("in_listing",true) as $customField)
            @if($customField->lang_code == 'ar')
               @foreach ($aboutPage->fields as $t_field)
       @if ($t_field->field_id == $customField->id)
        
     @if ($t_field->field_id == '29') 
                <label>{{$t_field->field_value}}</label>
                 <div class="UnderLine"></div>

                <div class="vedios">
                        <iframe width="100%" height="250" src="{{asset('uploads/hiqal.png')}}">
                    </iframe>
                    </div>
               
                 @endif
                  
               @endif
               @endforeach
               @endif
               @endforeach

               @else
                @foreach($aboutPage->webmasterSection->customFields->where("in_listing",true) as $customField)
            @if($customField->lang_code == 'en')
               @foreach ($aboutPage->fields as $t_field)
       @if ($t_field->field_id == $customField->id)
        
     @if ($t_field->field_id == '30') 
                <label>{{$t_field->field_value}}</label>
                 <div class="UnderLine"></div>
                
                 
                <div class="vedios">
                        <iframe width="100%" height="250" src="{{asset('uploads/hiqal.png')}}">
                    </iframe>
                    </div>
                 @endif
               @endif
               @endforeach
               @endif
               @endforeach
                @endif
                   
                </div>

               

            </div>

            <div class="who">
                 @if(@Helper::currentLanguage()->code == 'ar')
     @foreach($aboutPage->webmasterSection->customFields->where("in_listing",true) as $customField)
            @if($customField->lang_code == 'ar')
               @foreach ($aboutPage->fields as $t_field)
       @if ($t_field->field_id == $customField->id)
        
     @if ($t_field->field_id == '25') 
                <label>{{$t_field->field_value}}</label>
                 <div class="UnderLine"></div>
                 @endif
                  @if ($t_field->field_id == '27') 
                <p>
                    {{$t_field->field_value}}
                    </p>
                @endif
               @endif
               @endforeach
               @endif
               @endforeach


               @else

                @foreach($aboutPage->webmasterSection->customFields->where("in_listing",true) as $customField)
            @if($customField->lang_code == 'en')
               @foreach ($aboutPage->fields as $t_field)
       @if ($t_field->field_id == $customField->id)
        
     @if ($t_field->field_id == '26') 
                <label>{{$t_field->field_value}}</label>
                 <div class="UnderLine"></div>
                 @endif
                  @if ($t_field->field_id == '28') 
                <p>
                    {{$t_field->field_value}}
                    </p>
                @endif
               @endif
               @endforeach
               @endif
               @endforeach

               @endif   
            </div>
            
        </div>
    </div>
</section> -->
<section class="content-row-no-bg">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-row-head">
                            <h2 class="heading">{{__('frontend.word')}}</h2>
                           
                        </div>
                    <section id="projects">
                               <div class="wpb_text_column wpb_content_element " >
        <div class="wpb_wrapper">
            <p style="text-align: center;"><strong>{{__('frontend.text1')}}</strong></p>
<p style="text-align: center;"><strong>{وَأَقِيمُوا الصَّلَاةَ وَآتُوا الزَّكَاةَ  وَمَا تُقَدِّمُوا لِأَنفُسِكُم مِّنْ خَيْرٍ تَجِدُوهُ عِندَ اللَّهِ  إِنَّ اللَّهَ بِمَا تَعْمَلُونَ بَصِيرٌ}</strong></p>
<p style="text-align: center;"><strong>{{__('frontend.text2')}}</strong></p>
 @if(!empty($aboutPage))
        @if(@$aboutPage->{"details_" . @Helper::currentLanguage()->code} !="")
            
                    {!! @$aboutPage->{"details_" . @Helper::currentLanguage()->code} !!}
               
        @endif
    @endif
<p style="text-align: center;"><strong>{وَمَا أَسْأَلُكُمْ عَلَيْهِ مِنْ أَجْرٍ إِنْ أَجْرِيَ إِلَّا عَلَى رَبِّ الْعَالَمِينَ}</strong></p>
<p style="text-align: center;"><strong>{{__('frontend.text3')}}</strong></p>

        </div>
    </div>
</div></div></div></div>
                            </section>
                    </div>
                </div>
                   <!-- custom scrollbar CSS -->


            </div>
        </section>
            
    @if(count($HomePartners)>0)
        <section class="content-row-no-bg top-line">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-row-head">
                            <h2 class="heading">{{ __('frontend.partners') }}</h2>
                            {{-- <small>{{ __('frontend.partnersMsg') }}</small> --}}
                        </div>
                        <div id="owl-slider7" class="owl-carousel owl-theme listing">
                            <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $details_var = "details_" . @Helper::currentLanguage()->code;
                            $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                            $section_url = "";
                            ?>
                            @foreach($HomePartners as $HomeTopic)
                                <?php
                                if ($HomeTopic->$title_var != "") {
                                    $title = $HomeTopic->$title_var;
                                } else {
                                    $title = $HomeTopic->$title_var2;
                                }
                                
                                
                                ?>
                                <div class="item">
                                    
                                    @if($HomeTopic->photo_file !="")
                                      
                                             <a href="{{ URL::to('uploads/topics/'.$HomeTopic->attach_file) }}"> 
                                                <img src="{{ URL::to('uploads/topics/'.$HomeTopic->photo_file) }}" data-placement="bottom"  alt="{{ $title }}" style="border-radius: 50%;"></a>
                                    @endif
                                      <div class="home-row-head">
                                         <a href="{{ URL::to('uploads/topics/'.$HomeTopic->attach_file) }}"> <h5>{{$title}}</h5></a>                             
                                    </div>
                                 <!--    <p class="text-justify1">{!! mb_substr(strip_tags($HomeTopic->$details),0, 80)."..." !!}
                                        &nbsp; <a
                                            href="{{ Helper::topicURL($HomeTopic->id) }}">{{ __('frontend.readMore') }}
                                            <i
                                                class="fa fa-caret-{{ @Helper::currentLanguage()->right }}"></i></a>
                                    </p> -->

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

               

            </div>
        </section>
    @endif

     
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {



$("#owl-slider7").owlCarousel({
    
       autoplay: 1000,
      // autoplay: true,
      items : 1, // THIS IS IMPORTANT
      dots : false,
    //   nav : true,
    //   navText:["<div class='swiper-button-prev' style='margin-left: -35px;'></div>","<div class='swiper-button-next' style='margin-right: -35px;'></div>"],
      responsive : {
            480 : { items : 1  }, // from zero to 480 screen width 4 items
            768 : { items : 2  }, // from 480 screen widthto 768 6 items
            1024 : { items : 6   // from 768 screen width to 1024 8 items
            }
        },
  });
$("#owl-slider8").owlCarousel({
    
       autoplay: false,
      // autoplay: true,
      items : 1, // THIS IS IMPORTANT
      responsive : {
            480 : { items : 1  }, // from zero to 480 screen width 4 items
            768 : { items : 2  }, // from 480 screen widthto 768 6 items
            1024 : { items : 5   // from 768 screen width to 1024 8 items
            }
        },
  });


});

</script>