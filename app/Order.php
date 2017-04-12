<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id','user_id','address_id','bank','sender','status','total_payment'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function details()
    {
    	return $this->hasMany('App\OrderDetail');
    }

    public function address()
    {
    	return $this->belongsTo('App\Address');
    }

    public function refreshTotalPayment()
    {
    	$total_payment = 0;
    	foreach($this->details as $detail){
    		$total_payment += $detail->total_price;
    	}
    	$this->total_payment = $total_payment;
    	$this->save();
    }
}
