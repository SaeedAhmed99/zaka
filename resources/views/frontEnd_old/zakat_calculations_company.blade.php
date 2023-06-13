@extends('frontEnd.layout')
<style type="text/css">
    
h3{
    color: #f26522 !important;
}
.swal-text {
    text-align: unset !important;
    }

body {
  font-family: Arial, sans-serif;
  background: url(http://www.shukatsu-note.com/wp-content/uploads/2014/12/computer-564136_1280.jpg) no-repeat;
  background-size: cover;
  height: 100vh;
}

h1 {
  text-align: center;
  font-family: Tahoma, Arial, sans-serif;
  color: #06D85F;
  margin: 80px 0;
}

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.button {
  font-size: 1em;
  padding: 10px;
  color: #fff;
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #06D85F;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 35%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
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
                       
                            <li>{{__('frontend.company_zakat')}}</li>
                           
                   
                    </ul>
                </div>

            </div>
        </div>
    </section>

<section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

        <div class="form-block">
            <h3 style="text-align: center;">{{__('frontend.company_zakat_cal')}}</h3>
        </div>
    </div>
<div class="col-lg-12">
  <table class="table table-bordered table-striped">
     <form id="calculate-zakat-on-companies-form">
    <tbody>
        <tr>
            <td>1</td>
            <td>{{__('frontend.zakat6')}}</td>
            <td>
               @if(@Helper::currentLanguage()->code == 'ar')
                <select class="form-control" name="" id="year_pass">
                    <option value="yes">نعم</option>
                    <option value="no">لا</option>

                </select>
                @else
                  <select class="form-control" name="" id="year_pass">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>

                </select>

                @endif
            </td>
            
        </tr>
        <tr>
            <td>2</td>
            <td>{{__('frontend.zakat2')}}</td>
            <td>
                @if(@Helper::currentLanguage()->code == 'ar')
                <select class="form-control" name="" id="year_type">
                    <option value="2.5">هجري</option>
                    <option value="2.579">ميلادي</option>

                </select>
                @else
                <select class="form-control" name="" id="year_type">
                    <option value="2.5">Hijri</option>
                    <option value="2.579">Gregorian</option>

                </select>
                @endif
            </td>
            
        </tr>
        <tr>
             <td colspan="3" style="text-align:center;font-size: 20px;font-weight: bold;">{{__('frontend.circulating_money')}}</td>
          
        </tr> 
        <tr>
            <td>3</td>
            <td>{{__('frontend.zakat7')}}</td>
            <td><input class="form-control" id="circulation1" required></td>
            
        </tr>
         <tr>
            <td>4</td>
            <td>{{__('frontend.zakat8')}}</td>
                        <td><input class="form-control" id="circulation2" required></td>

           
        </tr>
        <tr>
             <td>5</td>
             <td>{{__('frontend.zakat9')}}</td>
                        <td> <input class="form-control" id="circulation3" required></td>
        </tr>
        <tr>
             <td colspan="3"style="text-align:center;font-size: 20px;font-weight: bold;">{{__('frontend.current_responsibilities')}}</td>
          
        </tr> 
        <tr>
            <td>6</td>
            <td>{{__('frontend.zakat10')}}</td>
                       <td> <input class="form-control" id="debt1" required></td>

            
        </tr>
         <tr>
            <td>7</td>
            <td>{{__('frontend.zakat11')}}</td>
                       <td><input class="form-control" id="debt2" required></td>

            
        </tr>

        <tr> 
             <td colspan="2" style="text-align:center">
               


                <a class="btn btn-lg submit-btn btn-theme"  id="how-to-calc">{{__('frontend.how_calculate')}}</a>
           </td>
            <td style="text-align:center"><button type="submit" class="btn btn-lg submit-btn btn-theme">{{__('frontend.calculate')}}</button>

             </td>
        </tr>
    </tbody>
</form>
</table>
</div>
           
       

                </div>
            </div>
        </div>
</section>
 

@endsection
<script src="{{ URL::asset('assets/frontend/js/zakat_calculations/jQuery.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/zakat_calculations/sweetalert.min3bea.js') }}"></script>
@if($lang == 'ar')
<script src="{{ URL::asset('assets/frontend/js/zakat_calculations/zakat_on_companies/script_ar3bea.js') }}"></script>
@else
<script src="{{ URL::asset('assets/frontend/js/zakat_calculations/zakat_on_companies/script3bea.js') }}"></script>
@endif