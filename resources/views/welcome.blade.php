@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    {{-- Hero Section --}}
    <div class="relative isolate -mt-3 flex min-h-screen bg-gradient-to-br from-blue-200 px-6 lg:px-10">
        <div class="absolute inset-x-0 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

        <div class="mx-auto flex max-w-[90rem] items-center justify-between">
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
                <form action="{{ route('user.books.index') }}" method="get">
                    <div class="relative mb-4 flex w-full flex-wrap items-stretch md:w-120">
                        <input class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-s-full text-gray-800"
                            type="search" placeholder="Search any book" aria-label="Search" name="q"
                            aria-describedby="button-addon1" />

                        <!--Search button-->
                        <button
                            class="relative z-[2] flex items-center rounded-e-full bg-blue-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg"
                            id="button-addon1" data-te-ripple-init data-te-ripple-color="light" type="submit">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
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

        <div class="mx-auto max-w-[90rem]">
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
    </div>
    {{-- End Browse Category Section --}}

    {{-- Search Book Section --}}
    <div class="min-h-screen bg-gradient-to-br from-blue-200 px-6 py-10 lg:px-10">
        <div class="mx-auto max-w-[90rem]">
            <div class="text-2xl font-bold">
                <h2 class="bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text pb-4 text-transparent">
                    Recently Added Books
                </h2>
            </div>
            <div class="owl-carousel owl-theme crl">
                @foreach ($recentBooks as $book)
                    <a href="{{ route('user.books.show', $book->slug) }}">
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
                    </a>
                @endforeach
            </div>
        </div>
        <div class="mx-auto max-w-[90rem] pt-10">
            <div class="text-2xl font-bold">
                <h2 class="bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text pb-4 text-transparent">
                    Random picks for you
                </h2>
            </div>
            <div class="owl-carousel owl-theme crl">
                @foreach ($randomBooks as $book)
                    <a href="{{ route('user.books.show', $book->slug) }}">
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
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    {{-- End Search Book Section --}}

    {{-- User Registration Section --}}
    <div class="relative bg-gradient-to-tr from-blue-200 px-6 py-20 bg-blend-multiply lg:px-10">
        <div class="mx-auto max-w-[90rem] rounded-xl bg-gradient-to-tr from-slate-800 to-slate-900 px-10 py-16">
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
        <div class="mx-auto max-w-[90rem]">
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
    </div>
    {{-- End Review Section --}}
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
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
@endsection

