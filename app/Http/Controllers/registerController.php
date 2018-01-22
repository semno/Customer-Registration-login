<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;

use Illuminate\Auth\Events\Registered;
use App\Jobs\SendVerificationEmail;

class registerController extends Controller
{


    protected function create(array $dataInsert)
    {
        return User::create([
            'name' => $dataInsert['name'],
            'email' => $dataInsert['email'],
            'phone' => $dataInsert['phone'],
            'password' => bcrypt($dataInsert['password']),
            'email_token' => base64_encode($dataInsert['email'])
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        event(new Registered($user = $this->create($request->all())));
        dispatch(new SendVerificationEmail($user));
        return response([
                    "massege" => 'You have successfully registered. An email is sent to you for verification.'
                ], 200);
    }

    public function verify($token)
    {
        $user = User::where('email_token',$token)->firstorfail();
        $user->verified = 1;
        $user->email_token = NULL;
        if($user->save()){
            return 120; //view(‘emailconfirm’,[‘user’=>$user]);
        }
    }



  
}
