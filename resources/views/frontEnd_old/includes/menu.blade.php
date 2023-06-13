
        <div class="navbar-collapse collapse"  >
            

             <ul class="nav navbar-nav">
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
                    ?>
                           @if($value->parent_id == '0')
                           @if(count($value->children) == '0')
                           <li>
                              <a class="{{ ( URL(\Request::getPathInfo()) == URL($value->url) ) ? 'active' : '' }}" href="
                                @if(is_null($value->url))#
                                @else{{ URL($value->url)}}
                                @endif">   {{ $link_title }}
                                </a>
                           </li>
                           @else
                           <li >
                              <a class="{{ ( URL(\Request::getPathInfo()) == URL($value->url) ) ? 'active' : '' }}" href="javascript:void(0)" id="navbarDropdownMenuLink" class="dropdown-toggle " data-toggle="dropdown"
                               data-hover="dropdown"
                               data-delay="0" data-close-others="true">
                             {{$link_title}} <i
                                    class="fa fa-angle-down"></i></a>
                              </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                            $menu_title_var = "title_" . @Helper::currentLanguage()->code;
                            $menu_title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                            $slug_var = "seo_url_slug_" . @Helper::currentLanguage()->code;
                            $slug_var2 = "seo_url_slug_" . env('DEFAULT_LANGUAGE');
                            ?>

                                 @foreach($value->children as $ky => $val)
                                    <?php
                                    if ($val->$menu_title_var != "") {
                                        $link_title = $val->$menu_title_var;
                                    } else {
                                        $link_title = $val->$menu_title_var2;
                                    }
                                    ?>
                                      <li>
                                         <a class="dropdown-item {{ ( URL(\Request::getPathInfo()) == URL($val->url) ) ? 'active' : '' }}" href="{{ URL($val->url) }}">  {{ $link_title }} </a>
                                        </li>
                               
                                          @endforeach  
                                </ul>



                                
                                
                           </li>
                           @endif
                           @endif
                           @endforeach
                          
                        </ul>
                       
                        
                        
        </div>
