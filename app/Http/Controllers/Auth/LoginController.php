<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
// use Socialite;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use Hash;
use Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }


    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        dd($user);

        // $this->registerOrLoginUser($user);

        //    return redirect('/Produits');
     }

     public function google()
     {
         return Socialite::driver('google')->redirect();
     }
 
 
     public function googleCallback()
     {
         $user = Socialite::driver('google')->stateless()->user();
         
          $this->registerOrLoginUser($user);
 
          return redirect('/Produits');
      }

      
     protected function registerOrLoginUser($data)
     {
         $user=User::where('email','=',$data->email)->first();
         if(!$user)
         {
              $user=new User();
              $user->name=$data->name;
              $user->email=$data->email;
              $user->provider_id=$data->id;
              $user->avatar=$data->avatar;
              $user->save();
         }

         Auth::login($user);
    } 
}
