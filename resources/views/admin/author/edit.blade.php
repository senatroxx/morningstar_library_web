@extends('layouts.dashboard')

@section('title', 'Edit Author')

@section('content')
    <div class="w-full max-w-full flex-none px-3">
        @if ($errors->any())
            <div class="relative mb-4 rounded-lg border border-solid border-red-300 bg-gradient-to-tl from-red-600 to-orange-600 p-4 pr-12 text-white"
                alert>
                <p class="font-bold">Whoops!</p>
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button
                    class="z-2 absolute right-0 top-0 box-content h-4 w-4 rounded border-0 bg-transparent p-4 text-sm text-white"
                    type="button" alert-close>
                    <span class="cursor-pointer text-center" aria-hidden="true">&#10005;</span>
                </button>
            </div>
        @endif
        <div
            class="relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl">
            <div class="border-b-solid mb-2 rounded-t-2xl border-b-0 border-b-transparent p-6 pb-0">
                <div class="flex items-center justify-between">
                    <h6 class="m-0 font-bold text-gray-700 dark:text-white">Edit Author</h6>
                    <a class="mr-3 inline-block cursor-pointer rounded-lg bg-gradient-to-tl from-blue-500 to-violet-500 bg-150 bg-x-25 px-6 py-3 text-center align-middle text-xs font-bold uppercase leading-normal tracking-tight-rem text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                        href="{{ route('admin.authors.index') }}">
                        Back
                    </a>
                </div>
            </div>
            <form action="{{ route('admin.authors.update', $author->slug) }}" method="post">
                @method('PUT')
                @csrf
                <div class="flex flex-col gap-4 px-4 pb-2 pt-0">
                    <input
                        class="ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                        type="text" placeholder="Author Name" name="name" autocomplete="off"
                        value="{{ $author->name }}" />

                    <div class="flex flex-col justify-end gap-4 lg:flex-row">
                        <button
                            class="ease inline-block appearance-none rounded-lg border border-solid border-gray-300 bg-gradient-to-tl from-emerald-500 to-teal-400 bg-150 bg-x-25 px-6 py-3 text-center align-middle text-xs font-bold uppercase leading-normal tracking-tight-rem text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                            type="submit">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
