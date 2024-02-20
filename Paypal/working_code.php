<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class AdminController extends Controller
{
   public function __construct()
   {
      $this->provider = new PayPalClient;
      $data = DB::table('paypal_test')->first();
      if($data->mode == '0'){
         $config = [
             'mode'    => 'sandbox',
             'sandbox' => [
                 'client_id'         => $data->client_id,
                 'client_secret'     => $data->client_secret,
                 'app_id'            => $data->app_id,
             ],

             'payment_action' => 'Sale',
             'currency'       => 'USD',
             'notify_url'     => '',
             'locale'         => 'en_US',
             'validate_ssl'   => true,
         ];
         $this->provider->setApiCredentials($config); 
      }
   }
   public function dashboard(Request $request)
   {
      $value = $request->session()->get('adminData');

      if(is_null($value)){
         return redirect('admin/login');
      }

      $bookings = Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
      $labels = [];
      $data = [];
      foreach ($bookings as $booking) {
         $labels[] = $booking->checkin_date;
         $data[] = $booking->total_bookings;
      }

      $rtbookings = DB::table('room_types as rt')->join('rooms as r','r.room_type_id','=','rt.id')->join('bookings as b','b.room_id','=','r.id')->select('rt.title',DB::raw('count(b.id) as total_bookings'))->groupBy('r.room_type_id')->get();
      $plabels = [];
      $pdata = [];
      foreach ($rtbookings as $rbooking) {
         $plabels[] = $rbooking->title;
         $pdata[] = $rbooking->total_bookings;
      }    
      return view('dashboard',['labels'=>$labels,'data'=>$data,'plabels'=>$plabels,'pdata'=>$pdata]);

 
   }
   public function login(Request $request)
   {
      $value = $request->session()->get('adminData');

      if(!is_null($value)){
         return view('dashboard');
      }
      return view('Admin.index');
   }

   public function check_login(Request $request){
      $request->validate([
         'username'=>'required',
         'password'=>'required'
      ]);
      $admin = Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->count();
      if($admin>0){
         $adminData = Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->get();
         session(['adminData'=>$adminData]);
         if($request->has('remember_me')){
            Cookie::queue('adminuser',$request->username,1440);
            Cookie::queue('adminpassword',$request->password,1440);
         }
         return  redirect('admin');
      }
      else{
         return redirect('admin/login')->with('msg','invalid username/password');
      }
   }
   public function logout()
   {
      session()->forget(['adminData']);
      return redirect('admin/login');
   }

   public function paypal_test()
   {
      $provider = $this->provider;
      $provider->getAccessToken();

      // $order = $provider->createOrder([
      //       'intent'=> 'CAPTURE',
      //       'purchase_units'=> [[
      //           'reference_id' => 'transaction_test_number',
      //           'amount'=> [
      //             'currency_code'=> 'USD',
      //             'value'=> '20.00'
      //           ]
      //       ]],
      //       'application_context' => [
      //            'cancel_url' => 'http://hotelsystem.test/paypal/cancel',
      //            'return_url' => 'http://hotelsystem.test/paypal/success'
      //       ]
      //   ]);
      // return redirect($order['links'][1]['href'])->send();
      $response = $provider->listSubscriptionTransactions('I-DN83E15XKC8N','2023-01-01T07:50:20.940Z', '2023-12-29T07:50:20.940Z');
      // $subscription = $provider->showSubscriptionDetails('I-KK61R9MKG6JH');
      // $response = $provider->activateSubscription('I-KK61R9MKG6JH', 'Reactivating the subscription');
      // dd($subscription);
      // $response = $provider->suspendSubscription('I-KK61R9MKG6JH', 'Item out of stock');
      dd($response);
   }
   public function paypal_success(Request $request)
   {
      dd($request->all()); 
      $provider = new PayPalClient;
      $provider->getAccessToken();
      $token = $request->token;
      $response = $provider->capturePaymentOrder($token);
      dd($response);
   }
   public function paypal_cancel(Request $request)
   {
      // dd($request->all());
      $provider = $this->provider;
      $provider->getAccessToken();
      // $products = $provider->listProducts();
      // $filters = [
      //     'start_date'    => '2023-01-01T00:00:00-0700',
      //     'end_date'      => '2023-01-29T23:59:59-0700'
      // ];
      // $response = $provider->listTransactions($filters);
      // dd($response);
      // // $invoices = $provider->listInvoices();
      // dd($products);


      $plan_id = 'P-1YL474056F705252NMPKMEDY';

      $plan = $provider->showPlanDetails($plan_id);
      dd($plan);
      $product = $provider->showProductDetails('PROD-93J82470PY7858737');                         
   }
   public function subscriber_add()
   {
      $provider = $this->provider;
      $provider->getAccessToken();
      $data = json_decode('{
        "plan_id": "P-1YL474056F705252NMPKMEDY",
        "start_time": "2023-01-28T10:07:38Z",
        "shipping_amount": {
            "currency_code": "USD",
            "value": "0.00"
         },
         "subscriber": {
            "name": {
               "given_name": "Alamin Jwel",
               "surname": "MM"
            },
            "email_address": "ronok.ALamin@example.com"
         },
         "application_context": {
            "return_url": "http://hotelsystem.test/paypal/cancel",
            "cancel_url": "http://hotelsystem.test/paypal/cancel"
         }
      }', true);
      $subscription = $provider->createSubscription($data);
      return redirect($subscription['links'][0]['href'])->send();

   }

   public function paypal_demo(){   //create plan
      $provider = $this->provider;
      $provider->getAccessToken();
      $data = json_decode('{
         "product_id": "PROD-5RG3208385205322D",
         "name": "Botsailor Daily plan",
         "description": "Botsailor Daily Based Payment plan",
         "status": "ACTIVE",
         "billing_cycles": [
          {
            "frequency": {
              "interval_unit": "DAY",
              "interval_count": 1
            },
            "tenure_type": "REGULAR",
            "sequence": 1,
            "total_cycles": 12,
            "pricing_scheme": {
              "fixed_price": {
                "value": "6.99",
                "currency_code": "USD"
              }
            }
          }
         ],
         "payment_preferences": {
           "auto_bill_outstanding": true,
           "setup_fee_failure_action": "CONTINUE",
           "payment_failure_threshold": 3
         }
      }', true);

      $plan = $provider->createPlan($data,32);
      dd($plan);
   }

   public function paypal_webhook(){

      // $ch = curl_init();
      // curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/notifications/webhooks');
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


      // $headers = array();
      // $headers[] = 'Content-Type: application/json';
      // $headers[] = 'Authorization: Bearer A21AAJ-kbwAuGnJSsoOAaq5HsDAy-yBPZY5Rw7d3DCFwr9H-USRFRPhBKav_ZziIz9nXie280RMiR8ZjMLF8KQ8yqN7mw31uA';
      // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      // $result = curl_exec($ch);
      // if (curl_errno($ch)) {
      //     echo 'Error:' . curl_error($ch);
      // }
      // curl_close($ch);
      // dd($result);

      // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/notifications/webhooks');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"url\": \"https://newrajshahi.com/telegram/shopify.php\",\n  \"event_types\": [\n    {\n      \"name\": \"BILLING.SUBSCRIPTION.CREATED\"\n    },\n    {\n      \"name\": \"PAYMENT.CAPTURE.COMPLETED\"\n    }\n  ]\n}");

      $headers = array();
      $headers[] = 'Content-Type: application/json';
      $headers[] = 'Authorization: Bearer A21AAJ-kbwAuGnJSsoOAaq5HsDAy-yBPZY5Rw7d3DCFwr9H-USRFRPhBKav_ZziIz9nXie280RMiR8ZjMLF8KQ8yqN7mw31uA';
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $result = curl_exec($ch);
      if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
      }
      curl_close($ch);
      dd($result);
   }
}
