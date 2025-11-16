<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <title>@yield('title')</title>
</head>

<body>
    <div class="w-full flex flex-row">
        <div class="hidden lg:block lg:w-[265px] bg-[#0D0E12] fixed right-0 top-0 h-dvh px-5 text-sm">
            <div class="flex justify-center">
                <a href="#" class="right-0 mr-[15px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="269" height="56" viewBox="0 0 269 56" fill="none"
                        class="w-[130px] ">
                        <path
                            d="M93.0855 42H98.5035L99.7635 25.326C99.8895 23.352 99.8055 20.664 99.8055 20.664H99.8895C99.8895 20.664 100.813 23.604 101.527 25.326L106.315 36.876H111.061L115.891 25.326C116.605 23.604 117.487 20.706 117.487 20.706H117.571C117.571 20.706 117.487 23.352 117.613 25.326L118.873 42H124.249L121.855 12.18H116.059L110.221 26.922C109.549 28.686 108.751 31.29 108.751 31.29H108.667C108.667 31.29 107.827 28.686 107.155 26.922L101.317 12.18H95.5215L93.0855 42ZM128.531 31.29C128.531 37.38 132.941 42.504 140.039 42.504C145.373 42.504 148.649 39.438 148.649 39.438L146.591 35.616C146.591 35.616 143.861 37.968 140.417 37.968C137.225 37.968 134.327 36.036 133.991 32.298H148.775C148.775 32.298 148.901 30.87 148.901 30.24C148.901 24.57 145.583 20.076 139.409 20.076C133.025 20.076 128.531 24.696 128.531 31.29ZM134.159 28.644C134.663 25.872 136.553 24.192 139.283 24.192C141.635 24.192 143.441 25.746 143.525 28.644H134.159ZM154.222 34.146C154.222 41.328 160.144 42.21 163.126 42.21C164.134 42.21 164.764 42.084 164.764 42.084V37.422C164.764 37.422 164.386 37.506 163.798 37.506C162.328 37.506 159.556 37.002 159.556 33.474V25.158H164.428V20.916H159.556V14.742H154.348V20.916H151.45V25.158H154.222V34.146ZM169.13 42H174.464V33.516C174.464 32.256 174.59 31.08 174.926 30.03C175.934 26.838 178.496 25.536 180.764 25.536C181.478 25.536 182.024 25.62 182.024 25.62V20.37C182.024 20.37 181.562 20.286 181.058 20.286C177.782 20.286 175.22 22.722 174.254 25.788H174.17C174.17 25.788 174.254 25.074 174.254 24.276V20.58H169.13V42ZM184.023 31.29C184.023 37.884 189.273 42.504 195.825 42.504C202.335 42.504 207.585 37.884 207.585 31.29C207.585 24.738 202.335 20.076 195.783 20.076C189.273 20.076 184.023 24.738 184.023 31.29ZM189.441 31.29C189.441 27.342 192.339 24.612 195.825 24.612C199.269 24.612 202.167 27.342 202.167 31.29C202.167 35.28 199.269 37.968 195.825 37.968C192.339 37.968 189.441 35.28 189.441 31.29ZM211.869 42H217.203V32.172C217.203 31.164 217.287 30.198 217.581 29.316C218.379 26.754 220.479 24.948 223.335 24.948C226.065 24.948 226.737 26.712 226.737 29.316V42H232.029V28.224C232.029 22.554 229.341 20.076 224.595 20.076C220.269 20.076 217.917 22.722 216.993 24.528H216.909C216.909 24.528 216.993 23.856 216.993 23.058V20.58H211.869V42ZM237.627 16.926H242.919V12.18H237.627V16.926ZM237.627 42H242.961V20.58H237.627V42ZM247.27 31.29C247.27 37.506 251.806 42.504 258.904 42.504C264.658 42.504 267.724 39.018 267.724 39.018L265.666 35.238C265.666 35.238 262.978 37.968 259.366 37.968C255.292 37.968 252.688 34.86 252.688 31.248C252.688 27.594 255.25 24.612 259.198 24.612C262.558 24.612 264.784 26.922 264.784 26.922L267.136 23.268C267.136 23.268 264.49 20.076 258.904 20.076C251.806 20.076 247.27 25.2 247.27 31.29Z"
                            fill="white" />
                        <path
                            d="M61.114 2.77686L76.3225 50.1304C77.1517 52.7123 75.2258 55.3535 72.5141 55.3535H61.3307C59.5879 55.3535 58.0457 54.2251 57.5183 52.5641L42.4827 5.21052C41.6637 2.63121 43.5889 0 46.2951 0H57.3056C59.0435 0 60.5826 1.12219 61.114 2.77686Z"
                            fill="#EF305E" />
                        <g filter="url(#filter0_i)">
                            <path
                                d="M46.5485 37.8L35.8243 3.44919C35.1837 1.39729 33.2837 0 31.1341 0C28.5177 0 26.3602 2.05036 26.227 4.66341L24.9187 30.3392C24.8723 31.2511 24.9823 32.1643 25.244 33.0391L31.0656 52.4999C31.5722 54.1934 33.1302 55.3535 34.8978 55.3535H40.3093C42.0503 55.3535 43.5914 54.2274 44.1203 52.5686L46.5267 45.0214C47.2752 42.6736 47.2828 40.1523 46.5485 37.8Z"
                                fill="white" />
                            <path
                                d="M46.5485 37.8L35.8243 3.44919C35.1837 1.39729 33.2837 0 31.1341 0C28.5177 0 26.3602 2.05036 26.227 4.66341L24.9187 30.3392C24.8723 31.2511 24.9823 32.1643 25.244 33.0391L31.0656 52.4999C31.5722 54.1934 33.1302 55.3535 34.8978 55.3535H40.3093C42.0503 55.3535 43.5914 54.2274 44.1203 52.5686L46.5267 45.0214C47.2752 42.6736 47.2828 40.1523 46.5485 37.8Z"
                                fill="url(#paint0_linear)" />
                        </g>
                        <path
                            d="M20.317 0H31.3316C34.0288 0 35.9529 2.61489 35.1505 5.18995L20.2695 52.9475C19.7487 54.619 18.2014 55.7576 16.4506 55.7576H5.43606C2.73888 55.7576 0.814784 53.1427 1.61716 50.5676L16.4981 2.81005C17.019 1.13856 18.5663 0 20.317 0Z"
                            fill="#EF305E" />
                        <defs>
                            <filter id="filter0_i" x="24.9083" y="0" width="22.1854" height="55.3535"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dx="-4" dy="3" />
                                <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1" />
                                <feColorMatrix type="matrix"
                                    values="0 0 0 0 0.904167 0 0 0 0 0.892865 0 0 0 0 0.892865 0 0 0 0.4 0" />
                                <feBlend mode="normal" in2="shape" result="effect1_innerShadow" />
                            </filter>
                            <linearGradient id="paint0_linear" x1="29" y1="24.5" x2="40.5" y2="27.5"
                                gradientUnits="userSpaceOnUse">
                                <stop stop-opacity="0.25" />
                                <stop offset="0.911458" stop-color="white" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </a>
            </div>
            <hr class="text-[darkslategray] mt-2.5">
            <div class="py-5 h-[80%] overflow-y-auto flex flex-col gap-5" style="scrollbar-width: none;">
                <div class="flex flex-row items-start gap-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                        <path fill="white" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                    </svg>
                    <a href="{{ route('home') }}" class="block w-full text-white py-1">
                       خانه
                    </a>
                </div>
                <div class="dashboard">
                    <div class="flex justify-between flex-row-reverse">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 fill-white w-[15px]">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">کسب و کار ها</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 384 512">
                                <path fill="white" d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/>
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('career.careers') }}" class=" text-white py-1">کسب و
                                کار های
                                من</a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('career.create') }}" class=" text-white py-1">ایجاد
                                کسب و کار
                                جدید</a>
                        </li>
                        @if(Auth::user()->type == 'admin')

                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('career.list') }}" class=" text-white py-1">
                                مشاهده همه کسب و کار ها
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dashboard">
                    <div class="flex flex-row-reverse justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 fill-white w-[15px]">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">کاربران</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 448 512">
                                <path fill="white" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.list') }}" class=" text-white py-1">
                                مشاهده همه کاربران
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.adminCreate') }}" class=" text-white py-1">
                                ایجاد ادمین
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dashboard">
                    <div class="flex flex-row-reverse justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 fill-white w-[15px]">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">اسلایدر</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="800px" height="800px"
                                class="w-[30px] h-[30px] fill-white " viewBox="0 0 100 100"
                                enable-background="new 0 0 100 100" xml:space="preserve">
                                <path
                                    d="M22.5,19.7h20c1.4,0,2.5,1.1,2.5,2.5v54.9c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V22.2  C20,20.8,21.1,19.7,22.5,19.7z" />
                                <path
                                    d="M57.5,19.6h20c1.4,0,2.5,1.1,2.5,2.5V42c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V22.1  C55,20.7,56.1,19.6,57.5,19.6z" />
                                <path
                                    d="M57.5,54.6h20c1.4,0,2.5,1.1,2.5,2.5v19.9c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V57.1  C55,55.8,56.1,54.6,57.5,54.6z" />
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('slider.create') }}" class=" text-white py-1">
                                ایجاد اسلایدر
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('slider.list') }}" class=" text-white py-1">
                                لیست اسلایدر
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dashboard">
                    <div class="flex flex-row-reverse justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 fill-white w-[15px]">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">درباره ما</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 640 512">
                                <path fill="white" d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('aboutUs.create_edit') }}" class=" text-white py-1">
                                ایجاد درباره ما
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('aboutUs.list') }}" class=" text-white py-1">
                                لیست درباره ما
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="w-full">
        <header class="w-full fixed top-0 right-0 z-10">
            <div
                class="w-full float-end lg:w-[calc(100%-265px)] py-3 hidden lg:flex flex-row-reverse px-5 backdrop-blur-sm shadowHeader relative z-20">
                <div class="w-6/12 flex flex-row-reverse items-center">
                    <div class="relative hover_profile">
                        <div class="cursor-pointer">
                            @if(!Auth::user()->main_image)
                            <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar" class="size-10 rounded-xl">
                            @else
                            <img src="{{ asset('storage/'.Auth::user()->main_image) }}" alt="user__picture"
                                class="size-10 rounded-xl">
                            @endif
                        </div>
                        <div class="absolute left-0 pt-5 invisible opacity-0 transition-all duration-300">
                            <div class="w-[250px] rounded-xl  py-4 bg-white shadow__all__prof">
                                <div class="text-center px-2">
                                    <span class="font-bold">
                                        {{ Auth::user()->name }} {{ Auth::user()?->family }}
                                    </span>
                                </div>
                                <div class="w-full h-px bg-gray-300 mt-4 "></div>
                                <ul class="rtl text-right ">
                                    <li
                                        class="hover:text-[#1B84FF] hover:bg-[#F1F1F4] mt-1 w-11/12 ml-auto mr-auto rounded-lg">
                                        <a href="{{ route('user.profile', [Auth::user()]) }}"
                                            class="block w-full p-2">پروفایل من</a>
                                    </li>
                                    @if(!Auth::user()->email)
                                    <li
                                        class="hover:text-[#1B84FF] hover:bg-[#F1F1F4]  mt-1 w-11/12 ml-auto mr-auto rounded-lg">
                                        <a href="{{ route('user.compelete_form') }}" class="block w-full p-2">تکمیل
                                            پروفایل</a>
                                    </li>
                                    @endif

                                </ul>

                                <div class="w-full h-px bg-gray-300 my-2 "></div>
                                <div class="rtl text-right ">
                                    <div
                                        class="hover:text-[#1B84FF] hover:bg-[#F1F1F4] flex flex-row justify-between mt-1 w-11/12 ml-auto mr-auto rounded-lg">

                                        <a href="{{ route('user.setting') }}" class="block w-full p-2">تنظیمات اکانت</a>

                                    </div>
                                    <div
                                        class="hover:text-[#1B84FF] hover:bg-[#F1F1F4] flex flex-row justify-between mt-1 w-11/12 ml-auto mr-auto rounded-lg">

                                        <a href="{{ route('user.logout') }}" class="p-2 block w-full">خروج</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-6/12 flex justify-start">
                    <h3 class="text-2xl font-bold text-[#4B5675]">
                        داشبورد
                    </h3>
                </div>
            </div>
            <div
                class="flex lg:hidden flex-row justify-between items-center py-2 px-5 backdrop-blur-sm shadowHeader relative z-20">
                <div class="flex flex-col w-8 h-5 justify-between cursor-pointer"
                    onclick="hamburgerMenu('open', this)">
                    <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                    <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                    <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                </div>
                @if(!Auth::user()->main_image)
                <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar" class="size-16 rounded-xl">
                @else
                <img src="{{ asset('storage/'.Auth::user()->main_image) }}" alt="user__picture"
                    class="size-16 rounded-xl">
                @endif
            </div>
            <!-- hamburger menu -->
            <div class="w-full h-dvh fixed top-0 -left-full bg-black/50 flex flex-row z-50 transition-all duration-500">
                <div class="w-1/3 bg-inherit h-full" onclick="hamburgerMenu('close', this)"></div>
                <div class="w-2/3 bg-white h-full p-2 flex flex-col justify-between">
                    <div>
                        <div class="flex flex-row items-center gap-3 pb-2 border-b border-gray-300">
                            <div>
                                @if(!Auth::user()->main_image)
                                <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar"
                                    class="size-16 rounded-xl">
                                @else
                                <img src="{{ asset('storage/'.Auth::user()->main_image) }}" alt="user__picture"
                                    class="size-16 rounded-xl">
                                @endif
                            </div>
                            <div>
                                <span class="text-lg text-gray-700 font-semibold">{{ Auth::user()->name }} {{
                                    Auth::user()?->family }}</span>
                            </div>
                        </div>
                        <div class="pt-2">
                            <h3 class="text-md font-semibold text-gray-800 mb-1.5">کسب و کار ها</h3>
                            <ul class="pr-3.5">
                                <li>
                                    <a href="{{ route('home') }}" class="block text-gray-700 py-2 text-md">
                                        خانه 
                                    </a>
                                </li>
                                @if(!Auth::user()->email)
                                <li>
                                    <a href="{{ route('user.compelete_form') }}" class="block text-gray-700 py-2 text-md">
                                        تکمیل پروفایل
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ route('user.setting') }}" class="block text-gray-700 py-2 text-md">
                                        تنظیمات اکانت
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('career.careers') }}"
                                        class="block text-gray-700 py-2 text-md">کسب و کار های
                                        من</a>
                                </li>
                                <li>
                                    <a href="{{ route('career.create') }}"
                                        class="block text-gray-700 py-2 text-md">ایجاد کسب و کار
                                        جدید</a>
                                </li>
                                <li>
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('career.list') }}" class="block text-gray-700 py-2 text-md">
                                        مشاهده همه کسب و کار ها
                                    </a>
                                </li>
                                @if(Auth::user()->type == 'admin')
                                <li>
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('user.list') }}" class="block text-gray-700 py-2 text-md">
                                        مشاهده همه کاربران
                                    </a>
                                </li>
                                <li>
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('user.adminCreate') }}" class="block text-gray-700 py-2 text-md">
                                        ایجاد ادمین
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('user.logout') }}"
                            class="block text-rose-700 py-1 font-medium text-sm text-center">خروج از حساب کاربری</a>
                    </div>
                </div>
            </div>
            <!-- hamburger menu end -->
        </header>
        <div class="w-full lg:w-[calc(100%-265px)] float-end mt-20 lg:px-5 overflow-y-auto px-5"
            style="scrollbar-width:none;">
            @yield('content')
        </div>
    </div>
    </div>
    <script src="{{ asset('assets/js/userPanel.js') }}"></script>
</body>

</html>