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

<body class="relative bg-base-200">
    <div class="mx-auto flex min-h-screen flex-col items-center justify-center gap-4 lg:flex-row-reverse">
        <div class="mt-10 max-w-sm text-center lg:mt-0 lg:text-left">
            <img class="mx-auto mb-4 h-32 w-auto lg:ml-0" src="https://i.postimg.cc/15BQDj4w/logo.png" alt="Workflow">
            <h1 class="text-3xl font-bold">Login now!</h1>
            <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
        </div>

        <div class="card w-full max-w-sm flex-shrink-0 rounded-b-0 bg-base-100 shadow-2xl lg:rounded-lg">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="card-body">
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
                            <span class="label-text">Password</span>
                        </label>
                        <input class="@error('email') input-error @enderror input-bordered input" type="password"
                            name="password" required />
                    </div>

                    <div class="form-control mt-1">
                        <button class="btn-primary btn" type="submit">Login</button>
                    </div>
                    <a class="link-hover label-text-alt link text-right" href="#">Forgot password?</a>
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
