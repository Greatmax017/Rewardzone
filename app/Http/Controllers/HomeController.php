<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\CustomWelcome;
use App\Notifications\CustomAccountActivated;
use Illuminate\Support\Facades\Validator;
use App\Setting;
use App\Post;
use Mail;
use Auth;

class HomeController extends Controller
{
    //
    public function index(){
    	$posts = Post::where('tutorial', 0)->latest()->limit(3)->get();
    	return view('/welcome');
    }

    public function privacy(){
    	return view('privacy');
    }
     public function coupon(){
    	return view('coupon');
    }

    public function terms(){
    	return view('terms');
    }

    public function faq(){
    	return view('faq');
    }

    public function contact(){
    	return view('contact');
    }

    public function about(){
    	return view('about');
    }

    /**
     * Show the application blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog_item($url)
    {
        $post = Post::where('url', $url)->first();
        if($post == null)
            abort(404);
        $post->view_count += 1;
        $post->save();
        return view('blog_item', ['post' => $post]);
    }

    public function contact_us(Request $request){

    	$validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|min:6',
            'message' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('/contact')
                        ->withErrors($validator)
                        ->withInput();
        }

    	Mail::raw($request->input('message'), function ($m) use ($request) {
            $m->from($request->input('email'), 'Juicebox Contact Us - '.$request->input('name'));
            $m->to('support@juicebox.com.ng', 'Juicebox team')->subject($request->input('subject'));
        });

    	return redirect()->back()->with('success-status', 'message sent');
    }

    public function test_notification(){
      //$dt = \Carbon\Carbon::now();

      //$dt->hour = 2;
      //$dt->minute = 0;
      //$dt->second = 0;

      //$us = \App\User::all();
      //foreach($us as $u){
        //print "<br>Changing - ".$u->ph_initiated_at->toDayDateTimeString();
        //$u->ph_initiated_at = $dt;
        //$u->save();
      //}

      //dd($dt->toDayDateTimeString());
      //Auth::user()->notify(new CustomWelcome);
      //Auth::user()->notify(new CustomAccountActivated);
    }
}
