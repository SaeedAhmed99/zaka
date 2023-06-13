@if(count($TextBanners)>0)
        @foreach($TextBanners->slice(0,1) as $TextBanner)
            <?php
            try {
                $TextBanner_type = $TextBanner->webmasterBanner->type;
            } catch (Exception $e) {
                $TextBanner_type = 0;
            }
            ?>
        @endforeach
        <?php
        $title_var = "title_" . @Helper::currentLanguage()->code;
        $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
        $details_var = "details_" . @Helper::currentLanguage()->code;
        $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
        $file_var = "file_" . @Helper::currentLanguage()->code;
        $file_var2 = "file_" . env('DEFAULT_LANGUAGE');

        $col_width = 12;
        if (count($TextBanners) == 2) {
            $col_width = 6;
        }
        if (count($TextBanners) == 3) {
            $col_width = 4;
        }
        if (count($TextBanners) > 3) {
            $col_width = 3;
        }
        ?>
        <section class="content-row-no-bg p-b-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="home-row-head">
                            <h2 class="heading">الأهداف الإستراتيجية للهيئة</h2>
                            <small>نهدف لخدمة المجتمع في مختلف المجالات من أجل الارتقاء به نحو مستقبل أفضل</small>
                        </div>
                        <div class="row" style="margin-bottom: 0;">
                            @foreach($TextBanners as $TextBanner)
                                <?php
                                if ($TextBanner->$title_var != "") {
                                    $BTitle = $TextBanner->$title_var;
                                } else {
                                    $BTitle = $TextBanner->$title_var2;
                                }
                                if ($TextBanner->$details_var != "") {
                                    $BDetails = $TextBanner->$details_var;
                                } else {
                                    $BDetails = $TextBanner->$details_var2;
                                }
                                if ($TextBanner->$file_var != "") {
                                    $BFile = $TextBanner->$file_var;
                                } else {
                                    $BFile = $TextBanner->$file_var2;
                                }
                                ?>
                                <div class="col-lg-{{$col_width}}">
                                    <div class="box">
                                        <div class="box-gray aligncenter">
                                            @if($TextBanner->code !="")
                                                {!! $TextBanner->code !!}
                                            @else
                                                @if($TextBanner->icon !="")
                                                    <div class="icon">
                                                        <i class="fa {{$TextBanner->icon}} fa-3x"></i>
                                                    </div>
                                                @elseif($BFile !="")
                                                    <img src="{{ URL::to('uploads/banners/'.$BFile) }}"
                                                         alt="{{ $BTitle }}"/>
                                                @endif
                                                <h4>{!! $BTitle !!}</h4>
                                                @if($BDetails !="")
                                                    <p>{!! nl2br($BDetails) !!}</p>
                                                @endif
                                            @endif

                                        </div>
                                        @if($TextBanner->link_url !="")
                                            <div class="box-bottom">
                                                <a href="{!! $TextBanner->link_url !!}">{{ __('frontend.moreDetails') }}</a>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(!empty($HomePage))
        @if(@$HomePage->{"details_" . @Helper::currentLanguage()->code} !="")
            <section class="content-row-no-bg home-welcome">
                <div class="container">
                    {!! @$HomePage->{"details_" . @Helper::currentLanguage()->code} !!}
                </div>
            </section>
        @endif
    @endif
             
                        
    

    @if(count($TextBanners)>0)
        @foreach($TextBanners->slice(0,1) as $TextBanner)
            <?php
            try {
                $TextBanner_type = $TextBanner->webmasterBanner->type;
            } catch (Exception $e) {
                $TextBanner_type = 0;
            }
            ?>
        @endforeach
        <?php
        $title_var = "title_" . @Helper::currentLanguage()->code;
        $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
        $details_var = "details_" . @Helper::currentLanguage()->code;
        $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
        $file_var = "file_" . @Helper::currentLanguage()->code;
        $file_var2 = "file_" . env('DEFAULT_LANGUAGE');

        $col_width = 12;
        if (count($TextBanners) == 2) {
            $col_width = 6;
        }
        if (count($TextBanners) == 3) {
            $col_width = 4;
        }
        if (count($TextBanners) > 3) {
            $col_width = 3;
        }
        ?>
        <section class="content-row-no-bg p-b-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" style="margin-bottom: 0;">
                            @foreach($TextBanners as $TextBanner)
                                <?php
                                if ($TextBanner->$title_var != "") {
                                    $BTitle = $TextBanner->$title_var;
                                } else {
                                    $BTitle = $TextBanner->$title_var2;
                                }
                                if ($TextBanner->$details_var != "") {
                                    $BDetails = $TextBanner->$details_var;
                                } else {
                                    $BDetails = $TextBanner->$details_var2;
                                }
                                if ($TextBanner->$file_var != "") {
                                    $BFile = $TextBanner->$file_var;
                                } else {
                                    $BFile = $TextBanner->$file_var2;
                                }
                                ?>
                                <div class="col-lg-{{$col_width}}">
                                    <div class="box">
                                        <div class="box-gray aligncenter">
                                            @if($TextBanner->code !="")
                                                {!! $TextBanner->code !!}
                                            @else
                                                @if($TextBanner->icon !="")
                                                    <div class="icon">
                                                        <i class="fa {{$TextBanner->icon}} fa-3x"></i>
                                                    </div>
                                                @elseif($BFile !="")
                                                    <img src="{{ URL::to('uploads/banners/'.$BFile) }}"
                                                         alt="{{ $BTitle }}"/>
                                                @endif
                                                <h4>{!! $BTitle !!}</h4>
                                                @if($BDetails !="")
                                                    <p>{!! nl2br($BDetails) !!}</p>
                                                @endif
                                            @endif

                                        </div>
                                        @if($TextBanner->link_url !="")
                                            <div class="box-bottom">
                                                <a href="{!! $TextBanner->link_url !!}">{{ __('frontend.moreDetails') }}</a>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif




      @if(!empty($HomePage))
        @if(@$HomePage->{"details_" . @Helper::currentLanguage()->code} !="")
            <section class="content-row-no-bg home-welcome">
                <div class="container">
                    {!! @$HomePage->{"details_" . @Helper::currentLanguage()->code} !!}
                </div>
            </section>
        @endif
    @endif