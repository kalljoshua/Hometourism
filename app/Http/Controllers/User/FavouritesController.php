<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class FavouritesController extends Controller
{
    //
    public function myFavourites($user_id)
    {
        # code...
        $favourites = User::find($user_id)->user_favorites()->paginate(5);
        //return $favorites;
        return view('user.myfavourites')->with('favourites',$favourites);
        //return view("user.myfavourites");
    }
}
