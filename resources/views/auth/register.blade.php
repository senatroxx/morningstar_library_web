<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Morningstar Library | Signup</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-200">
    {{-- @if ($errors->any())
        <div className="alert alert-error">
            <svg className="stroke-current shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <ul class="list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    {{-- <div class="alert alert-error mx-auto mt-4 w-1/2">
        <svg class="h-6 w-6 shrink-0 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>Error! Task failed successfully.</span>
    </div> --}}
    <div class="mx-auto flex min-h-screen flex-col items-center justify-center gap-4 lg:flex-row-reverse">
        <div class="mt-10 max-w-sm text-center lg:mt-0 lg:text-left">
            <img class="mx-auto mb-4 h-32 w-auto lg:ml-0" src="https://i.postimg.cc/15BQDj4w/logo.png" alt="Workflow">
            <h1 class="text-3xl font-bold">Register now!</h1>
            <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
        </div>

        <div class="card w-full max-w-lg flex-shrink-0 rounded-b-0 bg-base-100 shadow-2xl lg:rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="flex flex-col justify-between lg:flex-row">

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Full Name</span>
                            </label>
                            <input class="@error('name') input-error @enderror input-bordered input" type="text"
                                name="name" required value="{{ old('name') }}" />
                            @error('name')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Phone Number</span>
                            </label>
                            <input class="@error('phone') input-error @enderror input-bordered input" type="text"
                                placeholder="+62" name="phone" required value="{{ old('phone') }}" />
                            @error('phone')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input class="@error('email') input-error @enderror input-bordered input" type="email"
                            name="email" required value="{{ old('email') }}" />
                        @error('email')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Address</span>
                        </label>
                        <textarea class="@error('address') input-error @enderror input-bordered input min-h-16" name="address" required>{{ old('address') }}</textarea>
                        @error('address')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-between lg:flex-row">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input class="@error('password') input-error @enderror input-bordered input" type="password"
                                name="password" required />
                            @error('password')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password Confirmation</span>
                            </label>
                            <input class="@error('password_confirmation') input-error @enderror input-bordered input"
                                type="password" name="password_confirmation" required />
                            @error('password_confirmation')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-control mt-1">
                        <button class="btn-primary btn" type="submit">Register</button>
                    </div>
                    <p class="mt-5 text-center text-sm text-indigo-50">
                        Already Have An Account?
                        <a class="font-semibold leading-6 text-indigo-50 hover:text-indigo-500"
                            href="{{ route('login') }}">
                            Sign in!
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

