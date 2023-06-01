<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Morningstar Library | Signup</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 bg-slate-900 font-sans text-base font-normal leading-default text-slate-500 antialiased">
    <section class="bg-gray-900">
        <div class="mx-auto flex flex-col items-center justify-center px-6 py-8 md:h-screen lg:py-0">
            <a class="mb-6" href="/">
                <img class="mr-2 h-14" src={{ asset('images/logo/logo-white.png') }} alt="logo">
            </a>
            <div class="w-full rounded-lg bg-gray-800 shadow sm:max-w-lg md:mt-0 xl:p-0">
                <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-100 md:text-2xl">
                        Create an account!
                    </h1>
                    <form class="flex flex-col space-y-1 md:space-y-4" action={{ route('register') }} method="POST">
                        @csrf
                        <div class="flex flex-col justify-between space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-gray-100" for="name">Full
                                    name</label>
                                <input
                                    class="block w-full rounded-md bg-gray-700 p-2.5 text-white placeholder-gray-400 outline-none focus:outline-blue-500"
                                    id="name" type="text" name="name" placeholder="John Doe" required="">
                            </div>
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-gray-100" for="phone">Phone
                                    number</label>
                                <input
                                    class="block w-full rounded-md bg-gray-700 p-2.5 text-white placeholder-gray-400 outline-none focus:outline-blue-500"
                                    id="phone" type="text" name="phone" placeholder="+62 812 1234 1234"
                                    required="">
                            </div>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-100" for="email">Email
                                address</label>
                            <input
                                class="block w-full rounded-md bg-gray-700 p-2.5 text-white placeholder-gray-400 outline-none focus:outline-blue-500"
                                id="email" type="email" name="email" placeholder="name@company.com"
                                required="">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-100" for="address">Address</label>
                            <textarea
                                class="block w-full rounded-md bg-gray-700 p-2.5 text-white placeholder-gray-400 outline-none focus:outline-blue-500"
                                id="address" name="address" rows="2"></textarea>
                        </div>
                        <div class="flex flex-col justify-between space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-white" for="password">Password</label>
                                <input
                                    class="block w-full rounded-md bg-gray-700 p-2.5 text-white placeholder-gray-400 outline-none focus:outline-blue-500"
                                    id="password" type="password" name="password" placeholder="••••••••"
                                    required="">
                            </div>
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-white"
                                    for="password_confirmation">Confirm Password</label>
                                <input
                                    class="block w-full rounded-md bg-gray-700 p-2.5 text-white placeholder-gray-400 outline-none focus:outline-blue-500"
                                    id="password_confirmation" type="password" name="password_confirmation"
                                    placeholder="••••••••" required="">
                            </div>
                        </div>
                        {{-- 
                        <div class="flex items-center justify-end">
                            <a href="#" class="text-sm font-medium hover:underline text-blue-500">Forgot password?</a>
                        </div> 
                        --}}
                        <button
                            class="block w-full rounded-md bg-blue-500 p-2.5 text-gray-100 duration-150 ease-in hover:bg-blue-600"
                            type="submit">Sign up</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account?
                            <a class="font-medium text-blue-500 hover:underline" href="#">Sign in</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>