http://127.0.0.1:8000/api/login




http://127.0.0.1:8000/api/register


// ##################################### for using attempt() & multi Gard ########################################

        // config(['auth.guards.agent-api.driver' => 'session']);
        // if(Auth::guard('agent-api')->attempt(['mobile' => $request->mobile, 'password' => $request->password])  || Auth::guard('agent-api')->attempt(['email' =>  $request->email, 'password' => $request->password]) ){
        //     $agent=Auth::guard('agent-api')->user();
        //     $token = $agent->createToken('PassportAuthToken')->accessToken;
            
        //     $response = [
        //         'agent' =>   $agent,
        //         'token' => $token,
        //     ];
        //     return response($response, 200);
        // }else{
        //     return response([
        //         'message' => 'You have entered incorrect email or mobile or password'
        //     ], 401);
        // }
