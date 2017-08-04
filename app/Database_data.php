<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Database_data extends Model
{
    /*Client Data*/
    public function getAllClients()
    {
    	$result =  DB::table('klients')->orderBy('id','desc')->get();

    	$result = array_map(function ($value) {
    		return (array)$value;
		}, $result);
   		
   		return $result;
	}
	public function addClient($title,$email,$phone,$reg_num)
	{
		if(DB::table('klients')->insert(
			['title' => $title, 'phone' => $phone, 'email' => $email, 'reg_num' => $reg_num]
		))
			return 1;
		else return 0;
	}
	public function deleteClient($id)
	{

		if(DB::table('klients')->where('id', '=', $id)->delete())
			return 1;
		else return 0;
	}
	public function editClient($id,$title,$email,$phone,$reg_num)
	{

		if(DB::table('klients')->where('id', '=', $id)->update(
			['title' => $title, 'phone' => $phone, 'email' => $email, 'reg_num' => $reg_num]))
			return 1;
		else return 0;
	}
    /**************/

    /*Order Data */
    public  function getOrders()
    {
    	$result =  DB::table('pasutijums')->orderBy('order_id','desc')->get();

    	$result = array_map(function ($value) {
    		return (array)$value;
		}, $result);
   		
   		return $result;
	}
    public function addOrder($title,$desc,$price,$order_owner)
	{
		if(DB::table('pasutijums')->insert(
			['order_title' => $title, 
			'order_description' => $desc, 'order_owner' => $order_owner, 'order_price' => $price]))
			return 1;
		else return 0;
	}
	public function  deleteOrder($id)
	{
		if(DB::table('pasutijums')->where('order_id', '=', $id)->delete())
			return 1;
		else return 0;
	}
	public function editOrder($title,$desc,$price,$id)
	{

		if(DB::table('pasutijums')->where('order_id', '=', $id)->update(
			['order_title' => $title, 
			'order_description' => $desc, 'order_price' => $price]))
			return 1;
		else return 0;
	}
    /**************/



    public function getAllData()
    {
		/*
		$result =  DB::select("SELECT klients.*,pasutijums.*
			, GROUP_CONCAT(pasutijums.order_title) as Orders
			FROM  klients  
			LEFT 
			JOIN pasutijums 
			    ON pasutijums.order_owner = klients.id  
			GROUP 
			    BY klients.id");

    	$result = array_map(function ($value) {
    		return (array)$value;
		}, $result);
   		
   		return $result;*/
	}

}
