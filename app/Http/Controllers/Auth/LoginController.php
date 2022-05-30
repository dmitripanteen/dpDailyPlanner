<?php

namespace App\Http\Controllers\Auth;

use App\Events\User\LoggedIn;
use App\Events\User\LoggedOut;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * @return Application|Factory|View
     */
    public function show()
    {
        return view('auth.login', [
            'socialProviders' => config('auth.social.providers')
        ]);
    }
}
