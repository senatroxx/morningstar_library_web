@extends('layouts.master')

@section('content')
    <div
        class="relative isolate -mt-3 flex min-h-screen flex-col justify-center gap-6 bg-gradient-to-br from-blue-200 px-6 py-24 lg:px-10">
        <div class="flex flex-col items-start justify-center gap-4 md:flex-row">
            <div class="relative flex w-full items-center justify-center rounded-xl bg-white md:w-4/12">
                <div class="absolute inset-0 z-0 h-120 w-full rotate-180 rounded-xl bg-cover bg-center"
                    style="background-image: url({{ $book->thumbnail }})">
                </div>
                <div
                    class="via-white-50 z-10 flex h-120 w-full items-center justify-center rounded-xl bg-gradient-to-b from-transparent to-white/50 backdrop-blur-3xl">
                    <img class="z-10 h-75 w-full object-contain" src="{{ $book->thumbnail }}" alt="{{ $book->title }}">
                </div>
            </div>
            <div class="w-full rounded-xl bg-white p-4 shadow md:w-8/12">
                <p class="text-sm text-gray-600">
                    @foreach ($book->authors as $author)
                        {{ $author->name }}{{ $loop->last ? '' : ', ' }}
                    @endforeach
                </p>
                <div class="flex flex-col gap-3 md:flex-row">
                    <h2 class="text-xl font-bold text-slate-900">
                        {{ $book->title }}
                    </h2>
                    <button
                        class="modal-open inline-block cursor-pointer rounded-lg bg-blue-600 bg-150 bg-x-25 px-4 py-1 align-middle text-xs font-bold uppercase leading-normal text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85 disabled:cursor-not-allowed disabled:bg-gray-800 disabled:opacity-50"
                        @disabled($book->quantity <= 0)>
                        @if ($book->quantity <= 0)
                            Out of Stock
                        @else
                            Borrow now!
                        @endif
                    </button>
                </div>
                <ul class="inline-flex w-full px-1 pt-2" id="tabs">
                    <li class="-mb-px rounded-t border-b-2 border-blue-600 px-4 py-2 text-sm font-semibold text-gray-800">
                        <a id="default-tab" href="#desc">
                            Book Description
                        </a>
                    </li>
                    <li class="rounded-t px-4 py-2 text-sm font-semibold text-gray-800">
                        <a href="#detail">
                            Book Detail
                        </a>
                    </li>
                </ul>

                <!-- Tab Contents -->
                <div id="tab-contents">
                    <div class="p-4 text-justify" id="desc">
                        {!! $book->description !!}
                    </div>
                    <div class="hidden p-4" id="detail">
                        <ul class="w-full max-w-160 [&>li]:my-4">
                            <li class="flex items-stretch">
                                <span class="w-1/2 text-xs font-semibold leading-4 text-gray-600">
                                    Author
                                    <p class="text-base text-slate-900">
                                        @foreach ($book->authors as $author)
                                            {{ $author->name }}{{ $loop->last ? '' : ', ' }}
                                        @endforeach
                                    </p>
                                </span>
                                <span class="w-1/2 text-xs font-semibold leading-4 text-gray-600">
                                    Category
                                    <p class="text-base text-slate-900">
                                        @foreach ($book->categories as $categories)
                                            {{ $categories->name }}{{ $loop->last ? '' : ', ' }}
                                        @endforeach
                                    </p>
                                </span>
                            </li>
                            <li class="flex items-stretch">
                                <span class="w-1/2 text-xs font-semibold leading-4 text-gray-600">
                                    Publisher
                                    <p class="text-base text-slate-900">
                                        {{ $book->publisher->name }}
                                    </p>
                                </span>
                                <span class="w-1/2 text-xs font-semibold leading-4 text-gray-600">
                                    Published Date
                                    <p class="text-base text-slate-900">
                                        {{ $book->published_at }}
                                    </p>
                                </span>
                            </li>
                            <li class="flex items-stretch">
                                <span class="w-1/2 text-xs font-semibold leading-4 text-gray-600">
                                    Available in Library
                                    <p class="text-base text-slate-900">
                                        {{ $book->quantity }}
                                    </p>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        class="modal pointer-events-none fixed left-0 top-0 z-sticky flex h-full w-full items-center justify-center opacity-0 transition-opacity duration-100 ease-in">

        <div class="modal-overlay absolute h-full w-full bg-gray-900 opacity-50"></div>

        <div class="modal-container z-50 mx-auto w-11/12 overflow-y-auto rounded bg-white shadow-lg md:max-w-lg">

            <div
                class="modal-close absolute right-0 top-0 z-50 mr-4 mt-4 flex cursor-pointer flex-col items-center text-sm text-white">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content px-6 py-4 text-left">
                <!--Title-->
                <div class="flex items-center justify-between pb-3">
                    <p class="text-xl font-bold text-slate-900">Do you want to borrow this book?</p>
                    <div class="modal-close z-50 cursor-pointer">
                        <svg class="fill-current text-slate-900" xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <form action="{{ route('user.lends.store', $book->slug) }}" method="post">
                    @csrf
                    <!--Body-->
                    <div class="my-2">
                        <label class="text-xs text-gray-600" for="start_date">Start Date</label>
                        <input
                            class="block w-full appearance-none rounded-xl border border-solid px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 caret-blue-500 shadow-xl outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                            id="start_date" type="date" name="start_date">
                    </div>

                    <div class="my-2">
                        <label class="text-xs text-gray-600" for="return_date">Return Date</label>
                        <input
                            class="block w-full appearance-none rounded-xl border border-solid px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 caret-blue-500 shadow-xl outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                            id="return_date" type="date" name="finish_date">
                    </div>

                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <button
                            class="modal-close mr-2 rounded-lg bg-transparent px-4 py-3 text-red-500 hover:bg-gray-100 hover:text-red-400">Cancel</button>
                        <button
                            class="inline-block cursor-pointer rounded-lg bg-blue-600 bg-150 bg-x-25 px-6 py-3 align-middle text-xs font-bold uppercase leading-normal text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85">Borrow</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("a");

        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {

                    tabTogglers[i].parentElement.classList.remove("border-blue-600", "border-b", "-mb-px",
                        "opacity-100");
                    tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");

                }
                e.target.parentElement.classList.add("border-blue-600", "border-b-4", "-mb-px",
                    "opacity-100");
            });
        });

        document.getElementById("default-tab").click();

        var openmodal = document.querySelectorAll(".modal-open");
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener("click", function(event) {
                event.preventDefault();
                toggleModal();
            });
        }

        const overlay = document.querySelector(".modal-overlay");
        overlay.addEventListener("click", toggleModal);

        var closemodal = document.querySelectorAll(".modal-close");
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener("click", toggleModal);
        }

        document.onkeydown = function(evt) {
            evt = evt || window.event;
            var isEscape = false;
            if ("key" in evt) {
                isEscape = evt.key === "Escape" || evt.key === "Esc";
            } else {
                isEscape = evt.keyCode === 27;
            }
            if (isEscape && document.body.classList.contains("modal-active")) {
                toggleModal();
            }
        };

        function toggleModal() {
            const body = document.querySelector("body");
            const modal = document.querySelector(".modal");
            modal.classList.toggle("opacity-0");
            modal.classList.toggle("pointer-events-none");
            body.classList.toggle("modal-active");
            body.classList.toggle("overflow-y-hidden");
        }
    </script>
@endsection
