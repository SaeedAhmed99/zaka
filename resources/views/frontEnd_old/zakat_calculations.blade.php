@extends('frontEnd.layout')
<style type="text/css">
    .box-gray1 {
    /* border-top-left-radius: 30px; */
    border-top-right-radius: 30px;
    border-bottom-left-radius: 30px;
    background: #e6e6e6;
    padding: 20px 20px 30px;
}

</style>
@section('content')

   <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route("Home") }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
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
                        <div class="row" style="margin-bottom: 0;">
                             @foreach($ZakatCalculations as $HomeTopic)
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
                                    if (count($ZakatCalculations) == 2) {
                                        $col_width = 6;
                                    }
                                    if (count($ZakatCalculations) == 3) {
                                        $col_width = 4;
                                    }
                                    if (count($ZakatCalculations) > 3) {
                                        $col_width = 3;
                                    }
                                ?>
                                <div class="col-lg-{{$col_width}}">
                                    <div class="box">
                                        <div class="box-gray1 aligncenter" style="height: 200px">
                                          @if($HomeTopic->icon !="")
                                                    <div class="" style="color:#333333;font-size:32px;display:inline-block;">
                                                        <i class="fa {{$HomeTopic->icon}}"></i>
                                                    </div>
                                                @elseif($HomeTopic->photo_file !="")
                                                    <img src="{{ URL::to('uploads/topics/'.$HomeTopic->photo_file) }}"
                                                         alt="{{ $title }}"/>
                                                @endif
                                                @if($HomeTopic->$details !="")
                                                    <p style="font-size:20px;margin:0px">{!! $HomeTopic->$details !!}</p>
                                                @endif
                                                <h4 style="color: #2e3e4e !important;">{{ $title }}</h4>
                                           <?php
                                                $seo_url_slug_var = "seo_url_slug_" . @Helper::currentLanguage()->code;        
                                             ?>
                                             <a class="btn btn-lg submit-btn btn-theme" href="zakat-calculations/{{$HomeTopic->$seo_url_slug_var}}">{{__('frontend.calculate')}}</a>
                                        </div>
                                       
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
