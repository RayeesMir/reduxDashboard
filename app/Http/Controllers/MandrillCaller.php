<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mandrill;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class MandrillCaller extends Controller
{
    private $client;
    public function __construct()
    {
        $client=null;
        $this->client = new Client(['base_uri' => 'http://192.168.0.170:8888//api/','timeout'  => 5.0,]);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generateOrderContent()
    {
        $rows="";
        $content= "<tr>
                        <td>Item Description</td>
                        <td>Quantity</td>
                        <td>Price</td>
                   </tr>";                
                        for($i=0;$i<10;$i++)
                        {
                            $rows=$rows."<tr><td>Item Description</td><td>Item Quantity</td><td>Item Price</td></tr>";
                        }   
                $content=$content.$rows;
    return $content;
    }


    public function index(Request $request)
    {
        $selectedUsers=$request->input('mails');
        $selectedUsers=json_decode(substr(urldecode($selectedUsers),0,-6));    
        try {
        $mandrill = new Mandrill('-SAX5HQ9VJlqNZgHAcktZw');
        $template_name = 'order-summary';        
        $template_content = array(

                                    array(
                                        'name' => 'customer-name',
                                        'content' => 'Rayees'
                                    ),
                                    array(
                                        'name'=>'grand-total',
                                        'content'=>'10000000000'
                                        ),
                                    // // array(
                                    // //     'name'=>'order-detail',
                                    // //     'content'=>str_replace("\n","",$this->generateOrderContent());
                                    // //     ),
                                    array(
                                        'name'=>'customer-address',
                                        'content'=>'Bangalore'
                                        )
                                    // array(
                                    //     'name'=>'customer-mobilenumber',
                                    //     'content'=>'7411220923'
                                    //     )
                                );     
        $message = array(
                            'from_email' => 'cs@reduxpress.in',
                            'from_name' => 'Rayees ',
                            'to' => array(),
                            'headers' => array('Reply-To' => 'mirrayees@reduxpress.in'),
                            'important' => true,
                            'track_opens' => null,
                            'track_clicks' => null,
                            'auto_text' => null,
                            'auto_html' => null,
                            'inline_css' => null,
                            'url_strip_qs' => null,
                            'preserve_recipients' => null,
                            'view_content_link' => null,
                            'bcc_address' => 'message.bcc_address@example.com',
                            'tracking_domain' => null,
                            'signing_domain' => null,
                            'return_path_domain' => null,
                            'merge' => true,
                            'merge_language' => 'mailchimp'
        // 'global_merge_vars' => array(
        //     array(
        //         'name' => 'merge1',
        //         'content' => 'merge1 content'
        //     )
        // ),
        // 'merge_vars' => array(
        //     array(
        //         'rcpt' => 'recipient.email@example.com',
        //         'vars' => array(
        //             array(
        //                 'name' => 'merge2',
        //                 'content' => 'merge2 content'
        //             )
        //         )
        //     )
        // ),
        // 'tags' => array('password-resets'),
        // 'subaccount' => 'customer-123',
        // 'google_analytics_domains' => array('example.com'),
        // 'google_analytics_campaign' => 'message.from_email@example.com',
        // 'metadata' => array('website' => 'www.example.com'),
        // 'recipient_metadata' => array(
        //     array(
        //         'rcpt' => 'recipient.email@example.com',
        //         'values' => array('user_id' => 123456)
        //     )
        // ),
        // 'attachments' => array(
        //     array(
        //         'type' => 'text/plain',
        //         'name' => 'myfile.txt',
        //         'content' => 'ZXhhbXBsZSBmaWxl'
        //     )
        // ),
        // 'images' => array(
        //     array(
        //         'type' => 'image/png',
        //         'name' => 'IMAGECID',
        //         'content' => 'ZXhhbXBsZSBmaWxl'
        //     )
        // )
    );
            // $template_content[]=array(
            //                             'name' => 'customer-name',
            //                             // 'content' => include('orderContent.php')
            //                         );
    foreach ($selectedUsers as $users) {
            $message['to'][] = array(
                'email' => $users->mail,
                'name' => $users->name,
                'type' => 'to'
                );
            
         }
        
        $async = false;
        $ip_pool = 'Main Pool';
        
        
        //$template_content[0]['content']='<div><h1>My NAme Is rayees </h1></div>';
       // dd($template_content);
    
    // $template_content['content']=$con;
    //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool);
   // dd($result);
    //var_dump($this->generateOrderContent());
    //dd( $this->generateOrderContent());
     
     
    // $response = $this->client->request('GET', 'getAllUsers');
    //         $statusCode=$response->getStatusCode();
    //         $reason=$response->getReasonPhrase(); 
    //         if($statusCode==200 and $reason=='OK')
    //         {   

    //             $users=json_decode($response->getBody(),true);
                
    //             return $users;
    //         }
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )
    
    )
    */
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}
//return redirect('users');
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
