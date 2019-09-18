<?php

namespace App\Http\Controllers;

use App\Events\ChartEvent;
use App\User;
use Illuminate\Support\Facades\Auth;

use App\Reallifechat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendEmail;

class ReallifechatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mail()
    {
        $email = Auth::user()->email ;
        $message = "i love what i do";
        $user = Auth::user();
        Mail::to($email)->send(new SendEmail($message,$user));

        return "Message sent" ;


    }

    public function index()
    {
        return view('Reallifechat/chart');
    }

  /*  public function send(Request $request)
    {
        $user = Auth::user()->id ;
        event( new ChartEvent($message,$user) );

    } */

    public function send()
    {
        $message = "I love want i do";
        $user = User::find(Auth::id());
        event( new ChartEvent($message,$user) );
       //return $user ;


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reallifechat  $reallifechat
     * @return \Illuminate\Http\Response
     */
    public function show(Reallifechat $reallifechat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reallifechat  $reallifechat
     * @return \Illuminate\Http\Response
     */
    public function edit(Reallifechat $reallifechat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reallifechat  $reallifechat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reallifechat $reallifechat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reallifechat  $reallifechat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reallifechat $reallifechat)
    {
        //
    }
}
