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
                       
                            <li>{{__('frontend.crops_zakat')}}</li>
                           
                   
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
            <h3 style="text-align: center;">{{__('frontend.crops_zakat_cal')}}</h3>
        </div>
    </div>
<div class="col-lg-12">
  <table class="table table-bordered table-striped">
    <form id="calculate-zakat-on-crops-form">
    <tbody>
        <tr>
            <td>1</td>
            <td>{{__('frontend.zakat12')}}</td>
            <td>

                <select class="form-control" id="method">
                             <option value="10">{{__('frontend.rain')}}</option>
                             <option value="5">{{__('frontend.irrigation')}}</option>
                    </select>
            </td>
            
        </tr>
        <tr>
            <td>2</td>
            <td>{{__('frontend.zakat13')}}</td>
              <td><input class="form-control" id="quantity" required></td>
            
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
<script src="{{ URL::asset('assets/frontend/js/zakat_calculations/zakat_on_crops/script_ar3bea.js') }}"></script>
@else
<script src="{{ URL::asset('assets/frontend/js/zakat_calculations/zakat_on_crops/script3bea.js') }}"></script>
@endif