@extends('frontEnd.layout')

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
                    <div class="col-lg-12">
                        <div class="home-row-head">
                            <h2 class="heading">{{ __('frontend.homeContents14Title') }}</h2>
                            <small>{{ __('frontend.homeContents2desc') }}</small>
                        </div>
                        <div class="row">
                            <section id="projects">
                                <ul id="thumbs" class="portfolio">
                                    <?php
                                    $title_var = "title_" . @Helper::currentLanguage()->code;
                                    $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                                    $details_var = "details_" . @Helper::currentLanguage()->code;
                                    $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                                    $section_url = "";
                                    $ph_count = 0;
                                    ?>
                                    @foreach($HomeGallary as $photo)
                                        <?php
                                        if ($photo->$title_var != "") {
                                            $title = $photo->$title_var;
                                        } else {
                                            $title = $photo->$title_var2;
                                        }

                                        if ($section_url == "") {
                                            $section_url = Helper::sectionURL($photo->webmaster_id);
                                        }

                                        
                                        ?>

                                      
                                          
                                                <li class="col-lg-4 design" data-id="id-0" data-type="web">
                                                    <div class="relative">
                                                        <div class="item-thumbs">
                                                            <a class="hover-wrap fancybox" data-fancybox-group="gallery"
                                                               title="{{ $title }}"
                                                               href="{{ URL::to('uploads/topics/'.$photo->photo_file) }}">
                                                                <span class="overlay-img"></span>
                                                                <span class="overlay-img-thumb"><i
                                                                        class="fa fa-search-plus"></i></span>
                                                            </a>
                                                            <!-- Thumb Image and Description -->
                                                            <img src="{{ URL::to('uploads/topics/'.$photo->photo_file) }}"
                                                                 alt="{{ $title }}" height="250px; !important" >
                                                        </div>
                                                    </div>
                                                </li>
                                           
                                           
                                           
                                    @endforeach

                                </ul>
                            </section>
                        </div>

                        
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection
