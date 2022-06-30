<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    /**
     * List all the users
     * 
     * @return \Illuminate\View\View
     */
    public function list() {        
        return view('welcome', [
            'users' => User::orderBy('id', 'ASC')->get()
        ]);
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user', [
            'user' => User::findOrFail($id)
        ]);
    }

    
}
