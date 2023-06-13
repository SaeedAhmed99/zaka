@extends('frontEnd.layout')
@section('css')
    <link rel="stylesheet" href="http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="{{ URL::asset('assets/frontend/css/allcssFile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
@endsection


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
    #twitter-widget-holder
    { max-height:380px; max-width:440px;  border-radius:3px; box-shadow:2px 2px 3px rgba(0,0,0,.1); 
    }
    .content-row-bg
    {
        background: #faf3e3 !important;
    }


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
        .container {
            padding: 5px;
        }
        .who p {
            padding: 10px;
        }
    }

    @media only screen and (max-width: 767px) {
        div#order1 {
            order: 1 !important;
        }
        div#order2 {
            order: 0 !important;
        }
    }
</style>
<!-- jQuery lib -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- custom scrollbar plugin script -->
<script src="http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script async src="//platform.twitter.com/widgets.js"charset="utf-8"></script>

@section('content')

    <!-- start Home Slider -->
    @include('frontEnd.includes.slider')
    <!-- end Home Slider -->

@if(count($HomeProjectsTypes)>0)
        <section class="content-row-no-bg top-line">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-row-head">
                            <h2 class="heading head-h2" style="color: #ffff">{{ __('frontend.homeContents5Title') }}</h2>
                            {{-- <small>{{ __('frontend.homeContents5desc') }}</small> --}}
                        </div>
                        <div id="owl-slider2" class="owl-carousel owl-theme listing">
                            <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $details_var = "details_" . @Helper::currentLanguage()->code;
                            $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                            $section_url = "";
                            ?>
                            @foreach($HomeProjectsTypes as $HomeTopic)
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
                                       <a href="{{ Helper::topicURL($HomeTopic->id) }}"> <img src="{{ URL::to('uploads/topics/'.$HomeTopic->photo_file) }}"
                                             alt="{{ $title }}" class="our-projects-img"/></a>
                                    @endif
                                    <a href="{{ Helper::topicURL($HomeTopic->id) }}">
                                        <h5 class="heading head-h4" style="color: #ffff">
                                        @if($HomeTopic->icon !="")
                                            <i class="fa {!! $HomeTopic->icon !!} "></i>&nbsp;
                                        @endif
                                        {{ $title }}
                                    </h5>
                                </a>
                                    {{--Additional Feilds--}}
                                    @if(count($HomeTopic->webmasterSection->customFields->where("in_listing",true)) >0)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div>
                                                    <?php
                                                    $cf_title_var = "title_" . @Helper::currentLanguage()->code;
                                                    $cf_title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                                                    ?>
                                                    @foreach($HomeTopic->webmasterSection->customFields->where("in_listing",true) as $customField)
                                                        <?php
                                                        // check permission
                                                        $view_permission_groups = [];
                                                        if ($customField->view_permission_groups != "") {
                                                            $view_permission_groups = explode(",", $customField->view_permission_groups);
                                                        }
                                                        if (in_array(0, $view_permission_groups) || $customField->view_permission_groups == "") {
                                                        // have permission & continue
                                                        ?>
                                                        @if ($customField->in_listing)
                                                            <?php
                                                            if ($customField->$cf_title_var != "") {
                                                                $cf_title = $customField->$cf_title_var;
                                                            } else {
                                                                $cf_title = $customField->$cf_title_var2;
                                                            }


                                                            $cf_saved_val = "";
                                                            $cf_saved_val_array = array();
                                                            if (count($HomeTopic->fields) > 0) {
                                                                foreach ($HomeTopic->fields as $t_field) {
                                                                    if ($t_field->field_id == $customField->id) {
                                                                        if ($customField->type == 7) {
                                                                            // if multi check
                                                                            $cf_saved_val_array = explode(", ", $t_field->field_value);
                                                                        } else {
                                                                            $cf_saved_val = $t_field->field_value;
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                            ?>

                                                            @if(($cf_saved_val!="" || count($cf_saved_val_array) > 0) && ($customField->lang_code == "all" || $customField->lang_code == @Helper::currentLanguage()->code))
                                                                @if($customField->type ==12)
                                                                    {{--Vimeo Video Link--}}
                                                                @elseif($customField->type ==11)
                                                                    {{--Youtube Video Link--}}
                                                                @elseif($customField->type ==10)
                                                                    {{--Video File--}}
                                                                @elseif($customField->type ==9)
                                                                    {{--Attach File--}}
                                                                @elseif($customField->type ==8)
                                                                    {{--Photo File--}}
                                                                @elseif($customField->type ==7)
                                                                    {{--Multi Check--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            <?php
                                                                            $cf_details_var = "details_" . @Helper::currentLanguage()->code;
                                                                            $cf_details_var2 = "details_en" . env('DEFAULT_LANGUAGE');
                                                                            if ($customField->$cf_details_var != "") {
                                                                                $cf_details = $customField->$cf_details_var;
                                                                            } else {
                                                                                $cf_details = $customField->$cf_details_var2;
                                                                            }
                                                                            $cf_details_lines = preg_split('/\r\n|[\r\n]/', $cf_details);
                                                                            $line_num = 1;
                                                                            ?>
                                                                            @foreach ($cf_details_lines as $cf_details_line)
                                                                                @if (in_array($line_num,$cf_saved_val_array))
                                                                                    <span class="badge">
                                                            {!! $cf_details_line !!}
                                                        </span>
                                                                                @endif
                                                                                <?php
                                                                                $line_num++;
                                                                                ?>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==6)
                                                                    {{--Select--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            <?php
                                                                            $cf_details_var = "details_" . @Helper::currentLanguage()->code;
                                                                            $cf_details_var2 = "details_en" . env('DEFAULT_LANGUAGE');
                                                                            if ($customField->$cf_details_var != "") {
                                                                                $cf_details = $customField->$cf_details_var;
                                                                            } else {
                                                                                $cf_details = $customField->$cf_details_var2;
                                                                            }
                                                                            $cf_details_lines = preg_split('/\r\n|[\r\n]/', $cf_details);
                                                                            $line_num = 1;
                                                                            ?>
                                                                            @foreach ($cf_details_lines as $cf_details_line)
                                                                                @if ($line_num == $cf_saved_val)
                                                                                    {!! $cf_details_line !!}
                                                                                @endif
                                                                                <?php
                                                                                $line_num++;
                                                                                ?>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==5)
                                                                    {{--Date & Time--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! date('Y-m-d H:i:s', strtotime($cf_saved_val)) !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==4)
                                                                    {{--Date--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! date('Y-m-d', strtotime($cf_saved_val)) !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==3)
                                                                    {{--Email Address--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! $cf_saved_val !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==2)
                                                                    {{--Number--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! $cf_saved_val !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==1)
                                                                    {{--Text Area--}}
                                                                @else
                                                                    {{--Text Box--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! $cf_saved_val !!}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endif
                                                        <?php
                                                        }
                                                        ?>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{--End of -- Additional Feilds--}}
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
     

            @if(count($HomeStrategic)>0)
                <?php
                    $title_var = "title_" . @Helper::currentLanguage()->code;
                    $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                    $details_var = "details_" . @Helper::currentLanguage()->code;
                    $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                    $section_url = "";
                ?>
                <section class="content-row-bg p-b-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="home-row-head">
                                    <h2 class="heading head-h2" style="color: #ffff">{{ __('frontend.homeContents6Title') }}</h2>

                                <!--  <small style="color: #fff">{{ __('frontend.homeContents6desc') }}</small> -->
                                </div>
                                <div class="row" style="margin-bottom: 0;">
                                    @foreach($HomeStrategic as $HomeTopic)
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

                                            $col_width = 12;
                                            if (count($HomeStrategic) == 2) {
                                                $col_width = 6;
                                            }
                                            if (count($HomeStrategic) == 3) {
                                                $col_width = 4;
                                            }
                                            if (count($HomeStrategic) > 3) {
                                                $col_width = 3;
                                            }
                                        ?>
                                        <div class="col-lg-{{$col_width}}">
                                            <div class="box">
                                                <div class="box-gray aligncenter" style="height:300px !important">
                                                @if($HomeTopic->icon !="")
                                                            <div class="icon">
                                                                <i class="fa {{$HomeTopic->icon}} fa-3x"></i>
                                                            </div>
                                                        @elseif($HomeTopic->photo_file !="")
                                                            <img src="{{ URL::to('uploads/topics/'.$HomeTopic->photo_file) }}"
                                                                alt="{{ $title }}" class="our-projects-img"/>
                                                        @endif
                                                        <h5 class="heading head-h4" style="color: #ffff">{{ $title }}</h5>
                                                        @if($HomeTopic->$details !="")
                                                            <p class="text-justify">{!! $HomeTopic->$details !!}</p>
                                                        @endif
                                                

                                                </div>
                                            
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
  
            @if(count($HomeStatistics)>0)
                <?php
                    $title_var = "title_" . @Helper::currentLanguage()->code;
                    $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                    $details_var = "details_" . @Helper::currentLanguage()->code;
                    $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                    $section_url = "";
                ?>
                <!-- start statistics -->
                <div class="section" style="padding-top: 30px;">
                    <div class="container">
                    <div class="power_heading_wrapper text-center">
                        <h2 class="power_title ">ملخص الوضع الإنساني في قطاع غزة</h2>
                        <h6 style="color:#a3a3a3">المصدر: وزارة الأشغال العامة والإسكان</h6>
                        <div class="power_title_line"></div>
                    </div>
                    <div class="row" style="text-align:center;">
                        <!--gaza strip-->
                        <div class="col-lg-2 col-md-2">
                            <div class="power_iconbox type_2 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                                <div class="power_iconbox_icon">
                                    <img class="primary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/icon.png') }}" alt="Poverty Rate">
                                    <img class="secondary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/icon2.png') }}" alt="Poverty Rate">
                                </div>
                                <div class="power_iconbox_content">
                                    <h5 class="wad-h51">%69</h5>
                                    <h5 class="wad-h52">معدل الفقر</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 gazaStrip">
                            <div class="power_iconbox type_2 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                                <div class="power_iconbox_icon">
                                    <img class="primary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/issizlik_icon.png') }}" alt="Poverty Rate">
                                    <img class="secondary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/issizlik_icon2.png') }}" alt="Poverty Rate">
                                </div>
                                <div class="power_iconbox_content">
                                    <h5 class="wad-h51">%46.6</h5>
                                    <h5 class="wad-h52">معدل البطالة</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 gazaStrip">
                            <div class="power_iconbox type_2 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                                <div class="power_iconbox_icon">
                                    <img class="primary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/gida_icon.png') }}" alt="Poverty Rate">
                                    <img class="secondary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/gida_icon2.png') }}" alt="Poverty Rate">
                                </div>
                                <div class="power_iconbox_content">
                                    <h5 class="wad-h51">%62</h5>
                                    <h5 class="wad-h52">انعدام الأمن الغذائي</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 gazaStrip">
                            <div class="power_iconbox type_2 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                                <div class="power_iconbox_icon">
                                    <img class="primary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/su_icon.png') }}" alt="Poverty Rate">
                                    <img class="secondary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/su_icon2.png') }}" alt="Poverty Rate">
                                </div>
                                <div class="power_iconbox_content">
                                    <h5 class="wad-h51">%97</h5>
                                    <h5 class="wad-h52">معدل تلوث المياه</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 gazaStrip">
                            <div class="power_iconbox type_2 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                                <div class="power_iconbox_icon">
                                    <img class="primary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/ilac_icon.png') }}" alt="Poverty Rate">
                                    <img class="secondary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/ilac_icon2.png') }}" alt="Poverty Rate">
                                </div>
                                <div class="power_iconbox_content">
                                    <h5 class="wad-h51">%41</h5>
                                    <h5 class="wad-h52">نقص الدواء</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 gazaStrip">
                            <div class="power_iconbox type_2 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                                <div class="power_iconbox_icon">
                                    <img class="primary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/elektril_icon.png') }}" alt="Poverty Rate">
                                    <img class="secondary_img" loading="lazy" src="{{ URL::to('uploads/topics/icons/elektril_icon2.png') }}" alt="Poverty Rate">
                                </div>
                                <div class="power_iconbox_content">
                                    <h5 class="wad-h51">11 ساعة </h5>
                                    <h5 class="wad-h52">انقطاع التيار</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- end statistics -->    
            @endif

<!--      @if(!empty($HomePage))
      
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
       
    @endif -->
             

    <!-- @if(count($HomeProjects)>0)
        <section class="content-row-bg">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-row-head">
                            <h2 class="heading">{{ __('frontend.homeContents4Title') }}</h2>
                            <small style="color: #fff">{{ __('frontend.homeContents4desc') }}</small>
                        </div>
                        <div id="owl-slider3" class="owl-carousel owl-theme listing">
                            <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $details_var = "details_" . @Helper::currentLanguage()->code;
                            $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                            $section_url = "";
                            ?>
                            @foreach($HomeProjects as $HomeTopic)
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
                                <div class="item" style="height: 450px;" >
                                        @if($HomeTopic->photo_file !="")
                                        <img src="{{ URL::to('uploads/topics/'.$HomeTopic->photo_file) }}"
                                             alt="{{ $title }}"/>
                                    @endif
                                    <h4>
                                        @if($HomeTopic->icon !="")
                                            <i class="fa {!! $HomeTopic->icon !!} "></i>&nbsp;
                                        @endif
                                        {{ $title }}
                                    </h4>
                                

                                    {{--Additional Feilds--}}
                                    @if(count($HomeTopic->webmasterSection->customFields->where("in_listing",true)) >0)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div>
                                                    <?php
                                                    $cf_title_var = "title_" . @Helper::currentLanguage()->code;
                                                    $cf_title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                                                    ?>
                                                    @foreach($HomeTopic->webmasterSection->customFields->where("in_listing",true) as $customField)
                                                        <?php
                                                        // check permission
                                                        $view_permission_groups = [];
                                                        if ($customField->view_permission_groups != "") {
                                                            $view_permission_groups = explode(",", $customField->view_permission_groups);
                                                        }
                                                        if (in_array(0, $view_permission_groups) || $customField->view_permission_groups == "") {
                                                        // have permission & continue
                                                        ?>
                                                        @if ($customField->in_listing)
                                                            <?php
                                                            if ($customField->$cf_title_var != "") {
                                                                $cf_title = $customField->$cf_title_var;
                                                            } else {
                                                                $cf_title = $customField->$cf_title_var2;
                                                            }


                                                            $cf_saved_val = "";
                                                            $cf_saved_val_array = array();
                                                            if (count($HomeTopic->fields) > 0) {
                                                                foreach ($HomeTopic->fields as $t_field) {
                                                                    if ($t_field->field_id == $customField->id) {
                                                                        if ($customField->type == 7) {
                                                                            // if multi check
                                                                            $cf_saved_val_array = explode(", ", $t_field->field_value);
                                                                        } else {
                                                                            $cf_saved_val = $t_field->field_value;
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                            ?>

                                                            @if(($cf_saved_val!="" || count($cf_saved_val_array) > 0) && ($customField->lang_code == "all" || $customField->lang_code == @Helper::currentLanguage()->code))
                                                                @if($customField->type ==12)
                                                                    {{--Vimeo Video Link--}}
                                                                @elseif($customField->type ==11)
                                                                    {{--Youtube Video Link--}}
                                                                @elseif($customField->type ==10)
                                                                    {{--Video File--}}
                                                                @elseif($customField->type ==9)
                                                                    {{--Attach File--}}
                                                                @elseif($customField->type ==8)
                                                                    {{--Photo File--}}
                                                                @elseif($customField->type ==7)
                                                                    {{--Multi Check--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            <?php
                                                                            $cf_details_var = "details_" . @Helper::currentLanguage()->code;
                                                                            $cf_details_var2 = "details_en" . env('DEFAULT_LANGUAGE');
                                                                            if ($customField->$cf_details_var != "") {
                                                                                $cf_details = $customField->$cf_details_var;
                                                                            } else {
                                                                                $cf_details = $customField->$cf_details_var2;
                                                                            }
                                                                            $cf_details_lines = preg_split('/\r\n|[\r\n]/', $cf_details);
                                                                            $line_num = 1;
                                                                            ?>
                                                                            @foreach ($cf_details_lines as $cf_details_line)
                                                                                @if (in_array($line_num,$cf_saved_val_array))
                                                                                    <span class="badge">
                                                            {!! $cf_details_line !!}
                                                        </span>
                                                                                @endif
                                                                                <?php
                                                                                $line_num++;
                                                                                ?>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==6)
                                                                    {{--Select--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            <?php
                                                                            $cf_details_var = "details_" . @Helper::currentLanguage()->code;
                                                                            $cf_details_var2 = "details_en" . env('DEFAULT_LANGUAGE');
                                                                            if ($customField->$cf_details_var != "") {
                                                                                $cf_details = $customField->$cf_details_var;
                                                                            } else {
                                                                                $cf_details = $customField->$cf_details_var2;
                                                                            }
                                                                            $cf_details_lines = preg_split('/\r\n|[\r\n]/', $cf_details);
                                                                            $line_num = 1;
                                                                            ?>
                                                                            @foreach ($cf_details_lines as $cf_details_line)
                                                                                @if ($line_num == $cf_saved_val)
                                                                                    {!! $cf_details_line !!}
                                                                                @endif
                                                                                <?php
                                                                                $line_num++;
                                                                                ?>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==5)
                                                                    {{--Date & Time--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! date('Y-m-d H:i:s', strtotime($cf_saved_val)) !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==4)
                                                                    {{--Date--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! date('Y-m-d', strtotime($cf_saved_val)) !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==3)
                                                                    {{--Email Address--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! $cf_saved_val !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==2)
                                                                    {{--Number--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! $cf_saved_val !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==1)
                                                                    {{--Text Area--}}
                                                                @else
                                                                    {{--Text Box--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! $cf_saved_val !!}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endif
                                                        <?php
                                                        }
                                                        ?>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{--End of -- Additional Feilds--}}
                                    <p class="text-justify" style="color:#ffff !important">{!! mb_substr(strip_tags($HomeTopic->$details),0, 200)."..." !!}
                                        &nbsp; <a
                                            href="{{ Helper::topicURL($HomeTopic->id) }}">{{ __('frontend.readMore') }}
                                            <i
                                                class="fa fa-caret-{{ @Helper::currentLanguage()->right }}"></i></a>
                                    </p>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

               

            </div>
        </section>
    @endif -->
   @if(count($LatestNews)>0)
                        <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $details_var = "details_" . @Helper::currentLanguage()->code;
                            $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                            $section_url = "";
                            ?>
                          
        <section class="content-row-bg">
            <div class="container">
                <div class="row">
                    <div class="home-row-head">
                        <h2 class="heading head-h2" style="color: #ffff">{{ __('frontend.homeContents8Title') }}</h2>
                        {{-- <small style="color: #fff;font-size: 99% !important;">{{ __('frontend.homeContents8desc') }}</small> --}}
                    </div>
                </div>
                <div class="row" style="margin-bottom: 0;">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper" style="height: 300px;">
                            @foreach($LatestNews as $HomeTopic)
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

                                    // $col_width = 12;
                                    // if (count($LatestNews) == 2) {
                                    //     $col_width = 6;
                                    // }
                                    // if (count($LatestNews) == 3) {
                                    //     $col_width = 4;
                                    // }
                                    // if (count($LatestNews) > 3) {
                                    //     $col_width = 3;
                                    // }
                                ?>
                                <div class="swiper-slide slide_1 news-swiper" style="height: 300px;">
                                    <a href="{{ Helper::topicURL($HomeTopic->id) }}">
                                        <div class="cover" style="background: linear-gradient(0deg, rgb(167 177 255 / 69%) 0%, rgb(58 60 116) 0%, rgba(0, 212, 255, 0) 100%);"></div>
                                        <img src="{{ URL::to('uploads/topics/'.$HomeTopic->photo_file) }}" alt="{{ $title }}" style="max-width:unset;">
                                        <h6>{{ $title }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif
  


 
<!--   @if(count($HomeCampaigns)>0)
        <section class="content-row-bg">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-row-head">
                            <h2 class="heading">{{ __('frontend.homeContents10Title') }}</h2>
                            <small style="color: #fff">{{ __('frontend.homeContents10desc') }}</small>
                        </div>
                        <div id="owl-slider" class="owl-carousel owl-theme listing">
                            <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $details_var = "details_" . @Helper::currentLanguage()->code;
                            $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                            $section_url = "";
                            ?>
                            @foreach($HomeCampaigns as $HomeTopic)
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
                                <div class="item" style="height: 400px" >
                                        @if($HomeTopic->photo_file !="")
                                        <img src="{{ URL::to('uploads/topics/'.$HomeTopic->photo_file) }}"
                                             alt="{{ $title }}"/>
                                    @endif
                                    <h4>
                                        @if($HomeTopic->icon !="")
                                            <i class="fa {!! $HomeTopic->icon !!} "></i>&nbsp;
                                        @endif
                                        {{ $title }}
                                    </h4>
                                

                                    {{--Additional Feilds--}}
                                    @if(count($HomeTopic->webmasterSection->customFields->where("in_listing",true)) >0)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div>
                                                    <?php
                                                    $cf_title_var = "title_" . @Helper::currentLanguage()->code;
                                                    $cf_title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                                                    ?>
                                                    @foreach($HomeTopic->webmasterSection->customFields->where("in_listing",true) as $customField)
                                                        <?php
                                                        // check permission
                                                        $view_permission_groups = [];
                                                        if ($customField->view_permission_groups != "") {
                                                            $view_permission_groups = explode(",", $customField->view_permission_groups);
                                                        }
                                                        if (in_array(0, $view_permission_groups) || $customField->view_permission_groups == "") {
                                                        // have permission & continue
                                                        ?>
                                                        @if ($customField->in_listing)
                                                            <?php
                                                            if ($customField->$cf_title_var != "") {
                                                                $cf_title = $customField->$cf_title_var;
                                                            } else {
                                                                $cf_title = $customField->$cf_title_var2;
                                                            }


                                                            $cf_saved_val = "";
                                                            $cf_saved_val_array = array();
                                                            if (count($HomeTopic->fields) > 0) {
                                                                foreach ($HomeTopic->fields as $t_field) {
                                                                    if ($t_field->field_id == $customField->id) {
                                                                        if ($customField->type == 7) {
                                                                            // if multi check
                                                                            $cf_saved_val_array = explode(", ", $t_field->field_value);
                                                                        } else {
                                                                            $cf_saved_val = $t_field->field_value;
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                            ?>

                                                            @if(($cf_saved_val!="" || count($cf_saved_val_array) > 0) && ($customField->lang_code == "all" || $customField->lang_code == @Helper::currentLanguage()->code))
                                                                @if($customField->type ==12)
                                                                    {{--Vimeo Video Link--}}
                                                                @elseif($customField->type ==11)
                                                                    {{--Youtube Video Link--}}
                                                                @elseif($customField->type ==10)
                                                                    {{--Video File--}}
                                                                @elseif($customField->type ==9)
                                                                    {{--Attach File--}}
                                                                @elseif($customField->type ==8)
                                                                    {{--Photo File--}}
                                                                @elseif($customField->type ==7)
                                                                    {{--Multi Check--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            <?php
                                                                            $cf_details_var = "details_" . @Helper::currentLanguage()->code;
                                                                            $cf_details_var2 = "details_en" . env('DEFAULT_LANGUAGE');
                                                                            if ($customField->$cf_details_var != "") {
                                                                                $cf_details = $customField->$cf_details_var;
                                                                            } else {
                                                                                $cf_details = $customField->$cf_details_var2;
                                                                            }
                                                                            $cf_details_lines = preg_split('/\r\n|[\r\n]/', $cf_details);
                                                                            $line_num = 1;
                                                                            ?>
                                                                            @foreach ($cf_details_lines as $cf_details_line)
                                                                                @if (in_array($line_num,$cf_saved_val_array))
                                                                                    <span class="badge">
                                                            {!! $cf_details_line !!}
                                                        </span>
                                                                                @endif
                                                                                <?php
                                                                                $line_num++;
                                                                                ?>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==6)
                                                                    {{--Select--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            <?php
                                                                            $cf_details_var = "details_" . @Helper::currentLanguage()->code;
                                                                            $cf_details_var2 = "details_en" . env('DEFAULT_LANGUAGE');
                                                                            if ($customField->$cf_details_var != "") {
                                                                                $cf_details = $customField->$cf_details_var;
                                                                            } else {
                                                                                $cf_details = $customField->$cf_details_var2;
                                                                            }
                                                                            $cf_details_lines = preg_split('/\r\n|[\r\n]/', $cf_details);
                                                                            $line_num = 1;
                                                                            ?>
                                                                            @foreach ($cf_details_lines as $cf_details_line)
                                                                                @if ($line_num == $cf_saved_val)
                                                                                    {!! $cf_details_line !!}
                                                                                @endif
                                                                                <?php
                                                                                $line_num++;
                                                                                ?>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==5)
                                                                    {{--Date & Time--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! date('Y-m-d H:i:s', strtotime($cf_saved_val)) !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==4)
                                                                    {{--Date--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! date('Y-m-d', strtotime($cf_saved_val)) !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==3)
                                                                    {{--Email Address--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! $cf_saved_val !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==2)
                                                                    {{--Number--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! $cf_saved_val !!}
                                                                        </div>
                                                                    </div>
                                                                @elseif($customField->type ==1)
                                                                    {{--Text Area--}}
                                                                @else
                                                                    {{--Text Box--}}
                                                                    <div class="row field-row">
                                                                        <div class="col-lg-3">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-9">
                                                                            {!! $cf_saved_val !!}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endif
                                                        <?php
                                                        }
                                                        ?>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{--End of -- Additional Feilds--}}
                                    <p class="text-justify" style="color:#ffff !important">{!! mb_substr(strip_tags($HomeTopic->$details),0, 300)."..." !!}
                                        &nbsp; <a
                                            href="{{ Helper::topicURL($HomeTopic->id) }}">{{ __('frontend.readMore') }}
                                            <i
                                                class="fa fa-caret-{{ @Helper::currentLanguage()->right }}"></i></a>
                                    </p>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

               

            </div>
        </section>
    @endif  -->
 




















<div class="container">
    <div class="row">
        <div style="display: flex;justify-content: center;height: 513px;">
            <iframe style="width: -webkit-fill-available;height: -webkit-fill-available;" src="https://www.youtube.com/embed/videoseries?list=PLvja2mui7bzbLc0jxfSOYY1eKkrVJ-m64" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>




    










    <div class="container-fluid ImageGrid">
        <div class="container">
            <h2 style="color: #363232;text-align: center;"> مكتبة الصور</h2>
            <div class="row" style="margin-bottom: 0;">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper" style="height: 300px;">
                        @foreach ($photos as $item)
                            <div class="swiper-slide slide_1 news-swiper" style="height: 300px;">
                                <a href="#">
                                    <div class="cover"></div>
                                    <img src="uploads/topics/{{$item->file}}" alt="{{ $title }}" style="max-width:unset;">
                                </a>
                            </div>
                        @endforeach
                        
                        {{-- <div class="swiper-slide slide_1 news-swiper" style="height: 300px;">
                            <a href="#">
                                <div class="cover"></div>
                                <img src="http://zakat.mynet.net/uploads/topics/16563157571932.png" alt="{{ $title }}" style="max-width:unset;">
                            </a>
                        </div>
                        <div class="swiper-slide slide_1 news-swiper" style="height: 300px;">
                            <a href="#">
                                <div class="cover"></div>
                                <img src="http://zakat.mynet.net/uploads/topics/16563157571932.png" alt="{{ $title }}" style="max-width:unset;">
                            </a>
                        </div>
                        <div class="swiper-slide slide_1 news-swiper" style="height: 300px;">
                            <a href="#">
                                <div class="cover"></div>
                                <img src="http://zakat.mynet.net/uploads/topics/16563157571932.png" alt="{{ $title }}" style="max-width:unset;">
                            </a>
                        </div> --}}
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

            {{-- <div class="row" style="margin-bottom:0;">
                <div class="col-12 col-md-6 paddingZero ">
                    <div class="imgDiv position-relative w-100" data-toggle="modal" data-target="#myModal">
                        <img src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                        <div class="cover d-flex justify-content-center align-items-center">
                            <span> صورة <label>30</label></span>
                            <img src="{{asset('assets/frontend/img/photos-icon.svg')}}" class="img-fluid" width="30" style="width: 24px;">
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6  paddingZero">
                    <div class="imgDiv position-relative w-100  " data-toggle="modal" data-target="#myModal">
                        <img src="http://zakat.mynet.net/uploads/topics/16561515842309.jpeg" style="width:100%">
                        <div class="cover d-flex justify-content-center align-items-center">
                            <span> صورة <label>30</label></span>
                            <img src="{{asset('assets/frontend/img/photos-icon.svg')}}" class="img-fluid" width="30" style="width: 24px;">
                        </div>
                    </div>

                </div>
            </div>
            <div class="row" style="margin-bottom: 0;">

                <div class="col-12 col-md-3 paddingZero">
                    <div class="imgDiv position-relative w-100 " data-toggle="modal" data-target="#myModal">
                        <img src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                        <div class="cover d-flex justify-content-center align-items-center">
                            <span> صورة <label>30</label></span>
                            <img src="{{asset('assets/frontend/img/photos-icon.svg')}}" class="img-fluid" width="30" style="width: 24px;">
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-3 paddingZero">
                    <div class="imgDiv position-relative w-100 " data-toggle="modal" data-target="#myModal">
                        <img src="http://zakat.mynet.net/uploads/topics/16561515848361.jpeg" style="width:100%">
                        <div class="cover d-flex justify-content-center align-items-center">
                            <span> صورة <label>30</label></span>
                            <img src="{{asset('assets/frontend/img/photos-icon.svg')}}" class="img-fluid" width="30" style="width: 24px;">
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-3 paddingZero">
                    <div class="imgDiv position-relative w-100 " data-toggle="modal" data-target="#myModal">
                        <img src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                        <div class="cover d-flex justify-content-center align-items-center">
                            <span> صورة <label>30</label></span>
                            <img src="{{asset('assets/frontend/img/photos-icon.svg')}}" class="img-fluid" width="30" style="width: 24px;">
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-3 paddingZero">
                    <div class="imgDiv position-relative w-100 " data-toggle="modal" data-target="#myModal">
                        <img src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                        <div class="cover d-flex justify-content-center align-items-center">
                            <span> صورة <label>30</label></span>
                            <img src="{{asset('assets/frontend/img/photos-icon.svg')}}" class="img-fluid" width="30" style="width: 24px;">
                        </div>
                    </div>

                </div>


            </div> --}}

        </div>
    </div>
    @if(count($HomePartnerInst)>0)
        <section class="content-row-no-bg top-line">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-row-head">
                            <h2 class="heading head-h2" style="color: #ffff">{{ __('frontend.homeContents11Title') }}</h2>
                            <!-- <small>{{ __('frontend.homeContents5desc') }}</small> -->
                        </div>
                        <div id="owl-slider6" class="owl-carousel owl-theme listing">
                            <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $details_var = "details_" . @Helper::currentLanguage()->code;
                            $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                            $section_url = "";
                            ?>
                            @foreach($HomePartnerInst as $HomeTopic)
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
                                       <a href="{{ Helper::topicURL($HomeTopic->id) }}"> <img src="{{ URL::to('uploads/topics/'.$HomeTopic->photo_file) }}"
                                             alt="{{ $title }}"/></a>
                                    @endif
                                   
                                        
                                
                                    
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
    <!-- Modal -->
    <div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="img-fluid" src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="http://zakat.mynet.net/uploads/topics/16563157571932.png" style="width:100%">
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="content-row-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="home-row-head">
                        <h2 class="heading head-h2" style="color: #ffff">{{ __('frontend.homeContents13Title') }}</h2>
                        {{-- <small>{{ __('frontend.homeContents13Title') }}</small> --}}
                    </div>
                    <section id="projects">
                        <ul id="thumbs" class="portfolio">
                            <li class="col-lg-4 design" data-id="id-0" data-type="web">
                                <div class="relative">
                                    <div class="item-thumbs">
                                        <div id="fb-root"></div>
                                        <div class="fb-page" data-href="https://www.facebook.com/zakatpal/" data-tabs="timeline,events,messages" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"
                                        data-width="380" data-height="380" ><blockquote cite="https://www.facebook.com/KeenesListcom-126649220715963/" class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/zakatpal/"></a></blockquote
                                        ></div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 design" data-id="id-0" data-type="web">
                                <div class="relative">
                                    <div class="item-thumbs">
                                        <div id="twitter-widget-holder">
                                        <a class="twitter-timeline"
                                            href="https://twitter.com/zakaatpal"  data-theme="dark"
                                            data-link-color="#E95F28">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 design" data-id="id-0" data-type="web">
                                <div class="relative">
                                    <div class="item-thumbs" id="instagram-feed">
                                        <script src="{{asset('assets/frontend/js/juce_embed.js')}}" type="text/javascript"></script>
                                        <link href="{{asset('assets/frontend/css/juce_embed.css')}}" media="all" rel="stylesheet" type="text/css" />
                                        <ul class="juicer-feed" data-feed-id="zakatpal" data-origin="embed-code"></ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </section>


    <style type="text/css">
        .gallery{
            position:relative;
            height:100%;
            width:100%;
        }

        .gallery:after{
            content:'';
        }

        .shadow{
            position: absolute;
            top: 500px;
            right: 100px;
            width: 500px;
            height: 40px;
            border-radius: 50%;
            background: radial-gradient(#805d78,rgba(0,0,0,0) 70%);
        }

        img{
            width:var(--width);
            height:var(--height);
        }

.clipped-border{
  -webkit-clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
   clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
   padding:5px;
   background:linear-gradient(grey,lightgrey);
   width:var(--border-width);
   height:var(--border-height);
   max-height:250px;
   max-width:250px;
   height: var(--height);
   width:var(--width);
   transition:transform 0.2s;
   position:absolute;
   cursor:pointer;
}



.clipped-border:before{
  content:'';
  position:absolute;
  opacity:0.5;
  width:350px;
  height:70px;
  background:white;
  top:0;
  right:0;
  z-index:1;
  transform:rotate(45deg);
  transition:transform 0.5s;
}

.clipped-border:hover:before{
  transform: translate(-100px,400%) rotate(45deg);
  transition:transform 0.5s;
}

.clipped-border:nth-child(2){
  top:196px;
  right:118px;
}

.clipped-border:nth-child(3){
  top:0;
  right:235px;
}

.clipped-border:nth-child(4){
  top:196px;
  right:353px;
}

.clipped-border:nth-child(5){
  top:0;
  right:470px;
}
.clipped-border:nth-child(6){
  top:196;
  right:588px;
}
.clipped-border:nth-child(7){
  top:0;
  right:705px;
}
.clipped-border:nth-child(8){
  top:196;
  right:823px;
}


#clipped {
-webkit-clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);

}

.clipped-border:hover{
  transform:scale(1.2);
  transition:transform 0.2s;
  z-index:10;
}


@media screen and (max-width:500px){
  .clipped-border{
    width:100px;
    height:100px;
  }
  
  .clipped-border:nth-child(2){
    top:0;
    right:100px;
  }
  
  .clipped-border:nth-child(3){
    right:200px;
  }
  
  .clipped-border:nth-child(4){
    top:82px;
    right:50px;
  }
  
  .clipped-border:nth-child(5){
    top:82px;
    right:150px;
  }
}

</style>


@endsection

@section('js')
    <script>
        (function($){
            $(window).load(function(){
            /* initialize scrollbar */
            $("#twitter-widget-holder").mCustomScrollbar({
                theme:"dark-3",
                scrollButtons:{enable:true}
            });
            /* insert twitter widget js in window load fn */
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
            });
        })(jQuery);
    </script>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/ar/sdk.js#xfbml=1&version=v2.12';
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#owl-slider5").owlCarousel({
                autoplay: true,
                autoplayTimeout: 1000,
                items : 1, // THIS IS IMPORTANT
                dots : false,
                responsive : {
                        480 : { items : 1  }, // from zero to 480 screen width 4 items
                        768 : { items : 2  }, // from 480 screen widthto 768 6 items
                        1024 : { items : 3   // from 768 screen width to 1024 8 items
                        }
                    },
            });

            $("#owl-slider10").owlCarousel({
                autoplay: true,
                autoplayTimeout: 1000,
                items : 1, // THIS IS IMPORTANT
                dots : false,
                responsive : {
                        480 : { items : 1  }, // from zero to 480 screen width 4 items
                        768 : { items : 2  }, // from 480 screen widthto 768 6 items
                        1024 : { items : 3   // from 768 screen width to 1024 8 items
                        }
                    },
            });
            $("#owl-slider2").owlCarousel({
                
                autoplay: true,
                // autoplayTimeout: 1000,
                // autoplay: true,
                items : 1, // THIS IS IMPORTANT
                dots : false,
                nav    : true,
                navText:["<div class='swiper-button-prev' style='margin-left: -35px;'></div>","<div class='swiper-button-next' style='margin-right: -35px;'></div>"],
                responsive : {
                        480 : { items : 2  }, // from zero to 480 screen width 4 items
                        768 : { items : 4  }, // from 480 screen widthto 768 6 items
                        1024 : { items : 5   // from 768 screen width to 1024 8 items
                        }
                    },
            });

            $("#owl-slider3").owlCarousel({
                autoplay: true,
                autoplayTimeout: 1000,
                items : 1, // THIS IS IMPORTANT
                dots : false,
                responsive : {
                        480 : { items : 1  }, // from zero to 480 screen width 4 items
                        768 : { items : 2  }, // from 480 screen widthto 768 6 items
                        1024 : { items : 3   // from 768 screen width to 1024 8 items
                        }
                    },
            });
            $("#owl-slider4").owlCarousel({
                autoplay: true,
                autoplayTimeout: 1000,
                items : 1, // THIS IS IMPORTANT
                dots : false,
                responsive : {
                        480 : { items : 1  }, // from zero to 480 screen width 4 items
                        768 : { items : 2  }, // from 480 screen widthto 768 6 items
                        1024 : { items : 3   // from 768 screen width to 1024 8 items
                        }

                    },
            });
            $("#owl-slider6").owlCarousel({
                
                autoplay: true,
                autoplayTimeout: 1000,
                // autoplay: true,
                items : 1, // THIS IS IMPORTANT
                dots : false,
                nav    : true,
                navText:["<div class='swiper-button-prev' style='margin-left: -35px;'></div>","<div class='swiper-button-next' style='margin-right: -35px;'></div>"],
                responsive : {
                        480 : { items : 2  }, // from zero to 480 screen width 4 items
                        768 : { items : 4  }, // from 480 screen widthto 768 6 items
                        1024 : { items : 6   // from 768 screen width to 1024 8 items
                        }
                    },
            });


        });
    </script>
    {{-- <script src="{{ URL::asset('assets/frontend/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ URL::asset('assets/frontend/js/popperjs.js') }}"></script>

    <script>
        let swiper = new Swiper(".mySwiper", {
            loop: true,
            rtl: true,
            // spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                600: {
                    slidesPerView: 2,
                },
                976: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,

            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",

            },
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            rtl: true,

            freeMode: true,
            watchSlidesProgress: true,
            pagination: {
                el: ".swiper-pagination",
                type: "fraction",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
