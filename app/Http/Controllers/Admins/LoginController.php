<?php namespace App\Http\Controllers\Admins;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Hash;

use Auth;
use App\Http\Requests\Admins\LoginRequest;

class LoginController extends Controller {
	// ตรวจสอบว่า login อยู่หรือไม่
	public function getIndex()
	{
		if(Auth::check()){
			return view('pages.admin.member');
		}else{
			return view('pages.admin.login');
		}
	}

	// ตรวจสอบการ submit form login
	public function postProcess(LoginRequest $request)
	{
		$email 	= $request->input('email');
      		$password 	= $request->input('password');
		
		if(Auth::attempt([
			'email' => $email,
			'password'=>$password]))
		{
			return redirect()->intended('admin/index');
		}else{
			return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
		}

	}


	// Logout
	public function getLogout()
	{
		Auth::logout();
      		return redirect('admin');
	}
}
?>