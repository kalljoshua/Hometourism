<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\NewsLetter;
use Redirect, Input;

class NewsletterController extends Controller
{
    //
    function subscribe(){
        $newsLetterSubscriber = new NewsLetter();
        $count = DB::table('newsletters')->where('email',Input::get('email'))->count();
        if($count>0){
            flash('You\'ve subscribed to our Newsletter already')->success();
            return Redirect::to(URL::previous());
            //return Redirect::back();
        }else{
            $email  = Input::get('email');
            $newsLetterSubscriber->email = $email;
            /*$newsLetterSubscriber = DB::table('news_letter_subscribers')->insert(
                ['email' => $email]
            );*/
            if($newsLetterSubscriber->save()){
                flash('You\'ve successfully subscribed to our Newsletter')->success();
                return Redirect::to(URL::previous());
                //return Redirect::back();
            }
        }

    }
}

