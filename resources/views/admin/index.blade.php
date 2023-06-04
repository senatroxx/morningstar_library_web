@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="flex w-full max-w-full flex-col gap-4 px-3">
        <div class="flex w-full flex-col gap-4 lg:flex-row">
            <div
                class="relative flex w-full min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl">
                <div class="flex-auto p-4">
                    <div class="-mx-3 flex flex-row">
                        <div class="w-2/3 max-w-full flex-none px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold uppercase leading-normal">TOTAL BOOK</p>
                                <h5 class="mb-0 font-bold dark:text-white">{{ $book }}</h5>
                            </div>
                        </div>
                        <div class="basis-1/3 px-3 text-right">
                            <div
                                class="inline-block h-12 w-12 rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500 text-center">
                                <i class="fa fa-book relative top-2.5 text-lg text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative flex w-full min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl">
                <div class="flex-auto p-4">
                    <div class="-mx-3 flex flex-row">
                        <div class="w-2/3 max-w-full flex-none px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold uppercase leading-normal">AVAILABLE BOOK</p>
                                <h5 class="mb-0 font-bold dark:text-white">{{ $stock }}</h5>
                            </div>
                        </div>
                        <div class="basis-1/3 px-3 text-right">
                            <div
                                class="inline-block h-12 w-12 rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500 text-center">
                                <i class="fa fa-check relative top-2.5 text-lg text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative flex w-full min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl">
                <div class="flex-auto p-4">
                    <div class="-mx-3 flex flex-row">
                        <div class="w-2/3 max-w-full flex-none px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold uppercase leading-normal">TOTAL LEND</p>
                                <h5 class="mb-0 font-bold dark:text-white">{{ $lend }}</h5>
                            </div>
                        </div>
                        <div class="basis-1/3 px-3 text-right">
                            <div
                                class="inline-block h-12 w-12 rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500 text-center">
                                <i class="fa fa-newspaper relative top-2.5 text-lg text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative flex w-full min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl">
                <div class="flex-auto p-4">
                    <div class="-mx-3 flex flex-row">
                        <div class="w-2/3 max-w-full flex-none px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold uppercase leading-normal">TOTAL USER</p>
                                <h5 class="mb-0 font-bold dark:text-white">{{ $user }}</h5>
                            </div>
                        </div>
                        <div class="basis-1/3 px-3 text-right">
                            <div
                                class="inline-block h-12 w-12 rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500 text-center">
                                <i class="fa fa-user-tie relative top-2.5 text-lg text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl">
            <div
                class="border-b-solid mb-2 flex flex-col rounded-t-2xl border-b-0 border-b-transparent p-6 pb-0 lg:flex-row lg:items-center lg:justify-between">
                <h6 class="m-0 font-semibold dark:text-white">Recently Added Book</h6>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div
            class="relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl">
            <div
                class="border-b-solid mb-2 flex flex-col rounded-t-2xl border-b-0 border-b-transparent p-6 pb-0 lg:flex-row lg:items-center lg:justify-between">
                <h6 class="m-0 font-semibold dark:text-white">Latest Lend</h6>
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
                                    User
                                </th>
                                <th
                                    class="border-b-solid border-collapse whitespace-nowrap border-b bg-transparent px-6 py-3 pl-2 text-left align-middle text-xxs font-bold uppercase tracking-none text-slate-400 opacity-70 shadow-none dark:border-white/40 dark:text-white">
                                    Title
                                </th>
                                <th
                                    class="border-b-solid border-collapse whitespace-nowrap border-b bg-transparent px-6 py-3 text-center align-middle text-xxs font-bold uppercase tracking-none text-slate-400 opacity-70 shadow-none dark:border-white/40 dark:text-white">
                                    Borrowed At
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lends as $lend)
                                <tr>
                                    <td
                                        class="whitespace-nowrap border-b bg-transparent p-2 text-center align-middle shadow-transparent dark:border-white/40">
                                        <h6 class="mb-0 px-2 py-1 text-sm leading-normal dark:text-white">
                                            {{ $lend->id }}
                                        </h6>
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-b bg-transparent p-2 align-middle shadow-transparent dark:border-white/40">
                                        <p class="mb-0 px-2 py-1 text-sm leading-normal dark:text-white">
                                            {{ $lend->user->name }}
                                        </p>
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-b bg-transparent p-2 align-middle shadow-transparent dark:border-white/40">
                                        <p class="mb-0 px-2 py-1 text-sm leading-normal dark:text-white">
                                            {{ $lend->book->title }}
                                        </p>
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-b bg-transparent p-2 text-center align-middle shadow-transparent dark:border-white/40">
                                        <span
                                            class="text-xs font-semibold leading-tight text-slate-400 dark:text-white dark:opacity-80">
                                            {{ $lend->start_date }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
