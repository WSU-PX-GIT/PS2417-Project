<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype=Auth()->user()->usertype;

            if($usertype=='user'){
                return view('agent.agenthome');
            }

            else if($usertype=='admin'){
                return view('admin.adminhome');
            }
            elseif($usertype=='agency'){
                return view('agency.agencyhome');
            }
        }
    }
}
