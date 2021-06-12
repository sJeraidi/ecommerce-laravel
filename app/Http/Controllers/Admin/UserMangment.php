<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Role;

class UserMangment extends Controller
{
    
   public function users()
   {

       $users=User::all();

       return view('admin.UserRole',['users'=> $users]);
   }


   public function addRole(Request $request)
   {
       $user=User::whereId($request->input('id'))->first();

       $user->roles()->detach();
       if($request['roleUser'])
       {
            $user->roles()->attach(Role::where('name','user')->first());
       }
       if($request['roleAdmin'])
       {
            $user->roles()->attach(Role::where('name','admin')->first());
       }

       return redirect()->back();
   }
}
