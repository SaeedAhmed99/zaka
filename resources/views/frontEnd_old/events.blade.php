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
         @if(count($HomeEvents)>0)
        <section class="content-row-no-bg">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-row-head">
                            <h2 class="heading">{{ __('frontend.homeContents12Title') }}</h2>
                            <small>{{ __('frontend.homeContents12desc') }}</small>
                        </div>
                      <div id="owl-slider" class="owl-carousel owl-theme listing">
                            <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $details_var = "details_" . @Helper::currentLanguage()->code;
                            $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                            $section_url = "";
                            ?>
                            @foreach($HomeEvents as $HomeTopic)
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
                                             alt="{{ $title }}"/>
                                    @endif
                                        <h4>
                                        @if($HomeTopic->icon !="")
                                            <i class="fa {!! $HomeTopic->icon !!} "></i>&nbsp;
                                        @endif
                                        {{ $title }}
                                    </h4>
                                   
                                    {{--End of -- Additional Feilds--}}
                                    <p class="text-justify">{!! mb_substr(strip_tags($HomeTopic->$details),0, 90)."..." !!}
                                        &nbsp; <a
                                            href="{{ Helper::topicURL($HomeTopic->id) }}">{{ __('frontend.readMore') }}
                                            <i
                                                class="fa fa-caret-{{ @Helper::currentLanguage()->right }}"></i></a>
                                    </p>
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
                                                                        <div class="col-lg-4">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                        <div class="col-lg-4">
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
                                                                        <div class="col-lg-4">
                                                                            {!!  $cf_title !!} :
                                                                        </div>
                                                                     
                                                                        <div class="col-lg-6">
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
