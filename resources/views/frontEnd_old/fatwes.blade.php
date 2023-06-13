@extends('frontEnd.layout')
<link href="{{ URL::asset('assets/frontend/css/custom-style3bea.css') }}" rel="stylesheet"/>


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

         <section id="content">
    <div class="container">
        
        <div class="row" style="display:flex;">
    <div class="col-md-9 main-content-area">
        <div id="page-17973" class="post-17973 page type-page status-publish hentry">
    <div class="entry-content">
        <div class="page-content">
                                    <div class="vc_row wpb_row vc_row-fluid vc-row-tm-section-padding"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">  <div id="accordion-952236" class="tm-sc tm-sc-faq tm-sc-faq-style2 panel-group accordion fatwas">

                            <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $details_var = "details_" . @Helper::currentLanguage()->code;
                            $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                            $section_url = "";
                            ?>
                            @foreach($Fatwes as $Fatwa)
                              <?php
                                if ($Fatwa->$title_var != "") {
                                    $title = $Fatwa->$title_var;
                                } else {
                                    $title = $Fatwa->$title_var2;
                                }
                                if ($Fatwa->$details_var != "") {
                                    $details = $details_var;
                                } else {
                                    $details = $details_var2;
                                }
                                if ($section_url == "") {
                                    $section_url = Helper::sectionURL($Fatwa->webmaster_id);
                                }
                                ?>          
        <div class="panel">
        <div class="panel-title"> <a data-parent="#accordion-{{$Fatwa->id}}" data-toggle="collapse" href="#accordion-{{$Fatwa->id}}"  aria-expanded="true">
        <small style="font-size: 95% !important">{{ $title }}</small></a>
        </div>
        <div id="accordion-{{$Fatwa->id}}" class="panel-collapse collapse" role="tablist" aria-expanded="true">
        <div class="panel-content">
            <h5 style="line-height: 1.8;">{!! strip_tags($Fatwa->$details) !!}</h5>
        </div>
        </div>
    </div>
    @endforeach
    <div class="row">
        

               <div class="col-lg-5">
                                 {!! $Fatwes->appends(request()->input())->links() !!}
                            </div>
                    


                        <div class="col-lg-5">
                                <br>
                                <small>{{ $Fatwes->firstItem() }} - {{ $Fatwes->lastItem() }} {{ __('backend.of') }}
                                    ( {{ $Fatwes->total()  }} ) {{ __('backend.records') }}</small>
                            </div>
                   
            </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

@endsection
