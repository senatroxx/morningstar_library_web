<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Morningstar Library</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>

<body class="min-h-screen bg-white">
    @include('layouts.partials.navbar-user')

    @yield('content')

    {{-- Footer Section --}}
    <footer
        class="flex flex-col flex-wrap items-center justify-between bg-gradient-to-tr from-slate-850 to-slate-900 px-6 py-4 md:flex-row lg:px-10">
        <img class="w-36 rounded bg-white px-2 py-1" src="{{ Vite::asset('resources/images/logo.png') }}">
        <p class="text-sm text-white">© {{ date('Y') }} Morningstar. All rights reserved.</p>
    </footer>
    {{-- End Footer Section --}}

    @yield('scripts')
    <script>
        const Dropdown = (dropdownId, buttonId, contentId, caretId) => {
            const dropdownButton = document.getElementById(buttonId);
            if (!dropdownButton) return;
            const dropdownContent = document.getElementById(contentId);
            const caret = document.getElementById(caretId);

            dropdownButton.addEventListener('click', () => {
                if (dropdownContent.classList.contains('hidden')) {
                    dropdownContent.classList.remove('hidden');
                    dropdownContent.classList.remove('opacity-0');
                    dropdownContent.classList.remove('invisible');
                    dropdownContent.classList.add('animate-fade-in');
                    caret.classList.add('rotate-180');
                } else {
                    dropdownContent.classList.remove('animate-fade-in');
                    dropdownContent.classList.add('animate-fade-out');
                    dropdownContent.addEventListener('animationend', () => {
                        dropdownContent.classList.add('hidden');
                        dropdownContent.classList.remove('animate-fade-out');
                        dropdownContent.classList.add('opacity-0');
                        dropdownContent.classList.add('invisible');
                        caret.classList.remove('rotate-180');
                    }, {
                        once: true
                    });
                }
            });

            document.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target)) {
                    dropdownContent.classList.add('hidden');
                    dropdownContent.classList.remove('animate-fade-in');
                    dropdownContent.classList.remove('animate-fade-out');
                    dropdownContent.classList.add('opacity-0');
                    dropdownContent.classList.add('invisible');
                    caret.classList.remove('rotate-180');
                }
            });
        };

        // Initialize dropdowns
        Dropdown('dropdown', 'dropdown-button', 'dropdown-content', 'dropdown-caret');
    </script>
    <script>
        var navToggles = document.querySelectorAll('#nav-toggle');
        var mobileMenu = document.getElementById('mobile-menu');
        var body = document.querySelector('body');
        var navbar = document.querySelector('#navbar');

        navToggles.forEach(navToggle => {
            navToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                body.classList.toggle('overflow-hidden');
                if (window.scrollY !== 0) {
                    navbar.classList.toggle('scrolled');
                }
            });
        });

        window.onresize = function() {
            if (window.innerWidth > 768) {
                mobileMenu.classList.add('hidden');
                navbar.classList.remove('scrolled');
                body.classList.remove('overflow-hidden');
            }
        }

        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('#navbar');
            var scrollPosition = window.scrollY;

            if (scrollPosition > 0) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>
