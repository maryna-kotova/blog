<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
   public function redirect()
   {
      return Socialite::driver('github')->redirect();
   }
   public function callback()
   {      
      $githubUser = Socialite::driver('github')->user();
      
      $user = User::firstOrCreate(
         [
            'provider_id' => $githubUser->getId(),
         ],
         [
            'email' => $githubUser->getEmail(),
            'name'  => $githubUser->getName(),
         ]
      );
      // $user = User::where('provider_id', $githubUser->getId())->first();

      // if( !$user ){      
      //    $user = User::create([         
      //       'email'       => $githubUser->getEmail(),
      //       'name'        => $githubUser->getName(),
      //       'provider_id' => $githubUser->getId(),         
      //    ]);
      // }

      auth()->login($user, true);
      
      return redirect('dashboard');
   }
}