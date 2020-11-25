<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ActivationService;
use App\User;
use Auth;

class ActivationController extends Controller
{

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/dashboard';

	protected $activationService;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ActivationService $activationService)
	{
	    $this->activationService = $activationService;
	}
     
    public function resendActivation(){
     	if(!Auth::user()->activated)
     		$this->activationService->sendActivationMail(Auth::user());
		return redirect()->back();
    }
     
    public function activateUser($token)
	{
    	if ($user = $this->activationService->activateUser($token)) {
        	Auth::loginUsingId($user->id);
        	return redirect($this->redirectTo);
    	}
    	abort(404);
	}
}
