<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use App\NewsLetterMail;
use App\NewsLetter;
use App\Mail\NewsLetterMailer;
use Illuminate\Support\Facades\Mail;

class AdminNewsletterController extends Controller
{
  //
  function createNewsletter(){

    return view('admin.admin_new_news_letter');

  }

  function saveNewsletter(Request $request){
    $title = $request->input('title');
    $body = $request->input('news-letter-editor');

    $Newsletter = new NewsLetterMail();

    $Newsletter->title = $title;
    $Newsletter->body = $body;

    if($Newsletter->save()){

      $subscribers = NewsLetter::all();

      if($subscribers->count() > 0){

        $nlid = $Newsletter->id;

        $n_letter = NewsLetter::find($nlid);
        foreach ($subscribers as $subscriber) {

          Mail::to($subscriber->email)
          ->send(new NewsLetterMailer($n_letter));
          $n_letter->subscribers()->attach($subscriber->id);

        }

        flash('News letter send successfully')->success();
        return redirect()->route('admin.create.news.letter.form');
      }else{
        flash('No subscribers available, news letter saved for later')->error();
        return redirect()->route('admin.create.news.letter.form');
      }



    }else{
      flash('Failed to send news letter')->error();
      return redirect()->route('admin.create.news.letter.form');
    }
  }
}
