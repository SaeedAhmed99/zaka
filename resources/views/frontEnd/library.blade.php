@extends('frontEnd.layout')
<link href="{{ URL::asset('assets/frontend/css/wbg-fronte735.css') }}" rel="stylesheet"/>
<style type="text/css">
    ul li{
  display: inline;
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
        <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
   <div class="row">
  @if(count($Categories)>0)
            <?php
            $title_var = "title_" . @Helper::currentLanguage()->code;
            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
            $category_title_var = "title_" . @Helper::currentLanguage()->code;
            $slug_var = "seo_url_slug_" . @Helper::currentLanguage()->code;
            $slug_var2 = "seo_url_slug_" . env('DEFAULT_LANGUAGE');
            ?>
            
       <div class="col-lg-6">
            <div class="widget">
              
                <ul class="cat">
                    @foreach($Categories as $Category)
                        <?php $active_cat = ""; ?>
                        @if($CurrentCategory!="none")
                            @if(!empty($CurrentCategory))
                                @if($Category->id == $CurrentCategory->id)
                                    <?php $active_cat = "class=active"; ?>
                                @endif
                            @endif
                        @endif
                        <?php
                        if ($Category->$title_var != "") {
                            $Category_title = $Category->$title_var;
                        } else {
                            $Category_title = $Category->$title_var2;
                        }
                        $ccount = $category_and_topics_count[$Category->id];
                        ?>
                        <li>
                            @if($Category->icon !="")
                                <i class="fa {{$Category->icon}}"></i> &nbsp;
                            @endif
                            <a {{ $active_cat }} href="{{ Helper::categoryURL($Category->id) }}">{{ $Category_title }}</a><span
                                class="pull-right">({{ $ccount }})</span></li>
                        @foreach($Category->fatherSections as $MnuCategory)
                            <?php $active_cat = ""; ?>
                            @if($CurrentCategory!="none")
                                @if(!empty($CurrentCategory))
                                    @if($MnuCategory->id == $CurrentCategory->id)
                                        <?php $active_cat = "class=active"; ?>
                                    @endif
                                @endif
                            @endif
                            <?php
                            if ($MnuCategory->$title_var != "") {
                                $MnuCategory_title = $MnuCategory->$title_var;
                            } else {
                                $MnuCategory_title = $MnuCategory->$title_var2;
                            }
                            $ccount = $category_and_topics_count[$MnuCategory->id];
                            ?>
                            <li> &nbsp; &nbsp; &nbsp;
                                @if($MnuCategory->icon !="")
                                    <i class="fa {{$MnuCategory->icon}}"></i> &nbsp;
                                @endif
                                <a {{ $active_cat }}  href="{{ Helper::categoryURL($MnuCategory->id) }}">{{ $MnuCategory_title }}</a><span
                                    class="pull-right">({{ $ccount }})</span></li>
                        @endforeach

                    @endforeach
                </ul>
            </div>
        </div>
   

        @endif
    
       <div class="col-lg-4">
           <div class="widget">
            {{Form::open(['route'=>['searchTopics'],'method'=>'GET','class'=>'form-search'])}}
            <div class="input-group input-group-sm">
                {!! Form::text('search_word',@$search_word, array('placeholder' => __('frontend.search'),'class' => 'form-control','id'=>'search_word','required'=>'')) !!}
                <input type="hidden" name="section" value="{{ @$WebmasterSection->id }}">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-theme" style="padding: 22px;
    margin-top: 11px;margin-right:5px;margin-left: 5px"><i class="fa fa-search" style="margin: -4px;"></i></button>
                </span>
            </div>

            {{Form::close()}}
                    </div>

       </div>

  
                  
               
       

         
     


    
</div>

              

                        </div>

                <div class="col-lg-12">
                   
                       <div class="row">
                             <div class="wbg-main-wrapper wbg-product-column-4 wbg-product-column-mobile-2">


                            <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $details_var = "details_" . @Helper::currentLanguage()->code;
                            $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                            $section_url = "";
                            ?>
                            @foreach($BooksLibrary as $Book)
                              <?php
                                if ($Book->$title_var != "") {
                                    $title = $Book->$title_var;
                                } else {
                                    $title = $Book->$title_var2;
                                }
                                if ($Book->$details_var != "") {
                                    $details = $details_var;
                                } else {
                                    $details = $details_var2;
                                }
                                if ($section_url == "") {
                                    $section_url = Helper::sectionURL($Book->webmaster_id);
                                }
                                ?>
                <div class="wbg-item">
                                <img src="{{ URL::to('uploads/topics/'.$Book->photo_file) }}"
                                                             alt="{{ $title }}"   width="200">
                                <h4 class="wgb-item-link" style="color: #000 !important">  {!! mb_substr(($title),0, 30)."..." !!}</h4>
                              <span><p style="font-size: 15px">{!! mb_substr(strip_tags($Book->$details),0, 300) !!}</p>              </span>
                
            
            
            
                                              <a href="{{ URL::to('uploads/topics/'.$Book->attach_file) }}" class="button wbg-btn" target="_blank">{{__('frontend.download')}}</a>
                                          
            
                </div>
@endforeach

    <div class="row">
        

               <div class="col-lg-6">
                                 {!! $BooksLibrary->appends(request()->input())->links() !!}
                            </div>
                    


                        <div class="col-lg-6">
                                <br>
                                <small>{{ $BooksLibrary->firstItem() }} - {{ $BooksLibrary->lastItem() }} {{ __('backend.of') }}
                                    ( {{ $BooksLibrary->total()  }} ) {{ __('backend.records') }}</small>
                            </div>
                   
            </div>
                          
</div>
           
                     

    </section>

@endsection
