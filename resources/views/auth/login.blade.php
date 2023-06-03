<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Morningstar Library | Signin</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-200 relative">
    @if ($errors->any())
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
    @endif
    <div class="mx-auto flex min-h-screen flex-col items-center justify-center gap-4 lg:flex-row-reverse">
        <div class="mt-10 max-w-sm text-center lg:mt-0 lg:text-left">
            <img class="mx-auto mb-4 h-32 w-auto lg:ml-0" src="https://i.postimg.cc/15BQDj4w/logo.png" alt="Workflow">
            <h1 class="text-3xl font-bold">Login now!</h1>
            <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
        </div>

        <div class="card bg-base-100 w-full max-w-sm flex-shrink-0 rounded-b-0 shadow-2xl lg:rounded-lg">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input class="input input-bordered" type="text" name="email" placeholder="Email"
                            required />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input class="input input-bordered" type="password" placeholder="Password" name="password"
                            required />
                    </div>

                    <div class="form-control mt-1">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                    <a class="label-text-alt link link-hover text-right" href="#">Forgot password?</a>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Remember me</span>
                            <input class="checkbox checkbox-primary" type="checkbox" checked="checked" name="remember"
                                value="true" />
                        </label>
                    </div>
                    <p class="mt-10 text-center text-sm text-indigo-50">
                        Not a member?
                        <a class="font-semibold leading-6 text-indigo-50 hover:text-indigo-500" href="register">Sign
                            Up!</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
