<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\AuthService;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Vite;

class RegisterController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        SEOTools::webPage(
            'Register',
            'Join to explore your next favorite book!',
            'website',
            [Vite::asset('resources/images/library.png')]
        );

        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $attributes = $request->validated();

        $this->service->register($attributes);

        return redirect()->route('login');
    }
}
