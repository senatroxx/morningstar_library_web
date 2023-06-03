<!-- sidenav  -->
<aside
    class="ease-nav-brand fixed inset-y-0 z-990 my-4 block w-full max-w-64 -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-xl transition-transform duration-200 dark:bg-slate-850 dark:shadow-none xl:left-0 xl:ml-6 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
        <i class="fas fa-times absolute right-0 top-0 cursor-pointer p-4 text-slate-400 opacity-50 dark:text-white xl:hidden"
            sidenav-close></i>
        <a class="m-0 block whitespace-nowrap px-8 py-6 text-center font-semibold text-slate-700 dark:text-white"
            href="/" target="_blank">
            {{-- <img class="ease-nav-brand inline h-full max-h-8 max-w-full transition-all duration-200 dark:hidden"
                src="../assets/img/logo-ct-dark.png" alt="main_logo" />
            <img class="ease-nav-brand hidden h-full max-h-8 max-w-full transition-all duration-200 dark:inline"
                src="../assets/img/logo-ct.png" alt="main_logo" />
            <span class="ease-nav-brand ml-1 font-semibold transition-all duration-200">Argon Dashboard 2</span> --}}
            Morningstar Library
        </a>
    </div>

    <hr
        class="mt-0 h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="block max-h-screen w-auto grow basis-full items-center overflow-auto">
        <ul class="mb-0 flex flex-col pl-0">
            <li class="mt-0.5 w-full">
                <a class="ease-nav-brand {{ request()->routeIs('admin.index') ? 'active' : '' }} mx-2 my-0 flex items-center whitespace-nowrap px-4 py-2.7 text-sm transition-colors dark:text-white dark:opacity-80"
                    href={{ route('admin.index') }}>
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ni ni-tv-2 relative top-0 text-sm leading-normal text-blue-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Dashboard</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="ease-nav-brand {{ request()->routeIs('admin.books.*') ? 'active' : '' }} mx-2 my-0 flex items-center whitespace-nowrap px-4 py-2.7 text-sm transition-colors dark:text-white dark:opacity-80"
                    href={{ route('admin.books.index') }}>
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ni ni-calendar-grid-58 relative top-0 text-sm leading-normal text-orange-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Books</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="ease-nav-brand {{ request()->routeIs('admin.categories.*') ? 'active' : '' }} mx-2 my-0 flex items-center whitespace-nowrap px-4 py-2.7 text-sm transition-colors dark:text-white dark:opacity-80"
                    href="{{ route('admin.categories.index') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="ni ni-credit-card relative top-0 text-sm leading-normal text-emerald-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Categories</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="ease-nav-brand {{ request()->routeIs('admin.publishers.*') ? 'active' : '' }} mx-2 my-0 flex items-center whitespace-nowrap px-4 py-2.7 text-sm transition-colors dark:text-white dark:opacity-80"
                    href="{{ route('admin.publishers.index') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ni ni-app relative top-0 text-sm leading-normal text-cyan-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Publishers</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 py-2.7 text-sm transition-colors dark:text-white dark:opacity-80"
                    href="../pages/rtl.html">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ni ni-world-2 relative top-0 text-sm leading-normal text-red-600"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Users</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 py-2.7 text-sm transition-colors dark:text-white dark:opacity-80"
                    href="../pages/rtl.html">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ni ni-world-2 relative top-0 text-sm leading-normal text-red-600"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Lends</span>
                </a>
            </li>

            {{-- <li class="mt-4 w-full">
                <h6 class="ml-2 pl-6 text-xs font-bold uppercase leading-tight opacity-60 dark:text-white">Account pages
                </h6>
            </li>

            <li class="mt-0.5 w-full">
                <a class="ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 py-2.7 text-sm transition-colors dark:text-white dark:opacity-80"
                    href="../pages/profile.html">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ni ni-single-02 relative top-0 text-sm leading-normal text-slate-700"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Profile</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 py-2.7 text-sm transition-colors dark:text-white dark:opacity-80"
                    href="../pages/sign-in.html">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ni ni-single-copy-04 relative top-0 text-sm leading-normal text-orange-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Sign In</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 py-2.7 text-sm transition-colors dark:text-white dark:opacity-80"
                    href="../pages/sign-up.html">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ni ni-collection relative top-0 text-sm leading-normal text-cyan-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Sign Up</span>
                </a>
            </li> --}}
        </ul>
    </div>

</aside>
