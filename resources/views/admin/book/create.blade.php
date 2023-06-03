@extends('layouts.dashboard')

@section('title', 'Add Book')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

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
                    <h6 class="m-0 font-bold text-gray-700 dark:text-white">Add Book</h6>
                    <a class="mr-3 inline-block cursor-pointer rounded-lg bg-gradient-to-tl from-blue-500 to-violet-500 bg-150 bg-x-25 px-6 py-3 text-center align-middle text-xs font-bold uppercase leading-normal tracking-tight-rem text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                        href="{{ route('admin.books.index') }}">
                        Back
                    </a>
                </div>
            </div>
            <form action="{{ route('admin.books.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-4 px-4 pb-2 pt-0">
                    <div class="flex flex-col gap-4 lg:flex-row">
                        <input
                            class="ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                            type="text" placeholder="Title" name="title" autocomplete="off" />
                        <input
                            class="ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                            type="number" placeholder="Quantity" name="quantity" autocomplete="off" />
                    </div>
                    <textarea
                        class="ease block h-auto min-h-unset w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                        name="description" rows="5" placeholder="Description"></textarea>
                    <div class="flex flex-col gap-4 lg:flex-row">
                        <select id="author" name="authors_id[]" style="width: 100%" multiple="multiple"></select>
                        <select id="category" name="categories_id[]" style="width: 100%" multiple="multiple"></select>
                    </div>
                    <div class="flex flex-col gap-4 lg:flex-row">
                        <input
                            class="ease block w-1/2 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                            id="published" type="text" placeholder="Please select a date" name="published_at" />
                        <select id="publisher" name="publisher_id" style="width: 100%"></select>
                    </div>
                    <label class="w-full">
                        <input
                            class="text-grey-700 file:text-md w-full rounded-lg border border-solid border-gray-300 text-sm file:mr-5 file:border-0 file:bg-gradient-to-tl file:from-blue-500 file:to-violet-500 file:px-7 file:py-2 file:font-semibold file:text-white hover:file:cursor-pointer hover:file:opacity-80 dark:text-white"
                            type="file" name="thumbnail" />
                    </label>
                    <div class="flex flex-col justify-end gap-4 lg:flex-row">
                        <button
                            class="ease inline-block appearance-none rounded-lg border border-solid border-gray-300 bg-gradient-to-tl from-emerald-500 to-teal-400 bg-150 bg-x-25 px-6 py-3 text-center align-middle text-xs font-bold uppercase leading-normal tracking-tight-rem text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                            type="submit">
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('tail')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Author Select2
            $('#author').select2({
                width: 'resolve',
                ajax: {
                    url: '{{ request()->getSchemeAndHttpHost() }}/admin/authors',
                    type: 'get',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            _token: "{{ csrf_token() }}",
                            q: params.term,
                            page: params.page || 1
                        }
                    },
                    processResults: function(res) {
                        results = res.data.map(data => {
                            return {
                                id: data.id,
                                text: data.name
                            }
                        })
                        return {
                            results,
                            pagination: {
                                more: res.current_page < res.last_page
                            }
                        };
                    },
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                },
                placeholder: 'Select Author',
                cache: true,
            });

            // Category Select2
            $('#category').select2({
                width: 'resolve',
                ajax: {
                    url: '{{ request()->getSchemeAndHttpHost() }}/admin/categories',
                    type: 'get',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            _token: "{{ csrf_token() }}",
                            q: params.term,
                            page: params.page || 1
                        }
                    },
                    processResults: function(res) {
                        results = res.data.map(data => {
                            return {
                                id: data.id,
                                text: data.name
                            }
                        })
                        return {
                            results,
                            pagination: {
                                more: res.current_page < res.last_page
                            }
                        };
                    },
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                },
                placeholder: 'Select Category',
                cache: true,
            });

            // Publisher Select2
            $('#publisher').select2({
                width: 'resolve',
                ajax: {
                    url: '{{ request()->getSchemeAndHttpHost() }}/admin/publishers',
                    type: 'get',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            _token: "{{ csrf_token() }}",
                            q: params.term,
                            page: params.page || 1
                        }
                    },
                    processResults: function(res) {
                        results = res.data.map(data => {
                            return {
                                id: data.id,
                                text: data.name
                            }
                        })
                        return {
                            results,
                            pagination: {
                                more: res.current_page < res.last_page
                            }
                        };
                    },
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                },
                placeholder: 'Select Publisher',
                cache: true,
            });

            // Datepicker
            var stylesheet = document.head.querySelector(
                "link[href$='https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css']")
            $('#published').flatpickr({
                onOpen: [
                    function(selectedDates, dateStr, instance) {
                        if (localStorage.getItem("color-theme")) {
                            if (localStorage.getItem("color-theme") === "light") {
                                stylesheet.href =
                                    "https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/light.css";
                            } else {
                                stylesheet.href =
                                    "https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css";
                            }

                            // if NOT set via local storage previously
                        } else {
                            if (document.documentElement.classList.contains("dark")) {
                                stylesheet.href =
                                    "https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/light.css";
                            } else {
                                stylesheet.href =
                                    "https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css";
                            }
                        }
                    }
                ]
            });
        });
    </script>
@endsection
