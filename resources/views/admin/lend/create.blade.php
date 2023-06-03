@extends('layouts.dashboard')

@section('title', 'Add Lend')

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
                    <h6 class="m-0 font-bold text-gray-700 dark:text-white">Add Lend</h6>
                    <a class="mr-3 inline-block cursor-pointer rounded-lg bg-gradient-to-tl from-blue-500 to-violet-500 bg-150 bg-x-25 px-6 py-3 text-center align-middle text-xs font-bold uppercase leading-normal tracking-tight-rem text-white shadow-xs transition-all ease-in hover:-translate-y-px hover:shadow-md active:opacity-85"
                        href="{{ route('admin.lends.index') }}">
                        Back
                    </a>
                </div>
            </div>
            <form action="{{ route('admin.lends.store') }}" method="post">
                @csrf
                <div class="flex flex-col gap-4 px-4 pb-2 pt-0">
                    <div class="flex flex-col gap-4 lg:flex-row">
                        <select id="user" name="user_id" style="width: 100%"></select>
                        <select id="book" name="book_id" style="width: 100%"></select>
                    </div>
                    <div class="flex flex-col gap-4 lg:flex-row">
                        <input
                            class="ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal leading-5.6 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none dark:bg-transparent dark:text-white"
                            id="range" type="text" placeholder="Choose date range" name="range" />
                        <select id="returned" name="returned" style="width: 100%">
                            <option value="" hidden>Select returned</option>
                            <option value="0">Not returned</option>
                            <option value="1">Returned</option>
                        </select>
                    </div>

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

            $('#user').select2({
                width: 'resolve',
                ajax: {
                    url: '{{ request()->getSchemeAndHttpHost() }}/admin/users',
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
                },
                placeholder: 'Select User',
                cache: true,
            });

            $('#book').select2({
                width: 'resolve',
                ajax: {
                    url: '{{ request()->getSchemeAndHttpHost() }}/admin/books',
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
                                text: data.title
                            }
                        })
                        return {
                            results,
                            pagination: {
                                more: res.current_page < res.last_page
                            }
                        };
                    },
                },
                placeholder: 'Select Book',
                cache: true,
            });

            $('#returned').select2({
                onChange: function(selectedDates, dateStr, instance) {
                    // Get the selected start date
                    var startDate = selectedDates[0];

                    // Calculate the maximum selectable date based on the start date
                    var maxDate = new Date(startDate.getFullYear(), startDate.getMonth(), startDate
                        .getDate() + 7);

                    // Set the maxDate option for the end date picker
                    instance.set("maxDate", maxDate);
                }
            });

            var stylesheet = document.head.querySelector(
                "link[href$='https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css']")
            $('#range').flatpickr({
                mode: 'range',

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
                                    "https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css";
                            } else {
                                stylesheet.href =
                                    "https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/light.css";
                            }
                        }
                    }
                ]
            });

        });
    </script>
@endsection
