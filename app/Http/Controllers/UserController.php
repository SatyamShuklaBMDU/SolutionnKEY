<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view('admin.users',compact('users'));
        
    }
    public function user_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:admin,user',
            'password' => 'required|min:6'
        ]);
        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->password = bcrypt($request->password);
            $user->permission =json_encode($request->permission);
            $user->save();
            return redirect()->route('users')->with('success', 'data Added successfully');
        } else {
            return redirect()->route('users')->withErrors($validator)->withInput()->with('error','Plz Enter Valid Data');;
        }
    }
}
