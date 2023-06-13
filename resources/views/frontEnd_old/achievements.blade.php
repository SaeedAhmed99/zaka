@extends('frontEnd.layout')
@if(@Helper::currentLanguage()->code == 'ar')
<link href="{{ URL::asset('assets/frontend/css/timelineNew-rtl.css') }}" id='' rel="stylesheet"/>
@else
<link href="{{ URL::asset('assets/frontend/css/timelineNew.css') }}" id='' rel="stylesheet"/>
@endif


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
<section>
  
<div class="bg-gradient_solid">
  <div class="container">
    <div class="section-header">
     <h2>الانجازات</h2>
      <hr>
    </div>
    <div class="steps">
        <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                           
                            ?>
        @foreach($Achievements as $achive)
         <?php
                            if ($achive->$title_var != "") {
                                $title = $achive->$title_var;
                            } else {
                                $title = $achive->$title_var2;
                            }

                           

                            ?>
      <div class="steps-container">
        <div class="content">
          <h2>{{$title}}</h2>
          <p><a class="tl-desc-a" href="{{ URL::to('uploads/topics/'.$achive->attach_file) }}" title="{{$title}}" target="_blank" rel="noopener" >{{__('backend.showing')}}</a></p>
        </div>
        
        <i class="step-line"></i>
       
        <div class="date">{{Str::substr($title ,-5)}}</div>
      </div>
      @endforeach
    </div>
  </div>
</div>

</section> 
@endsection
