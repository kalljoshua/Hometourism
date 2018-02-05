<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Review;
use Input, Auth;

class ReviewsController extends Controller
{
    function serviceReview(){
        $review = new Review();
        $company_rating = Company::find(Input::get('company_id'));
        $review->company_id  = Input::get('company_id');
        $review->rating  = Input::get('rating');
        $review->review  = Input::get('review');
        if(Auth::guard('user')->check()){
            $review->user_id  = Auth::guard('user')->id();

            $id = Input::get('company_id');

            if($review->save()){

                $rate = Review::where('company_id',Input::get('company_id'))->get();
                $i = 0;
                $j = 0;
                $r = sizeof($rate);
                foreach ($rate as $rates){
                    while ($i<$r){
                        $j=$j+$rate[$i]['rating']; $i++;
                    }
                }
                if($j>0){
                    $av = round($j/$r);
                    $company_rating->rating = round($j/$r);
                }else{
                    $company_rating->rating = 0;
                }

                //return $av;
                if($company_rating->save())
                    flash('Your review and rating was added successfully')->success();
                return redirect()->back();
            }
        }else{
            flash('Please Login before adding review')->success();
            return redirect(route('user.login'));
        }
    }
}
