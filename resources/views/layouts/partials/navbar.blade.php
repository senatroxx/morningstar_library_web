<nav class="relative mx-6 flex flex-wrap items-center justify-between rounded-2xl px-0 py-2 shadow-none transition-all duration-250 ease-in lg:flex-nowrap lg:justify-start"
    navbar-main navbar-scroll="false">
    <div class="mx-auto flex w-full items-center justify-between px-4 py-1 flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="mr-12 flex flex-wrap rounded-lg bg-transparent pt-1 sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="capitalize text-white opacity-50">{{ explode('/', request()->path())[0] }}</a>
                </li>
                <li class="pl-2 text-sm capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                    aria-current="page">{{ explode('/', request()->path())[1] }}</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize text-white">{{ explode('/', request()->path())[1] }}</h6>
        </nav>

        <div class="mt-2 flex items-center sm:mr-6 sm:mt-0 md:mr-0 lg:flex lg:basis-auto">

            <ul class="mb-0 flex list-none flex-row items-center justify-end gap-4 pl-0 md-max:w-full">
                <li class="flex items-center">
                    <a class="ease-nav-brand block px-0 py-2 text-sm font-semibold text-white transition-all">
                        <i class="fa fa-user sm:mr-1"></i>
                        <span class="hidden sm:inline">{{ Auth::guard('admin')->name }}</span>
                    </a>
                </li>
                <li class="flex items-center pl-4 xl:hidden">
                    <a class="ease-nav-brand block p-0 text-sm text-white transition-all" href="javascript:;"
                        sidenav-trigger>
                        <div class="w-4.5 overflow-hidden">
                            <i class="ease relative mb-0.75 block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease relative mb-0.75 block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                        </div>
                    </a>
                </li>

                <li class="flex items-center">
                    <button class="text-sm text-gray-100 focus:outline-none dark:text-gray-100" id="theme-toggle"
                        type="button">
                        <i class="fa fa-moon hidden" id="theme-toggle-dark-icon"></i>
                        <i class="fa fa-sun hidden" id="theme-toggle-light-icon"></i>
                    </button>
                </li>

            </ul>
        </div>
    </div>
</nav>
