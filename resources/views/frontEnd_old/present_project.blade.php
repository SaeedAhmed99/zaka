@extends('frontEnd.layout')
<style>
  .required:after {
    content:" *";
    color: red;
  }
  .row{
    display: flex;
  }
</style>
@section('content')
    <?php
    $title_var = "title_" . @Helper::currentLanguage()->code;
    $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
    $details_var = "details_" . @Helper::currentLanguage()->code;
    $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
    if ($Topic->$title_var != "") {
        $title = $Topic->$title_var;
    } else {
        $title = $Topic->$title_var2;
    }
    if ($Topic->$details_var != "") {
        $details = $details_var;
    } else {
        $details = $details_var2;
    }
    $section = "";
    try {
        if ($Topic->section->$title_var != "") {
            $section = $Topic->section->$title_var;
        } else {
            $section = $Topic->section->$title_var2;
        }
    } catch (Exception $e) {
        $section = "";
    }
    ?>
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route("Home") }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
                        </li>
                        
                            <li class="active">{!! $title !!}</li>
                   
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   @if(Session::has('doneMessage'))
    <div class="padding p-b-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success m-b-0">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ Session::get('doneMessage') }}
                </div>
            </div>
        </div>
    </div>
@endif

  
    
        <div class="form-block" style="padding: 30px">
            <h4><i class="fa fa-send-o"></i>{{__('backend.present_project_title')}}</h4>
            <label class="form-control-label">{{__('backend.present_project_desc')}}
</label>
            <hr>
            
            <form role="form" class="my-data" method="POST" action="{{route('PresentingProjectPageSubmit')}}" enctype="multipart/form-data">
                @csrf
         
                <div class="row">
                   
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.project_name')}}
                    </label>
                               <input type="text" name="project_name" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.project_type')}}
                    </label>
                    @if(@Helper::currentLanguage()->code == 'ar')
                               <select name="project_type" class="form-control">
                                   <option value="اغاثي">اغاثي</option>
                                   <option value="تنموي">تنموي</option>
                                   <option value="اخرى">اخرى</option>
                               </select>
                          @else
                          <select name="project_type" class="form-control">
                                   <option value="Relief">Relief</option>
                                   <option value="Developmental">Developmental</option>
                                   <option value="Other">Other</option>
                               </select>
                    @endif  
                        </div>

                    </div>
                </div>
             <div class="row">
                   
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.company_name')}}
                    </label>
                               <input type="text" name="company_name" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.company_address')}}
                    </label>
                               <input type="text" name="company_address" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                </div>
<div class="row">
                   
                    <div class="col-md-8">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-4 form-control-label required">{{__('backend.project_details')}}
                    </label>
                               <textarea name="project_details" rows="10" cols="100" id="myTextarea" class="form-control" required></textarea>
                            
                        </div>

                    </div>
                   
                </div>
          
          <div class="row">
                   
                    <div class="col-md-8">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-4 form-control-label">{{__('backend.project_file')}}
                    </label>
                             <input type="file" name="project_file" class="form-control">
                            
                        </div>

                    </div>
                   
                </div>
             
            <div class="row" style="margin-bottom: 0;margin-top: 30px;display: flex;margin-right: 3px;margin-left: 3px;">
           
                    <button type="submit"
                            class="btn btn-lg submit-btn btn-theme"><i class="fa fa-send"></i> {{ __('backend.submit') }}</button>
            </div>
        </form>
        
        </div>

 
    </section>
<script type="text/javascript">
    document.getElementById("myTextarea").required;
</script>
@endsection
