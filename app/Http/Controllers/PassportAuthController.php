<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PassportAuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
//            'mobile'=>'required',
            'password'=>'required|min:6',
        ]);

        $user= User::create([
            'name' =>$request->name,
            'email'=>$request->email,
//            'mobile'=>$request->mobile,
            'password'=>bcrypt($request->password)
        ]);

        $access_token_api= $user->createToken('PassportAuthToken')->accessToken;
        //return the access token we generated in the above step
        return response()->json(['token'=>$access_token_api],200);
    }

    public function loginUser(Request $request)
    {
//      dd($request->all());
//        $login_credentials=[
//            // 'email'=>$request->email,
//            'password'=>$request->password,
//        ];
//        $user = User::where('mobile', $request->mobile)->orWhere('email', $request->email)->first();
        $user = User::where('email', $request->email)->first();
        //dd($user);
        //dd($request->password);
        //dd(Hash::check($request->password, $user->password));

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'You have entered incorrect email or mobile or password'
            ], 401);
        } else {

            $token = $user->createToken('PassportAuthToken')->accessToken;

            $response = [
                'user' =>   $user,
                'token' => $token,
            ];
          return response($response, 200);


        }

    }
}
