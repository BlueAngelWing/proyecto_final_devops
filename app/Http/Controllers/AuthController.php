<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request){
        Log::alert($request);

        $request->validated($request->all());
        

        if(!Auth::attempt($request->only(['email', 'password']))) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('API Token of '. $user->name)->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token
        ]);
        
    }

    public function register(StoreUserRequest $request){

        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of '.$user->name)->plainTextToken
        ]);
    }

    public function logout(){
        
        Auth::user()->currentAccessToken()->delete();
        Log::alert("yes");

        return $this->success([
            'message'=> 'Has cerrado sesion de manera exitosa.'
        ]);
    }

    public function checkIfExpired(){

        return $this->success([
            'message'=> 'El token es valido.'
        ]);
    }

    
}
