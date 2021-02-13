<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $user = auth()->user();

       
        switch($user->role_id) 
        {
            case 1: return redirect('/adminpanel'); break; 
            case 2: return redirect('/educenter'); break; 
            case 3: return redirect('/student'); break; 
        }
    }
}
