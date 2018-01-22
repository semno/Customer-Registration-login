<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\profile;
class homeController extends Controller
{

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct()
	{
	   $this->middleware('auth');
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('site.profile.profile');
    }

    public function upload(Request $request)
    {
         $user =  auth()->user();
         $photo = $request->file('avatar');
         $background = Image::canvas(150, 150, '#333');

        if($photo){

            $filename=time().md5($user->id).'.'.$photo->getClientOriginalExtension();

            // this code to save dimensions (150 x 150)​
            $image = Image::make( $photo)->resize(150, 150, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });


            // this code resize and save dimensions but lose some details in Image
                // $image = Image::make($photo);
                // $image->fit(150, 150);




            $background->insert($image, 'center');
            $background->save('uploads/avatars/'.$filename);






            // insert in user profile instens relation ORM
            if ($user->profile === null) {
                $pic_url = new profile(['pic_url' => $filename]);
                $user->profile()->save($pic_url);
            } else {
                $user->profile->update(['pic_url' => $filename]);
            }

        }




        return $background;
    }


}
