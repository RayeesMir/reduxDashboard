<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;

class OrdersListController extends Controller
{
    
    private $client;

     public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://192.168.0.170:8888/api/','timeout'  => 2.0,]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function design()
    {
        return view('dashboard.orders');
    }
    public function index()
    {
               
       try {
            $response = $this->client->request('GET', 'getAllOrders');
            $statusCode=$response->getStatusCode();
            $reason=$response->getReasonPhrase(); 
            if($statusCode==200 and $reason=='OK')
            {
                $orders=json_decode($response->getBody(),true);
                return $orders;
                //return view('dashboard.test')->with('orders',$orders);
               
            }
        }catch (ClientException $e) {
              echo $e->getRequest();
              echo $e->getResponse();
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
