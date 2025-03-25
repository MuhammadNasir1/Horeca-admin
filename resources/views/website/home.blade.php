@extends('website.layout')
@section('title')
    Home
@endsection

@section('content')
    <style>
        .highlight {
            background-color: rgba(0, 128, 0, 0.217);
            transition: background-color 0.3s ease;
        }
    </style>
      <nav class="bg-white  sticky top-0 z-50">
        <div class="container mx-auto px-2 md:px-4 py-2 flex items-center justify-between ">

            <!-- logo -->
            <div class="mr-auto md:w-48 flex-shrink-0">
                <a href="../">
                    <img class="h-8 " src="{{ asset('images/Horeca-green.svg') }}" alt="Horeca-Kaya">
                </a>
            </div>
            <div class="w-full hidden md:block">
                <div class=" mx-auto">
                    <div class="flex">
                        <button id="dropdown-category" data-dropdown-toggle="dropdown1"
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-r-0  rounded-s-lg hover:bg-gray-200 "
                            type="button">@lang('lang.Select_Category') <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg></button>
                        <div id="dropdown1"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 category-dropdown"
                                aria-labelledby="dropdown-category">



                            </ul>
                        </div>
                        <div class="relative w-full">
                            <input type="search" id="search-input"
                                class="block search-input p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50  border border-gray-300  focus:border-primary "
                                placeholder="@lang('lang.Search')" required />
                            <p class="absolute top-1/2 -translate-y-1/2 right-12 text-sm ">@lang('Matches') : <s1pan
                                    class="text-red-600 match-count"> 0 </s1pan>
                            </p>
                            <button type="submit"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-primary rounded-e-lg border border-primary  focus:outline-none ">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">@lang('lang.Matches')</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>


            <!-- logo -->
            <div class="md:mr-auto md:w-48 flex-shrink-0 flex items-center">
                {{-- =============language dropdown======================== --}}
                <button type="button" data-dropdown-toggle="language-dropdown-menu"
                    class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    @if (session()->get('locale') !== 'de')
                        <svg class="w-6 h-6 rounded-full me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3900 3900">
                            <path fill="#b22234" d="M0 0h7410v3900H0z" />
                            <path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff"
                                stroke-width="300" />
                            <path fill="#3c3b6e" d="M0 0h2964v2100H0z" />
                            <g fill="#fff">
                                <g id="d">
                                    <g id="c">
                                        <g id="e">
                                            <g id="b">
                                                <path id="a"
                                                    d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z" />
                                                <use xlink:href="#a" y="420" />
                                                <use xlink:href="#a" y="840" />
                                                <use xlink:href="#a" y="1260" />
                                            </g>
                                            <use xlink:href="#a" y="1680" />
                                        </g>
                                        <use xlink:href="#b" x="247" y="210" />
                                    </g>
                                    <use xlink:href="#c" x="494" />
                                </g>
                                <use xlink:href="#d" x="988" />
                                <use xlink:href="#c" x="1976" />
                                <use xlink:href="#e" x="2470" />
                            </g>
                        </svg>
                        English (US)
                    @else
                        <svg class="h-6 w-6 rounded-full me-2" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256"
                            viewBox="0 0 256 256" xml:space="preserve">

                            <defs>
                            </defs>
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                <path
                                    d="M 2.57 30 l 84.859 0 C 81.254 12.534 64.611 0.015 45.033 0 l -0.068 0 C 25.388 0.015 8.745 12.534 2.57 30 z"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 87.429 60 L 2.57 60 C 8.749 77.476 25.408 90 45 90 S 81.25 77.476 87.429 60 z"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,206,0); fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path
                                    d="M 87.429 60 C 89.088 55.307 90 50.261 90 45 c 0 -5.261 -0.911 -10.307 -2.571 -15 L 2.57 30 C 0.911 34.693 0 39.739 0 45 c 0 5.261 0.912 10.307 2.571 15 L 87.429 60 z"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(221,0,0); fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                        German
                    @endif


                </button>
                <!-- Dropdown -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"
                    id="language-dropdown-menu">
                    <ul class="py-2 font-medium" role="none">
                        <li>
                            <a href="../lang?lang=en"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                role="menuitem">
                                <div class="inline-flex items-center">
                                    <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full me-2"
                                        xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us" viewBox="0 0 512 512">
                                        <g fill-rule="evenodd">
                                            <g stroke-width="1pt">
                                                <path fill="#bd3d44"
                                                    d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                    transform="scale(3.9385)" />
                                                <path fill="#fff"
                                                    d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                    transform="scale(3.9385)" />
                                            </g>
                                            <path fill="#192f5d" d="M0 0h98.8v70H0z" transform="scale(3.9385)" />
                                            <path fill="#fff"
                                                d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                                                transform="scale(3.9385)" />
                                        </g>
                                    </svg>
                                    English (US)
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="../lang?lang=de"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                role="menuitem">
                                <div class="inline-flex items-center">
                                    <svg class="h-3.5 w-3.5 rounded-full me-2" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256"
                                        height="256" viewBox="0 0 256 256" xml:space="preserve">

                                        <defs>
                                        </defs>
                                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                            transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                            <path
                                                d="M 2.57 30 l 84.859 0 C 81.254 12.534 64.611 0.015 45.033 0 l -0.068 0 C 25.388 0.015 8.745 12.534 2.57 30 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 87.429 60 L 2.57 60 C 8.749 77.476 25.408 90 45 90 S 81.25 77.476 87.429 60 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,206,0); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 87.429 60 C 89.088 55.307 90 50.261 90 45 c 0 -5.261 -0.911 -10.307 -2.571 -15 L 2.57 30 C 0.911 34.693 0 39.739 0 45 c 0 5.261 0.912 10.307 2.571 15 L 87.429 60 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(221,0,0); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        </g>
                                    </svg>
                                    German
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <a href="../cart">

                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#000000"
                                d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>

                    </a>
                </div>
            </div>

        </div>
        <div class="absolute right-2 top-1/2 -translate-y-1/2  hidden ">

            <button class="bg-black flex py-2 rounded-md px-3 justify-center items-center  gap-1 text-white">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ffffff"
                        d="M420.6 301.9a24 24 0 1 1 24-24 24 24 0 0 1 -24 24m-265.1 0a24 24 0 1 1 24-24 24 24 0 0 1 -24 24m273.7-144.5 47.9-83a10 10 0 1 0 -17.3-10h0l-48.5 84.1a301.3 301.3 0 0 0 -246.6 0L116.2 64.5a10 10 0 1 0 -17.3 10h0l47.9 83C64.5 202.2 8.2 285.6 0 384H576c-8.2-98.5-64.5-181.8-146.9-226.6" />
                </svg> | <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ffffff"
                        d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z" />
                </svg> <br> <span class="text-white font-semibold ">@lang('lang.Download_App')</span></button>

        </div>


        <div class="w-[90%] block mx-auto md:hidden mb-2 ">
            <div class=" mx-auto">
                <div class="flex">
                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-r-0  rounded-s-lg hover:bg-gray-200 "
                        type="button">@lang('lang.Select_Category') <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200  category-dropdown"
                            aria-labelledby="dropdown-button">

                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-input"
                            class="block search-input p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50  border border-gray-300  focus:border-primary "
                            placeholder="Search" required />
                        </p>
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-primary rounded-e-lg border border-primary  focus:outline-none ">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">@lang('lang.Search')</span>
                        </button>
                    </div>
                </div>
                <p class="  text-sm text-right mr-10 hidden " id="match-count-con">@lang('lang.Matches') <span
                        class="text-red-600 match-count"> 0
                    </span>
                    </form>

            </div>
        </div>

        <hr class="border-primary">
    </nav>
    <div class=" mt-4 mx-1 lg:mx-6 xl:mx-12   ">
        <div id="header-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative sm:h-[10rem] h-[8rem] md:h-[14rem] overflow-hidden rounded-lg lg:h-[20rem] xl:h-[36rem] ">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img class="rounded-md" src="{{ asset('images/banners/penne-banner.png') }}"
                        class="absolute block w-full -translate-x-1/2 top-0 left-1/2" alt="Banner-1">
                </div>

                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/banners/Ket-banner.png') }}"
                        class="absolute block w-full -translate-x-1/2 top-0 left-1/2" alt="Banner-2">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/banners/sp-banner.png') }}"
                        class="absolute block w-full -translate-x-1/2  top-0 left-1/2" alt="Banner-3">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/banners/sp-banner-2.png') }}"
                        class="absolute block w-full -translate-x-1/2  top-0 left-1/2" alt="Banner-4">
                </div>

            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="1"></button>

            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <spa
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </spa>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

    <div class="mt-10 lg:mx-6 md:mx-4 mx-1 xl:mx-16">
        <div class="category-section">
            <div class="flex gap-6 items-center justify-between ">
                <h2 class="text-2xl font-semibold">@lang('lang.Categories')</h2>
                <div class="flex gap-4">
                    <button
                        class="swiper-prev h-10 w-10 rounded-full bg-slate-300 flex justify-center items-rounded-smh-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="#242424"
                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                        </svg>
                    </button>
                    <button
                        class="swiper-next h-10 w-10 rounded-full bg-slate-300 flex justify-center items-rounded-smh-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="#242424"
                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div>
                <div class="swiper mySwiper mt-4">
                    <div class="swiper-wrapper">
                        {{-- @for ($i = 1; $i < 20; $i++)
                            <div class="swiper-slide">
                                <div
                                    class=" h-48 bg-[#F2FCE4] rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center justify-center flex-1">
                                    <a href="#" class="w-full flex justify-center">
                                        <img class="rounded-t-lg pt-6"
                                            src="https://nest-frontend-v6.vercel.app/assets/imgs/shop/cat-13.png"
                                            alt="" />
                                    </a>
                                    <div class="p-5 pb-8 text-center w-full">
                                        <a href="#">
                                            <h5 class="text-lg font-medium tracking-tight text-gray-900 dark:text-white p">
                                                Cake
                                                &
                                                Milk</h5>
                                        </a>
                                        <p class="text-sm font-normal text-gray-700 dark:text-gray-400">26 items</p>
                                    </div>
                                </div>
                            </div>
                        @endfor --}}

                    </div>
                </div>
            </div>
        </div>


        <div class="mt-10">
            {{-- <div class="mt-10">
                <h2 class="text-2xl font-semibold">Popular Products</h2>
                <div class="grid xl:grid-cols-6 lg:grid-cols-4 md:grid-cols-3  grid-cols-2 gap-4 mt-2">
                    @for ($a = 1; $a < 7; $a++)
                        <div class="border border-gray rounded-lg shadow-sm p-4 ">
                            <div class="relative">
                                <a href="tel:000000"><img
                                        src="https://nest-frontend-v6.vercel.app/assets/imgs/shop/product-6-2.jpg"
                                        alt="Product Image" class="w-full h-40 object-contain "></a>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm text-gray-500">Category</p>
                                <h2 class="text-md font-semibold">Lorem ipsum dolor sit amet.</h2>

                                <p class="text-sm text-gray-500">By <span class="text-primary">Brand</span> </p>
                            </div>

                            <!-- Flex Container for Prices and Button -->
                            <div class="mt-4">
                                <a href="tel:000000">
                                    <button
                                        class="bg-[#def9ec] text-primary py-2 px-4 rounded-md w-full font-semibold text-sm shadow-md"><i
                                            class="fa fa-shopping-cart p-1 "></i>Call For Order</button>
                                </a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div> --}}

            <div id="product-container">
                <div class=" text-center hidden" id="spinner">
                    <svg aria-hidden="true" class="w-10 h-10 mx-auto text-center text-gray-200 animate-spin fill-primary"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                </div>
            </div>
            <div>
                <section class="bg-[#D8F1E5] dark:bg-gray-900 mt-5 rounded-lg ">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                        <div class="mx-auto max-w-screen-md sm:text-center">
                            <h2
                                class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl dark:text-white">
                                @lang('lang.Sign up for our newsletter')</h2>
                            <p
                                class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400">
                                @lang('lang.Stay up to date with the roadmap progress, announcements and exclusive discounts feel free to sign up with your email').</p>
                            <form action="#">
                                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                                    <div class="relative w-full">
                                        <label for="email"
                                            class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">@lang('lang.Email_address')</label>
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                                </path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                        </div>
                                        <input
                                            class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary"
                                            placeholder="@lang('lang.Enter_your_email')" type="email" id="email"
                                            required="">
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary border-primary sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 ">Subscribe</button>
                                    </div>
                                </div>
                                <div
                                    class="mx-auto max-w-screen-sm text-sm text-left text-gray-500 newsletter-form-footer">
                                    @lang('lang.We care about the protection of your data'). <a href="#" class="font-medium text-primary hover:underline">
                                        @lang('lang.Read our Privacy Policy')
                                    </a>.</div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

        </div>


        <div id="ProductDetailsModal" data-modal-backdrop="static"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="fixed inset-0 transition-opacity">
                <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
            </div>
            <div class="relative p-4 w-full max-w-2xl max-h-full">

                <div class="relative bg-white shadow-dark rounded-lg dark:bg-gray-700">
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between p-5 rounded-t dark:border-gray-600 bg-primary">
                        <h3 class="text-xl font-semibold text-white">
                            @lang('lang.Product_Details')
                        </h3>
                        <button type="button"
                            class="absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8"
                            data-modal-hide="ProductDetailsModal">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                    <div class=" text-center  h-60 flex justify-center items-center " id="modalSpinner">
                        <svg aria-hidden="true"
                            class="w-10 h-10 mx-auto text-center text-gray-200 animate-spin fill-primary"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                    </div>
                    <!-- Modal Content: Row Layout -->
                    <div class="flex items-center gap-6 p-6 hidden" id="modalContent">
                        <!-- Image Section -->
                        <div class="w-48 h-48 flex-shrink-0">
                            <img src="{{ asset('images/Horeca-green.svg') }}" alt="product Image"
                                class="w-full h-full object-contain rounded-lg">
                        </div>

                        <!-- Product Details -->
                        <div class="flex flex-col flex-grow">
                            <h2 class="text-lg font-semibold text-primary" id="modalTitle" productId=""></h2>
                            <p class="text-gray-600">Category: <span id="modalCategory"></span></p>
                            <p class="text-gray-800 font-bold text-xl" id="modalPrice"></p>
                            <div class="flex gap-2 items-center mt-2" id="">
                                <button type="button" class="text-xs bg-primary text-white rounded-sm h-6 w-6"
                                    id="decreaseQty">-</button>
                                <h3 class="text-sm" id="quantity">1</h3>
                                <button type="button" class="text-xs bg-primary text-white rounded-sm h-6 w-6"
                                    id="increaseQty">+</button>
                            </div>

                            <!-- Dropdown & Button -->
                            <div class="flex items-center gap-4 mt-4">
                                <div class="w-52">
                                    <select class="border rounded px-3 py-2 bg-gray-100 text-gray-700 w-full"
                                        id="unitStatus">
                                        <option value="single" selected>Single</option>
                                        <option value="full" id="unitOption">Full Unit</option>
                                    </select>
                                </div>
                                <button class="bg-primary w-full text-white px-4 py-2 rounded-md " id="addToCart">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm mx-3 pb-4" id="modalDescription"></p>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <button data-modal-target="ProductDetailsModal" data-modal-toggle="ProductDetailsModal"></button>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#increaseQty').click(function() {
                let qty = parseInt($('#quantity').text());
                $('#quantity').text(qty + 1);
            });

            $('#decreaseQty').click(function() {
                let qty = parseInt($('#quantity').text());
                if (qty > 1) {
                    $('#quantity').text(qty - 1);
                }
            });

            $("#addToCart").on("click", function() {
                let product = {
                    id: $("#modalTitle").attr("productId"), // Product ID
                    name: $("#modalTitle").text(), // Product Name
                    category: $("#modalCategory").text(), // Category
                    price: parseFloat($("#modalPrice").text().replace("€", "")), // Price
                    quantity: parseInt($("#quantity").text()), // Quantity
                    unit_status: $("#unitStatus").val() // Unit Type (Single/Full Unit)
                };

                let cart = JSON.parse(localStorage.getItem("cart")) || [];

                // Check if the product with the same ID and unit type exists
                let existingProduct = cart.find(item => item.id === product.id && item.unit_status ===
                    product.unit_status);

                if (existingProduct) {
                    existingProduct.quantity += product.quantity; // Increase quantity
                } else {
                    cart.push(product); // Add as a new product if unit type is different
                }

                localStorage.setItem("cart", JSON.stringify(cart));
                Swal.fire({
                    title: 'Success!',
                    text: 'Product added to Cart',
                    icon: 'success',
                    showConfirmButton: false, // Hides the "OK" button
                    timer: 500 // Closes the alert after 500ms
                });
                $('#ProductDetailsModal').addClass('hidden');
            });

            function handleSearch() {
                $('.search-input').on('keyup', function() {
                    const searchValue = $(this).val().toLowerCase();
                    const $products = $('.product');

                    if (!searchValue) {
                        $products.removeClass('highlight');
                        $('#match-count').text("0");
                        $('#match-count-con').addClass("hidden");
                        return;
                    }

                    $products.removeClass('highlight');
                    const $matchedProducts = $products.filter(function() {
                        return $(this).text().toLowerCase().includes(searchValue);
                    });

                    $matchedProducts.addClass('highlight');
                    $('#match-count-con').removeClass("hidden");
                    $('.match-count').text($matchedProducts.length);

                    if ($matchedProducts.length) {
                        $('html, body').animate({
                            scrollTop: $matchedProducts.first().offset().top - ($(window).height() /
                                2) + ($matchedProducts.first().height() / 2)
                        }, 100);
                    }
                });
            }
            handleSearch();

            function scrollHandle() {
                $('.scroll-link').on('click', function(e) {
                    e.preventDefault();
                    let target = $(this).attr('href');
                    let offset = 150;
                    let targetElement = $(target);

                    if (targetElement.length) {
                        $('html, body').animate({
                            scrollTop: targetElement.offset().top - offset
                        }, 400);
                    } else {
                        Swal.fire({
                            title: "@lang('lang.No_product_Find')",
                            text: "@lang('lang.This_category_has_0_product')",
                            icon: "warning",
                        });
                    }
                });
            }

            const defaultLogoUrl = "{{ asset('images/Horeca-green.svg') }}";
            let baseUrl = 'https://horeca-kaya.com/';

            function productDetailF() {
                $(document).on('click', ".productDetailBtn", function() {
                    let url = baseUrl + 'api/getProductDetail/' + $(this).attr('productId');
                    $.ajax({
                        type: "GET",
                        url: url,
                        beforeSend: function() {
                            $('#modalContent').addClass('hidden');
                            $('#modalSpinner').removeClass('hidden');

                            $('#ProductDetailsModal img').attr('src', defaultLogoUrl);
                        },
                        success: function(response) {
                            $('#modalSpinner').addClass('hidden');
                            $('#modalContent').removeClass('hidden');
                            let product = response.products[0];
                            let imagePath = product.image;
                            let finalImageSrc = imagePath.startsWith("storage/") ? baseUrl +
                                imagePath : imagePath;
                            $('#ProductDetailsModal img').attr('src', finalImageSrc);
                            $('#modalTitle').text(product.name);
                            $('#modalTitle').attr("productId", product.id)
                            $('#modalCategory').text(product.category);
                            $('#modalPrice').text("€" + product.rate);
                            $('#modalDescription').text(product.description);



                            if (product.unit_price == 0) {
                                $('#unitOption').prop('disabled', true);
                                $('#unitStatus').val('single').trigger('change');
                            } else {
                                $('#unitOption').prop('disabled', false);
                                $('#unitStatus').trigger('change');
                            }

                            function checkUnitStatus() {
                                let unitStatus = $('#unitStatus').val();
                                if (unitStatus == "single") {
                                    $('#modalPrice').text("€" + product.rate);
                                    $('#weight').val(product.content_weight);
                                } else {
                                    $('#modalPrice').text("€" + product.unit_price);
                                    $('#weight').val(product.package_weight);
                                }
                            }
                            console.log(unitStatus);
                            checkUnitStatus(); // Initial check
                            $('#unitStatus').change(
                                checkUnitStatus); // Bind the event handler


                            // $('#Product_Price').val(product.rate);
                            // $('#Product_id').val(product.id);
                            // $('#productCode').val(product.code);
                            // $('#tax').val(product.tax);

                            // });


                        }
                    });
                    $('#ProductDetailsModal').removeClass('hidden').addClass('flex');
                });
            }

            scrollHandle();
            $('#spinner').removeClass('hidden');

            function getAllProducts() {
                $.ajax({
                    type: "GET",
                    url: 'https://horeca-kaya.com/api/getProducts',
                    success: function(response) {
                        $('#spinner').addClass('hidden');
                        let products = response.products;
                        let uniqueCategories = [];
                        let categoryNames = new Set();
                        let catBgColors = ["#F2FCE4", "#D6D3C4FF", "#ECFFEC", "#FEEFEA", "#FFF3FF"];

                        products.forEach(product => {
                            if (!categoryNames.has(product.category)) {
                                uniqueCategories.push(product);
                                categoryNames.add(product.category);
                            }
                        });

                        uniqueCategories.forEach((category, i) => {
                            let color = catBgColors[i % catBgColors.length];
                            let categoryHTML = `
                        <div class="swiper-slide">
                            <a href="#category-${category.category}" class="h-48 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center justify-center flex-1 scroll-link" style="background-color: ${color};">
                                <div class="w-full h-28 flex justify-center">
                                    <img class="rounded-t-lg pt-6 w-[90%]" loading="lazy" src="${category.category_image !== "null" ? baseUrl + category.category_image : defaultLogoUrl}" alt="${category.category}" />
                                </div>
                                <div class="p-5 pb-8 text-center w-full">
                                    <h5 class="text-lg font-medium tracking-tight text-gray-900 dark:text-white">${category.category}</h5>
                                </div>
                            </a>
                        </div>`;
                            $('.swiper-wrapper').append(categoryHTML);

                            let categoryData = `<li>
                        <a href="#category-${category.category}" class="scroll-link"> 
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                ${category.category}
                            </button>
                        </a>
                    </li>`;
                            $('.category-dropdown').append(categoryData);
                        });

                        let uniqueCategory = [...new Set(products.map(product => product.category))];

                        let index = 0;

                        function addProductWithDelay() {
                            if (index >= products.length) return;
                            let product = products[index];
                            let categorySelector = `#category-${product.category}`;
                            if (!$(categorySelector).length) {
                                $('#product-container').append(`
                            <div class="mt-10">
                                <h2 class="text-2xl font-semibold">${product.category}</h2>
                                <div class="grid xl:grid-cols-6 lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-4 mt-4" id="category-${product.category}"></div>
                            </div>
                        `);
                            }
                            $(categorySelector).append(`
                        <div class="border border-gray productDetailBtn rounded-lg shadow-sm p-4 cursor-pointer productCard product" productId="${product.id}">
                            <div>
                                <div class="relative">
                                    <img loading="lazy" src="${product.image && product.image !== 'null' ? product.image : defaultLogoUrl}" alt="${product.name}" class="w-full md:h-40 h-20 object-contain" onerror="this.onerror=null; this.src='${defaultLogoUrl}'">
                                </div>
                                <div class="mt-4">
                                    <h2 class="md:text-md text-sm font-semibold">${product.name}</h2>
                                    <p class="text-xs md:text-sm text-gray-500">By <span class="text-primary">${product.brand}</span></p>
                                </div>
                            </div>
                        </div>
                    `);
                            index++;
                            setTimeout(addProductWithDelay, 50);
                        }
                        addProductWithDelay();
                        productDetailF();
                        scrollHandle();
                        handleSearch();
                    }
                });
            }
            setTimeout(getAllProducts, 1500);
        });

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            spaceBetween: 25,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
            breakpoints: {
                1380: {
                    slidesPerView: 8,
                    spaceBetween: 20,
                },
                1370: {
                    slidesPerView: 6,
                    spaceBetween: 20,
                },

                820: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 8,
                },

            }
        });
    </script>
@endsection
