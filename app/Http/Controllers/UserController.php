<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Str;

class UserController extends Controller
{
    public static function index(){
        $users = User::all();
        return view('user-list', compact('users'));
    }

    public static function user_form($user_id = ''){
        $title = 'Add User';
        $userData = false;
        if($user_id != ''){
            $title = 'Edit User';
            $userData = User::find($user_id);
        }
        $languages = isset($userData->languages) ? explode(',', $userData->languages):[];
        return view('user-form', compact('title', 'userData', 'languages'));
    }

    public static function save_user_form(Request $request){
       $validator= Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'willing_to_work' => 'required',
            'languages' => 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $userData = $request->except('_token');
        User::updateOrInsert(
            ['id' => $userData['id'] ],
            [
            'name' => $userData['name'],
            'email' => 'test_email_'.Str::random().'@gmail.com',
            'age' => $userData['age'],
            'password' => Hash::make('test'),
            'gender' => $userData['gender'],
            'willing_to_work' => $userData['willing_to_work'],
            'languages' => implode(',', $userData['languages']),
        ]);
        return redirect('/')->with([
            'message' => 'Data saved successfully'
        ]);
    }
}

