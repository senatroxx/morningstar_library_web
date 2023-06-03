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

        <div class="mt-2 flex grow items-center sm:mr-6 sm:mt-0 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
                <div class="ease relative flex w-full flex-wrap items-stretch rounded-lg transition-all">
                    <span
                        class="ease absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-br-none rounded-tr-none border border-r-0 border-transparent bg-transparent px-2.5 py-2 text-center text-sm font-normal leading-5.6 text-slate-500 transition-all">
                        <i class="fas fa-search"></i>
                    </span>
                    <input
                        class="ease relative -ml-px block w-1/100 min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pl-9 pr-3 text-sm leading-5.6 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:shadow-primary-outline focus:outline-none focus:transition-shadow dark:bg-slate-850 dark:text-white"
                        type="text" placeholder="Type here..." />
                </div>
            </div>
            <ul class="mb-0 flex list-none flex-row items-center justify-end gap-4 pl-0 md-max:w-full">
                <!-- online builder btn  -->
                <!-- <li class="flex items-center">
          <a class="mb-0 mr-4 inline-block cursor-pointer rounded-lg border border-solid border-blue-500 bg-transparent px-8 py-2 text-center align-middle text-xs font-bold uppercase leading-pro tracking-tight-rem text-blue-500 shadow-none transition-all ease-in hover:-translate-y-px hover:border-blue-500 hover:bg-transparent hover:text-blue-500 hover:opacity-75 hover:shadow-none active:bg-blue-500 active:text-white active:shadow-xs active:hover:bg-transparent active:hover:text-blue-500" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
        </li> -->
                <li class="flex items-center">
                    <a class="ease-nav-brand block px-0 py-2 text-sm font-semibold text-white transition-all"
                        href="../pages/sign-in.html">
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
                    <a class="ease-nav-brand p-0 text-sm text-white transition-all" href="javascript:;">
                        <i class="fa fa-cog cursor-pointer" fixed-plugin-button-nav></i>
                        <!-- fixed-plugin-button-nav  -->
                    </a>
                </li>

                <!-- notifications -->

                <li class="flex items-center">
                    <button class="text-sm text-gray-100 focus:outline-none dark:text-gray-100" id="theme-toggle"
                        type="button">
                        <i class="fa fa-moon hidden" id="theme-toggle-dark-icon"></i>
                        <i class="fa fa-sun hidden" id="theme-toggle-light-icon"></i>
                    </button>
                </li>

                <li class="relative flex items-center pr-2">
                    <p class="hidden transform-dropdown-show"></p>
                    <a class="ease-nav-brand block p-0 text-sm text-white transition-all" href="javascript:;"
                        dropdown-trigger aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                    </a>

                    <ul class="before:ease pointer-events-none absolute right-0 top-0 z-50 min-w-44 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-sm text-slate-500 opacity-0 transition-all duration-250 transform-dropdown before:absolute before:left-auto before:right-2 before:top-0 before:z-50 before:inline-block before:font-awesome before:text-5.5 before:font-normal before:leading-default before:text-white before:antialiased before:transition-all before:duration-350 before:content-['\f0d8'] dark:bg-slate-850 dark:shadow-dark-xl sm:-mr-6 before:sm:right-8 lg:absolute lg:left-auto lg:right-0 lg:mt-2 lg:block lg:cursor-pointer lg:shadow-3xl"
                        dropdown-menu>
                        <!-- add show class on dropdown open js -->
                        <li class="relative mb-2">
                            <a class="ease clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 py-1.2 duration-300 hover:bg-gray-200 hover:text-slate-700 dark:hover:bg-slate-900 lg:transition-colors"
                                href="javascript:;">
                                <div class="flex py-1">
                                    <div class="my-auto">
                                        <img class="mr-4 inline-flex h-9 w-9 max-w-none items-center justify-center rounded-xl text-sm text-white"
                                            src="../assets/img/team-2.jpg" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span
                                                class="font-semibold">New message</span> from Laur</h6>
                                        <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                            <i class="fa fa-clock mr-1"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="relative">
                            <a class="ease clear-both block w-full whitespace-nowrap rounded-lg px-4 py-1.2 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700 dark:hover:bg-slate-900"
                                href="javascript:;">
                                <div class="flex py-1">
                                    <div
                                        class="ease-nav-brand my-auto mr-4 inline-flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-tl from-slate-600 to-slate-300 text-sm text-white transition-all duration-200">
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                    fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background"
                                                                d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                opacity="0.593633743"></path>
                                                            <path class="color-background"
                                                                d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">Payment
                                            successfully completed</h6>
                                        <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                            <i class="fa fa-clock mr-1"></i>
                                            2 days
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
