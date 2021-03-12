<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $article = Article::create($input);
        $success['token'] =  $article->createToken('MyApp')->accessToken;
        $success['name'] =  $article->name;
        return $this->sendResponse($success, 'Article register successfully.');
    }
}
