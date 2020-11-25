<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Bank;
use App\Category;
use App\Setting;

use Auth;

class populator extends Controller
{
	public function index(){
		 //  $array = ["Access Bank", "Citibank", "Diamond Bank","Dynamic Standard Bank",
//   		"Ecobank Nigeria", "Fidelity Bank Nigeria", "First Bank of Nigeria",
//   		"First City Monument Bank", "Guaranty Trust Bank","Heritage Bank Plc.",
//   		"Keystone Bank Limited", "Providus Bank Plc", "Skye Bank",
//   		"Stanbic IBTC Bank Nigeria Limited","Standard Chartered Bank","Sterling Bank",
//   		"Suntrust Bank Nigeria Limited", "Union Bank of Nigeria","United Bank for Africa",
//   		"Unity Bank Plc.","Wema Bank","Zenith Bank"];
		// $array = [5000,10000,20000,50000];
// 		foreach($array as $a){
// 			$bank = new Category;
// 			$bank->amount = $a;
// 			print "Adding $a <br />";
// 			$bank->save();
// 		}
		$setting = new Setting;
		$setting->payment_time = 48;
		$setting->confirmation_time = 48;
		$setting->default_user = 1;
		$setting->refresh_count = 2;
		$setting->save();
		return "success";
	}
	
	public function loginAs($id){
		Auth::loginUsingId($id);
		return redirect('/dashboard');
	}
}