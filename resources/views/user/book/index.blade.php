@extends('layouts.master')

@section('content')
    <div class="relative isolate -mt-3 flex min-h-screen flex-col gap-6 bg-gradient-to-br from-blue-200 px-6 py-24 lg:px-10">
        <form action="{{ route('user.books.index') }}" method="get">
            <div class="mx-auto flex w-full items-stretch md:w-2/5">
                <div class="relative w-full rounded-l-lg shadow-none">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="absolute h-5 w-5 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input
                        class="dark:highlight-white/5 border-1 block h-full w-full rounded-l-lg border-gray-300 px-3 py-3 pl-10 font-sans text-sm text-slate-500 dark:bg-slate-800 dark:text-slate-400 dark:ring-0"
                        type="text" placeholder="Book Title" name="q" value="{{ request('q') }}" />
                </div>
                <button
                    class="inline-block cursor-pointer rounded-r-lg bg-blue-600 bg-150 bg-x-25 px-6 py-3 align-middle text-xs font-bold uppercase leading-normal text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                    type="submit">Search</button>
            </div>
        </form>
        <div class="flex flex-wrap justify-evenly gap-4">
            @forelse ($books as $book)
                <a href="{{ route('user.books.show', $book->slug) }}">
                    <div class="relative w-36 rounded bg-white shadow-md md:w-48">
                        <div class="absolute inset-0 z-0 h-44 w-full rounded-t bg-cover bg-center md:h-56"
                            style="background-image: url({{ $book->thumbnail }})">
                        </div>
                        <div class="z-10 rounded-t bg-white/10 backdrop-blur">
                            <img class="z-10 h-44 w-full object-contain md:h-56" src="{{ $book->thumbnail }}"
                                alt="{{ $book->title }}">
                        </div>
                        <div class="p-4">
                            <p class="truncate text-xs text-gray-600">
                                @foreach ($book->authors as $author)
                                    {{ $author->name }}{{ $loop->last ? '' : ', ' }}
                                @endforeach
                            </p>
                            <h2 class="truncate text-sm text-gray-800">
                                {{ $book->title }}
                            </h2>
                        </div>
                    </div>
                </a>
            @empty
                <div class="flex flex-col items-center">
                    <img class="mt-6 w-40" src="{{ Vite::asset('resources/images/notfound.png') }}" alt="No Result">
                    <div class="mt-6 text-3xl font-bold">
                        <h2
                            class="bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text uppercase tracking-tighter text-transparent">
                            Result Not Found
                        </h2>
                    </div>
                    <span class="text-sm text-gray-600">We couldn't find what you searched for.</span>
                    <span class="text-sm text-gray-600">Try searching again.</span>
                </div>
            @endforelse
        </div>
        {{ $books->onEachSide(1)->links('pagination::tailwind') }}
    </div>
@endsection
