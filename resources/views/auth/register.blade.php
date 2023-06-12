<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEO::generate() !!}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f8f8f8]">
    <div class="mx-auto min-h-screen max-w-screen-xl p-4 lg:flex lg:items-center lg:justify-center">
        <div class="h-full w-full rounded-xl bg-white shadow-sm">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="flex h-full gap-4 p-4">
                    <div class="hidden lg:block lg:w-1/2">
                        <img class="h-160 w-full rounded-xl object-cover shadow"
                            src="{{ Vite::asset('resources/images/library.png') }}" alt="Library">
                    </div>
                    <div class="flex w-full flex-col justify-center p-4 md:p-10 md:py-0 lg:w-1/2">
                        <img class="mx-auto w-52" src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo">
                        <h2 class="mt-6 text-xl font-semibold text-gray-800">Register</h2>
                        <p class="text-sm text-gray-700">Join to explore your next favorite book!</p>

                        <div class="mt-4 flex flex-col gap-4 md:flex-row">
                            <div class="w-full">
                                <label class="text-xs text-gray-600" for="name">Full Name</label>
                                <input
                                    class="ease @error('name') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-xl border border-solid px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 caret-blue-500 shadow-xl outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="name" type="text" name="name" autocomplete="off" required
                                    placeholder="John Doe" value="{{ old('name') }}" />
                                @error('name')
                                    <label class="label">
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label class="text-xs text-gray-600" for="phone">Phone Number</label>
                                <input
                                    class="ease @error('phone') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-xl border border-solid px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 caret-blue-500 shadow-xl outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="phone" type="text" name="phone" autocomplete="off" required
                                    placeholder="+62812XXXXXXXX" value="{{ old('phone') }}" />
                                @error('phone')
                                    <label class="label">
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 w-full">
                            <label class="text-xs text-gray-600" for="email">Email Address</label>
                            <input
                                class="ease @error('email') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-xl border border-solid px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 caret-blue-500 shadow-xl outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                id="email" type="email" name="email" autocomplete="off" required
                                value="{{ old('email') }}" placeholder="johndoe@example.com" />
                            @error('email')
                                <label class="label">
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="mt-4 w-full">
                            <label class="text-xs text-gray-600" for="address">Address</label>
                            <textarea
                                class="ease @error('address') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-xl border border-solid px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 caret-blue-500 shadow-xl outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                id="address" name="address" autocomplete="off" required
                                placeholder="Jl. Jend. Sudirman No. 1, Jakarta Pusat, DKI Jakarta">{{ old('address') }}</textarea>
                            @error('address')
                                <label class="label">
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="mt-4 flex flex-col gap-4 md:flex-row">
                            <div class="w-full">
                                <label class="text-xs text-gray-600" for="password">Password</label>
                                <input
                                    class="ease @error('password') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-xl border border-solid px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 caret-blue-500 shadow-xl outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="password" type="password" name="password" autocomplete="off" required
                                    placeholder="*********" />
                                @error('password')
                                    <label class="label">
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label class="text-xs text-gray-600" for="password_confirmation">Password
                                    Confirmation</label>
                                <input
                                    class="ease block w-full appearance-none rounded-xl border border-solid border-gray-300 px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 caret-blue-500 shadow-xl outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="password_confirmation" type="password" name="password_confirmation"
                                    autocomplete="off" required placeholder="*********" />
                            </div>
                        </div>

                        <button
                            class="mt-4 inline-block cursor-pointer rounded-lg bg-blue-600 bg-150 bg-x-25 px-6 py-3 align-middle text-xs font-bold uppercase leading-normal text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                            type="submit">
                            Register
                        </button>

                        <div class="mt-4 text-center">
                            <span class="text-sm text-gray-600">
                                Already Have An Account?
                                <a class="hover:text-blue-600" href="{{ route('login') }}">
                                    Login
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

