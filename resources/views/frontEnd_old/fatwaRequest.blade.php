@extends('frontEnd.layout')
<style>
  .required:after {
    content:" *";
    color: red;
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
            <h4><i class="fa fa-send-o"></i> {{__('backend.fatwa_request_title')}}</h4>
            <label class="form-control-label">
{{__('backend.fatwa_request_desc')}}
</label>
            <hr>
            
            <form  class="my-data" method="POST" action="{{route('fatwaRequestPageSubmit')}}">
                @csrf
         
                <div class="row" style="display:flex">
                   
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.fullName')}}
                    </label>
                               <input type="text" name="fullName" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.contactEmail')}}
                    </label>
                               <input type="email" name="email" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                </div>
             <div class="row" style="display:flex">
                   
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.contactMobile')}}
                    </label>
                               <input type="text" name="phone" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.city')}}
                    </label>
                               <input type="text" name="city" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                </div>
                <div class="row" style="display:flex">
                   
                    <div class="col-md-8">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-4 form-control-label required">{{__('backend.title_fatwa')}}
                    </label>
                               <input type="text" name="title" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                   
                </div>
          
          <div class="row" style="display:flex">
                   
                    <div class="col-md-8">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-4 form-control-label required">{{__('backend.details_fatwa')}}
                    </label>
                             <textarea name="details" rows="10" cols="100" id="myTextarea" class="form-control" required></textarea>
                            
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
