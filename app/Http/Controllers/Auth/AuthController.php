<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
   public function redirect()
   {
      return Socialite::driver('github')->redirect();
   }
   public function callback()
   {
      // dd(Socialite::driver('github')->user());
      $user = Socialite::driver('github')->user();
      // $user = Socialite::driver('github')->stateless()->user();  
      
          // OAuth 2.0 providers...
         // $token = $user->token;
         // $refreshToken = $user->refreshToken;
         // $expiresIn = $user->expiresIn;
         

         // // OAuth 1.0 providers...
         // $token = $user->token;
         // $tokenSecret = $user->tokenSecret;

         // // All providers...
         // $user->getId();
         // $user->getNickname();
         // $user->getName();
         // $user->getEmail();
         // $user->getAvatar();
   }
}