<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;

class UserListController extends Controller
{

    private $client;
    protected $selectedMails;
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://192.168.1.103:8888/api/','timeout'  => 5.0,]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function design()
    {
        return view('dashboard.users');
    }
    public function index()
    {
        try {
            $response = $this->client->request('GET', 'getAllUsers');
            $statusCode=$response->getStatusCode();
            $reason=$response->getReasonPhrase(); 
            if($statusCode==200 and $reason=='OK')
            {   

                $users=json_decode($response->getBody(),true);
                
                return $users;
            }
        }catch (ClientException $e) {
              echo $e->getRequest();
              echo $e->getResponse();
        }    
    }
    /**
     *  
     */
    public function getSelectedMail(Request $request)
    {
     
         $selectedMails = $request->input('mails');
        // file_put_contents(storage_path().'/text.txt', $selectedMails);
       //file_put_contents(storage_path().'/text.txt',$type , true);
       // return view('dashboard.testmail')->with('mails',$mails);       
        return view('dashboard.sendmail')->with('mails',$selectedMails);
     // return json_decode($selectedMails);
    }

    public function getSelectedNumbers(Request $request)
    {
         
       $selectedMobileNumbers = $request->input('mails');
        // file_put_contents(storage_path().'/text.txt', $selectedMails);
       //file_put_contents(storage_path().'/text.txt',$type , true);
       // return view('dashboard.testmail')->with('mails',$mails);       
        return view('dashboard.sendmessage')->with('mobile',$selectedMobileNumbers);
     // return json_decode($selectedMails);
      
    }

    public function showSelectedMails(){
        return $this->selectedMails;
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
