<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//
use App\User_data;
use App\Database_data;
//
use Auth;
use Redirect;
use Validator;
use Hash;





class WSController extends Controller
{
  	
    public function index()
    {	
    	
    	if (Auth::check()) {
    	//User class
    	$WS_user = new User_data(Auth::user()->name,Auth::user()->surname,Auth::user()->email);
    	//DB
    	$dbs = new Database_data();//Database functions
    	$clients = $dbs->getAllClients();
    	$orders = $dbs->getOrders();
    	

			return view('workspace',compact('WS_user','clients','orders'));
		}
		else return redirect('/login');
		
    }

    public function addClient(Request $request)
    {
    	$dbs = new Database_data();//Database functions

    	if($dbs->addClient(
    		$request->input('title'),
    		$request->input('email'),
    		$request->input('phone'),
    		$request->input('reg_num')))
    		return redirect()->back()->with('message-sucs', 'Klients pievienots!');
    	else 
    		return redirect()->back()->with('message-bad', 'Klientu neizdevās pievienot!');
    }
    public function deleteClient(Request $request)
    {
    	$dbs = new Database_data();//Database functions

    	if($dbs->deleteClient($request->input('id')))
    		return redirect()->back()->with('message-sucs', 'Klients dzēsts!');
    	else 
    		return redirect()->back()->with('message-bad', 'Klientu neizdevās dzēst!');
    }
     public function editClient(Request $request)
    {
    	$dbs = new Database_data();//Database functions

    	if($dbs->editClient(
    		$request->input('id'),
    		$request->input('title'),
    		$request->input('email'),
    		$request->input('phone'),
    		$request->input('reg_num')))
    		return redirect()->back()->with('message-sucs', 'Klienta dati laboti!');
    	else 
    		return redirect()->back()->with('message-bad', 'Klienta datus neizdevās labot!');
    }
    /* Order Data*/
    public function addOrder(Request $request)
    {
    	$dbs = new Database_data();//Database functions

    	if($dbs->addOrder(
    		$request->input('title'),
    		$request->input('desc'),
    		$request->input('price'),
    		$request->input('owner')))
    		return redirect()->back()->with('message-sucs', 'Pasūtījums pievienots!');
    	else 
    		return redirect()->back()->with('message-bad', 'Pasūtījumu neizdevās pievienot!');
    }
    public function deleteOrder(Request $request)
    {
    	$dbs = new Database_data();//Database functions

    	if($dbs->deleteOrder($request->input('id')))
    		return redirect()->back()->with('message-sucs', 'Pasūtījums dzēsts!');
    	else 
    		return redirect()->back()->with('message-bad', 'Pasūtījumu neizdevās dzēst!');
    }
    public function editOrder(Request $request)
    {
    	$dbs = new Database_data();//Database functions

    	if($dbs->editOrder(
    		$request->input('title'),
    		$request->input('desc'),
    		$request->input('price'),
    		$request->input('owner')))
    		return redirect()->back()->with('message-sucs', 'Pasūtījums labots!');
    	else 
    		return redirect()->back()->with('message-bad', 'Pasūtījumu neizdevās labot!');
    }
    /**************/



    

  			
}

