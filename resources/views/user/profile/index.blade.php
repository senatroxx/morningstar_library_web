@extends('layouts.master')

@section('content')
    <div class="relative isolate -mt-3 flex min-h-screen flex-col gap-6 bg-gradient-to-br from-blue-200 px-6 py-24 lg:px-10">
        @if (session('success'))
            <div class="relative mb-4 w-full rounded-lg border border-solid border-emerald-300 bg-gradient-to-tl from-emerald-600 to-teal-500 p-4 text-white"
                autoalert alert-duration="5000">
                <span class="font-bold">{{ session('success') }}</span>
            </div>
        @endif
        <div class="flex w-full flex-col rounded-xl bg-white">
            <div class="relative hidden min-h-80 rounded-t-xl bg-gradient-to-tr from-slate-800 to-blue-500 p-4 md:flex">
                <div class="absolute bottom-0 right-28 h-54 w-80 overflow-hidden">
                    <img class="w-full object-cover" src="{{ Vite::asset('resources/images/profile.png') }}"
                        alt="Morningstar Mockup">
                </div>
                <div class="ml-10 flex items-center gap-4">
                    <i class="fa fa-user-circle text-34 text-gray-200"></i>
                    <div class="flex flex-col">
                        <h2 class="text-3xl font-bold text-gray-200">
                            {{ $user->name }}
                        </h2>
                        <p class="text-xl font-semibold text-gray-400">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-8 md:flex-row">
                <div class="my-4 w-full max-w-md">
                    <h3 class="text-lg font-bold text-blue-600">
                        <i class="fas fa-edit"></i> Edit Profile
                    </h3>
                    <div class="my-1 w-full rounded-full border border-gray-300"></div>
                    <form action="{{ route('user.profile.update') }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="flex flex-col gap-2">
                            <div>
                                <label class="ml-3 text-xs text-gray-600" for="name">Name</label>
                                <input
                                    class="ease @error('name') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-lg border border-solid bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="name" type="text" placeholder="Full name" name="name" autocomplete="off"
                                    value="{{ $user->name }}" />
                                @error('name')
                                    <label class="name">
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                            <div>
                                <label class="ml-3 text-xs text-gray-600" for="email">Email</label>
                                <input
                                    class="ease @error('email') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-lg border border-solid bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="email" type="email" placeholder="Email Address" name="email"
                                    autocomplete="off" value="{{ $user->email }}" />
                                @error('email')
                                    <label class="email">
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                            <div>
                                <label class="ml-3 text-xs text-gray-600" for="phone">Phone Number</label>
                                <input
                                    class="ease @error('phone') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-lg border border-solid bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="phone" type="text" placeholder="Phone Number" name="phone"
                                    autocomplete="off" required value="{{ $user->phone }}" />
                                @error('phone')
                                    <label class="phone">
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                            <div>
                                <label class="ml-3 text-xs text-gray-600" for="address">Address</label>
                                <textarea
                                    class="ease @error('address') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-xl border border-solid px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 caret-blue-500 shadow-xl outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="address" name="address" autocomplete="off" required rows="5"
                                    placeholder="Jl. Jend. Sudirman No. 1, Jakarta Pusat, DKI Jakarta">{{ $user->address }}</textarea>
                                @error('address')
                                    <label class="address">
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                            <button
                                class="mt-4 inline-block cursor-pointer rounded-lg bg-blue-600 bg-150 bg-x-25 px-6 py-3 align-middle text-xs font-bold uppercase leading-normal text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                                type="submit">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
                <div class="my-4 w-full max-w-md">
                    <h3 class="text-lg font-bold text-blue-600">
                        <i class="fas fa-key"></i> Change Password
                    </h3>
                    <div class="my-1 w-full rounded-full border border-gray-300"></div>
                    <form action="{{ route('user.profile.password') }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="flex flex-col gap-2">
                            <div>
                                <label class="ml-3 text-xs text-gray-600" for="old_password">Old Password</label>
                                <input
                                    class="ease @error('old_password') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-lg border border-solid bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="old_password" type="password" placeholder="Old Password" name="old_password"
                                    autocomplete="off" />
                                @error('old_password')
                                    <label class="old_password">
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                            <div>
                                <label class="ml-3 text-xs text-gray-600" for="password">New Password</label>
                                <input
                                    class="ease @error('password') border-red-600 @else border-gray-300 @enderror block w-full appearance-none rounded-lg border border-solid bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="password" type="password" placeholder="New Password" name="password"
                                    autocomplete="off" />
                                @error('password')
                                    <label class="password">
                                        <span class="text-xs text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                            <div>
                                <label class="ml-3 text-xs text-gray-600" for="password_confirmation">Confirm New
                                    Password</label>
                                <input
                                    class="ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                                    id="password_confirmation" type="password" placeholder="Retype your new password"
                                    name="password_confirmation" autocomplete="off" required />
                            </div>
                            <button
                                class="mt-4 inline-block cursor-pointer rounded-lg bg-blue-600 bg-150 bg-x-25 px-6 py-3 align-middle text-xs font-bold uppercase leading-normal text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                                type="submit">
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
