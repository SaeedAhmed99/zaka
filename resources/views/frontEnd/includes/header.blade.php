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
    <div style="width: 100%;z-index: 1000000;"> 
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

                            {{-- -------------old -------------- --}}

                            {{-- <div class="btn-group header-dropdown">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" style="padding:0px">
                                
                                        <img src="{{ asset('assets/frontend/img/adhan1.png') }}" alt="" style="height: 25px; width: 27px;">
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
                            </div> --}}

                            {{-- -------------old -------------- --}}
                            <div class="btn-group header-dropdown">
                                <div class="w3-container prayList">
                                    <div class="w3-dropdown-click">
                                        <button onclick="myFunction()" id="btn" style="background-image: url({{ asset('assets/frontend/img/minarets.jpg') }});">
                                            <div class="hoverCard"></div>
                                        </button>
                                        <div id="Demo" class="w3-dropdown-content w3-bar-block">
                                            <?php
                                                $month = date("d");
                                                $year = date("Y");
                                                $response = Http::get("http://api.aladhan.com/v1/calendarByCity?city=Gaza&country=Palestine&method=2")->json();
                                                $data =json_decode(json_encode($response['data']));
                                                $date_now = date("d-m-Y");
                                            ?>
                                            
                                            @foreach($data as $d)
                                                @if($d->date->gregorian->date == $date_now)
                                                <a class="w3-bar-item w3-button">{{__('frontend.fajr')}}<span>{{str_replace(" (EET)","",$d->timings->Fajr)}}</span></a>
                                                <a class="w3-bar-item w3-button">{{__('frontend.dhuhr')}}<span>{{str_replace(" (EET)","",$d->timings->Dhuhr)}}</span></a>
                                                <a class="w3-bar-item w3-button">{{__('frontend.asr')}}<span>{{str_replace(" (EET)","",$d->timings->Asr)}}</span></a>
                                                <a class="w3-bar-item w3-button">{{__('frontend.maghrib')}}<span>{{str_replace(" (EET)","",$d->timings->Maghrib)}}</span></a>
                                                <a class="w3-bar-item w3-button">{{__('frontend.isha')}}<span>{{str_replace(" (EET)","",$d->timings->Isha)}}</span></a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                                <style>
                                    .prayList .w3-dropdown-content {
                                        margin-top: 3px;
                                        border: 1px solid #95cfae;
                                        border-radius: 10px;
                                        box-shadow: inset 0px 0px 10px #95cfae;
                                        min-width: 200px;
                                    }
                                    
                                    .prayList {
                                        direction: initial;
                                    }
                                    
                                    .prayList .w3-dropdown-content a {
                                        border-radius: 10px;
                                        background-color: #d7ede14d!important;
                                        display: flex;
                                        justify-content: space-between;
                                        font-size: 16px;
                                        direction: rtl;
                                        font-weight: bolder !important;
                                    }
                                    
                                    .prayList .w3-dropdown-content a span {
                                        font-size: 10px;
                                        line-height: 1.9;
                                        background: #00662e3f !important;
                                        border-radius: 5px;
                                        padding: 0px 10px;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        z-index: 8888;
                                    }
                                    
                                    .prayList .w3-dropdown-content a.w3-button:hover {
                                        background-color: #00662e !important;
                                        color: white !important;
                                        font-weight: bolder;
                                    }
                                    
                                    .prayList .w3-dropdown-content a.w3-button:hover span {
                                        background-color: #fff !important;
                                        color: #00662e;
                                    }
                                    
                                    .prayList button {
                                        border-radius: 50%;
                                        background-color: rebeccapurple;
                                        padding: 0px;
                                        border: none;
                                        cursor: pointer;
                                        background-image: url(./minarets.jpg);
                                        background-size: contain;
                                        background-position: center;
                                        width: 24px;
                                        height: 24px;
                                        position: relative;
                                    }
                                    
                                    .hoverCard {
                                        position: absolute;
                                        height: 100%;
                                        width: 100%;
                                        top: 0;
                                        opacity: 0;
                                        border-radius: 10% !important;
                                        transition: all ease-in-out .5s;
                                        transform: scale(0.5);
                                        padding: 5px;
                                    }
                                    
                                    .prayList button:hover .hoverCard {
                                        box-shadow: inset 0px 0px 10px #95cfae;
                                        opacity: .5;
                                        transform: scale(1.13);
                                    }
                                    
                                    button.active {
                                        box-shadow: inset 0px 0px 10px #95cfae;
                                        border-radius: 10% !important;
                                    }
                                    
                                    button.active:hover {
                                        box-shadow: inset 0px 0px 10px #95cfae;
                                        border-radius: 10% !important;
                                    }
                                    
                                    .prayList .w3-dropdown-click {
                                        background: none !important;
                                    }
                                </style>

                                {{-- <script>
                                    function myFunction() {
                                        var x = document.getElementById("Demo");
                                        var btn = document.getElementById("btn");

                                        if (x.className.indexOf("w3-show") == -1) {
                                            x.className += "w3-show";
                                            btn.className += "active";
                                        } else {
                                            x.className = x.className.replace("w3-show", "");
                                            btn.className = btn.className.replace("active", "");
                                        }
                                    }
                                </script> --}}
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