<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Contracts\Validation\Validator as FormValidator;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param array $data
     *
     * @return FormValidator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
                                'password' => Hash::make($data['password']),
                            ]);
    }
}
