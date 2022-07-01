<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Session;

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

        /**
         * Checks whether which form the post is submitted
         * This is necessary to be able to know which error fields needs to be shown
         */
        if(array_key_exists('form_submit',$postData)){
            session(['form_submit' => true]);
        } else {
            session(['form_submit' => false]);
        }
        if(array_key_exists('json_submit',$postData)){    
            session(['json_submit' => true]);       
        } else {
            session(['json_submit' => false]);
        }

        /**
         * Loops to all fields submitted if there is any JSON
         * If JSON is found, converts to array then validates
         */
        foreach($postData as $key => $value) {
            $validated = json_decode($value, true);

            if (json_last_error() === JSON_ERROR_NONE) {
               
                if(\is_array($validated)) {
                    $validator = Validator::make($validated, [
                        'id' => 'required|integer|exists:users,id',
                        'password' => 'required',
                        'comment' => 'required'
                    ]);

                    break;
                }
                
            }

        }

        /***
         * In case no JSON data is submotted via post, 
         * then checks the  post data instead.
         */
        if(!isset($validated)) {
            // Validate input
            $validated = $request->validate([
                'id' => 'required|integer|exists:users,id',
                'password' => 'required',
                'comment' => 'required'
            ]);
        }
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
