<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SMSApiCaller extends Controller
{

     private $client;
     public function __construct()
    {
        $client=null;        
        $this->client = new Client(['base_uri' => 'http://bhashsms.com/api/sendmsg.php?user=reduxpress&pass=redux123&sender=RDXPRS&phone=8147851623','timeout'  => 5.0,]);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

         
    public function index(Request $request)
    {   
        $url='http://bhashsms.com/api/sendmsg.php?user=reduxpress&pass=redux123&sender=RDXPRS&phone=8147851623';
        try {
            foreach (json_decode(substr(urldecode($request->input('messages')),0,-6)) as $user) {
               // $url=$url.$user->field_phone_no_value;
            }
            $url=$url."&text=".urldecode($request->input('sms'));
            $url=$url."&priority=ndnd&stype=normal";

            dd($url);

            //$response = $this->client->request('GET', $url);
            // dd($response);
            // $statusCode=$response->getStatusCode();
            // $reason=$response->getReasonPhrase(); 
            // if($statusCode==200 and $reason=='OK')
            // {   

            //     $users=json_decode($response->getBody(),true);
                
            //     return $users;
            // }
        }catch (ClientException $e) {
              //echo $e->getRequest();
             // echo $e->getResponse();
        }    









        // $url="http://bhashsms.com/api/sendmsg.php?user=reduxpress&pass=redux123&sender=RDXPRS&phone=";
       
        //dd(json_decode(substr(urldecode($request->input('messages')),0,-6)));
        
     //   dd($url);

        //dd($mobileNumbers);
        // $selectedUsers=$request->input('messages');
        // $selectedUsers=json_decode(substr(urldecode($selectedUsers),0,-6)); 
        // $messageToSend=urldecode($request->input('sms')));
       // reduxpress
       // redux123
       // RDXPRS
        // $result=        
        // Make a call to bhashsms in the following format.
        //http://bhashsms.com/api/sendmsg.php?user=reduxpress&pass=********&sender=Sender ID&phone=MobileNo1,MobileNo2..&text=Test SMS&priority=Priority&stype=smstype

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
        //
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
