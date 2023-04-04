<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\HttpResponses;

class UserController extends Controller
{
    use HttpResponses;
    public function index(){

        $users = User::all();

        return $this->success([
            'users' => $users
        ]);
    }
    
}
