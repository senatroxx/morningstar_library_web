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

<body class="hero bg-base-200 min-h-screen">
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <img class="mx-auto mb-4 ml-0 h-32 w-auto" src="https://i.postimg.cc/15BQDj4w/logo.png" alt="Workflow">
                <h1 class="text-5xl font-bold">Login now!</h1>
                <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                    exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
            </div>

            <div class="card bg-base-100 w-full max-w-sm flex-shrink-0 shadow-2xl">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input class="input input-bordered" type="text" name="email" placeholder="Email" />
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input class="input input-bordered" type="password" placeholder="Password"
                                name="password" />
                        </div>

                        <div class="form-control mt-1">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <a class="label-text-alt link link-hover text-right" href="#">Forgot password?</a>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text">Remember me</span>
                                <input class="checkbox checkbox-primary" type="checkbox" checked="checked"
                                    name="remember" />
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
    </div>
</body>

</html>
