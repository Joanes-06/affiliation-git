<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterViewResponse;
use Illuminate\Contracts\Support\Responsable;

class CustomRegisterViewResponse implements RegisterViewResponse
{
    public function toResponse($request)
    {
        return view('auth.register', [
            'codePromo' => $request->query('code'),
        ]);
    }
}
