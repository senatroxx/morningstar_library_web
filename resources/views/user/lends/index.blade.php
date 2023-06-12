@extends('layouts.master')

@section('content')
    <div class="relative isolate -mt-3 flex min-h-screen flex-col gap-6 bg-gradient-to-br from-blue-200 px-6 py-24 lg:px-10">
        <div class="w-full rounded-xl bg-white p-4">
            <div class="text-center text-xl font-bold">
                <h2 class="bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text pb-4 text-transparent">
                    Your Borrowed Books
                </h2>
            </div>
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
                                Book
                            </th>
                            <th
                                class="border-b-solid border-collapse whitespace-nowrap border-b bg-transparent px-6 py-3 pl-2 text-left align-middle text-xxs font-bold uppercase tracking-none text-slate-400 opacity-70 shadow-none dark:border-white/40 dark:text-white">
                                Borrowed At
                            </th>
                            <th
                                class="border-b-solid border-collapse whitespace-nowrap border-b bg-transparent px-6 py-3 pl-2 text-left align-middle text-xxs font-bold uppercase tracking-none text-slate-400 opacity-70 shadow-none dark:border-white/40 dark:text-white">
                                Expected Return
                            </th>
                            <th
                                class="border-b-solid border-collapse whitespace-nowrap border-b bg-transparent px-6 py-3 pl-2 text-left align-middle text-xxs font-bold uppercase tracking-none text-slate-400 opacity-70 shadow-none dark:border-white/40 dark:text-white">
                                Returned
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
                                        {{ Str::limit($lend->book->title, 60) }}
                                    </p>
                                </td>
                                <td
                                    class="whitespace-nowrap border-b bg-transparent p-2 align-middle shadow-transparent dark:border-white/40">
                                    <p class="mb-0 px-2 py-1 text-sm leading-normal dark:text-white">
                                        {{ $lend->start_date }}
                                    </p>
                                </td>
                                <td
                                    class="whitespace-nowrap border-b bg-transparent p-2 align-middle shadow-transparent dark:border-white/40">
                                    <p class="mb-0 px-2 py-1 text-sm leading-normal dark:text-white">
                                        {{ $lend->finish_date }}
                                    </p>
                                </td>
                                <td
                                    class="whitespace-nowrap border-b bg-transparent p-2 align-middle shadow-transparent dark:border-white/40">
                                    <p class="mb-0 px-2 py-1 text-sm leading-normal dark:text-white">
                                        {{ $lend->returned ? 'Yes' : 'No' }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $lends->onEachSide(1)->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
