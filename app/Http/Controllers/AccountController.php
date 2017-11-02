<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function userLogin(){
        return view('/front.account.user-login');
    }
}
