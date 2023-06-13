<!DOCTYPE html>
<html lang="{{ @Helper::currentLanguage()->code }}" dir="{{ @Helper::currentLanguage()->direction }}">
<head>
    @include('frontEnd.includes.head')
    @include('frontEnd.includes.colors')

      
</head>
<?php
$bdy_class = "";
$bdy_bg_color = "";
$bdy_bg_image = "";
if (Helper::GeneralSiteSettings("style_type")) {
    $bdy_class = "boxed-layout";
    if (Helper::GeneralSiteSettings("style_bg_type") == 0) {
        $bdy_bg_color = "background-color: #000;";
        if (Helper::GeneralSiteSettings("style_bg_color") != "") {
            $bdy_bg_color = "background-attachment: fixed;background-color: " . Helper::GeneralSiteSettings("style_bg_color") . ";";
        }
        $bdy_bg_image = "";
    } elseif (Helper::GeneralSiteSettings("style_bg_type") == 1) {
        $bdy_bg_color = "";
        $bdy_bg_image = "background-attachment: fixed;background-image:url(" . URL::to('uploads/pattern/' . Helper::GeneralSiteSettings("style_bg_pattern")) . ")";
    } elseif (Helper::GeneralSiteSettings("style_bg_type") == 2) {
        $bdy_bg_color = "";
        $bdy_bg_image = "background-attachment: fixed;background-image:url(" . URL::to('uploads/settings/' . Helper::GeneralSiteSettings("style_bg_image")) . ")";
    }
}
?>

<body class="js {!!  $bdy_class !!}" style=" {!!  $bdy_bg_color !!} {!! $bdy_bg_image !!}">

<div id="wrapper">

    <!-- start header -->
@include('frontEnd.includes.header')
<!-- end header -->
   <style type="text/css">
      #container{
        position: fixed;
        top: 200px;
        left: 0px;
        margin-left: 0px;
        padding: 0px;
        list-style: none;
        z-index: 1;
        }
        
        #container li a{
        display: block;
        text-decoration: none;
        color: white;
        }
        #container li a span{
        display: block;
        max-width: 40px;
        padding: 10px;
        transition: all 0.2 ease-in-out;
        }
        #container li a:hover span{
        background: rgba(0, 0, 0, 0.2);

        }
     
   </style>
    <ul id="container">
          @if(Helper::GeneralSiteSettings('social_link1'))
                            <li><a href="{{Helper::GeneralSiteSettings('social_link1')}}" data-placement="top" title="Facebook"
                                   target="_blank" style="background: #3C5A96"><span class="fa fa-facebook fa-2x"></span></a></li>
                                         
                        @endif
                         @if(Helper::GeneralSiteSettings('social_link6'))
                            <li><a href="{{Helper::GeneralSiteSettings('social_link6')}}" data-placement="top" title="Instagram"
                                   target="_blank" style="background:  #E1306C"><span
                                        class="fa fa-instagram fa-2x"></span></a></li>
                        @endif
                        
                        @if(Helper::GeneralSiteSettings('social_link4'))
                            <li><a href="{{Helper::GeneralSiteSettings('social_link4')}}" data-placement="top" title="telegram"
                                   target="_blank" style="background: #1DADEB"><span class="fa fa-telegram fa-2x"></span></a></li>
                                        
                        @endif
                        @if(Helper::GeneralSiteSettings('social_link5'))
                            <li><a href="{{Helper::GeneralSiteSettings('social_link5')}}" data-placement="top" title="Youtube"
                                   target="_blank" style="background: #C4302B"><span class="fa fa-youtube fa-2x"></span></a></li>

                                        
                        @endif
                        @if(Helper::GeneralSiteSettings('social_link2'))
                            <li><a href="{{Helper::GeneralSiteSettings('social_link2')}}" data-placement="top" title="Twitter"
                                   target="_blank" style="background: #1DADEB"><span class="fa fa-twitter fa-2x"></span></a></li>
                                        
                        @endif
                        
                       
                       <!--  @if(Helper::GeneralSiteSettings('social_link7'))
                            <li><a href="{{Helper::GeneralSiteSettings('social_link7')}}" data-placement="top" title="Pinterest"
                                   target="_blank" style="background: #C8232C"><span
                                        class="fa fa-pinterest fa-2x"></span></a></li>
                        @endif
                        @if(Helper::GeneralSiteSettings('social_link8'))
                            <li><a href="{{Helper::GeneralSiteSettings('social_link8')}}" data-placement="top" title="Tumblr"
                                   target="_blank"><span
                                        class="fa fa-tumblr fa-2x"></span></a></li>
                        @endif
                        @if(Helper::GeneralSiteSettings('social_link9'))
                            <li><a href="{{Helper::GeneralSiteSettings('social_link9')}}" data-placement="top" title="Snapchat"
                                   target="_blank"><span
                                        class="fa fa-snapchat fa-2x"></span></a></li>
                        @endif -->
           
            
          
            
        </ul>

    <!-- Content Section -->
    <div class="contents">
        @yield('content')
        
    </div>
    <!-- end of Content Section -->
 
    <!-- start footer -->
@include('frontEnd.includes.footer')
<!-- end footer -->
</div>
@include('frontEnd.includes.foot')
@yield('footerInclude')

@if(Helper::GeneralSiteSettings("style_preload"))
    <div id="preloader"></div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(window).load(function () {
                $('#preloader').fadeOut('slow', function () {
                    // $(this).remove();
                });
            });
        });
    </script>
@endif
@if(Helper::GeneralSiteSettings("style_header"))
    <script type="text/javascript">
        window.onscroll = function () {
            myFunction()
        };
        var header = document.getElementsByTagName("header")[0];
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
@endif
</body>
</html>
