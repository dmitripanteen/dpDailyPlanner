<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    use RegistersUsers, ThrottlesLogins;

    /**
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function validator(Request $request)
    {
        return $request->validate([
                                      'name'     => 'required|max:255',
                                      'email'    => 'required|email|max:255|unique:users',
                                      'password' => 'required|min:6|confirmed',
                                  ]);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    protected function create(array $data)
    {
        return User::create([
                                'name'     => $data['name'],
                                'email'    => $data['email'],
                                'password' => bcrypt($data['password']),
                            ]);
    }
}
