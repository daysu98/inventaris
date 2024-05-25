@extends('layouts.main-front')

@section('title', 'Gudang Pintar untuk Bisnis Anda')

@section('content')
    <!-- ===== Header Start ===== -->
    <header class="sticky top-0 z-999 flex w-full bg-white drop-shadow-1 dark:bg-boxdark dark:drop-shadow-none">
        <div class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11">
            <div class="flex items-center gap-2 sm:gap-4">
                <a class="flex items-center gap-4" href="{{ route('welcome') }}">
                    <img src="{{ asset('assets/src/images/logo/logo-icon.svg') }}" alt="Logo" />
                    <h1 class="font-bold text-2xl hidden   sm:block">{{ config('app.name') }}</h1>
                </a>
            </div>

            <div class="flex items-center gap-3 2xsm:gap-7">
                <ul class="flex items-center gap-2 2xsm:gap-4">
                    <!-- Dark Mode Toggler -->
                    <li>
                        <label :class="darkMode ? 'bg-primary' : 'bg-stroke'" class="relative m-0 block h-7.5 w-14 rounded-full">
                            <input type="checkbox" :value="darkMode" @change="darkMode = !darkMode" class="absolute top-0 z-50 m-0 h-full w-full cursor-pointer opacity-0" />
                            <span :class="darkMode && '!right-1 !translate-x-full'" class="absolute left-1 top-1/2 flex h-6 w-6 -translate-y-1/2 translate-x-0 items-center justify-center rounded-full bg-white shadow-switcher duration-75 ease-linear">
                                <span class="dark:hidden">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.99992 12.6666C10.5772 12.6666 12.6666 10.5772 12.6666 7.99992C12.6666 5.42259 10.5772 3.33325 7.99992 3.33325C5.42259 3.33325 3.33325 5.42259 3.33325 7.99992C3.33325 10.5772 5.42259 12.6666 7.99992 12.6666Z" fill="#969AA1" />
                                        <path
                                            d="M8.00008 15.3067C7.63341 15.3067 7.33342 15.0334 7.33342 14.6667V14.6134C7.33342 14.2467 7.63341 13.9467 8.00008 13.9467C8.36675 13.9467 8.66675 14.2467 8.66675 14.6134C8.66675 14.9801 8.36675 15.3067 8.00008 15.3067ZM12.7601 13.4267C12.5867 13.4267 12.4201 13.3601 12.2867 13.2334L12.2001 13.1467C11.9401 12.8867 11.9401 12.4667 12.2001 12.2067C12.4601 11.9467 12.8801 11.9467 13.1401 12.2067L13.2267 12.2934C13.4867 12.5534 13.4867 12.9734 13.2267 13.2334C13.1001 13.3601 12.9334 13.4267 12.7601 13.4267ZM3.24008 13.4267C3.06675 13.4267 2.90008 13.3601 2.76675 13.2334C2.50675 12.9734 2.50675 12.5534 2.76675 12.2934L2.85342 12.2067C3.11342 11.9467 3.53341 11.9467 3.79341 12.2067C4.05341 12.4667 4.05341 12.8867 3.79341 13.1467L3.70675 13.2334C3.58008 13.3601 3.40675 13.4267 3.24008 13.4267ZM14.6667 8.66675H14.6134C14.2467 8.66675 13.9467 8.36675 13.9467 8.00008C13.9467 7.63341 14.2467 7.33342 14.6134 7.33342C14.9801 7.33342 15.3067 7.63341 15.3067 8.00008C15.3067 8.36675 15.0334 8.66675 14.6667 8.66675ZM1.38675 8.66675H1.33341C0.966748 8.66675 0.666748 8.36675 0.666748 8.00008C0.666748 7.63341 0.966748 7.33342 1.33341 7.33342C1.70008 7.33342 2.02675 7.63341 2.02675 8.00008C2.02675 8.36675 1.75341 8.66675 1.38675 8.66675ZM12.6734 3.99341C12.5001 3.99341 12.3334 3.92675 12.2001 3.80008C11.9401 3.54008 11.9401 3.12008 12.2001 2.86008L12.2867 2.77341C12.5467 2.51341 12.9667 2.51341 13.2267 2.77341C13.4867 3.03341 13.4867 3.45341 13.2267 3.71341L13.1401 3.80008C13.0134 3.92675 12.8467 3.99341 12.6734 3.99341ZM3.32675 3.99341C3.15341 3.99341 2.98675 3.92675 2.85342 3.80008L2.76675 3.70675C2.50675 3.44675 2.50675 3.02675 2.76675 2.76675C3.02675 2.50675 3.44675 2.50675 3.70675 2.76675L3.79341 2.85342C4.05341 3.11342 4.05341 3.53341 3.79341 3.79341C3.66675 3.92675 3.49341 3.99341 3.32675 3.99341ZM8.00008 2.02675C7.63341 2.02675 7.33342 1.75341 7.33342 1.38675V1.33341C7.33342 0.966748 7.63341 0.666748 8.00008 0.666748C8.36675 0.666748 8.66675 0.966748 8.66675 1.33341C8.66675 1.70008 8.36675 2.02675 8.00008 2.02675Z"
                                            fill="#969AA1" />
                                    </svg>
                                </span>
                                <span class="hidden dark:inline-block">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.3533 10.62C14.2466 10.44 13.9466 10.16 13.1999 10.2933C12.7866 10.3667 12.3666 10.4 11.9466 10.38C10.3933 10.3133 8.98659 9.6 8.00659 8.5C7.13993 7.53333 6.60659 6.27333 6.59993 4.91333C6.59993 4.15333 6.74659 3.42 7.04659 2.72666C7.33993 2.05333 7.13326 1.7 6.98659 1.55333C6.83326 1.4 6.47326 1.18666 5.76659 1.48C3.03993 2.62666 1.35326 5.36 1.55326 8.28666C1.75326 11.04 3.68659 13.3933 6.24659 14.28C6.85993 14.4933 7.50659 14.62 8.17326 14.6467C8.27993 14.6533 8.38659 14.66 8.49326 14.66C10.7266 14.66 12.8199 13.6067 14.1399 11.8133C14.5866 11.1933 14.4666 10.8 14.3533 10.62Z"
                                            fill="#969AA1" />
                                    </svg>
                                </span>
                            </span>
                        </label>
                    </li>
                    <!-- Dark Mode Toggler End -->
                    @guest
                        <!-- Authentication Button -->
                        <li>
                            <div class="flex flex-wrap gap-5 xl:gap-7.5">
                                <a href="{{ route('loginView') }}" class="inline-flex items-center justify-center gap-2.5 rounded-md bg-primary px-5 py-2 text-center font-medium text-white hover:bg-opacity-90">
                                    <span>
                                        <svg class="fill-current " width="20" height="20" fill="none" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="" stroke="none">
                                                <path d="M1666 5104 c-313 -57 -561 -290 -648 -609 -20 -75 -21 -103 -22 -420
                                                               -1 -330 0 -341 20 -380 49 -90 125 -139 220 -138 67 1 111 18 162 67 67 62 66
                                                               58 73 416 5 305 7 328 27 381 32 80 90 142 170 181 l67 33 1150 3 c1131 2
                                                               1151 2 1217 -18 84 -25 164 -95 205 -178 l28 -57 0 -1825 0 -1825 -28 -57
                                                               c-41 -83 -121 -153 -205 -178 -66 -20 -86 -20 -1217 -18 l-1150 3 -67 33 c-80
                                                               39 -138 101 -170 181 -21 53 -22 74 -27 421 -7 402 -5 392 -73 457 -45 44
                                                               -100 65 -169 64 -91 0 -165 -48 -213 -136 -20 -39 -21 -50 -20 -420 0 -357 2
                                                               -385 22 -460 80 -296 303 -520 596 -598 l81 -22 1220 0 1220 0 88 28 c105 33
                                                               171 65 252 122 165 117 285 302 326 499 18 87 19 172 19 1906 0 1734 -1 1819
                                                               -19 1906 -62 300 -287 538 -594 627 -71 21 -86 21 -1267 23 -1002 2 -1208 0
                                                               -1274 -12z" />
                                                <path d="M2546 3646 c-94 -35 -157 -122 -158 -218 -1 -105 4 -113 270 -380
                                                               l246 -248 -1198 0 c-912 0 -1209 -3 -1240 -12 -86 -26 -166 -136 -166 -228 0
                                                               -92 80 -202 166 -228 31 -9 328 -12 1240 -12 l1199 0 -242 -242 c-132 -134
                                                               -249 -259 -259 -278 -25 -47 -24 -152 0 -200 58 -112 170 -160 292 -125 58 16
                                                               64 21 516 473 310 310 463 471 479 502 30 58 32 157 5 215 -26 55 -916 945
                                                               -969 969 -53 24 -133 29 -181 12z" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="hidden sm:flex">Sign In</span>
                                </a>

                                <a href="{{ route('registerView') }}" class="inline-flex items-center justify-center gap-2.5 rounded-md border border-primary px-5 py-2 text-center font-medium text-primary  hover:bg-primary">
                                    <span>
                                        <svg class="fill-current " width="20" height="20" fill="none" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="" stroke="none">
                                                <path d="M2245 4835 c-236 -44 -449 -156 -620 -329 -240 -241 -359 -551 -342
                                                                  -886 33 -626 544 -1110 1172 -1110 320 0 606 119 831 345 130 132 226 289 282
                                                                  465 42 133 56 226 56 365 -2 536 -359 995 -881 1132 -125 32 -371 41 -498 18z" />
                                                <path d="M3600 2499 c-162 -19 -362 -96 -501 -190 -81 -55 -198 -166 -260
                                                                  -248 -65 -86 -153 -264 -183 -373 -69 -241 -51 -511 48 -740 140 -324 408
                                                                  -552 763 -650 67 -18 105 -22 263 -22 170 0 193 2 285 27 117 32 258 97 359
                                                                  167 87 60 211 183 273 271 66 93 140 253 170 366 34 130 42 336 19 470 -79
                                                                  454 -437 822 -883 907 -106 20 -261 27 -353 15z m218 -606 c15 -11 37 -35 50
                                                                  -53 20 -30 22 -45 22 -161 l0 -129 113 0 c133 0 170 -9 214 -52 59 -57 64
                                                                  -146 12 -212 -35 -45 -57 -51 -199 -56 l-135 -5 -5 -135 c-5 -142 -11 -164
                                                                  -56 -199 -66 -52 -155 -47 -212 12 -43 44 -52 81 -52 214 l0 113 -129 0 c-116
                                                                  0 -131 2 -161 23 -77 52 -100 138 -58 211 39 67 74 80 220 84 l126 4 4 126 c4
                                                                  146 17 181 84 220 48 28 121 26 162 -5z" />
                                                <path d="M2160 2313 c-235 -18 -509 -64 -725 -124 -650 -178 -1077 -517 -1155
                                                                  -915 -7 -37 -10 -145 -8 -294 3 -231 3 -236 30 -292 34 -73 103 -142 176 -176
                                                                  l57 -27 1109 -3 1109 -2 -27 32 c-231 284 -338 595 -322 933 14 302 119 573
                                                                  309 797 l55 65 -51 7 c-52 6 -472 5 -557 -1z" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="hidden sm:flex">Sign Up</span>
                                </a>
                            </div>
                        </li>
                        <!-- Authentication Button End -->
                    @endguest
                    @auth
                        <!-- User Area -->
                        <li>
                            <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                                <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = ! dropdownOpen">
                                    <span class="hidden text-right lg:block">
                                        <span class="block text-sm font-medium text-black dark:text-white">{{ auth()->user()->name }}</span>
                                        <span class="block text-xs font-medium">{{ auth()->user()->email }}</span>
                                    </span>

                                    <span class="h-12 w-12 rounded-full">
                                        <img src="{{ asset('assets/src/images/user/user-01.png') }}" alt="User" />
                                    </span>

                                    <svg :class="dropdownOpen && 'rotate-180'" class="hidden fill-current sm:block" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z"
                                            fill="" />
                                    </svg>
                                </a>

                                <!-- Dropdown Start -->
                                <div x-show="dropdownOpen" class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                                    <ul class="flex flex-col border-b border-stroke  dark:border-strokedark">
                                        <li>
                                            <a href="{{ route('dashboard') }}" class="flex items-center gap-3.5 hover:bg-gray px-6 py-4 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.10322 0.956299H2.53135C1.5751 0.956299 0.787598 1.7438 0.787598 2.70005V6.27192C0.787598 7.22817 1.5751 8.01567 2.53135 8.01567H6.10322C7.05947 8.01567 7.84697 7.22817 7.84697 6.27192V2.72817C7.8751 1.7438 7.0876 0.956299 6.10322 0.956299ZM6.60947 6.30005C6.60947 6.5813 6.38447 6.8063 6.10322 6.8063H2.53135C2.2501 6.8063 2.0251 6.5813 2.0251 6.30005V2.72817C2.0251 2.44692 2.2501 2.22192 2.53135 2.22192H6.10322C6.38447 2.22192 6.60947 2.44692 6.60947 2.72817V6.30005Z"
                                                        fill="" />
                                                    <path
                                                        d="M15.4689 0.956299H11.8971C10.9408 0.956299 10.1533 1.7438 10.1533 2.70005V6.27192C10.1533 7.22817 10.9408 8.01567 11.8971 8.01567H15.4689C16.4252 8.01567 17.2127 7.22817 17.2127 6.27192V2.72817C17.2127 1.7438 16.4252 0.956299 15.4689 0.956299ZM15.9752 6.30005C15.9752 6.5813 15.7502 6.8063 15.4689 6.8063H11.8971C11.6158 6.8063 11.3908 6.5813 11.3908 6.30005V2.72817C11.3908 2.44692 11.6158 2.22192 11.8971 2.22192H15.4689C15.7502 2.22192 15.9752 2.44692 15.9752 2.72817V6.30005Z"
                                                        fill="" />
                                                    <path
                                                        d="M6.10322 9.92822H2.53135C1.5751 9.92822 0.787598 10.7157 0.787598 11.672V15.2438C0.787598 16.2001 1.5751 16.9876 2.53135 16.9876H6.10322C7.05947 16.9876 7.84697 16.2001 7.84697 15.2438V11.7001C7.8751 10.7157 7.0876 9.92822 6.10322 9.92822ZM6.60947 15.272C6.60947 15.5532 6.38447 15.7782 6.10322 15.7782H2.53135C2.2501 15.7782 2.0251 15.5532 2.0251 15.272V11.7001C2.0251 11.4188 2.2501 11.1938 2.53135 11.1938H6.10322C6.38447 11.1938 6.60947 11.4188 6.60947 11.7001V15.272Z"
                                                        fill="" />
                                                    <path
                                                        d="M15.4689 9.92822H11.8971C10.9408 9.92822 10.1533 10.7157 10.1533 11.672V15.2438C10.1533 16.2001 10.9408 16.9876 11.8971 16.9876H15.4689C16.4252 16.9876 17.2127 16.2001 17.2127 15.2438V11.7001C17.2127 10.7157 16.4252 9.92822 15.4689 9.92822ZM15.9752 15.272C15.9752 15.5532 15.7502 15.7782 15.4689 15.7782H11.8971C11.6158 15.7782 11.3908 15.5532 11.3908 15.272V11.7001C11.3908 11.4188 11.6158 11.1938 11.8971 11.1938H15.4689C15.7502 11.1938 15.9752 11.4188 15.9752 11.7001V15.272Z"
                                                        fill="" />
                                                </svg>
                                                Dashboard
                                            </a>
                                        </li>
                                    </ul>
                                    <a href="{{ route('logout') }}" class="flex items-center gap-3.5 px-6 py-4 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                                        <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.5375 0.618744H11.6531C10.7594 0.618744 10.0031 1.37499 10.0031 2.26874V4.64062C10.0031 5.05312 10.3469 5.39687 10.7594 5.39687C11.1719 5.39687 11.55 5.05312 11.55 4.64062V2.23437C11.55 2.16562 11.5844 2.13124 11.6531 2.13124H15.5375C16.3625 2.13124 17.0156 2.78437 17.0156 3.60937V18.3562C17.0156 19.1812 16.3625 19.8344 15.5375 19.8344H11.6531C11.5844 19.8344 11.55 19.8 11.55 19.7312V17.3594C11.55 16.9469 11.2062 16.6031 10.7594 16.6031C10.3125 16.6031 10.0031 16.9469 10.0031 17.3594V19.7312C10.0031 20.625 10.7594 21.3812 11.6531 21.3812H15.5375C17.2219 21.3812 18.5625 20.0062 18.5625 18.3562V3.64374C18.5625 1.95937 17.1875 0.618744 15.5375 0.618744Z"
                                                fill="" />
                                            <path
                                                d="M6.05001 11.7563H12.2031C12.6156 11.7563 12.9594 11.4125 12.9594 11C12.9594 10.5875 12.6156 10.2438 12.2031 10.2438H6.08439L8.21564 8.07813C8.52501 7.76875 8.52501 7.2875 8.21564 6.97812C7.90626 6.66875 7.42501 6.66875 7.11564 6.97812L3.67814 10.4844C3.36876 10.7938 3.36876 11.275 3.67814 11.5844L7.11564 15.0906C7.25314 15.2281 7.45939 15.3312 7.66564 15.3312C7.87189 15.3312 8.04376 15.2625 8.21564 15.125C8.52501 14.8156 8.52501 14.3344 8.21564 14.025L6.05001 11.7563Z"
                                                fill="" />
                                        </svg>
                                        Log Out
                                    </a>
                                </div>
                                <!-- Dropdown End -->
                            </div>
                        </li>
                        <!-- User Area End -->
                    @endauth
                </ul>
            </div>
        </div>
    </header>
    <!-- ===== Header End ===== -->
    <!-- ===== Main Content Start ===== -->
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
                @foreach ($items as $item)
                    <!-- Card Item Start -->
                    <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                        <div class="flex  items-center justify-center rounded-lg bg-meta-2 dark:bg-meta-4">
                            <img width="400" src="{{ asset(@$item->photo ? 'storage/' . $item->photo : 'assets/img/no-image.jpg') }}" alt="">
                        </div>

                        <div class="mt-4 flex items-end justify-between">
                            <div>
                                <h4 class="text-title-md font-bold text-black dark:text-white">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </h4>
                            </div>

                            <span class="flex items-center gap-1 text-sm font-medium text-meta-3">
                                stok: {{ number_format($item->stock, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="mt-4">
                            <p style="text-align: justify;">
                                {{ $item->description }}
                            </p>
                        </div>
                    </div>
                    <!-- Card Item End -->
                @endforeach
            </div>
        </div>
    </main>
    <!-- ===== Main Content End ===== -->
@endsection
