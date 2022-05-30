<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\RedirectResponse;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param Request $request
     * @param         $response
     *
     * @return RedirectResponse
     */
    protected function sendResetLinkResponse(
        Request $request,
        $response
    ): RedirectResponse {
        return back()->with('success', trans($response));
    }
}
