@extends('client.document')
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/tailwind.js') }}"></script>
@section('title', 'فامنو | منوی دیجیتال کسب و کار شما')
@section('content')
    <style>
        .money {
            background: #86dbd8;
            background: linear-gradient(0deg, rgba(134, 219, 216, 1) 31%, rgba(89, 207, 203, 1) 80%);
        }

        .language {
            background: linear-gradient(0deg, rgb(197, 147, 220) 31%, rgb(173, 134, 219) 80%);
        }

        .print {
            background: linear-gradient(0deg, rgba(235, 50, 84, 0.85) 31%, rgba(245, 50, 84, 1) 80%);
        }

        .food {
            background: linear-gradient(0deg, rgba(254, 178, 26, 0.85) 31%, rgba(254, 178, 26, 1) 80%);
        }

        .computer {
            background: linear-gradient(0deg, rgb(112, 108, 233) 31%, rgb(90, 86, 201) 80%);
        }

        .building {
            background: linear-gradient(0deg, rgba(171, 135, 109, 0.8) 31%, rgb(171, 135, 109) 80%);
        }

        .car {
            background: linear-gradient(0deg, rgb(111, 203, 98) 31%, rgb(81, 173, 62) 80%);
        }

        .group {
            background: #ffbe6e;
            background: linear-gradient(0deg, rgba(255, 190, 110, 1) 31%, rgba(255, 160, 18, 1) 80%);
        }

        .group > img, .money > img {
            filter: drop-shadow(0 0 0.25rem white);
        }

        .selectItems::after {
            content: "";
            position: absolute;
            width: 0px;
            height: 3px;
            bottom: 0;
            right: 0;
            background-color: #eb3254;
            border-radius: 4px;
        }

        .selected::after {
            content: "";
            position: absolute;
            width: 100%;
            transition: all 300ms ease-out;
        }
    </style>
    <div class="items-center bg-white py-5 rounded-[20px] w-[95%] mx-auto">
        <div class="w-11/12 mx-auto flex flex-row gap-5">
            <a href="#"
               class="text-sm font-bold flex flex-col items-center rounded-3xl w-1/2 money text-white py-2 relative h-24">
                <img src="{{ asset('assets/img/income2.png') }}" class="size-24 absolute top-4 -right-5" alt="">
                <div class="absolute top-4 left-4 text-lg flex flex-col items-end gap-4">
                    <span>
                        درآمد زایی
                    </span>
                    <span class="text-xs font-bold">
                        کلیک کنید
                    </span>
                </div>
            </a>
            <a href="#"
               class="text-sm font-bold flex flex-col items-center rounded-3xl w-1/2 group text-white py-2 relative h-24">
                <img src="{{ asset('assets/img/group2.png') }}" class="size-26 absolute top-6 -right-5" alt="">
                <div class="absolute top-4 left-2 text-lg flex flex-col items-end gap-4">
                    <span>
                        خرید گروهی
                    </span>
                    <span class="text-xs font-bold">
                        کلیک کنید
                    </span>
                </div>
            </a>
        </div>
    </div>
    <div class="w-full pt-1 samim">


        <section>
            {{-- <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">پیشنهادات ویژه</h1>
                <a class="text-[13px] text-[#00a692]" href="#">مشاهده همه</a>
            </div> --}}
            <div class="my-3 bg-white p-5 rounded-[20px] w-[95%] mx-auto">

                <div class="flex flex-row justify-between items-center gap-1.5">

                    <h3 class="lg:text-xl text-sm font-bold">خدمات</h3>

                    {{--                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-[#59cfcb]" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M215 62.8l4.9-24.3-15.7-3.1 15.7 3.1c.3-1.5 1-2.8 1.9-3.8C232.9 32.9 244.4 32 256 32s23.1 .9 34.2 2.6c1 1.1 1.6 2.4 1.9 3.8L297 62.8c2.9 14.4 13.2 25.2 25.5 30.3l0 0 1.5 .6 0 0c12.3 5.2 27.3 4.8 39.5-3.3l20.6-13.8c1.2-.8 2.6-1.3 4.1-1.3c9.1 6.7 17.7 14 25.6 21.9l.8 .8 0 0c7.9 8 15.3 16.5 21.9 25.6c-.1 1.4-.5 2.8-1.3 4.1l-13.8 20.6c-8.1 12.2-8.5 27.1-3.3 39.5l0 0 .6 1.5 0 0c5.1 12.4 15.9 22.6 30.3 25.5l24.3 4.9c1.5 .3 2.8 1 3.8 1.9c1.7 11.1 2.6 22.4 2.6 34v.4c0 11.6-.9 22.9-2.6 34c-1.1 1-2.4 1.6-3.8 1.9L449.2 297c-14.4 2.9-25.2 13.2-30.3 25.5l0 0-.6 1.5 0 0c-5.2 12.3-4.8 27.3 3.3 39.5l13.8 20.6c.8 1.2 1.3 2.6 1.3 4.1c-13.6 18.5-29.9 34.9-48.4 48.4c-1.4-.1-2.8-.5-4.1-1.3l-20.6-13.8c-12.2-8.1-27.1-8.5-39.5-3.3l0 0-1.5 .6 0 0c-12.4 5.1-22.6 15.9-25.5 30.3l-4.9 24.3c-.3 1.5-1 2.8-1.9 3.8c-11.1 1.7-22.6 2.6-34.2 2.6s-23.1-.9-34.2-2.6c-1-1.1-1.6-2.4-1.9-3.8L215 449.2c-2.9-14.4-13.2-25.2-25.5-30.3l0 0-1.5-.6 0 0c-12.3-5.2-27.3-4.8-39.5 3.3l-20.6 13.8c-1.2 .8-2.6 1.3-4.1 1.3c-18.5-13.6-34.9-29.9-48.4-48.4c.1-1.4 .5-2.8 1.3-4.1l13.8-20.6c8.1-12.2 8.5-27.1 3.3-39.5l0 0-.6-1.5 0 0c-5.1-12.4-15.9-22.6-30.3-25.5l-24.3-4.9c-1.5-.3-2.8-1-3.8-1.9C32.9 279.1 32 267.6 32 256s.9-23.1 2.6-34.2c1.1-1 2.4-1.6 3.8-1.9L62.8 215c14.4-2.9 25.2-13.2 30.3-25.5l0 0 .6-1.5 0 0c5.2-12.3 4.8-27.3-3.3-39.5L76.6 127.7c-.8-1.2-1.3-2.6-1.3-4.1c6.7-9.1 14-17.7 22-25.7l.8-.8 0 0c8-7.9 16.6-15.3 25.7-22c1.4 .1 2.8 .5 4.1 1.3l20.6 13.8c12.2 8.1 27.1 8.5 39.5 3.3l0 0 1.5-.6 0 0c12.4-5.1 22.7-15.9 25.5-30.3zM256 0c-14.8 0-29.3 1.3-43.4 3.7c-2 .3-3.9 1-5.6 2.1c-9.4 5.6-16.3 15.1-18.6 26.4l-4.9 24.3c-.5 2.6-2.6 5.4-6.3 6.9l0 0-.1 0-1.7 .7 0 0-.1 0c-3.7 1.5-7.1 1-9.4-.4L145.5 50c-9.6-6.4-21.2-8.2-31.7-5.6c-1.9 .5-3.8 1.3-5.4 2.5C96.6 55.2 85.6 64.4 75.4 74.5l0 0-.8 .8 0 0C64.4 85.6 55.2 96.6 46.9 108.3c-1.2 1.6-2 3.5-2.5 5.4c-2.6 10.6-.8 22.1 5.6 31.7l13.8 20.6c1.5 2.2 2 5.7 .4 9.4l0 .1-.7 1.7 0 0 0 .1c-1.5 3.7-4.3 5.8-6.9 6.3l-24.3 4.9c-11.4 2.3-20.8 9.2-26.4 18.6c-1 1.7-1.7 3.6-2.1 5.6C1.3 226.7 0 241.2 0 256s1.3 29.3 3.7 43.4c.3 2 1 3.9 2.1 5.6c5.6 9.4 15.1 16.3 26.4 18.6l24.3 4.9c2.6 .5 5.4 2.6 6.9 6.3l0 .1 .7 1.7 0 .1c1.5 3.7 1 7.1-.4 9.4L50 366.5c-6.4 9.6-8.2 21.2-5.6 31.7c.5 1.9 1.3 3.8 2.5 5.4c16.8 23.8 37.6 44.6 61.5 61.5c1.6 1.2 3.5 2 5.4 2.5c10.6 2.6 22.1 .8 31.7-5.6l20.6-13.8c2.2-1.5 5.7-2 9.4-.4l.1 0 1.7 .7 .1 0c3.7 1.5 5.8 4.3 6.3 6.9l4.9 24.3c2.3 11.4 9.2 20.8 18.6 26.4c1.7 1 3.6 1.7 5.6 2.1c14.1 2.4 28.6 3.7 43.4 3.7s29.3-1.3 43.4-3.7c2-.3 3.9-1 5.6-2.1c9.4-5.6 16.3-15.1 18.6-26.4l4.9-24.3c.5-2.6 2.6-5.4 6.3-6.9l.1 0 1.7-.7 .1 0c3.7-1.5 7.1-1 9.4 .4L366.5 462c9.6 6.4 21.2 8.2 31.7 5.6c1.9-.5 3.8-1.3 5.4-2.5c23.8-16.8 44.6-37.6 61.5-61.4c1.2-1.6 2-3.5 2.5-5.4c2.6-10.6 .8-22.1-5.6-31.7l-13.8-20.6c-1.5-2.2-2-5.7-.4-9.4l0-.1 .7-1.7 0-.1c1.5-3.7 4.3-5.8 6.9-6.3l24.3-4.9-3.1-15.7 3.1 15.7c11.4-2.3 20.8-9.2 26.4-18.6c1-1.7 1.7-3.6 2.1-5.6c2.4-14 3.7-28.5 3.7-43.2v0-.4 0c0-14.7-1.3-29.1-3.7-43.2c-.3-2-1-3.9-2.1-5.6c-5.6-9.4-15.1-16.3-26.4-18.6l-24.3-4.9c-2.6-.5-5.4-2.6-6.9-6.3l0-.1-.7-1.7 0-.1c-1.5-3.7-1-7.1 .4-9.4L462 145.5c6.4-9.6 8.2-21.2 5.6-31.7c-.5-1.9-1.3-3.8-2.5-5.4c-8.3-11.7-17.5-22.7-27.6-32.9l0 0-.9-.9 0 0c-10.1-10.1-21.1-19.3-32.9-27.6c-1.6-1.2-3.5-2-5.4-2.5c-10.6-2.6-22.1-.8-31.7 5.6L345.9 63.7c-2.2 1.5-5.7 2-9.4 .4l-.1 0-1.7-.7-.1 0c-3.7-1.5-5.8-4.3-6.3-6.9l-4.9-24.3c-2.3-11.4-9.2-20.8-18.6-26.4c-1.7-1-3.6-1.7-5.6-2.1C285.3 1.3 270.8 0 256 0zM192 256a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm160 0a96 96 0 1 0 -192 0 96 96 0 1 0 192 0z"/></svg>--}}
                </div>
                <div class="w-full grid grid-cols-4 gap-3 mt-4">
                    <a href="#" class="flex flex-col items-center gap-2 py-1.5 relative overflow-hidden selectItems">
                        <div class="rounded-lg size-14 money flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-10 fill-white" viewBox="0 0 512 512">
                                <path d="M317.9 422.7C296.4 465.6 272.7 480 256 480c-7.9 0-17.3-3.2-27.3-11l-6.9 18.6c-2.9 7.8-7.7 14.7-13.9 19.9c15.6 3 31.6 4.5 48.1 4.5c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256c0 16.4 1.5 32.5 4.5 48.1c5.3-6.2 12.1-11 19.9-13.9l9.6-3.5c-1.4-10-2.1-20.2-2.1-30.6c0-22.2 3.2-43.7 9.3-64H132c-2.5 19.2-3.9 39.3-4 60l32.2-11.9c.5-16.7 1.9-32.8 4.1-48.1H347.7c2.8 20.2 4.3 41.7 4.3 64s-1.5 43.8-4.3 64H283.6l-11.8 32H342c-5.9 27-14.2 50.9-24.1 70.7zM194.1 89.3C215.6 46.4 239.3 32 256 32s40.4 14.4 61.9 57.3c9.9 19.8 18.2 43.7 24.1 70.7H170c5.9-27 14.2-50.9 24.1-70.7zM384 256c0-22.1-1.4-43.5-4-64h90.8c6 20.3 9.3 41.8 9.3 64s-3.2 43.7-9.3 64H380c2.6-20.5 4-41.9 4-64zm-9.3-96c-9.6-47.6-26.2-88-47.2-116.3c57.8 19.5 105 61.8 130.9 116.3H374.7zM53.6 160c25.9-54.5 73.1-96.9 130.9-116.3c-21 28.3-37.5 68.8-47.2 116.3H53.6zM374.7 352h83.8c-25.9 54.5-73.1 96.9-130.9 116.3c21-28.3 37.6-68.8 47.2-116.3zM271 261.5c2.2-5.9 .7-12.4-3.7-16.8s-11-5.9-16.8-3.7l-215 79.2c-6.2 2.3-10.3 8.1-10.5 14.7s3.8 12.6 9.9 15.1l74 30.5L4.7 484.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L131.5 403.1l30.5 74c2.5 6.1 8.5 10 15.1 9.9s12.4-4.3 14.7-10.5l79.2-215zM143.3 360L85.1 336 229 283 176 426.9l-24-58.2c-1.6-3.9-4.8-7.1-8.7-8.7z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-800 text-center">
                           طراحی سایت
                        </span>
                    </a>

                    <a href="{{ route('career.careersList') }}"
                       class="flex flex-col items-center gap-2 rounded-lg py-1.5 relative overflow-hidden selectItems">

                        <div class="rounded-lg size-14 food flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-10 fill-white" viewBox="0 0 640 512">
                                <path d="M151.6 2.4c4.7-2.9 10.6-3.2 15.6-.7l64 32c5.4 2.7 8.8 8.3 8.8 14.3V266.4c-8.5 2.4-19 4.3-32 5.1V57.9l-32-16V271.5c-13-.9-23.5-2.7-32-5.1V16c0-5.5 2.9-10.7 7.6-13.6zM279.1 233.8c-1 4-2.9 9-7.1 14.1V208.6L299.1 84.5 272 89.9V57.3l44.9-9c5.3-1.1 10.8 .6 14.6 4.5s5.4 9.4 4.2 14.6l-28.4 130c-15.5 8-24.9 23.6-28 36.4zm88.7-55.6c-10.2 4.1-19.5 8.8-28.1 13.7h-7.2l19.8-99.1c1.7-8.7 10.2-14.3 18.8-12.6s14.3 10.2 12.6 18.8l-15.8 79.1zM192 304c27.6 0 48.8-3.7 65.2-9.5c-.9 6.3-1.2 12.4-1.2 18.1c0 5.3 .7 10.3 2.1 15.2c-18.6 5.3-40.4 8.2-66.1 8.2c-49.1 0-84.4-10.7-109.1-28.4C61 291.8 50 272.4 44.7 256H34.9L89.2 480H260c3.7 11.9 9.7 22.7 17.6 32H89.2c-14.8 0-27.6-10.1-31.1-24.5L.6 250.5c-.4-1.7-.6-3.3-.6-5.1C0 233.6 9.6 224 21.4 224H54.3c9.5 0 17.2 8.3 19.5 17.5C79.6 265 102.7 304 192 304zM21.4 192c-.9 0-1.7 0-2.5 .1L.3 99.1C-1.4 90.5 4.2 82 12.9 80.3s17.1 3.9 18.8 12.6L51.5 192H21.4zm98.8 63.6c-10.3-7.4-13.9-15.8-15.4-21.7c-3-12.1-11.4-26.5-25.2-34.9L56.2 58.6c-1.2-6.9 2.3-13.8 8.6-16.9L112 18.1V53.9L89.7 65l31.9 191.5c-.5-.3-1-.7-1.4-1zm210.7 23.9c-5.7 6.2-9.2 14.6-10.4 24.4h287c-1.2-9.8-4.7-18.2-10.4-24.4c-8.3-9-20.6-20.1-37.1-30.1c-.8 8.1-7.6 14.5-15.9 14.5c-8.8 0-16-7.2-16-16c0-4.6 1.9-8.7 5-11.6c-15.7-6.1-33.9-10.5-54.9-11.9c1.2 2.2 1.9 4.8 1.9 7.5c0 8.8-7.2 16-16 16s-16-7.2-16-16c0-2.7 .7-5.3 1.9-7.5c-21 1.4-39.2 5.9-54.9 11.9c3.1 2.9 5 7 5 11.6c0 8.8-7.2 16-16 16c-8.3 0-15.1-6.3-15.9-14.5c-16.6 10-28.8 21.1-37.1 30.1zM464 191.8c82 0 132.6 40 156.5 65.9c14.6 15.7 19.5 36.1 19.5 54.7c0 12.9-10.5 23.4-23.4 23.4H311.4c-12.9 0-23.4-10.5-23.4-23.4c0-18.7 4.9-39.1 19.5-54.7c24-25.8 74.5-65.9 156.5-65.9zm-176 184c0-8.8 7.2-16 16-16H624c8.8 0 16 7.2 16 16s-7.2 16-16 16H304c-8.8 0-16-7.2-16-16zm0 77.3c0-20.6 16.7-37.3 37.3-37.3H602.7c20.6 0 37.3 16.7 37.3 37.3c0 32.4-26.3 58.7-58.7 58.7H346.7c-32.4 0-58.7-26.3-58.7-58.7zm37.3-5.3c-2.9 0-5.3 2.4-5.3 5.3c0 14.7 11.9 26.7 26.7 26.7H581.3c14.7 0 26.7-11.9 26.7-26.7c0-2.9-2.4-5.3-5.3-5.3H325.3z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-800 text-center">
                            سفارش غذا
                        </span>
                    </a>

                    <a href="#"
                       class="flex flex-col items-center gap-2 rounded-lg py-1.5 relative overflow-hidden selectItems">
                        <div class="rounded-lg size-14 language flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-10 fill-white" viewBox="0 0 512 512">
                                <path d="M256 480c16.7 0 40.4-14.4 61.9-57.3c9.9-19.8 18.2-43.7 24.1-70.7H170c5.9 27 14.2 50.9 24.1 70.7C215.6 465.6 239.3 480 256 480zM164.3 320H347.7c2.8-20.2 4.3-41.7 4.3-64s-1.5-43.8-4.3-64H164.3c-2.8 20.2-4.3 41.7-4.3 64s1.5 43.8 4.3 64zM170 160H342c-5.9-27-14.2-50.9-24.1-70.7C296.4 46.4 272.7 32 256 32s-40.4 14.4-61.9 57.3C184.2 109.1 175.9 133 170 160zm210 32c2.6 20.5 4 41.9 4 64s-1.4 43.5-4 64h90.8c6-20.3 9.3-41.8 9.3-64s-3.2-43.7-9.3-64H380zm78.5-32c-25.9-54.5-73.1-96.9-130.9-116.3c21 28.3 37.6 68.8 47.2 116.3h83.8zm-321.1 0c9.6-47.6 26.2-88 47.2-116.3C126.7 63.1 79.4 105.5 53.6 160h83.7zm-96 32c-6 20.3-9.3 41.8-9.3 64s3.2 43.7 9.3 64H132c-2.6-20.5-4-41.9-4-64s1.4-43.5 4-64H41.3zM327.5 468.3c57.8-19.5 105-61.8 130.9-116.3H374.7c-9.6 47.6-26.2 88-47.2 116.3zm-143 0c-21-28.3-37.5-68.8-47.2-116.3H53.6c25.9 54.5 73.1 96.9 130.9 116.3zM256 512A256 256 0 1 1 256 0a256 256 0 1 1 0 512z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-800 text-center">
                            آموزش زبان
                        </span>
                    </a>

                    <a href="{{ route('printery') }}"
                       class="flex flex-col items-center gap-2 rounded-lg py-1.5 relative overflow-hidden selectItems">
                        <div class="rounded-lg size-14 print flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-10 fill-white" viewBox="0 0 512 512">
                                <path d="M96 160H64V64C64 28.7 92.7 0 128 0H357.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 18.7 28.3 18.7 45.3V160H416V90.5c0-8.5-3.4-16.6-9.4-22.6L380.1 41.4c-6-6-14.1-9.4-22.6-9.4H128c-17.7 0-32 14.3-32 32v96zm352 64H64c-17.7 0-32 14.3-32 32V384H64V352c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32v32h32V256c0-17.7-14.3-32-32-32zm0 192v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V416H32c-17.7 0-32-14.3-32-32V256c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V384c0 17.7-14.3 32-32 32H448zM96 352l0 128H416V352H96zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-800 text-center">
                            چاپ
                        </span>
                    </a>
                    <a href="#"
                       class="flex flex-col items-center gap-2 rounded-lg py-1.5 relative overflow-hidden selectItems">
                        <div class="rounded-lg size-14 computer flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-10 fill-white" viewBox="0 0 640 512">
                                <path d="M384 64c17.7 0 32 14.3 32 32V320c0 17.7-14.3 32-32 32H275.5 264 184 172.5 64c-17.7 0-32-14.3-32-32V96c0-17.7 14.3-32 32-32H384zM64 384h97.8l-21.3 64H80c-8.8 0-16 7.2-16 16s7.2 16 16 16h49.8H152 296h22.2H368c8.8 0 16-7.2 16-16s-7.2-16-16-16H307.5l-21.3-64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V320c0 35.3 28.7 64 64 64zm110.2 64l21.3-64h56.9l21.3 64H174.2zM528 64h64c8.8 0 16 7.2 16 16v48H512V80c0-8.8 7.2-16 16-16zm-16 96h96v32H512V160zm0 272V224h96V432c0 8.8-7.2 16-16 16H528c-8.8 0-16-7.2-16-16zM480 80V432c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H528c-26.5 0-48 21.5-48 48zm80 280a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-800 text-center">
                            خدمات کامپیوتر
                        </span>
                    </a>
                    <a href="#"
                       class="flex flex-col items-center gap-2 rounded-lg py-1.5 relative overflow-hidden selectItems">
                        <div class="rounded-lg size-14 building flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-10 fill-white" viewBox="0 0 384 512">
                                <path d="M64 32C46.3 32 32 46.3 32 64V448c0 17.7 14.3 32 32 32h64V416c0-35.3 28.7-64 64-64s64 28.7 64 64v64h64c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H64zM224 416c0-17.7-14.3-32-32-32s-32 14.3-32 32v64h64V416zm-96 96H64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H256 224 160 128zM64 120c0-13.3 10.7-24 24-24h48c13.3 0 24 10.7 24 24v48c0 13.3-10.7 24-24 24H88c-13.3 0-24-10.7-24-24V120zm32 8v32h32V128H96zM248 96h48c13.3 0 24 10.7 24 24v48c0 13.3-10.7 24-24 24H248c-13.3 0-24-10.7-24-24V120c0-13.3 10.7-24 24-24zm8 64h32V128H256v32zM64 248c0-13.3 10.7-24 24-24h48c13.3 0 24 10.7 24 24v48c0 13.3-10.7 24-24 24H88c-13.3 0-24-10.7-24-24V248zm32 8v32h32V256H96zm152-32h48c13.3 0 24 10.7 24 24v48c0 13.3-10.7 24-24 24H248c-13.3 0-24-10.7-24-24V248c0-13.3 10.7-24 24-24zm8 64h32V256H256v32z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-800 text-center">
                            خدمات ساختمانی
                        </span>
                    </a>
                    <a href="#"
                       class="flex flex-col items-center gap-2 rounded-lg py-1.5 relative overflow-hidden selectItems">
                        <div class="rounded-lg size-14 car flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-10 fill-white" viewBox="0 0 640 512">
                                <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M80 64c-26.5 0-48 21.5-48 48V336c0 26.5 21.5 48 48 48h21.5c13.2-37.3 48.7-64 90.5-64s77.4 26.7 90.5 64H544V192c0-70.7-57.3-128-128-128H80zM96 416H80c-44.2 0-80-35.8-80-80V112C0 67.8 35.8 32 80 32H416c88.4 0 160 71.6 160 160V384l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-48 0H544 288c0 53-43 96-96 96s-96-43-96-96zM256 160H128v64H256V160zM128 128H256c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32zm224 32v64h64V160H352zm-32 0c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H352c-17.7 0-32-14.3-32-32V160zM256 416a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-800 text-center">
                            حمل بار و حمل و نقل
                        </span>
                    </a>
                    {{--                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5 relative overflow-hidden selectItems">--}}
                    {{--                        <img src="{{ asset('assets/img/simCard.png') }}" class="size-10" alt="">--}}
                    {{--                        <span class="text-sm font-bold text-gray-800 text-center">--}}
                    {{--                            اینترنت و شارژ--}}
                    {{--                        </span>--}}
                    {{--                    </a>--}}
                    {{--                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5 relative overflow-hidden selectItems">--}}
                    {{--                        <img src="{{ asset('assets/img/wall.png') }}" class="size-10" alt="">--}}
                    {{--                        <span class="text-sm font-bold text-gray-800 text-center">--}}
                    {{--                           دیوار شهر شما--}}
                    {{--                        </span>--}}
                    {{--                    </a>--}}
                </div>
            </div>
            {{--            <div class="my-3 bg-white p-5 rounded-[20px] w-[95%] mx-auto">--}}
            {{--                <div class="flex flex-row justify-between items-center gap-1.5">--}}

            {{--                    <h3 class="lg:text-xl text-sm font-bold">صفحه خودتو بساز</h3>--}}

            {{--                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 fill-[#59cfcb]" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M160 64c-17.7 0-32 14.3-32 32V416c0 11.7-3.1 22.6-8.6 32H432c26.5 0 48-21.5 48-48V96c0-17.7-14.3-32-32-32H160zM64 480c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64v32c-17.7 0-32 14.3-32 32V416c0 17.7 14.3 32 32 32s32-14.3 32-32V96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V400c0 44.2-35.8 80-80 80H64zM384 112c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400c-8.8 0-16-7.2-16-16zM160 304c0-8.8 7.2-16 16-16H432c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16H432c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16zm32-144H320V128H192v96zM160 120c0-13.3 10.7-24 24-24H328c13.3 0 24 10.7 24 24V232c0 13.3-10.7 24-24 24H184c-13.3 0-24-10.7-24-24V120z"/></svg>--}}
            {{--                </div>--}}
            {{--                <div class="w-full grid grid-cols-4 gap-3 mt-4">--}}
            {{--                    <a href="#" class="flex flex-col items-center gap-1 rounded-lg py-1.5 relative overflow-hidden selectItems">--}}
            {{--                        <img src="{{ asset('assets/img/shop.png') }}" class="size-12" alt="">--}}
            {{--                        <span class="text-sm font-bold text-gray-800 text-center">--}}
            {{--                           فروشگاهی--}}
            {{--                        </span>--}}
            {{--                    </a>--}}
            {{--                    <span onclick="storePage()" class="flex flex-col items-center gap-3 rounded-lg py-1.5 relative overflow-hidden cursor-pointer selectItems">--}}
            {{--                        <img src="{{ asset('assets/img/introduce.png') }}" class="size-10" alt="">--}}
            {{--                        <span class="text-sm font-bold text-gray-800 text-center">--}}
            {{--                           معرفی--}}
            {{--                        </span>--}}
            {{--                    </span>--}}
            {{--                    <a href="#" class="flex flex-col items-center gap-1 rounded-lg relative overflow-hidden selectItems">--}}
            {{--                        <img src="{{ asset('assets/img/educate.png') }}" class="size-14" alt="">--}}
            {{--                        <span class="text-sm font-bold text-gray-800 text-center">--}}
            {{--                           آموزشگاهی--}}
            {{--                        </span>--}}
            {{--                    </a>--}}
            {{--                    <a href="#" class="flex flex-col items-center gap-1 rounded-lg relative overflow-hidden selectItems">--}}
            {{--                        <img src="{{ asset('assets/img/menu.png') }}" class="size-14" alt="">--}}
            {{--                        <span class="text-sm font-bold text-gray-800 text-center">--}}
            {{--                           منو دیجیتال--}}
            {{--                        </span>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="w-[95%] mx-auto bg-[#00ae6f] h-14 lg:h-100 overflow-hidden rounded-lg my-3 flex flex-row">
                <div class="w-6/12 lg:w-1/3 flex flex-row items-center justify-center">
                    <div class="flex flex-row pr-3 lg:flex-col gap-3 lg:gap-5 text-white lg:p-5 items-end">
                        <p class="font-bold text-[10px] lg:text-[30px]">
                            سلام دوست عزیز
                        </p>
                        <div>
                            <a href="{{ route('aboutUs.clientList') }}"
                               class="px-3 lg:px-5 py-1 bg-white rounded-full text-black font-bold text-xs lg:text-base">کلیک
                                کن</a>
                        </div>
                    </div>
                </div>
                <div class="w-7/12 lg:w-1/3 flex flex-row items-center justify-center">
                    <img src="{{ asset('storage/images/Famenu1.png') }}" class="w-4/12 h-auto">
                </div>
                <div class="hidden lg:block w-1/3 pt-14 lg:pt-20">
                    <div class="flex flex-row items-center gap-3">
                        <img src="{{ asset('storage/images/icon.png') }}" class="size-10">
                        <span class="text-white text-sm lg:text-lg font-bold">فامنو</span>
                    </div>
                </div>
            </div>
            {{-- <div class="my-3 flex flex-row justify-center items-center gap-2">
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-[#00a692]"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
            </div> --}}
            <div class="bg-white p-5 rounded-[20px] w-[95%] mx-auto my-3">
                <div class="flex flex-row justify-between items-center pt-1">
                    <div class="flex flex-row items-center gap-1.5">
                        <img src="{{ asset('assets/img/landingPage.png') }}" class="w-7" alt="">

                        <h3 class="lg:text-xl text-sm font-bold">صفحه ها</h3>
                    </div>
                    <a class="text-[13px] text-[#eb3254] font-bold" href="{{ route('client.allPages') }}">مشاهده
                        همه</a>
                </div>
                <div class="flex flex-row gap-3 py-4 overflow-x-auto overflow-y-clip">
                    @foreach ($pages as $page)
                        @if($page->show_in_home == 1 && $page->active == 1)
                            @if (count($page->socialMedia))
                            <a href="{{ route('client.loadLink', [$page->id]) }}"
                               class="min-w-20 max-w-20 flex flex-col gap-1 pb-4 justify-center items-center cursor-pointer relative selectItems overflow-hidden relative">
                                <div class="w-full">
                                    <div class="absolute -top-1 -left-8 rotate-45 hidden arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                            <path fill="#eb3254"
                                                  d="M512 176c0-35.3-28.7-64-64-64l-188.8 0c-3.6-5.2-7.6-10.2-11.9-14.9L228.8 76.8C212.1 58.5 188.5 48 163.7 48l-10.2 0C99.5 48 49.5 76.7 22.2 123.4L20.7 126C7.1 149.3 0 175.7 0 202.6L0 328c0 66.3 53.7 120 120 120l8 0 96 0c35.3 0 64-28.7 64-64c0-2.8-.2-5.6-.5-8.3c19.4-11 32.5-31.8 32.5-55.7c0-5.3-.7-10.5-1.9-15.5c20.2-10.8 33.9-32 33.9-56.5c0-2.7-.2-5.4-.5-8l96.5 0c35.3 0 64-28.7 64-64zm-64-16c8.8 0 16 7.2 16 16s-7.2 16-16 16l-136 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16l-8 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16c-9.1 0-17.4 5.1-21.5 13.3s-3.2 17.9 2.3 25.1c2 2.7 3.2 6 3.2 9.6c0 8.8-7.2 16-16 16l-96 0-8 0c-39.8 0-72-32.2-72-72l0-125.4c0-18.4 4.9-36.5 14.2-52.4l-20-11.7 20 11.7 1.5-2.6c18.6-32 52.8-51.6 89.8-51.6l10.2 0c11.3 0 22 4.8 29.6 13.1L210.5 128 168 128c-8.8 0-16 7.2-16 16s7.2 16 16 16l78 0 2 0 200 0z"/>
                                        </svg>
                                    </div>
                                    <div class="size-20 rounded-md border border-gray-300 p-2 overflow-hidden">
                                        @if ($page->logo_path)
                                            <img class="h-full w-full rounded-full object-cover"
                                                 src="{{ asset('storage/' . $page->logo_path) }}"
                                                 alt="career category avatar">
                                        @else
                                            <img class="h-full w-full rounded-lg object-cover"
                                                 src="{{ asset('assets/img/user.png') }}" alt="career category icon">
                                        @endif
                                    </div>
                                    <span class="w-20 inline-block text-xs font-medium text-center min-h-8 max-h-8">{{ $page->title }}</span>

                                </div>
                            </a>
                             @endif
                        @endif
                    @endforeach

                </div>
            </div>
            <div class="bg-white p-5 rounded-[20px] w-[95%] mx-auto my-3">
                <div class="flex flex-row justify-between items-center pt-1">
                    <div class="flex flex-row items-center gap-1">
                        <img src="{{ asset('assets/img/apps.png') }}" class="w-7" alt="">

                        <h2 class="lg:text-xl text-sm font-bold"> دسته بندی رستوران ها</h2>

                    </div>
                    <a class="text-[13px] text-[#eb3254] font-bold" href="{{ route('career.careersCategories') }}">مشاهده
                        همه</a>
                </div>
                <div class="flex flex-row gap-3 py-4 overflow-x-auto overflow-y-clip">
                    <div class="flex flex-col gap-1 pb-4 justify-center items-center cursor-pointer careerCat relative"
                         onclick='showCareer(0, this)'>
                        <div class="absolute -top-1 -left-8 rotate-45 hidden arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                <path fill="#eb3254"
                                      d="M512 176c0-35.3-28.7-64-64-64l-188.8 0c-3.6-5.2-7.6-10.2-11.9-14.9L228.8 76.8C212.1 58.5 188.5 48 163.7 48l-10.2 0C99.5 48 49.5 76.7 22.2 123.4L20.7 126C7.1 149.3 0 175.7 0 202.6L0 328c0 66.3 53.7 120 120 120l8 0 96 0c35.3 0 64-28.7 64-64c0-2.8-.2-5.6-.5-8.3c19.4-11 32.5-31.8 32.5-55.7c0-5.3-.7-10.5-1.9-15.5c20.2-10.8 33.9-32 33.9-56.5c0-2.7-.2-5.4-.5-8l96.5 0c35.3 0 64-28.7 64-64zm-64-16c8.8 0 16 7.2 16 16s-7.2 16-16 16l-136 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16l-8 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16c-9.1 0-17.4 5.1-21.5 13.3s-3.2 17.9 2.3 25.1c2 2.7 3.2 6 3.2 9.6c0 8.8-7.2 16-16 16l-96 0-8 0c-39.8 0-72-32.2-72-72l0-125.4c0-18.4 4.9-36.5 14.2-52.4l-20-11.7 20 11.7 1.5-2.6c18.6-32 52.8-51.6 89.8-51.6l10.2 0c11.3 0 22 4.8 29.6 13.1L210.5 128 168 128c-8.8 0-16 7.2-16 16s7.2 16 16 16l78 0 2 0 200 0z"/>
                            </svg>
                        </div>
                        <div class="size-20 rounded-md border border-gray-300 p-2 overflow-hidden">
                            <img class="h-full w-full rounded-lg object-cover"
                                 src="{{ asset('assets/img/all.png') }}" alt="career category icon">
                        </div>
                        <span class="text-xs font-medium text-center">همه</span>
                    </div>
                    @foreach ($careerCategories as $careerCategory)
                        @if (count($careerCategory->careers))
                            @if ($careerCategory->show_in_home == 1)
                                <div class="flex flex-col gap-1 pb-2 justify-center items-center cursor-pointer careerCat relative"
                                     onclick='showCareer({{ $careerCategory->id }}, this)'>
                                    <div class="absolute -top-1 -left-8 rotate-45 hidden arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                            <path fill="#eb3254"
                                                  d="M512 176c0-35.3-28.7-64-64-64l-188.8 0c-3.6-5.2-7.6-10.2-11.9-14.9L228.8 76.8C212.1 58.5 188.5 48 163.7 48l-10.2 0C99.5 48 49.5 76.7 22.2 123.4L20.7 126C7.1 149.3 0 175.7 0 202.6L0 328c0 66.3 53.7 120 120 120l8 0 96 0c35.3 0 64-28.7 64-64c0-2.8-.2-5.6-.5-8.3c19.4-11 32.5-31.8 32.5-55.7c0-5.3-.7-10.5-1.9-15.5c20.2-10.8 33.9-32 33.9-56.5c0-2.7-.2-5.4-.5-8l96.5 0c35.3 0 64-28.7 64-64zm-64-16c8.8 0 16 7.2 16 16s-7.2 16-16 16l-136 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16l-8 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16c-9.1 0-17.4 5.1-21.5 13.3s-3.2 17.9 2.3 25.1c2 2.7 3.2 6 3.2 9.6c0 8.8-7.2 16-16 16l-96 0-8 0c-39.8 0-72-32.2-72-72l0-125.4c0-18.4 4.9-36.5 14.2-52.4l-20-11.7 20 11.7 1.5-2.6c18.6-32 52.8-51.6 89.8-51.6l10.2 0c11.3 0 22 4.8 29.6 13.1L210.5 128 168 128c-8.8 0-16 7.2-16 16s7.2 16 16 16l78 0 2 0 200 0z"/>
                                        </svg>
                                    </div>
                                    <div class="size-20 rounded-md border border-gray-300 p-2 overflow-hidden">
                                        @if ($careerCategory->main_image)
                                            <img class="h-full w-full rounded-full object-cover"
                                                 src="{{ asset('storage/' . $careerCategory->main_image) }}"
                                                 alt="career category avatar">
                                        @else
                                            <img class="h-full w-full rounded-lg object-cover"
                                                 src="{{ asset('assets/img/cash-machine.png') }}"
                                                 alt="career category icon">
                                        @endif
                                    </div>
                                    <span class="text-xs font-medium text-center">{{ $careerCategory->title }}</span>
                                </div>
                            @endif
                        @endif
                    @endforeach

                </div>
            </div>

            <div class="bg-white p-5 rounded-[20px] w-[95%] mx-auto my-3">
                <div class="flex flex-row justify-between items-center mt-5 mb-3">
                    <h1 class="lg:text-xl text-sm font-bold" id="careerCatTitle">
                        رستوران ها
                    </h1>
                    <a class="text-[13px] text-[#eb3254] font-bold" href="{{ route('career.careersList') }}">مشاهده
                        همه</a>
                </div>
                <div class="w-full gap-2 flex flex-row overflow-auto " id="favorite_section">

                    <div class="fixed w-full h-dvh bg-black/50 flex justify-center items-center top-0 right-0 z-40 invisible opacity-0 form"
                         id="openFavorite">
                        <div class="w-2/4 h-2/3 overflow-y-auto [&::-webkit-scrollbar]:hidden bg-white rounded-lg flex flex-row justify-center items-start p-4 gap-4">
                            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200"
                                 onclick="closeForm()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                    <path fill="gray"
                                          d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                            </div>
                            <div class="w-full flex flex-col items-center gap-2">
                                <div class="size-8 bg-[#eb3254] rounded-full" onclick="openDropdown()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 lg:size-8"
                                         viewBox="0 0 448 512">
                                        <path fill="white"
                                              d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                    </svg>
                                </div>
                                <div class="w-full flex flex-col items-center" id="parentFavorite">

                                </div>
                                <div class="w-full flex flex-col gap-3 items-center" id="parentItems">
                                    <div class="w-full py-2 bg-[#eb3254] rounded-lg text-white text-center">
                                        کلی
                                    </div>

                                </div>
                                <div class="md:text-left text-center md:px-12 mt-5 lg:mt-30">
                                    <button class="px-4 py-2 bg-[#eb3254] text-white rounded-lg cursor-pointer"
                                            onclick="finalSave(event)">ثبت
                                    </button>
                                    {{-- <button class="px-4 py-2 bg-[#eb3254] text-white rounded-lg cursor-pointer" onclick='deleteFavorite("{{ $career->id }}"  , "career" ,event)'>حذف از علاقه مندی ها</button> --}}
                                </div>

                            </div>

                        </div>
                    </div>

                    @foreach($careers as $career)
                        @if($career->show_in_home == 1 && $career->active == 1)
                        {{-- @dd($career->menus) --}}
                            @if(count($career->menus)>0 && $career->show_in_home==1)

                                {{-- @if(count($career->favorites))
                                @dd($career->favorites)
                                @endif --}}
                                <div class="min-w-1/3 careers selectItems relative"
                                    data-index="{{ $career->career_category_id }}">
                                    <!-- آیکون قلب در گوشه بالا سمت چپ -->
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 absolute top-1 right-1 cursor-pointer rotate-20 {{ count($career->favorites) ? 'fill-red-500' : 'fill-gray-500' }}" onclick='addToFavorite("{{ $career->id }}" , "career" , this)'>
                                        <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                                    </svg> --}}
                                    {{-- @dd($career->favorites) --}}


                                    {{-- پاک نشود --}}
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-5 absolute top-1  cursor-pointer  {{ count($career->favorites)  ? 'fill-red-500' : 'fill-gray-400' }}" onclick='addToFavorite("{{ $career->id }}" , "career" , this)'>
                                        <path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/>
                                    </svg> --}}
                                    {{-- پاک نشود --}}

                                    <a href="{{ route('client.menu', [$career]) }}"
                                    class=" h-40 rounded-[11px] flex flex-col items-center justify-center gap-2">
                                        <div class="w-full rounded-md overflow-hidden">
                                            <img class="size-26 mx-auto rounded-[7px] object-cover"
                                                src="{{ asset('storage/'.$career->logo) }}" alt="career logo">
                                        </div>
                                        <span class="text-gray-500 text-sm font-medium text-center h-10">
                                            {{ $career->title }}
                                        </span>
                                    </a>
                                </div>
                             @endif
                        @endif

                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-3/4 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500 z-99999999"
         id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer"
                 onclick="showMessage('close')" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>

        </div>
    </div>

    <div id="authenticationDiv"
         class="fixed w-full h-dvh bg-black/50 backdrop-blur-sm top-0 right-0 flex justify-center items-center transition-all duration-300 opacity-0 invisible">

        <div class="w-3/4 bg-white rounded-sm p-3 transition-all duration-300 delay-100 scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                 onclick="closeLoginForm()" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>
            <h3 class="text-center text-sm font-bold text-gray-800">ابتدا وارد شوید</h3>
            <form action="{{ route('user.check') }}" class="flex flex-col items-center my-6 gap-3 w-full"
                  method="post" id="loginForm">
                @csrf
                <input type="number"
                       class="placeholder-gray-400 focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                       name="phoneNumber" id="phoneNumber" placeholder="شماره تلفن" required>
                <div class="w-full" id="login">
                    <div class="w-full flex flex-row items-center gap-3">
                        <input type="number"
                               class="w-8/12 p-2 placeholder-gray-400 focus:border-[#eb3254] md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                               name="code" placeholder="کد" required id="code">
                        <button type="button"
                                class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-[#eb3254] hover:bg-[#d52b4a] text-white cursor-pointer"
                                onclick="sendCode()" id="countDown">ارسال کد
                        </button>
                    </div>
                </div>
                <div class="w-full flex flex-row items-center justify-between" id="loginWay">
                    <a href="{{ route('forget_password') }}"
                       class="text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm">فراموشی رمز عبور</a>
                    <span class="text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
                          onclick="loginWithPassKey(this)">ورود با رمز عبور</span>
                </div>
                <button onclick="check(event)"
                        class="focus:bg-[#eb3254] hover:bg-[#eb3254] transition-all duration-400 text-center w-full bg-[#eb3254] p-2 md:p-3 rounded-[10px] text-white cursor-pointer">
                    ورود
                </button>
                <div class="w-full text-center">
                            <span class="text-[#4B5675] mt-1 md:mt-5 max-md:text-sm">
                                هنوز عضو نشدی؟
                                <a href="{{ route('signup') }}" class="text-[#eb3254] mr-2">ثبت نام!</a>
                            </span>
                </div>
            </form>
        </div>
    </div>
    <script>

        let countDown = document.getElementById('countDown')
        let loginForm = document.getElementById('loginForm')

        let message = document.getElementById('message')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"
        let authenticationDiv = document.getElementById('authenticationDiv')

        {{--function storePage(){--}}
        {{--    if("{{ Auth::check() }}"){--}}
        {{--        $.ajaxSetup({--}}
        {{--            headers: {--}}
        {{--                'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
        {{--            }--}}
        {{--        })--}}
        {{--        $.ajax({--}}
        {{--            url: "{{ route('pages.storeWithClick') }}",--}}
        {{--            type: "GET",--}}
        {{--            success: function (data){--}}
        {{--                console.log(data)--}}
        {{--                showMessage('open')--}}
        {{--                element.innerHTML = `--}}
        {{--                        <span>✅</span>--}}
        {{--                        <span class="text-shadw-lg">صفحه شما ایجاد شد </span>--}}
        {{--                    `--}}
        {{--                message.children[0].appendChild(element)--}}
        {{--                setTimeout(() => {--}}
        {{--                    showMessage('close')--}}
        {{--                }, 2500)--}}
        {{--            },--}}
        {{--            error: function (){--}}
        {{--                showMessage('open')--}}
        {{--                element.innerHTML = `--}}
        {{--                        <span>❌</span>--}}
        {{--                        <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>--}}
        {{--                    `--}}
        {{--                message.children[0].appendChild(element)--}}
        {{--                setTimeout(() => {--}}
        {{--                    showMessage('close')--}}
        {{--                }, 2500)--}}
        {{--            }--}}
        {{--        })--}}
        {{--    } else {--}}
        {{--        authenticationDiv.classList.remove('invisible')--}}
        {{--        authenticationDiv.classList.remove('opacity-0')--}}
        {{--    }--}}
        {{--}--}}

        function sendCode() {

            let phoneNumber = document.getElementById('phoneNumber')
            if (phoneNumber.value == "") {
                showMessage('open')
                element.innerHTML = `
                        <span class="text-red-500">!</span>
                        <span>لطفا شماره تلفن را وارد کنید</span>
                    `
                message.children[0].appendChild(element)
                setTimeout(() => {
                    showMessage('close')
                }, 2000)
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('loginWithActivationCode') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                    },
                    success: function (data) {
                        console.log(data)
                        if (!data) {
                            counter()
                            showMessage('open')
                            element.innerHTML = `
                                <span>✅</span>
                                <span class="text-shadw-lg">کد ارسال شد</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        } else {
                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">ابتدا ثبت نام کنید !</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                // location.assign("{{ route('login') }}")
                            }, 2000)
                        }
                    },
                    error: function () {
                        showMessage('open')
                        element.innerHTML = `
                            <span>❌</span>
                            <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2500)
                    }
                })
            }
        }

        function counter() {
            let phoneNumber = document.getElementById('phoneNumber')
            countDown.classList.add('cursor-no-drop')
            countDown.classList.remove('cursor-pointer')
            countDown.classList.remove('hover:bg-[#d52b4a]')
            countDown.classList.add('hover:bg-[#d52b4a]/50')
            countDown.classList.remove('bg-[#eb3254]')
            countDown.classList.add('bg-[#eb3254]/50')
            countDown.setAttribute('disabled', true)
            countDown.setAttribute('dir', 'ltr')
            let count = 120
            let result = setInterval(() => {
                let minute = Math.floor(count / 60)
                let seconds = count % 60
                count -= 1
                if (count < 0) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('removeActivationCode') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            'phoneNumber': phoneNumber.value
                        },
                        success: function (data) {
                            console.log(data)
                            countDown.classList.remove('cursor-no-drop')
                            countDown.classList.add('bg-[#eb3254]')
                            countDown.classList.remove('bg-[#eb3254]/50')
                            countDown.classList.add('cursor-pointer')
                            countDown.classList.add('hover:bg-[#d52b4a]')
                            countDown.classList.remove('hover:bg-[#d52b4a]/50')
                            countDown.removeAttribute('disabled')
                            countDown.removeAttribute('dir')
                            countDown.innerText = "ارسال مجدد"
                        },
                        error: function () {
                            showMessage('open')
                            element.innerHTML = `
                                <span>❌</span>
                                <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2500)
                        }
                    })
                    clearInterval(result)
                }
                countDown.innerText = minute.toString().padStart(2, "0") + " : " + seconds.toString().padStart(2,
                    "0");
            }, 1000)
        }

        {{--function check(ev) {--}}
        {{--    ev.preventDefault()--}}
        {{--    if (phoneNumber.value == "" || password.value == "") {--}}
        {{--        showMessage('open')--}}
        {{--        element.innerHTML = `--}}
        {{--                <span>لطفا همه فیلد ها را پر کنید</span>--}}
        {{--                <span class="text-red-500">!</span>--}}
        {{--            `--}}
        {{--        message.children[0].appendChild(element)--}}
        {{--        setTimeout(() => {--}}
        {{--            showMessage('close')--}}
        {{--        }, 2000)--}}
        {{--    } else {--}}
        {{--        $.ajaxSetup({--}}
        {{--            headers: {--}}
        {{--                'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
        {{--            }--}}
        {{--        })--}}
        {{--        $.ajax({--}}
        {{--            url: "{{ route('user.checkFromMenu') }}",--}}
        {{--            type: "POST",--}}
        {{--            dataType: "json",--}}
        {{--            data: {--}}
        {{--                'phoneNumber': phoneNumber.value,--}}
        {{--                'password': password.value--}}
        {{--            },--}}
        {{--            success: function (data) {--}}

        {{--                if (data == "incorrectPassword") {--}}

        {{--                    showMessage('open')--}}
        {{--                    element.innerHTML = `--}}
        {{--                        <span>رمز عبور نادرست است</span>--}}
        {{--                        <span class="text-red-500">!</span>--}}
        {{--                    `--}}
        {{--                    message.children[0].appendChild(element)--}}
        {{--                    setTimeout(() => {--}}
        {{--                        showMessage('close')--}}
        {{--                    }, 2000)--}}
        {{--                } else {--}}
        {{--                    showMessage('open')--}}
        {{--                    element.innerHTML = `--}}
        {{--                        <span> خوش اومدی ${data.name} ${data.family} عزیز</span>--}}
        {{--                    `--}}
        {{--                    message.children[0].appendChild(element)--}}
        {{--                    setTimeout(() => {--}}
        {{--                        showMessage('close')--}}
        {{--                        closeLoginForm()--}}
        {{--                    }, 2000)--}}
        {{--                }--}}
        {{--            },--}}
        {{--            error: function () {--}}
        {{--                showMessage('open')--}}
        {{--                element.innerHTML = `--}}
        {{--                <span>خطا در دریافت اطلاعات</span>--}}
        {{--                <span class="text-red-500">!</span>--}}
        {{--                `--}}
        {{--                message.children[0].appendChild(element)--}}
        {{--                setTimeout(() => {--}}
        {{--                    showMessage('close')--}}
        {{--                }, 2000)--}}
        {{--            }--}}
        {{--        })--}}
        {{--    }--}}
        {{--}--}}

        function check(ev) {
            let password = document.getElementById('password')
            console.log(password)
            ev.preventDefault()
            if(password){
                if (phoneNumber.value == "" || password.value == "") {
                    showMessage('open')
                    element.innerHTML = `
                            <span>لطفا همه فیلد ها را پر کنید</span>
                            <span class="text-red-500">!</span>
                        `
                    message.children[0].appendChild(element)
                    setTimeout(() => {
                        showMessage('close')
                    }, 2000)
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('user.checkFromMenu') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            'phoneNumber': phoneNumber.value,
                            'password': password.value
                        },
                        success: function (data) {

                            if (data == "incorrectPassword") {

                                showMessage('open')
                                element.innerHTML = `
                                <span>رمز عبور نادرست است</span>
                                <span class="text-red-500">!</span>
                            `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                }, 2000)
                            } else {
                                showMessage('open')
                                element.innerHTML = `
                                <span> خوش اومدی ${data.name} ${data.family} عزیز</span>
                            `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                    closeLoginForm()
                                }, 2000)
                            }
                        },
                        error: function () {
                            showMessage('open')
                            element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        }
                    })
                }
            }
            if(!password){
                if (phoneNumber.value == "" || code.value == "") {
                    showMessage('open')
                    element.innerHTML = `
                            <span>لطفا همه فیلد ها را پر کنید</span>
                            <span class="text-red-500">!</span>
                        `
                    message.children[0].appendChild(element)
                    setTimeout(() => {
                        showMessage('close')
                    }, 2000)
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('checkActivationCode') }}",
                        type: "POST",
                        dataType: "json",
                        data : {
                            'phoneNumber': phoneNumber.value,
                            'code': code.value
                        },
                        success: function (data){
                            console.log(data)
                            showMessage('open')

                            element.innerHTML = `
                                <span> خوش اومدی ${data.validate.name} ${data.validate.family} عزیز</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                closeLoginForm()
                            }, 2000)
                        },
                        error: function (){
                            showMessage('open')
                            element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        }
                    })
                }
            }

        }

        function closeLoginForm() {
            authenticationDiv.classList.add('invisible')
            authenticationDiv.classList.add('opacity-0')
            authenticationDiv.children[0].classList.add('scale-95')
        }

        function loginWithPassKey(el) {
            login.innerHTML = `
                                    <input type="password"
                                        class="placeholder-gray-400 focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                                        name="password" id="password" placeholder="کلمه عبور" required>
                                `
            el.parentElement.children[1].remove()
            let span = document.createElement('span')
            span.classList = "text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
            span.setAttribute('onclick', 'loginWithActivationCode(this)')
            span.innerText = "ورود با کد فعال ساز"
            loginWay.appendChild(span)
        }

        function loginWithActivationCode(el) {
            login.innerHTML = `
                                    <div class="w-full flex flex-row items-center gap-3">
                                        <input type="number"
                                            class="w-8/12 p-2 placeholder-gray-400 focus:border-[#eb3254] md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                                            name="code" placeholder="کد" required id="code">
                                        <button type="button"
                                            class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-[#eb3254] hover:bg-[#d52b4a] text-white cursor-pointer"
                                            onclick="sendCode()" id="countDown">ارسال کد </button>
                                    </div>
                                `
            el.parentElement.children[1].remove()
            let span = document.createElement('span')
            span.classList = "text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
            span.setAttribute('onclick', 'loginWithPassKey(this)')
            span.innerText = "ورود با رمز عبور"
            loginWay.appendChild(span)
        }

        function showMessage(state) {
            if (state == 'open') {
                message.classList.remove('top-0')
                message.classList.remove('opacity-0')
                message.classList.remove('invisible')
                message.classList.add('top-1/10')
            }
            if (state == 'close') {
                message.classList.remove('top-1/10')
                message.classList.add('top-0')
                message.classList.add('opacity-0')
                message.classList.add('invisible')
            }
        }

        let selectItems = document.querySelectorAll('.selectItems')
        selectItems.forEach((selectItem) => {
            selectItem.addEventListener('click', () => {

                selectItems.forEach((item) => {
                    item.classList.remove('selected')
                })
                selectItem.classList.add('selected')

            })
        })

        let favoriteData = []
        let multipleFavorite = []
        let favoriteElement = null
        let parentItems = document.getElementById('parentItems')

        function closeForm() {
            let forms = document.querySelectorAll(".form")
            forms.forEach((form) => {
                form.classList.add('invisible')
                form.classList.add('opacity-0')
            })
            favoriteData = []
            multipleFavorite = []
        }

        function addToFavorite(item_id, favoriteType, el) {
            favoriteData = [item_id, favoriteType]
            multipleFavorite = []
            parentItems.innerHTML = ""
            let openFavorite = document.getElementById('openFavorite')
            favoriteElement = el

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            })

            $.ajax({
                url: "{{route('favorite.create')}}",
                type: 'POST',
                dataType: "json",
                data: {
                    'item_id': item_id,
                    'favoriteType': favoriteType
                },
                success: function (response) {
                    if (response.code == "304") {
                        alert('لطفا ابتدا وارد شوید')
                        location.assign("{{ route('login') }}")
                    } else {
                        response.all.forEach((item) => {
                            let el = document.createElement('div')
                            el.classList = "w-full flex flex-row items-center gap-3"
                            el.innerHTML = `
                            <div class="w-full py-2 bg-[#eb3254] rounded-lg text-white text-center">
                                ${item.title}
                            </div>
                        `

                            let element = document.createElement('div')
                            element.classList = "flex flex-row items-center gap-3"
                            element.innerHTML = `
                        <div class="p-1.5 rounded-md bg-red-500 cursor-pointer categoryIdElements" 
                             onclick='categoryIdElements(this)' 
                             data-cat-id="${item.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-4">
                                <path fill="white" d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/>
                            </svg>
                        </div>
                        <div class="p-1.5 rounded-md bg-red-500 cursor-pointer" data-category-id="${item.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" onclick='deleteFavoriteCat(this)' viewBox="0 0 448 512">
                                <path fill="white"
                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                            </svg>
                        </div>
                        `
                            el.appendChild(element)
                            parentItems.appendChild(el)

                            // اگر این دسته قبلا انتخاب شده
                            let found = false
                            for (let i = 0; i < response.favorite.length; i++) {
                                if (response.favorite[i].cat_id == item.id) {
                                    found = true
                                }
                            }

                            if (found) {
                                let catElement = element.querySelector('.categoryIdElements')
                                if (catElement) {
                                    catElement.classList.remove('bg-red-500')
                                    catElement.classList.add('bg-green-600')
                                    // جلوگیری از اضافه شدن تکراری
                                    let alreadyExists = false
                                    for (let j = 0; j < multipleFavorite.length; j++) {
                                        if (multipleFavorite[j] == item.id) {
                                            alreadyExists = true
                                        }
                                    }
                                    if (!alreadyExists) {
                                        multipleFavorite.push(item.id)
                                    }
                                }
                            }
                        })

                        openFavorite.classList.remove('invisible')
                        openFavorite.classList.remove('opacity-0')
                    }
                },
                error: function () {
                    alert('خطا در ارسال داده')
                }
            })
        }

        let parentFavorite = document.getElementById('parentFavorite')

        function openDropdown() {
            parentFavorite.innerHTML = `
        <form action="#" method="post">
            <div class="flex flex-row justify-center items-center">
                <input type="text" class="w-10/12 py-1 px-3 rounded-lg outline-none border-1 border-gray-300" placeholder="عنوان دسته" id="categoryTitle">
                <button class="w-2/12 h-full rounded-lg text-xl" onclick="addItem(event)">✅</button>
            </div>
        </form>
        `
        }

        function addItem(ev) {
            ev.preventDefault()
            let titleCat = document.getElementById('categoryTitle')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('favoriteCategory.store') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'title': titleCat.value
                },
                success: function (data) {
                    if (data.id) {
                        favoriteData.push(data.id)
                    }

                    let el = document.createElement('div')
                    el.classList = "w-full flex flex-row items-center gap-3"
                    el.innerHTML = `
                <div class="w-full py-2 bg-[#eb3254] rounded-lg text-white text-center">
                    ${data.title}
                </div>
                <div class="flex flex-row items-center gap-3">
                    <div class="p-1.5 rounded-md bg-red-500 cursor-pointer categoryIdElements" 
                         onclick='categoryIdElements(this)' 
                         data-cat-id="${data.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-4">
                            <path fill="white" d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/>
                        </svg>
                    </div>
                    <div class="p-1.5 rounded-md bg-red-500 cursor-pointer" data-category-id="${data.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" onclick='deleteFavoriteCat(this)' viewBox="0 0 448 512">
                            <path fill="white"
                                d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                        </svg>
                    </div>
                </div>
                `
                    parentItems.appendChild(el)
                    titleCat.value = ''
                },
                error: function () {
                    alert('خطا در ارسال داده')
                }
            })
        }

        function finalSave(ev) {
            ev.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('favorite.store') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'favoriteDataArray': favoriteData,
                    'multipleFavorite': multipleFavorite
                },
                success: function (data) {
                    if (multipleFavorite.length === 0) {
                        favoriteElement.classList.remove('fill-red-500')
                        favoriteElement.classList.add('fill-gray-400')
                    } else {
                        favoriteElement.classList.remove('fill-gray-400')
                        favoriteElement.classList.add('fill-red-500')
                    }

                    favoriteData = []
                    multipleFavorite = []
                    closeForm()
                },
                error: function () {
                    alert('خطا در ارسال داده')
                }
            })
        }

        function categoryIdElements(el) {
            const catId = el.getAttribute('data-cat-id')

            if (el.classList.contains('bg-red-500')) {
                let exists = false
                for (let i = 0; i < multipleFavorite.length; i++) {
                    if (multipleFavorite[i] == catId) {
                        exists = true

                    }
                }
                if (!exists) {
                    multipleFavorite.push(catId)
                }
                el.classList.remove('bg-red-500')
                el.classList.add('bg-green-600')
            } else {

                let newArray = []
                for (let i = 0; i < multipleFavorite.length; i++) {
                    if (multipleFavorite[i] != catId) {
                        newArray.push(multipleFavorite[i])
                    }
                }
                multipleFavorite = newArray
                el.classList.remove('bg-green-600')
                el.classList.add('bg-red-500')
            }
        }

        function deleteFavorite(item_id, type, ev) {
            ev.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('favorite.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'item_id': item_id,
                    'favoriteType': type
                },
                success: function (data) {
                    favoriteElement.classList.remove('fill-red-500')
                    favoriteElement.classList.add('fill-gray-400')
                    closeForm()
                },
                error: function () {
                    alert('خطا در ارسال داده')
                }
            })
        }

        function deleteFavoriteCat(el) {
            let cat_id = el.parentElement.getAttribute('data-category-id')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('favoriteCategory.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'cat_id': cat_id,
                },
                success: function (data) {
                    el.parentElement.parentElement.parentElement.remove()
                },
                error: function () {
                    alert('خطا در ارسال داده')
                }
            })
        }
    </script>
@endsection
