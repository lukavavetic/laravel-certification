<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
   /**
     * The user repository instance.
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');

        $this->middleware('log')->only('index');

        $this->middleware('subscribed')->except('store');

        $this->middleware(function ($request, $next) {
          // ...

          return $next($request);
        });

        $this->userRepository = $userRepository;
    }

   
}
