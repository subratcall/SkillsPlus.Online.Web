<?php

namespace App\Http\Controllers\Admin_user;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class UserController extends Controller
{

    public function index()
    {
        //
    }


    public function dashboard()
    {    
        return view('admin_user.user');
    }
}
