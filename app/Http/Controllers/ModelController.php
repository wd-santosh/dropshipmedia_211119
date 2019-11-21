<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;

class ModelController extends Controller
{
	public function logosetting(Request $request){
		if (request()->ajax()) {
			print_r(request('id'));
			print_r(request('logosize'));
			print_r(request('logoposition'));
			print_r(request('logopacity'));
			die;
			
		}  
	}
	public function textsetting(Request $request)
	{
		if (request()->ajax()) {
			print_r(request('id'));
			print_r(request('logofontsize'));
			print_r(request('logotextcolor'));
			print_r(request('logostroke'));
			print_r(request('logotextopacity'));
			die;
			
		}  
	}

	public function markwter(Request $request)
	{
		if (request()->ajax()) {
			print_r(request('id'));
			print_r(request('waterfont'));
			print_r(request('watercolor'));
			print_r(request('wateropacity'));
			die;
		}  
	}
	public function markwter(Request $request)
	{
	 

}
