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

    /**
     * Function to add comment to user
     * 
     * @param Illuminate\Http\Request
     */
    public function addComment(Request $request) {

        $postData = $request->post();
        // Validate input
        $validated = $request->validate([
            'id' => 'required|integer|exists:users,id',
            'password' => 'required',
            'comment' => 'required'
        ]);
        // validate if password is correct
        if($validated['password'] != '12345678') {
            return redirect('/')
                ->withErrors(['Invalid Password']);
        } 

        $user = User::find($validated['id']);

        $user->appendComment($validated['comment']);

        // Redirects to the user page if no error
        return redirect('/user/'.$validated['id']);
    }

    
}
