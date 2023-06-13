@extends('frontEnd.layout')
<style>
  .required:after {
    content:" *";
    color: red;
  }
  .row{
    display: flex;
  }
   .containerPage {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 0;
    margin: 0;
}


/*  */

.container2 {
    width: 1320px;
    display: flex;
    justify-content: space-between;
}

.who {
    width: 50%;
    background-color: hsl(72deg 33% 97%);
}

.video {
    width: 50%;
    background-color: hsl(72deg 33% 97%);
}

@media only screen and (max-width:767px) {
    .container2 {
        display: block;
    }
    .who {
        width: 100% !important;
        padding: 30px;
       
    }
    .video {
        width: 100% !important;
    }
}


/* who */

.who {
    padding: 30px;
    text-align: right;
}

.who label {
    font-size: 30px;
    font-weight: bold;
    font-family: smart4ds, sans-serif;
}

.who label span {
    color: hsl(19deg 84% 55%);
    font-family: smart4ds, sans-serif;
}

.UnderLine {
    width: 31px;
    height: 2px;
    background-color: hsl(19deg 84% 55%);
    position: absolute;
    margin-top: 10px;
}

.who p {
    margin-top: 30px;
    font-size: 14px;
    line-height: 1.5;
    font-family: smart4ds, sans-serif;
    color: hsl(60deg 1% 42%);
    margin-bottom: 60px;
}

.who .PointAndImg {
    display: flex;
    margin-top: 20px;
    font-family: smart4ds, sans-serif;
}

.PointAndImg h2 {
    LINE-HEIGHT: .7;
    MARGIN-BOTTOM: 15PX;
    color: hsl(72deg 6% 17%);
}

.PointAndImg p {
    font-size: 14px;
    margin: 0;
    color: hsl(60deg 1% 42%);
}

.PointAndImg img {
    margin-left: 20px;
    margin-bottom:9px;
}

.vedios {
    margin-top: 35px;
}

div#order1 {
    order: 0 !important;
    width: 100%;
}

div#order2 {
    order: 1 !important;
}

.showVideo {
    display: flex;
    flex-wrap: wrap;
}

@media only screen and (max-width: 500px) {
    .who {
        padding: 10px !important;
    }
    .who .PointAndImg {
        display: block;
    }
    .PointAndImg {
        padding: 10px;
    }
    .container2 {
        padding: 16px;
    }
    .who p {
        padding: 10px;
    }
}

@media only screen and (max-width: 767px) {
    div#order1 {
        order: 1 !important;
    }
    div#order2 {
        order: 0 !important;
    }
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

 @if(!empty($Topic))
        @if(@$Topic->{"details_" . @Helper::currentLanguage()->code} !="")
            <section >
                    <br>
                <div class="containerPage">
                <div class="container2">

                  {!! @$Topic->{"details_" . @Helper::currentLanguage()->code} !!}
                </div>
                </div>
            </section>
               
                  
        @endif
    @endif

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
            <h4><i class="fa fa-send-o"></i> {{__('backend.zakat_declaration_title')}}</h4>
            <label class="form-control-label">{{__('backend.zakat_declaration_desc')}}
</label>
            <hr>
            
            <form role="form" class="my-data" method="POST" action="{{route('ZakatDeclarationPageSubmit')}}" enctype="multipart/form-data">
                @csrf
         <label class="" style="font-style: bold;font-size: 20px;margin-bottom: 15px;">{{__('backend.personal_info')}}</label>
                <div class="row">
                   
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.taxpayer')}}
                    </label>
                               <input type="text" name="taxpayer" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.idNumber')}}
                    </label>
                               <input type="text" name="idNumber" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.taxNumber')}}
                    </label>
                               <input type="text" name="taxNumber" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                </div>
             <div class="row">

                   
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.bank_name')}}
                    </label>
                               <input type="text" name="bank_name" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.accountNumber')}}
                    </label>
                               <input type="text" name="accountNumber" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                     <div class="col-md-4">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-6 form-control-label">
                    </label>
                               <input type="hidden" name="" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                </div>


 <label class="" style="font-style: bold;font-size: 20px;margin-bottom: 15px;">{{__('backend.contactInfoTaxpayer')}}</label>
                <div class="row">
                   
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
                           class="col-sm-6 form-control-label">{{__('backend.contactPhone')}}
                    </label>
                               <input type="text" name="tel" class="form-control" placeholder="" >
                            
                        </div>

                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label ">{{__('backend.contactFax')}}
                    </label>
                               <input type="text" name="fax" class="form-control" placeholder="" >
                            
                        </div>

                    </div>
                </div>
            <div class="row">
                   
                   
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label "> {{__('backend.contactEmail')}}
                    </label>
                               <input type="email" name="email" class="form-control" placeholder="" >
                            
                        </div>

                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label required "> {{__('backend.governorate')}}
                    </label>
                      @if(@Helper::currentLanguage()->code == 'ar')
                                <select name="governorate" class="form-control">
                                   <option value="رفح">رفح</option>
                                   <option value="خانيونس">خانيونس</option>
                                   <option value="الوسطى">الوسطى</option>
                                   <option value="غزة">غزة</option>
                                   <option value="الشمال">الشمال</option>
                               </select>
                               @else
                                <select name="governorate" class="form-control">
                                   <option value="Rafah">Rafah</option>
                                   <option value="Khan Younes">Khan Younes</option>
                                   <option value="Central">Central</option>
                                   <option value="Gaza">Gaza</option>
                                   <option value="North">North</option>
                               </select>

                               @endif
                        </div>

                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.taxpayerAddress')}}
                    </label>
                               <input type="text" name="address" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                   
                </div>
          <label class="" style="font-style: bold;font-size: 20px;margin-bottom: 15px;">{{__('backend.activity')}}</label>
         <div class="row">
                   
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-8 form-control-label required">{{__('backend.auditorName')}}
                    </label>
                               <input type="text" name="auditorName" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-8 form-control-label required">{{__('backend.auditorAddress')}}
                    </label>
                               <input type="text" name="auditorAddress" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label"> 
                    </label>
                               <input type="hidden" name="" class="form-control" placeholder="" >
                            
                        </div>

                    </div>
                </div>
           

          <div class="row">
                   
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-8 form-control-label required">{{__('backend.auditorPhone')}}
                    </label>
                               <input type="text" name="auditorPhone" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-8 form-control-label required"> {{__('backend.auditorEmail')}}
                    </label>
                               <input type="text" name="auditorEmail" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for=""
                           class="col-sm-6 form-control-label"> 
                    </label>
                               <input type="hidden" name="" class="form-control" placeholder="" >
                            
                        </div>

                    </div>
                </div>
             <div class="row">
                   
                    <div class="col-md-8">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-6 form-control-label required">{{__('backend.mainActivity')}}
                    </label>
                               <input type="text" name="mainActivity" class="form-control" placeholder="" required>
                            
                        </div>

                    </div>
                  </div>

              <div class="row">
                   
                    <div class="col-md-8">
                        <div class="form-group ">
                            <label for=""
                           class="col-sm-4 form-control-label required">{{__('backend.descActivity')}}
                          </label>
                             <textarea name="descActivity" rows="10" cols="100" id="myTextarea" class="form-control" required></textarea>
                            
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
