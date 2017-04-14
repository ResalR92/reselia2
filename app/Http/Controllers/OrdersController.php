<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;

class OrdersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('role:admin');
	}

    public function index(Request $request)
    {
    	$status = $request->get('status');
    	$orders = Order::where('status','LIKE','%'.$status.'%');
    	if($request->has('q')) {
    		$q = $request->get('q');
    		$orders = $orders->where(function($query) use ($q){
    			$query->where('id',$q)
    				  ->orWhereHas('user',function($user) use ($q){
    				  	$user->where('name','LIKE','%'.$q.'%');
    				});
    		});
    	}
    	$orders = $orders->paginate(5);
    	return view('orders.index',compact('orders','status','q'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }
}
