@if (@Auth::check())
    @if(!Helper::GeneralSiteSettings("site_status"))
        <div class="text-center bg-warning">
            <div class="row m-b-0">
                <div class="h6">
                    {{__('backend.websiteClosedForVisitors')}}
                </div>
            </div>
        </div>
    @endif
@endif
<header>
    <div style="position: fixed !important;
    width: 100%;
    z-index: 1000000;"> 
    <div class="site-top" >
        <div class="container">
            <div>
                <div class="pull-right">
                    @if(Helper::GeneralWebmasterSettings("dashboard_link_status"))
                        @if(Auth::check())
                            <div class="btn-group header-dropdown">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                       href="{{ route('adminHome') }}"> <i
                                            class="fa fa-cog"></i> {{__('frontend.dashboard')}}</a>
                                    @if(Auth::user()->permissions ==0 || Auth::user()->permissions ==1)
                                        <a class="dropdown-item"
                                           href="{{ route('usersEdit',Auth::user()->id) }}"> <i
                                                class="fa fa-user"></i> {{ __('backend.profile') }}</a>
                                    @endif
                                    @if(Helper::GeneralWebmasterSettings("inbox_status"))
                                        @if(@Auth::user()->permissionsGroup->inbox_status)
                                            <a href="{{ route('webmails') }}" class="dropdown-item">
                                                <i class="fa fa-envelope"></i> {{ __('backend.siteInbox') }}
                                            </a>
                                        @endif
                                    @endif
                                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                       class="dropdown-item" href="{{ url('/logout') }}"><i
                                            class="fa fa-sign-out"></i> {{ __('backend.logout') }}</a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>

                        <!--
                            
                            <strong>
                                <a href="{{ route("adminHome") }}"><i
                                        class="fa fa-cog"></i> {{__('frontend.dashboard')}}
                                </a>
                            </strong>-->
                        @endif
                    @endif
                    @if(count(Helper::languagesList()) >1)
                        <div class="btn-group header-dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                @if(@Helper::currentLanguage()->icon !="")
                                    <img
                                        src="{{ asset('assets/dashboard/images/flags/'.@Helper::currentLanguage()->icon.".svg") }}"
                                        alt="">
                                @endif
                                {{ @Helper::currentLanguage()->title }} <i class="fa fa-angle-down"></i>
                            </button>
                            <div class="dropdown-menu">
                                @foreach(Helper::languagesList() as $ActiveLanguage)

                                    <a href="{{ route("localeChange",$ActiveLanguage->code) }}" class="dropdown-item">

                                       
                                        @if($ActiveLanguage->icon !="")
                                            <img
                                                src="{{ asset('assets/dashboard/images/flags/'.$ActiveLanguage->icon.".svg") }}"
                                                alt="">
                                        @endif
                                        {{ $ActiveLanguage->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                       
                    @endif
                     <div class="btn-group">
                           
                            
                            <button type="button" class="btn btn btn-warning" data-toggle="modal" data-target="#exampleModal" style="padding: 3px;" >
  {{__('frontend.donation')}}
</button>
                           
                        </div>
                        <div class="btn-group header-dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="padding:0px">
                               
                                    <img
                                        src="{{ asset('assets/frontend/img/adhan1.png') }}"
                                        alt=""    style="height: 25px;
    width: 27px;">
                              
                              
                            </button>
                             @if(@Helper::currentLanguage()->code == 'ar')
                                <style>
                                    .pr{
                                        /*margin-right: 50px;*/
                                    }
                                    .pa{
                                        padding-right: 10px !important;
                                    }
                                </style>
                                @else
                                <style>
                                    .pr{
                                        /*margin-left: 77px;*/
                                    }
                                    .pa{
                                        padding-left: 10px !important;
                                    }
                                </style>
                                @endif
                            <div class="dropdown-menu pa">
                               
                                    <label  class="dropdown-item ">
                                        <?php
                                         $month = date("d");
                                         $year = date("Y");
                                        $response = Http::get("http://api.aladhan.com/v1/calendarByCity?city=Gaza&country=Palestine&method=2&month=$month&year=$year")->json();
                                        $data =json_decode(json_encode($response['data']));
    
                                        $date_now = date("d-m-Y");
      
                                        ?>

                                      @foreach($data as $d)
                                      @if($d->date->gregorian->date == $date_now)

                                                     {{__('frontend.fajr')}}  <span class="pr">{{$d->timings->Fajr}}</span>
<hr style="margin-top: 0px !important; 
     margin-bottom: 0px !important;">
                                                     {{__('frontend.dhuhr')}}  <span class="pr">{{$d->timings->Dhuhr}}</span>
<hr style="margin-top: 0px !important; 
     margin-bottom: 0px !important;">
                                                       {{__('frontend.asr')}}   <span class="pr">{{$d->timings->Asr}}</span>
<hr style="margin-top: 0px !important; 
     margin-bottom: 0px !important;">
                                                        {{__('frontend.maghrib')}}   <span class="pr">{{$d->timings->Maghrib}}</span>
<hr style="margin-top: 0px !important; 
     margin-bottom: 0px !important;">
                                                     {{__('frontend.isha')}}   <span class="pr">{{$d->timings->Isha}}</span>

                                                      @endif
                                           @endforeach
                                      </label>                         
                             
                            </div>
                        </div>

                </div>
                <div class="pull-left">
                    @if(Helper::GeneralSiteSettings("contact_t3") !="")
                        <i class="fa fa-phone"></i> &nbsp;<a
                            href="tel:{{ Helper::GeneralSiteSettings("contact_t5") }}"><span
                                dir="ltr">{{ Helper::GeneralSiteSettings("contact_t5") }}</span></a>
                    @endif
                    @if(Helper::GeneralSiteSettings("contact_t6") !="")
                        <span class="top-email">
                        &nbsp; | &nbsp;
                    <i class="fa fa-envelope"></i> &nbsp;<a
                                href="mailto:{{ Helper::GeneralSiteSettings("contact_t6") }}">{{ Helper::GeneralSiteSettings("contact_t6") }}</a>
                    </span>
                    @endif
                    @if(Helper::GeneralSiteSettings("contact_t1_" . @Helper::currentLanguage()->code) !="")

                     <span class="top-email">
                        &nbsp; | &nbsp;
                    <i class="fa fa-map-o"></i> &nbsp;{{ Helper::GeneralSiteSettings("contact_t1_" . @Helper::currentLanguage()->code) }}
                    </span>
                            
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-default" id=""     >
     <!--  -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route("Home") }}">
                    @if(Helper::GeneralSiteSettings("style_logo_" . @Helper::currentLanguage()->code) !="")
                        <img alt=""
                             src="{{ URL::to('uploads/settings/'.Helper::GeneralSiteSettings("style_logo_" . @Helper::currentLanguage()->code)) }}">
                    @else
                        <img alt="" src="{{ URL::to('uploads/settings/nologo.png') }}">
                    @endif

                </a>
            </div>
            @include('frontEnd.includes.menu')
        </div>
    </div>
    </div>
</header>
 @include('frontend.includes.donation')

 <script type="text/javascript">
    $(document).scroll(function() {
       if($(window).scrollTop() > 50){

        $("#headerline").css("top",0);
        // $("#header").hide();
        // $("#header2").show();

       }else if($(window).scrollTop() < 50){

          $("#headerline").css("top",34);

       }
});
 </script>