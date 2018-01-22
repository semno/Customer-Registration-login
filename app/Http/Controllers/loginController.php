<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.login.login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'     => 'required|string|email',
            'password'  => 'required|string',
        ]);

         if(! auth()->attempt(request(['email','password']))){
            return response([
                    "errors" => ['Error in data']
                ], 403);
        }
        $user =  Auth()->user();
        if(! $user->verified){
            auth()->logout();
             return response([
                    "errors" =>  ['You must be active to login. please use url sent to your Email']
                ], 402);
        }


        return response([
                    "massege" => 'Done',
                    "redirect" =>true
                ], 200);

    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('home'));
    }
}
