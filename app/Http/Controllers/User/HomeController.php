<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Company;
use App\Review;
use App\Service;
use App\SavedSearch;

class HomeController extends Controller
{
    public function index()
    {
        //$companies = Company::all();
        /*$categories = Category::take(8)->get();
        $searches = SavedSearch::orderBy('created_at', 'DESC')->take(6)->get();
        $featured_services = Company::where('featured', 1)->where('active', 1)->orderBy('created_at', 'DESC')->get();
        $most_viewed_services = Company::where('active', 1)->orderBy('views', 'DESC')->take(15)->get();
        $recent_services = Company::where('active', 1)->orderBy('created_at', 'DESC')->take(20)->get();*/
        //return $categories;
        return view('user.index')
            /*->with('categories', $categories)
            ->with('featured_services', $featured_services)
            ->with('most_viewed_services', $most_viewed_services)
            ->with('recent_services', $recent_services)
            ->with('searches', $searches)*/;
    }

    function loadMoreSubCategories(Request $request)
    {
        $subObject = array();
        $subArr = array();

        $categoryId = $request->input('category_id');

        $category = Category::find($categoryId);

        $count = $category->sub_category->count();

        $count = $count - 3;

        $subCategory = $category->sub_category()->orderBy('created_at', 'DESC')->take($count)->skip(3)->get();

        foreach ($subCategory as $sub) {
            $subObject["id"] = $sub->id;
            $subObject["name"] = $sub->name;
            $subObject["companies"] = $sub->companies->count();
            array_push($subArr, $subObject);
        }

        return $subArr;
    }

    function loadMoreCategories(){
        $c = array();
        $resp = array();
        $all = Category::all()->count();

        //return $subs;

        $count = $all - 8;

        $categories = Category::take($count)->skip(8)->get();

        foreach ($categories as $category){
            $subarr = array();
            $c["id"] = $category->id;
            $c["name"] = $category->name;

            $subCategories = $category->sub_category()->orderBy('created_at', 'DESC')->take(3)->get();
            foreach ($subCategories as $subCategory){
                $sarr = array();
                $sarr["id"] = $subCategory->id;
                $sarr["category_id"] = $subCategory->category_id;
                $sarr["name"] = $subCategory->name;
                $sarr["companies"] = $subCategory->companies->count();
                array_push($subarr,$sarr);
            }

            $c["sub_categories"] = $subarr;

            array_push($resp,$c);
        }

        return $resp;
    }

    function adsDetails(Request $request, $id)
    {
        $service = Service::find($id);
        $service->increment('views');
        //return $service;
        return view('user.ads_details')->with('service', $service);
    }

    function privacy()
    {
        return view('user.privacy');
    }

    function contact()
    {
        return view('user.contact');
    }

    function about()
    {
        return view('user.about');
    }

    function personalsafety()
    {
        return view('user.personalsafety');
    }

    function disclaimer()
    {
        return view('user.disclaimer');
    }

    function termsofUse()
    {
        return view('user.termsAndConditions');
    }

    function faq()
    {
        return view('user.faq');
    }

}
