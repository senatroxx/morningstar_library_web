@extends('layouts.dashboard')

@section('title', 'Categories List')

@section('content')
    <div class="w-full max-w-full flex-none px-3">
        @if (session('success'))
            <div class="relative mb-4 w-full rounded-lg border border-solid border-emerald-300 bg-gradient-to-tl from-emerald-600 to-teal-500 p-4 text-white"
                autoalert alert-duration="5000">
                <span class="font-bold">{{ session('success') }}</span>
            </div>
        @endif
        <div
            class="relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl">
            <div
                class="border-b-solid mb-2 flex flex-col rounded-t-2xl border-b-0 border-b-transparent p-6 pb-0 lg:flex-row lg:items-center lg:justify-between">
                <h6 class="m-0 dark:text-white">Categories List</h6>

                <div class="mt-3 flex w-full items-center lg:mt-0 lg:w-3/6">
                    <form class="ease relative flex w-full flex-wrap items-stretch rounded-lg transition-all"
                        action={{ route('admin.books.index') }} method="get">
                        {{-- <div class="ease relative flex w-1/4 flex-wrap items-stretch rounded-lg transition-all"> --}}
                        <span
                            class="ease absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-br-none rounded-tr-none border border-r-0 border-transparent bg-transparent px-2.5 py-2 text-center text-sm font-normal leading-5.6 text-slate-500 transition-all">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <input
                            class="ease relative -ml-px block w-1/100 min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-transparent bg-clip-padding py-2 pl-9 pr-3 text-sm leading-5.6 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none focus:transition-shadow dark:text-white"
                            type="text" placeholder="Book Title" name="q" autocomplete="off" />
                        {{-- </div> --}}
                    </form>

                    <a class="mx-3 inline-block w-2/4 cursor-pointer rounded-lg bg-gradient-to-tl from-emerald-600 to-teal-500 bg-150 bg-x-25 px-6 py-3 text-center align-middle text-xs font-bold uppercase leading-normal tracking-tight-rem text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85 xl:w-1/3"
                        href="{{ route('admin.books.create') }}">
                        Add Book
                    </a>

                </div>
            </div>
            <div class="flex-auto px-0 pb-2 pt-0">
                <div class="overflow-x-auto p-0">
                    <table class="mb-0 w-full border-collapse items-center align-top text-slate-500 dark:border-white/40">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="border-b-solid border-collapse whitespace-nowrap border-b bg-transparent px-6 py-3 text-center align-middle text-xxs font-bold uppercase tracking-none text-slate-400 opacity-70 shadow-none dark:border-white/40 dark:text-white">
                                    ID
                                </th>
                                <th
                                    class="border-b-solid border-collapse whitespace-nowrap border-b bg-transparent px-6 py-3 pl-2 text-left align-middle text-xxs font-bold uppercase tracking-none text-slate-400 opacity-70 shadow-none dark:border-white/40 dark:text-white">
                                    Title
                                </th>
                                <th
                                    class="border-b-solid border-collapse whitespace-nowrap border-b bg-transparent px-6 py-3 text-center align-middle text-xxs font-bold uppercase tracking-none text-slate-400 opacity-70 shadow-none dark:border-white/40 dark:text-white">
                                    Published At
                                </th>
                                <th
                                    class="border-collapse whitespace-nowrap border-b border-solid bg-transparent px-6 py-3 align-middle font-semibold capitalize tracking-none text-slate-400 opacity-70 shadow-none dark:border-white/40 dark:text-white">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td
                                        class="whitespace-nowrap border-b bg-transparent p-2 text-center align-middle shadow-transparent dark:border-white/40">
                                        <h6 class="mb-0 px-2 py-1 text-sm leading-normal dark:text-white">
                                            {{ $book->id }}
                                        </h6>
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-b bg-transparent p-2 align-middle shadow-transparent dark:border-white/40">
                                        <p class="mb-0 px-2 py-1 text-sm leading-normal dark:text-white">
                                            {{ $book->title }}
                                        </p>
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-b bg-transparent p-2 text-center align-middle shadow-transparent dark:border-white/40">
                                        <span
                                            class="text-xs font-semibold leading-tight text-slate-400 dark:text-white dark:opacity-80">
                                            {{ $book->published_at }}
                                        </span>
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-b bg-transparent p-2 align-middle shadow-transparent dark:border-white/40">
                                        <form action="{{ route('admin.books.destroy', $book->slug) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a class="inline-block whitespace-nowrap rounded-1.8 bg-gradient-to-tl from-blue-500 to-violet-500 px-2.5 py-1.4 text-center align-baseline text-xs font-bold uppercase leading-none text-white"
                                                href="{{ route('admin.books.edit', $book->slug) }}">
                                                Edit
                                            </a>

                                            <button
                                                class="inline-block whitespace-nowrap rounded-1.8 bg-gradient-to-tl from-red-600 to-orange-600 px-2.5 py-1.4 text-center align-baseline text-xs font-bold uppercase leading-none text-white"
                                                type="submit">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $books->onEachSide(1)->links('pagination::tailwind') }}
    </div>

@endsection
