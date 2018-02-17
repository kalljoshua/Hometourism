<?php

namespace App\Http\Controllers\Admin;

use App\DestinationFeature;
use App\DestinationImage;
use App\PopularDestination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
//use Illuminate\Http\Resources\Json;
use Input, Redirect, DB;

class PopularDestinationsController extends Controller
{
    function newDestination()
    {
        return view('admin.admin_popular_destination');

    }

    function submitDestination(Request $request)
    {
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', 600);
        $destination = new PopularDestination();
        $services = array_filter($request->features);

        if(Input::has('title')) $destination->title = Input::get('title');
        if(Input::has('description')) $destination->description = Input::get('description');
        if(Input::has('district')) $destination->district = Input::get('district');
        if(Input::has('country')) $destination->country = Input::get('country');
        if(Input::has('category_id')) $destination->category_id = Input::get('category_id');
        if(Input::has('telephone')) $destination->telephone = Input::get('telephone');
        if(Input::has('email')) $destination->email = Input::get('email');
        if(Input::has('website')) $destination->website = Input::get('website');
        if(Input::has('facebook')) $destination->facebook = Input::get('facebook');
        if(Input::has('twitter')) $destination->twitter = Input::get('twitter');
        if(Input::has('address')) $destination->address = Input::get('address');
        if(Input::has('opening_time')) $destination->opening_time = Input::get('opening_time');
        if(Input::has('closing_time')) $destination->closing_time = Input::get('closing_time');
        $destination->slug = str_replace(' ', '',str_replace('.',' ',str_replace('/',' ',addslashes(Input::get('title')))));
        $destination->image = "no image";
        $i = 1;

        if($destination->save())
        {
            $cur_service = PopularDestination::find($destination->id);

            $images = array_filter($request->image);

            foreach ($images as $imagename) {
                $image = $destination->title."".$i.".".$imagename->extension();
                $image = str_replace(' ', '_',$image);
                $path = $imagename->move(public_path() . '/cache_uploads/' . $image);

                $this->resize_image($path, $image);
                $service_image = new DestinationImage(['image' => $image]);

                //execute to set main property image
                if ($cur_service->image == 'no image') {
                    $cur_service->image = $image;
                    $cur_service->save();
                } else {
                    $cur_service->images()->save($service_image);
                }


                //sleep(1);
                $i = $i+1;
            }

            foreach ($services as $cs) {
                $s = new DestinationFeature();
                //$service = new Service(['title',$destination_service]);
                $s->feature = $cs;
                $s->popular_destination_id = $insertedId = $destination->id;

                $s->save();
            }


            flash('Destination has successfully been added.')->success();
            return redirect(route('admin.destination.listings'));
        }else{
            flash('Failed to add destination')->warning();
            return redirect(route('admin.create.destination.form'))->withInput();
        }

    }

    function allDestinations()
    {
        $companies = PopularDestination::all()->sortByDesc("created_at");;
        return view('admin.all_destinations')
            ->with('companies',$companies);
    }


    function resize_image($image, $photoName)
    {
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', 600);

        $image_path = $image;

        Image::make($image_path)
            ->resize(99, 99)
            ->save(public_path() . '/images/services/bottom_slider_99x99/' . $photoName);

        Image::make($image_path)
            ->resize(370, 202)
            ->save(public_path() . '/images/services/featured_slider_370x202/' . $photoName);

        Image::make($image_path)
            ->resize(355, 240)
            ->save(public_path() . '/images/services/latest_home_and_best_services_355x240/' . $photoName);

        Image::make($image_path)
            ->resize(50, 50)
            ->save(public_path() . '/images/services/latest_reviews_50x50/' . $photoName);

        Image::make($image_path)
            ->resize(100, 75)
            ->save(public_path() . '/images/services/others_100x75/' . $photoName);

        Image::make($image_path)
            ->resize(370, 370)
            ->save(public_path() . '/images/services/our_location_370x370/' . $photoName);

        Image::make($image_path)
            ->resize(770, 370)
            ->save(public_path() . '/images/services/our_location_770x370/' . $photoName);

        Image::make($image_path)
            ->resize(2000, 440)
            ->save(public_path() . '/images/services/parallax_banner_2000x1440/' . $photoName);

        Image::make($image_path)
            ->resize(364, 244)
            ->save(public_path() . '/images/services/service_listing_364x244/' . $photoName);

        Image::make($image_path)
            ->resize(1170, 600)
            ->save(public_path() . '/images/services/single_service_1170x600/' . $photoName);

        Image::make($image_path)
            ->resize(1423, 603)
            ->save(public_path() . '/images/services/banner_1423x603/' . $photoName);

        Image::make($image_path)
            ->resize(150, 110)
            ->save(public_path() . '/images/services/user_services_150x110/' . $photoName);

        Image::make($image_path)
            ->resize(120, 120)
            ->save(public_path() . '/images/services/user_services_120x120/' . $photoName);


        /*if (File::exists($image_path))
        {
        echo "Yup. It exists.";
      }*/

        /*if (!unlink($image_path))
        {
        echo ("Error deleting image_path");
      }
      else
      {
      echo ("Deleted image_path");
      }*/
    }
}
