@extends('layouts.master')

@section('content')
    <div
        class="relative isolate -mt-3 flex min-h-screen flex-col justify-center gap-6 bg-gradient-to-br from-blue-200 px-6 py-24 lg:px-10">
        <div class="flex items-start justify-center gap-4">
            <div class="relative flex w-4/12 items-center justify-center rounded-xl bg-white">
                <div class="absolute inset-0 z-0 h-120 w-full rotate-180 rounded-xl bg-cover bg-center"
                    style="background-image: url({{ $book->thumbnail }})">
                </div>
                <div
                    class="via-white-50 z-10 flex h-120 w-full items-center justify-center rounded-xl bg-gradient-to-b from-transparent to-white/50 backdrop-blur-3xl">
                    <img class="z-10 h-75 w-full object-contain" src="{{ $book->thumbnail }}" alt="{{ $book->title }}">
                </div>
            </div>
            <div class="w-8/12 rounded-xl bg-white p-4 shadow">
                <p class="text-sm text-gray-600">
                    @foreach ($book->authors as $author)
                        {{ $author->name }}{{ $loop->last ? '' : ', ' }}
                    @endforeach
                </p>
                <div class="flex gap-3">
                    <h2 class="text-xl font-bold text-slate-900">
                        {{ $book->title }}
                    </h2>
                    <button
                        class="inline-block cursor-pointer rounded-lg bg-blue-600 bg-150 bg-x-25 px-4 py-1 align-middle text-xs font-bold uppercase leading-normal text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85">
                        Borrow now!
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
    </script>
@endsection
