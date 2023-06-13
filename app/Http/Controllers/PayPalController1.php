<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\WebmasterSection;
use App\Models\WebmasterSetting;
use App\Models\Topic;
use App\Models\Menu1;
use App\Models\Order;
use Illuminate\Support\Str;
use App;
use Redirect;
use Helper;
use Auth;
use DB;
use Srmklive\PayPal\Services\PayPal;

class PayPalController extends Controller
{
    public function create(Request $request)
    {
//dd($request);
       $data = json_decode($request->getContent(),true);
     //  dd($request);
       $provider = \PayPal::setProvider();
       $provider->setApiCredentials(config('paypal'));
       $token = $provider->getAccessToken();
       $provider->setAccessToken($token);
       //dd($provider);

       $price = Order::getProductPrice($data['value']);
    $description = Order::getProductDescription($data['value']);

$order = $provider->createOrder([
"intent" => "CAPTURE",
"purchase_units" =>[
    [
"amount"=>[
    "currency_code" => "USD",
    "value"=>$price
],
  "description"=>$description

]
]
]);
     Order::create([
        'price'=>$price,
        'description'=>$description,
        'status'=>$order['status'],
        'reference_number'=>$order['id']
     ]);

    return response()->json($order);
    }

public function capture(Request $request){
 $data = json_decode($request->getContent(),true);
     //  dd($request);
       $provider = \PayPal::setProvider();
       $provider->setApiCredentials(config('paypal'));
       $token = $provider->getAccessToken();
       $provider->setAccessToken($token);
       $orderId = $data['orderId'];


       $result = $provider->capturePaymentOrder($orderId);

       if($result['status'] == 'COMPLETED'){
        DB::table('smartend_order')->where('reference_number',$result['id'])
        ->update(['status'=>'COMPLETED','updated_at'=>\Carbon\Carbon::now()]);
       }
       return response()->json($result);
}
  

 
     public function latest_topics($section_id, $limit = 3)
    
    {
        return Topic::where([['status', 1], ['webmaster_id', $section_id], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orwhere([['status', 1], ['webmaster_id', $section_id], ['expire_date', null]])->orderby('row_no', 'desc')->limit($limit)->get();
    }
    public function PaymentPage()
    {
        return $this->PaymentPageByLang("");
    }

    public function PaymentPageByLang($lang)
    {
        
        $lang = App::getLocale();\Session::put('locale', $lang);

        // General Webmaster Settings
        $WebmasterSettings = WebmasterSetting::find(1);

        // get User Details
        
                 $id = $WebmasterSettings->payment_page_id;
                // dd($id);
               $Topic = Topic::where('status', 1)->find($id);

               //dd($Topic);

            $websiteNavbar  =  Menu1::with('children')->orderBy('order')->where('type','web')->where('status','1')->get();
             $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);
                     $WebmasterSettings = WebmasterSetting::find(1);
             // Page Title, Description, Keywords
                $seo_title_var = "seo_title_" . @Helper::currentLanguage()->code;
                $seo_description_var = "seo_description_" . @Helper::currentLanguage()->code;
                $seo_keywords_var = "seo_keywords_" . @Helper::currentLanguage()->code;
                $tpc_title_var = "title_" . @Helper::currentLanguage()->code;
                $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
                $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;
                if ($Topic->$seo_title_var != "") {
                    $PageTitle = $Topic->$seo_title_var;
                } else {
                    $PageTitle = $Topic->$tpc_title_var;
                }
                if ($Topic->$seo_description_var != "") {
                    $PageDescription = $Topic->$seo_description_var;
                } else {
                    $PageDescription = Helper::GeneralSiteSettings($site_desc_var);
                }
                if ($Topic->$seo_keywords_var != "") {
                    $PageKeywords = $Topic->$seo_keywords_var;
                } else {
                    $PageKeywords = Helper::GeneralSiteSettings($site_keywords_var);
                }
            // .. end of .. Page Title, Description, Keywords
                 
            // Send all to the view
            return view("frontEnd.payment",
                compact("lang",
                    "WebmasterSettings",
                    "PageTitle",
                    "PageDescription",
                    "PageKeywords",
                     "LatestNews",
                    "websiteNavbar"));

        
}
}
