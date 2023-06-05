<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Morningstar Library</title>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    @vite('resources/css/app.css')

</head>

<body>
    {{--  Hero Section  --}}
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a class="-m-1.5 p-1.5" href="#">
                        <img src="https://i.postimg.cc/SKymrBTQ/logo.png" alt="" width="200px">
                    </a>
                </div>

                <div class="flex items-center lg:hidden">
                    <button class="absolute right-4 block lg:hidden" id="hamburger" name="hamburger" type="button">
                        <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                    </button>
                    <nav class="dark:bg-dark absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:shadow-slate-500 lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none lg:dark:bg-transparent"
                        id="nav-menu">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a class="text-dark mx-8 flex py-2 text-base group-hover:text-primary dark:text-white"
                                    href="#home">Home</a>
                            </li>
                            <li class="group">
                                <a class="text-dark mx-8 flex py-2 text-base group-hover:text-primary dark:text-white"
                                    href="#about">Feature</a>
                            </li>
                            <li class="group">
                                <a class="text-dark mx-8 flex py-2 text-base group-hover:text-primary dark:text-white"
                                    href="#portfolio">About</a>
                            </li>
                            <li class="group">
                                <a class="text-dark mx-8 flex py-2 text-base group-hover:text-primary dark:text-white"
                                    href="#clients">Team</a>
                            </li>
                            <li class="group">
                                <a class="text-dark mx-8 flex py-2 text-base group-hover:text-primary dark:text-white"
                                    href="#blog">FAQ</a>
                            </li>                  
                         </ul>
                        
                        <div class="px-4 py-9">
                            @guest('user') @guest('admin')
                            <a class="mb-7 rounded-lg bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                href="{{ route('login') }}">Login</a>
                            @endguest @endguest
                    
                            @auth('user')
                                <a class="mb-7 rounded-lg bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                    href="#">
                                    {{ Auth::guard('user')->user()->name }}
                                </a>
                            @endauth
                    
                            @auth('admin')
                                <a class="mb-7 rounded-lg bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                    href={{ route('admin.index') }}>
                                    Dashboard
                                </a>
                            @endauth
        
                         </div>
                    </nav>
                </div>


    <div class="nav-container mb-7  hidden justify-center lg:flex lg:gap-x-20">
        <a class="text-sm font-semibold leading-6 text-gray-900" href="#">Home</a>

        <a class="text-sm font-semibold leading-6 text-gray-900" href="#">Features</a>

        <a class="text-sm font-semibold leading-6 text-gray-900" href="#">About</a>

        <a class="text-sm font-semibold leading-6 text-gray-900" href="#">Team</a>
        <a class="text-sm font-semibold leading-6 text-gray-900" href="#">FAQ</a>
    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        @guest('user') @guest('admin')
        <a class="mb-7 rounded-lg bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            href="{{ route('login') }}">Login</a>
        @endguest @endguest

        @auth('user')
            <a class="mb-7 rounded-lg bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                href="#">
                {{ Auth::guard('user')->user()->name }}
            </a>
        @endauth

        @auth('admin')
            <a class="mb-7 rounded-lg bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                href={{ route('admin.index') }}>
                Dashboard
            </a>
        @endauth

     </div>
    </nav>
</header>

    <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

        <div class="x-auto py-32 text-center sm:py-48 lg:py-56">
            <img class="mx-auto mb-7" src="https://i.postimg.cc/15BQDj4w/logo.png" alt="">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Open - Source Library
                Application</h1>
            <p class="mt-6 text-lg leading-8 text-gray-600">Made with Tailwind and Laravel.
                Supported Multi - Platform</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    href="{{ route('register') }}">Sign Up!</a>
                <a class="text-sm font-semibold leading-6 text-gray-900"
                    href="https://github.com/senatroxx/morningstar_library_web">Star on Github <span
                        aria-hidden="true">→</span></a>
            </div>
        </div>
    </div>
    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
        aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>
    </div>
    </div>
    {{--  End Hero Section  --}}

    {{--  About Us Section  --}}
    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
        <img class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center"
            src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply"
            alt="">
        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h5 class="text-2xl font-bold tracking-tight text-white sm:text-2xl">Features</h5>
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-4xl">Main Features Of Morningstar
                    Library</h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">There are many features of Morningstar Library. But the
                    most important features are given below.</p>
            </div>
            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                <div
                    class="grid grid-cols-1 gap-x-8 gap-y-6 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                    <a href="#">Free <span aria-hidden="true">&rarr;</span></a>

                    <a href="#">Multi <span aria-hidden="true">&rarr;</span></a>

                    <a href="#">Easy to use <span aria-hidden="true">&rarr;</span></a>

                    <a href="#">Tailwind <span aria-hidden="true">&rarr;</span></a>
                </div>
                <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">Morningstar Library is free and open-source. You
                            can use it without any cost.</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">Free and Open-Source</dd>
                    </div>

                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">There are more than 1000 books in Morningstar
                            Library.</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">1000+ Books</dd>
                    </div>

                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">Morningstar Library is available on windows, mac,
                            and linux.</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">Multi Platform</dd>
                    </div>

                    <div class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">We use Tailwind CSS for colors.</dt>
                        <dd class="mb-7 text-2xl font-bold leading-9 tracking-tight text-white">Tailwinds Based Colors
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    {{--  End About Us Section  --}}

    {{--  Start Features Section  --}}
    <div class="overflow-hidden bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                <div class="lg:pr-8 lg:pt-4">
                    <div class="lg:max-w-lg">
                        <h2 class="text-base font-semibold leading-7 text-indigo-600">Admin Page</h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Control all
                            contents on application from the Admin panel</p>
                        <p class="mt-6 text-lg leading-8 text-gray-600">The library application's admin panel is a
                            feature that
                            allows authorized personnel to manage the library's
                            resources and information. It provides tools for
                            adding, editing, and deleting books, as well as
                            managing users and checking out materials.</p>
                        <p class="mt-6 text-lg leading-8 text-gray-600">The panel also allows administrators to
                            generate
                            reports and track the usage of the library's resources.
                            It is a user-friendly interface that makes it easy for
                            administrators to maintain the library's database and
                            ensure that the system is running smoothly.</p>
                        <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                            <div class="relative pl-9">
                                <dt class="inline font-semibold text-gray-900">
                                    <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    1000+ Books
                                </dt>
                                <dd class="inline">There are more than 1000 books in
                                    Morningstar Library . You can browse
                                    them all.</dd>
                            </div>

                            <div class="relative pl-9">
                                <dt class="inline font-semibold text-gray-900">
                                    <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    SSL Certificates.
                                </dt>
                                <dd class="inline">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui
                                    lorem cupidatat commodo.</dd>
                            </div>

                            <div class="relative pl-9">
                                <dt class="inline font-semibold text-gray-900">
                                    <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z" />
                                        <path fill-rule="evenodd"
                                            d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Multi Platform.
                                </dt>
                                <dd class="inline">Morningstar Library is available on windows, mac, and linux.</dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <img class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0"
                    src="https://i.postimg.cc/Jhj0pwWG/lends.png" alt="Product screenshot" width="2432"
                    height="1442">
            </div>
        </div>
    </div>
    {{--  End Features Section  --}}

    {{--  Section Team  --}}
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
            <div class="max-w-2xl">
                <p class="text-2xl tracking-tight sm:text-3xl">Our Team</p>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Meet Our Team</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">We are team of thirteen people who are passionate about
                    creating beautiful and functional application.</p>
            </div>
            <ul class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2" role="list">
                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full" src="https://i.postimg.cc/Lsxqz3bx/Sandy.jpg"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Sandy Budi
                                Wirawan</h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">UI / UX Designer | Front End
                                Developer</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full" src="https://i.postimg.cc/jdY17pJd/athhar.jpg"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Muhammad Athar
                                Kautsar</h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Programmer | Back End Developer
                            </p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full" src="https://i.postimg.cc/kgpFxShF/ikams.png"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Saidina Hikam
                            </h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Tester</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full" src="https://i.postimg.cc/6q2Mv0BZ/leon.jpg"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Muhammad Leon
                                Fadilah</h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Copywriter</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Resi Alindiana
                            </h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Copywriter</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Sabrina Aulia
                            </h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Copywriter</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Fania Hafidtha
                            </h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">UI / UX Designer</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Muhammad Albar
                                Nur Cholis</h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Copywriter</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Reinhard
                                Syahputra</h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Copywriter</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Muhammad Raja
                                Andhika</h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Copywriter</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full" src="https://i.postimg.cc/3wQW5JyQ/imam.jpg"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Muhammad Imam
                                Fahrudin</h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Programmer</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Muhammad
                                Fathurrohman</h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Copywriter</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="flex items-center gap-x-6">
                        <img class="h-16 w-16 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <div>
                            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Achmad Zabal
                                Zaenudin</h3>
                            <p class="text-sm font-semibold leading-6 text-indigo-600">Copywriter</p>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>

    {{--  End Team Section  --}}

    {{--  CTA Section  --}}
    <div class="bg-white">
        <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8">
            <div
                class="relative isolate overflow-hidden bg-gray-900 px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
                <svg class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0"
                    viewBox="0 0 1024 1024" aria-hidden="true">
                    <circle cx="512" cy="512" r="512"
                        fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
                    <defs>
                        <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                            <stop stop-color="#7775D6" />
                            <stop offset="1" stop-color="#E935C1" />
                        </radialGradient>
                    </defs>
                </svg>
                <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Boost your
                        productivity.<br>Start using our app today.</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-300">Ac euismod vel sit maecenas id pellentesque eu sed
                        consectetur. Malesuada adipiscing sagittis vel nulla.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                        <a class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                            href="#">Get started</a>
                        <a class="text-sm font-semibold leading-6 text-white" href="#">Learn more <span
                                aria-hidden="true">→</span></a>
                    </div>
                </div>
                <div class="relative mt-16 h-80 lg:mt-8">
                    <img class="absolute left-0 top-0 w-[57rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10"
                        src="https://i.postimg.cc/nVsp5HnM/home.jpg" alt="App screenshot">
                </div>
            </div>
        </div>
    </div>

    {{--  End CTA Section  --}}

    {{--  Contact Section  --}}
    <!--
    This example requires some changes to your config:
    
    ```
    // tailwind.config.js
    module.exports = {
      // ...
      plugins: [
        // ...
        require('@tailwindcss/forms'),
      ],
    }
    ```
  -->
    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
            aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contact sales</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Aute magna irure deserunt veniam aliqua magna enim
                voluptate.</p>
        </div>
        <form class="mx-auto mt-16 max-w-xl sm:mt-20" action="#" method="POST">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-semibold leading-6 text-gray-900" for="first-name">First
                        name</label>
                    <div class="mt-2.5">
                        <input
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            id="first-name" type="text" name="first-name" autocomplete="given-name">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold leading-6 text-gray-900" for="last-name">Last
                        name</label>
                    <div class="mt-2.5">
                        <input
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            id="last-name" type="text" name="last-name" autocomplete="family-name">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold leading-6 text-gray-900" for="company">Company</label>
                    <div class="mt-2.5">
                        <input
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            id="company" type="text" name="company" autocomplete="organization">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold leading-6 text-gray-900" for="email">Email</label>
                    <div class="mt-2.5">
                        <input
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            id="email" type="email" name="email" autocomplete="email">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold leading-6 text-gray-900" for="phone-number">Phone
                        number</label>
                    <div class="relative mt-2.5">
                        <div class="absolute inset-y-0 left-0 flex items-center">
                            <label class="sr-only" for="country">Country</label>
                            <select
                                class="h-full rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                                id="country" name="country">
                                <option>US</option>
                                <option>CA</option>
                                <option>EU</option>
                            </select>
                            <svg class="pointer-events-none absolute right-3 top-0 h-full w-5 text-gray-400"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input
                            class="block w-full rounded-md border-0 px-3.5 py-2 pl-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            id="phone-number" type="tel" name="phone-number" autocomplete="tel">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold leading-6 text-gray-900" for="message">Message</label>
                    <div class="mt-2.5">
                        <textarea
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            id="message" name="message" rows="4"></textarea>
                    </div>
                </div>
                <div class="flex gap-x-4 sm:col-span-2">
                    <div class="flex h-6 items-center">
                        <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                        <button
                            class="flex w-8 flex-none cursor-pointer rounded-full bg-gray-200 p-px ring-1 ring-inset ring-gray-900/5 transition-colors duration-200 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            type="button" role="switch" aria-checked="false" aria-labelledby="switch-1-label">
                            <span class="sr-only">Agree to policies</span>
                            <!-- Enabled: "translate-x-3.5", Not Enabled: "translate-x-0" -->
                            <span
                                class="h-4 w-4 translate-x-0 transform rounded-full bg-white shadow-sm ring-1 ring-gray-900/5 transition duration-200 ease-in-out"
                                aria-hidden="true"></span>
                        </button>
                    </div>
                    <label class="text-sm leading-6 text-gray-600" id="switch-1-label">
                        By selecting this, you agree to our
                        <a class="font-semibold text-indigo-600" href="#">privacy&nbsp;policy</a>.
                    </label>
                </div>
            </div>
            <div class="mt-10">
                <button
                    class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    type="submit">Let's talk</button>
            </div>
        </form>
    </div>
    {{--  End Contact Section  --}}

    <script src="js/script.js"></script>
</body>

</html>

