<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Morningstar Library</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-white">
    <nav class="fixed inset-x-0 top-0 z-sticky transition-colors duration-500" id="navbar">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="#">
                        <img class="w-48" src="{{ Vite::asset('resources/images/logo.png') }}">
                    </a>
                </div>

                <!-- Menu #1 -->
                <div class="ml-4 hidden space-x-4 md:flex">
                    <a class="rounded-md px-3 py-2 text-sm font-semibold text-slate-900 hover:text-slate-700"
                        href="#">Home</a>
                    <a class="rounded-md px-3 py-2 text-sm font-semibold text-slate-900 hover:text-slate-700"
                        href="#">Book</a>
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
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#">Lends</a></li>
                                        <div class="my-1 w-full border border-gray-300"></div>
                                        <li>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button class="text-red-600" type="submit" href="#">Logout</button
                                                    type="submit">
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
                                        <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#">Lends</a></li>
                                        <div class="my-1 w-full border border-gray-300"></div>
                                        <li>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button class="text-red-600" type="submit" href="#">Logout</button
                                                    type="submit">
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
                        <li><a class="hover:text-slate-800 dark:hover:text-sky-400" href="#">Book</a></li>
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

                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Lends</a></li>
                            <div class="w-full border border-gray-300"></div>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="text-red-600" type="submit" href="#">Logout</button
                                        type="submit">
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
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Lends</a></li>
                            <div class="w-full border border-gray-300"></div>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="text-red-600" type="submit" href="#">Logout</button
                                        type="submit">
                                </form>
                            </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    {{-- Hero Section --}}
    <div class="relative isolate -mt-3 flex min-h-screen bg-gradient-to-br from-blue-200 px-6 lg:px-10">
        <div class="absolute inset-x-0 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="w-full">
                <div class="text-5xl font-bold">
                    <h2 class="bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text pb-7 text-transparent">
                        Explore a World of Books at Your Fingertips
                    </h2>
                </div>
                <p class="mb-4 text-gray-800">
                    Welcome to our online library, where you can unlock the joy of reading and embark on captivating
                    adventures. Borrow your favorite books conveniently from the comfort of your home or on the go.
                    Join our community of book lovers and start your reading journey today.
                </p>
                <div class="relative mb-4 flex w-full flex-wrap items-stretch md:w-120">
                    <input class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-s-full text-gray-800"
                        type="search" placeholder="Search any book" aria-label="Search"
                        aria-describedby="button-addon1" />

                    <!--Search button-->
                    <button
                        class="relative z-[2] flex items-center rounded-e-full bg-blue-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg"
                        id="button-addon1" data-te-ripple-init data-te-ripple-color="light" type="button">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="hidden w-full justify-end md:flex">
                <img src="{{ Vite::asset('resources/images/hero.png') }}" alt="">
            </div>
        </div>
    </div>
    {{-- End Hero Section --}}

    {{-- Browse Category Section --}}
    <div class="relative isolate bg-gradient-to-tr from-blue-200 px-6 py-10 lg:px-10">
        <div class="absolute inset-x-0 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-30" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[80deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

        <div class="text-2xl font-bold">
            <h2 class="bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text pb-4 text-transparent">
                Browse Categories
            </h2>
        </div>
        <div>
            <div class="owl-carousel owl-theme crl">
                @foreach ($categories as $category)
                    <a class="inline-block cursor-pointer rounded-lg bg-blue-600 bg-150 bg-x-25 px-6 py-3 align-middle text-xs font-bold uppercase leading-normal text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                        href="#">
                        {{ $category->name }} ({{ $category->books_count }})
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    {{-- End Browse Category Section --}}

    {{-- Search Book Section --}}
    <div class="min-h-screen bg-gradient-to-br from-blue-200 px-6 py-10 lg:px-10">
        <div>
            <div class="text-2xl font-bold">
                <h2 class="bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text pb-4 text-transparent">
                    Recently Added Books
                </h2>
            </div>
            <div class="owl-carousel owl-theme crl">
                @foreach ($recentBooks as $book)
                    <div class="relative w-50 rounded bg-white shadow-md">
                        <div class="absolute inset-0 z-0 h-60 w-full bg-cover bg-center"
                            style="background-image: url({{ $book->thumbnail }})">
                        </div>
                        <div class="z-10 bg-white/10 backdrop-blur">
                            <img class="z-10 h-60 w-full object-contain" src="{{ $book->thumbnail }}"
                                alt="{{ $book->title }}">
                        </div>
                        <div class="p-4">
                            <p class="truncate text-xs text-gray-600">
                                @foreach ($book->authors as $category)
                                    {{ $category->name }}{{ $loop->last ? '' : ', ' }}
                                @endforeach
                            </p>
                            <h2 class="truncate text-sm text-gray-800">
                                {{ $book->title }}
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="pt-10">
            <div class="text-2xl font-bold">
                <h2 class="bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text pb-4 text-transparent">
                    Random picks for you
                </h2>
            </div>
            <div class="owl-carousel owl-theme crl">
                @foreach ($randomBooks as $book)
                    <div class="relative w-50 rounded bg-white shadow-md">
                        <div class="absolute inset-0 z-0 h-60 w-full bg-cover bg-center"
                            style="background-image: url({{ $book->thumbnail }})">
                        </div>
                        <div class="z-10 bg-white/10 backdrop-blur">
                            <img class="z-10 h-60 w-full object-contain" src="{{ $book->thumbnail }}"
                                alt="{{ $book->title }}">
                        </div>
                        <div class="p-4">
                            <p class="truncate text-xs text-gray-600">
                                @foreach ($book->authors as $category)
                                    {{ $category->name }}{{ $loop->last ? '' : ', ' }}
                                @endforeach
                            </p>
                            <h2 class="truncate text-sm text-gray-800">
                                {{ $book->title }}
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- End Search Book Section --}}

    {{-- User Registration Section --}}
    <div class="relative bg-gradient-to-tr from-blue-200 px-6 py-20 bg-blend-multiply lg:px-10">
        <div class="rounded-xl bg-gradient-to-tr from-slate-800 to-slate-900 px-10 py-16">
            <div class="text-2xl font-bold">
                <h2 class="bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text pb-4 text-transparent">
                    Join Our Growing Community
                </h2>
            </div>
            <p class="text-white">
                Registering is quick and easy. Create your account to access our extensive collection of books and enjoy
                seamless borrowing. Connect with like-minded readers, receive personalized recommendations, and keep
                track
                of your reading history. Join our growing community of book enthusiasts today.
            </p>
            <a class="mt-4 inline-block cursor-pointer rounded-lg bg-blue-600 bg-150 bg-x-25 px-6 py-3 align-middle text-xs font-bold uppercase leading-normal text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                href="{{ route('register') }}">
                Join Now!
            </a>
        </div>
    </div>
    {{-- End User Registration Section --}}

    {{-- Review Section --}}
    <div class="bg-gradient-to-br from-blue-200 px-6 py-20 bg-blend-multiply lg:px-10">
        <div class="text-2xl font-bold">
            <h2 class="bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text pb-4 text-center text-transparent">
                What Our Readers Say
            </h2>
        </div>
        <div class="owl-carousel owl-theme review">
            <div class="max-w-72 md:max-w-xl lg:max-w-3xl">
                <div class="m-4 block rounded-lg bg-gradient-to-tl from-sky-700 to-blue-800 p-6 shadow-lg">
                    <div class="md:flex md:flex-row">
                        <div class="mx-auto mb-6 flex w-36 items-center justify-center md:mx-0 md:w-96 lg:mb-0">
                            <img class="rounded-full shadow-md dark:shadow-black/30"
                                src="https://i.pravatar.cc/250?img=53" alt="woman avatar" />
                        </div>
                        <div class="md:ml-6">
                            <p class="mb-2 text-xl font-semibold text-white">
                                Anwar Jamaluddin
                            </p>
                            <p class="mb-6 font-light text-white">
                                I absolutely love this online library! It's so convenient to browse through
                                their extensive collection and borrow books with just a few clicks. The process
                                is seamless, and I can enjoy reading my favorite titles without leaving my home.
                                Highly recommended!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Review Section --}}

    {{-- Footer Section --}}
    <footer
        class="flex flex-col flex-wrap items-center justify-between bg-gradient-to-tr from-slate-850 to-slate-900 px-6 py-4 md:flex-row lg:px-10">
        <img class="w-36 rounded bg-white px-2 py-1" src="{{ Vite::asset('resources/images/logo.png') }}">
        <p class="text-sm text-white">© {{ date('Y') }} Morningstar. All rights reserved.</p>
    </footer>
    {{-- End Footer Section --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const Dropdown = (dropdownId, buttonId, contentId, caretId) => {
            const dropdownButton = document.getElementById(buttonId);
            const dropdownContent = document.getElementById(contentId);
            const caret = document.getElementById(caretId);

            dropdownButton.addEventListener('click', () => {
                if (dropdownContent.classList.contains('hidden')) {
                    dropdownContent.classList.remove('hidden');
                    dropdownContent.classList.remove('opacity-0');
                    dropdownContent.classList.remove('invisible');
                    dropdownContent.classList.add('animate-fade-in');
                    caret.classList.add('rotate-180');
                } else {
                    dropdownContent.classList.remove('animate-fade-in');
                    dropdownContent.classList.add('animate-fade-out');
                    dropdownContent.addEventListener('animationend', () => {
                        dropdownContent.classList.add('hidden');
                        dropdownContent.classList.remove('animate-fade-out');
                        dropdownContent.classList.add('opacity-0');
                        dropdownContent.classList.add('invisible');
                        caret.classList.remove('rotate-180');
                    }, {
                        once: true
                    });
                }
            });

            document.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target)) {
                    dropdownContent.classList.add('hidden');
                    dropdownContent.classList.remove('animate-fade-in');
                    dropdownContent.classList.remove('animate-fade-out');
                    dropdownContent.classList.add('opacity-0');
                    dropdownContent.classList.add('invisible');
                    caret.classList.remove('rotate-180');
                }
            });
        };

        // Initialize dropdowns
        Dropdown('dropdown', 'dropdown-button', 'dropdown-content', 'dropdown-caret');
    </script>
    <script>
        var navToggles = document.querySelectorAll('#nav-toggle');
        var mobileMenu = document.getElementById('mobile-menu');
        var body = document.querySelector('body');
        var navbar = document.querySelector('#navbar');

        navToggles.forEach(navToggle => {
            navToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                body.classList.toggle('overflow-hidden');
                if (window.scrollY !== 0) {
                    navbar.classList.toggle('scrolled');
                }
            });
        });

        window.onresize = function() {
            if (window.innerWidth > 768) {
                mobileMenu.classList.add('hidden');
                navbar.classList.remove('scrolled');
                body.classList.remove('overflow-hidden');
            }
        }

        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('#navbar');
            var scrollPosition = window.scrollY;

            if (scrollPosition > 0) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        $('.crl').owlCarousel({
            loop: true,
            margin: 10,
            autoWidth: true,
            nav: true,
            dots: false,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        $('.review').owlCarousel({
            loop: true,
            margin: 10,
            center: true,
            autoWidth: true,
            nav: true,
            dots: false,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            items: 1,
            responsive: {
                0: {
                    center: false
                },
                1024: {
                    center: true
                }
            }
        })
    </script>
</body>

</html>

