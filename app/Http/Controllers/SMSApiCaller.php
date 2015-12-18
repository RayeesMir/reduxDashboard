<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use DB;
use Session;
use Carbon\Carbon;
use Validator;
use GuzzleHttp\Exception\ClientException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Middleware;
use Guzzle\Plugin\History\HistoryPlugin;


class SMSApiCaller extends Controller
{

        private $client;
        private $actualStatus=array();
     public function __construct()
    {
        $client=null;        
        $this->client = new Client(['base_uri' => 'http://bhashsms.com/','timeout'  => 5.0,]);
        
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

         
    public function index(Request $request)
    {   
        // $firstName = '{% First Name %}';
        // $lastName = '{% Last Name %}';
        // $emailID = '{% Email ID %}';
        // $mobileNumber = '{% Mobile Number %}';
        // $sms = urldecode($request->input('sms'));
        // $sendSmsUrl="";
        // $statusReport=array();
        // unset($this->actualStatus);
        // $users=json_decode(substr(urldecode($request->input('messages')),0,-6));
        foreach (json_decode(substr(urldecode($request->input('messages')),0,-6)) as $user) 
        {
        //    $smsText=$sms;
        //    if( strpos($sms,$firstName) != false || strpos($sms,$lastName) != false || strpos($sms,$emailID) != false || strpos($sms,$mobileNumber) != false)
        //     {          
        //         $smsText=str_replace($firstName,array_key_exists(0,explode(" ",$user->field_full_name_value))?explode(" ",$user->field_full_name_value)[0]:" ",$smsText);
        //         $smsText=str_replace($lastName,array_key_exists(1,explode(" ",$user->field_full_name_value))?explode(" ",$user->field_full_name_value)[1]:" ",$smsText);
        //         $smsText=str_replace($emailID,$user->mail,$smsText);
        //         $smsText=str_replace($mobileNumber,$user->field_phone_no_value,$smsText);               
        //     }

          // $sendSmsUrl="/api/sendmsg.php?user=reduxpress&pass=redux123&sender=RDXPRS&phone=7411220923&text=".$smsText."&priority=ndnd&stype=normal";

          // $sentSmsResponse=$this->client->request('GET',$sendSmsUrl);

          // $sentSmsUrlResponse=substr($sentSmsResponse->getBody()->getContents(),0,-4);
          
          //// $statusReport[$user->field_phone_no_value]=$sentSmsUrlResponse;                      Not To Be Used 
          
          // $deliveryUrl="http://bhashsms.com/api/recdlr.php?user=reduxpress&msgid=". $statusReport[$user->field_phone_no_value] ."&phone=" . $user->field_phone_no_value . "&msgtype=ndnd";
          
          // $deliveryResponse=$this->client->request('GET',$deliveryUrl);

          $user->{'sent_sms_status'}='sent';//$deliveryResponse->getBody()->getContents();

          $this->actualStatus[]=$user;
           

           $id= DB::table('sent_sms')->insertGetId(
                [   
                    'userid'=>Session::get('userid'),
                    'message'=>$smsText,
                    'sms_tid'=>$tid,                //Pending 
                    'status'=>$deliveryResponse,
                    'bhash_sent_id'=>$sentSmsUrlResponse,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ]
            );
           $templateData=DB::table('smstemplate')->select('message')->where('sms_tid','=',$id)->get();
           // file_put_contents(storage_path().'smstext.txt',$templateData);
           return $templateData;





          //http://bhashsms.com/api/recdlr.php?user=reduxpress&msgid=396912&phone=74112&msgtype=ndnd




          //echo $statusReport[$user->field_phone_no_value]."<br>";
          //$msgStatus=explode(".",$bhashResponse)[0];
          
          //$msgResponseId=explode(".",$bhashResponse)[1];
          
     


            // $response= $this->client->request('GET','/api/sendmsg.php',['query'=>[
// ". $user->field_phone_no_value ."
            //                                                                         ['user'=>'reduxpress'],
            //                                                                         ['pass'=>'redux123'],
            //                                                                         ['sender'=>'RDXPRS'],
            //                                                                         ['phone'=> 7411220923],//$user->field_phone_no_value
            //                                                                         ['text'=>'Test Message'], //$smsText
            //                                                                         ['priority'=>'ndnd'],
            //                                                                         ['stype'=>'normal']
            //                                                                     ]]);           
        } 
       // print_r($this->actualStatus);
        return view('dashboard.SmsResponse');
       // dd($statusReport);
        //dd($actualStatus);
        
    }


    public function smsresponse(){
        
        
         dd($this->actualStatus);
    }

    /**
     *  Stores SMS Template In Database
     */
    public function storeSmsTemplate(Request $request)
    {
        $validator=Validator::make( $request->all(),
                                    ['smstemplate'=>'required|min:5']
                                   
                                );    
         
        if($validator->fails())
        {
            $errMessages=$validator->messages();
            return $errMessages;
        }
        else
        {
           $id= DB::table('smstemplate')->insertGetId(
                [   
                    'message'=>$request->input('smstemplate'),
                    'title'=>$request->input('title'),
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ]
            );
           $templateData=DB::table('smstemplate')->select('message','sms_tid')->where('sms_tid','=',$id)->get();
           // file_put_contents(storage_path().'smstext.txt',$templateData);
           return $templateData;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
