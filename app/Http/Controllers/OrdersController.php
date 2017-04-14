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
    	$orders = Order::where('status','LIKE','%'.$status.'%')->paginate(5);
    	return view('orders.index',compact('orders','status'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }
}
