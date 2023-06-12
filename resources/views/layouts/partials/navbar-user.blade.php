    <nav class="fixed inset-x-0 top-0 z-sticky transition-colors duration-500" id="navbar">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('user.index') }}">
                        <img class="w-48" src="{{ Vite::asset('resources/images/logo.png') }}">
                    </a>
                </div>

                <!-- Menu #1 -->
                <div class="ml-4 hidden space-x-4 md:flex">
                    <a class="rounded-md px-3 py-2 text-sm font-semibold text-slate-900 hover:text-slate-700"
                        href="{{ route('user.index') }}">Home</a>
                    <a class="rounded-md px-3 py-2 text-sm font-semibold text-slate-900 hover:text-slate-700"
                        href="{{ route('user.books.index') }}">Book</a>
                </div>

                <!-- Menu #2 -->
                <div class="ml-auto hidden md:flex md:items-center">
                    @guest('user') @guest('admin')
                    <a class="rounded-md px-4 py-2 text-sm font-semibold text-slate-900 hover:text-slate-700"
                        href="{{ route('login') }}">Login</a>
                    <span class="py-2 text-sm text-gray-600">or</span>
                    <a class="ml-4 rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white"
                        href="{{ route('register') }}">Register
                        Now!</a>
                    @endguest @endguest

                    @auth('user')
                        <div id="dropdown">
                            <button class="flex items-center rounded-md px-4 py-2 text-sm font-semibold text-slate-900"
                                id="dropdown-button">
                                <i class="fas fa-user-circle mr-2 text-2xl"></i>
                                Hi, {{ explode(' ', Auth::guard('user')->user()->name)[0] }}!
                                <i class="fa fa-caret-down ml-2 transition-all ease-in-out" id="dropdown-caret"></i>
                            </button>
                            <div class="relative">
                                <div class="absolute right-0 top-1 z-10 hidden w-full min-w-64 rounded-md border border-gray-200 bg-white p-3 shadow transition-all duration-300"
                                    id="dropdown-content">
                                    <ul
                                        class="[&>li]:cursor-pointer [&>li]:rounded-md [&>li]:px-2 [&>li]:py-1 [&>li]:text-sm [&>li]:font-semibold [&>li]:text-slate-900 [&>li]:transition-all hover:[&>li]:bg-gray-200">
                                        <li class="flex items-center">
                                            <i class="fas fa-user-circle mr-2 text-4xl"></i>
                                            <div class="truncate">
                                                <p class="truncate">{{ Auth::guard('user')->user()->name }}</p>
                                                <p class="text-xs font-normal text-gray-600">
                                                    {{ Auth::guard('user')->user()->email }}</p>
                                            </div>
                                        </li>
                                        <div class="my-1 w-full border border-gray-300"></div>
                                        <li><a class="block" href="{{ route('user.profile.index') }}">Profile</a></li>
                                        <li><a class="block" href="{{ route('user.lends.index') }}">Lends</a></li>
                                        <div class="my-1 w-full border border-gray-300"></div>
                                        <li>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button class="block w-full text-left text-red-600"
                                                    type="submit">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endauth

                    @auth('admin')
                        <div id="dropdown">
                            <button class="flex items-center rounded-md px-4 py-2 text-sm font-semibold text-slate-900"
                                id="dropdown-button">
                                <i class="fas fa-user-circle mr-2 text-2xl"></i>
                                Hi, {{ explode(' ', Auth::guard('admin')->user()->name)[0] }}!
                                <i class="fa fa-caret-down ml-2 transition-all ease-in-out" id="dropdown-caret"></i>
                            </button>
                            <div class="relative">
                                <div class="absolute right-0 top-1 z-10 hidden w-full min-w-64 rounded-md border border-gray-200 bg-white p-3 shadow transition-all duration-300"
                                    id="dropdown-content">
                                    <ul
                                        class="[&>li]:cursor-pointer [&>li]:rounded-md [&>li]:px-2 [&>li]:py-1 [&>li]:text-sm [&>li]:font-semibold [&>li]:text-slate-900 [&>li]:transition-all hover:[&>li]:bg-gray-200">
                                        <li class="flex items-center">
                                            <i class="fas fa-user-circle mr-2 text-4xl"></i>
                                            <div class="truncate">
                                                <p class="truncate">{{ Auth::guard('admin')->user()->name }}</p>
                                                <p class="text-xs font-normal text-gray-600">
                                                    {{ Auth::guard('admin')->user()->email }}</p>
                                            </div>
                                        </li>
                                        <div class="my-1 w-full border border-gray-300"></div>
                                        <li><a class="block" href="{{ route('admin.index') }}">Dashboard</a></li>
                                        <li><a class="block" href="{{ route('user.profile.index') }}">Profile</a></li>
                                        <li><a class="block" href="{{ route('user.lends.index') }}">Lends</a></li>
                                        <div class="my-1 w-full border border-gray-300"></div>
                                        <li>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button class="block w-full text-left text-red-600"
                                                    type="submit">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="ml-auto flex md:hidden">
                    <button class="text-slate-500 hover:text-slate-600 focus:outline-none" id="nav-toggle"
                        type="button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="fixed inset-0 z-50 hidden lg:hidden" id="mobile-menu">
                <div class="fixed inset-0 bg-black/20 backdrop-blur-sm dark:bg-slate-900/80"></div>
                <div
                    class="dark:highlight-white/5 fixed right-4 top-4 w-full max-w-xs rounded-lg bg-white p-6 text-base font-semibold text-slate-900 shadow-lg dark:bg-slate-800 dark:text-slate-400">
                    <button
                        class="absolute right-5 top-5 flex h-8 w-8 items-center justify-center text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300"
                        id="nav-toggle" type="button" tabindex="0"><span class="sr-only">Close
                            navigation</span><svg class="h-2.5 w-2.5 overflow-visible" viewBox="0 0 10 10"
                            aria-hidden="true">
                            <path d="M0 0L10 10M10 0L0 10" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round"></path>
                        </svg>
                    </button>
                    <ul class="space-y-6">
                        <li><a class="hover:text-slate-800 dark:hover:text-sky-400"
                                href="{{ route('user.index') }}">Home</a>
                        </li>
                        <li><a class="hover:text-slate-800 dark:hover:text-sky-400"
                                href="{{ route('user.books.index') }}">Book</a></li>
                        <div class="w-full border border-gray-300"></div>
                        @guest('user') @guest('admin')
                        <li>
                            <a class="hover:text-slate-800 dark:hover:text-sky-400" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                        <li>
                            <a class="hover:text-slate-800 dark:hover:text-sky-400" href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                        @endguest @endguest

                        @auth('user')
                            <li class="flex items-center">
                                <i class="fas fa-user-circle mr-2 text-4xl"></i>
                                <div class="truncate">
                                    <p class="truncate">{{ Auth::guard('user')->user()->name }}</p>
                                    <p class="text-xs font-normal text-gray-600">
                                        {{ Auth::guard('user')->user()->email }}</p>
                                </div>
                            </li>

                            <li><a href="{{ route('user.profile.index') }}">Profile</a></li>
                            <li><a href="{{ route('user.lends.index') }}">Lends</a></li>
                            <div class="w-full border border-gray-300"></div>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="block w-full text-left text-red-600" type="submit">Logout</button>
                                </form>
                            </li>
                        @endauth

                        @auth('admin')
                            <li class="flex items-center">
                                <i class="fas fa-user-circle mr-2 text-4xl"></i>
                                <div class="truncate">
                                    <p class="truncate">{{ Auth::guard('admin')->user()->name }}</p>
                                    <p class="text-xs font-normal text-gray-600">
                                        {{ Auth::guard('admin')->user()->email }}</p>
                                </div>
                            </li>
                            <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li><a href="{{ route('user.profile.index') }}">Profile</a></li>
                            <li><a href="{{ route('user.lends.index') }}">Lends</a></li>
                            <div class="w-full border border-gray-300"></div>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="block w-full text-left text-red-600" type="submit">Logout</button>
                                </form>
                            </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </nav>
