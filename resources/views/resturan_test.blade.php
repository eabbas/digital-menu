<!DOCTYPE html>
<html lang="fe" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
</head>
<body>
<style>
    @import url('{{asset('assets/css/fontiran.css')}}');
    *{
        font-family:IRANSansX ;
    }
    .shadow_box{
        box-shadow: 0px 0px 1px 1px #ebebeb;
    }
</style>

<!-- hossain start -->


<section class="flex justify-center items-center flex-col gap-5">
    <div class="flex w-11/12 bg-black justify-between h-33 rounded-2xl overflow-hidden p-1">
        <div  class="w-7/12 bg-[#09132c] p-3 relative">
            <div class="absolute h-full w-20 bg-gradient-to-l from-[#09132c] -left-16 top-0"></div>
            <div class="flex flex-col gap-2">
                <h1 class="text-[#d7d9e8] font-bold">کافه ابان</h1>
                <span class="text-[#aeb5c0] text-[.6rem] text-nowrap">کافه دنج با فضای هنری و موسیقی</span>
                <div class="flex gap-4 py-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-3 fill-white">
                        <path d="M352 192c0-88.4-71.6-160-160-160S32 103.6 32 192c0 20.2 9.1 48.6 26.5 82.7c16.9 33.2 39.9 68.2 63.4 100.5c23.4 32.2 46.9 61 64.5 81.9c1.9 2.3 3.8 4.5 5.6 6.6c1.8-2.1 3.6-4.3 5.6-6.6c17.7-20.8 41.1-49.7 64.5-81.9c23.5-32.3 46.4-67.3 63.4-100.5C342.9 240.6 352 212.2 352 192zm32 0c0 88.8-120.7 237.9-170.7 295.9C200.2 503.1 192 512 192 512s-8.2-8.9-21.3-24.1C120.7 429.9 0 280.8 0 192C0 86 86 0 192 0S384 86 384 192zm-240 0a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 80a80 80 0 1 1 0-160 80 80 0 1 1 0 160z"/>
                    </svg>
                    <span class="text-[.6rem] text-[#aeb5c0] mb-1">
                            تهران . میدان میرداماد
                        </span>
                </div>
            </div>
        </div>
        <div class="min-w-53 max-w-53">
            <img class="rounded-xl bg-cover" src="{{asset('storage/resturan_img/single_02.jpg')}}" alt="">
        </div>
    </div>
    <div class="w-11/12 flex justify-between items-center">
        <div class="w-9/12 shadow_box rounded-full flex p-3 gap-2 items-center">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4">
                    <path d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z"/>
                </svg>
            </button>
            <input type="text" class="outline-none w-full">
        </div>
        <div class="w-4/24 shadow_box rounded-full p-3 flex justify-between">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24"
                 viewBox="0 0 24 24"
                 fill="none" class="size-4">
                <path d="M4 7H20"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linecap="round"/>
                <path d="M4 17H20"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linecap="round"/>
                <circle cx="9" cy="7" r="2"
                        stroke="#1D2433"
                        stroke-width="2"/>
                <circle cx="15" cy="17" r="2"
                        stroke="#1D2433"
                        stroke-width="2"/>
            </svg>
            <span class="text-[.6rem]">فیلتر</span>
        </div>
    </div>
    <div class="w-11/12 flex gap-1 mt-1 justify-between">
        <div class="flex gap-3 items-center rounded-full shadow_box p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4">
                <path d="M160 64V192H32V64H160zM32 32H0V64 192v32H32 160h32V192 64 32H160 32zM160 320V448H32V320H160zM32 288H0v32V448v32H32 160h32V448 320 288H160 32zM288 64H416V192H288V64zM256 32V64 192v32h32H416h32V192 64 32H416 288 256zm0 256v16V464v16h32V464 320h32v68 16h16 96 16V388 304 288H416v16 68H352V304 288H336 272 256zM120 104H72v48h48V104zM72 360v48h48V360H72zM376 104H328v48h48V104zM320 432v48h48V432H320zm128 0H400v48h48V432z"/>
            </svg>
            <span class="mb-1 text-[.6rem] font-bold">همه</span>
        </div>
        <div class="flex gap-3 items-center rounded-full shadow_box p-2">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24"
                 viewBox="0 0 24 24"
                 fill="none" class="size-4">
                <path d="M5 8H16V15C16 17.2 14.2 19 12 19H9C6.8 19 5 17.2 5 15V8Z"
                      stroke="#1D2433"
                      stroke-width="2"/>
                <path d="M16 10H18C19.1 10 20 10.9 20 12C20 13.1 19.1 14 18 14H16"
                      stroke="#1D2433"
                      stroke-width="2"/>
                <path d="M8 4V7"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linecap="round"/>
                <path d="M12 4V7"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linecap="round"/>
            </svg>
            <span class="mb-1 text-[.6rem] font-bold">قهوه</span>
        </div>
        <div class="flex gap-3 items-center rounded-full shadow_box p-2">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24"
                 viewBox="0 0 24 24"
                 fill="none" class="size-4">
                <path d="M8 4H16L15 20H9L8 4Z"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linejoin="round"/>
                <path d="M10 4L11 1"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linecap="round"/>
            </svg>
            <span class="mb-1 text-[.6rem] font-bold">نوشیدنی</span>
        </div>
        <div class="flex gap-3 items-center rounded-full shadow_box p-2">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24"
                 viewBox="0 0 24 24"
                 fill="none" class="size-4">
                <path d="M5 10C5 7 8 5 12 5C16 5 19 7 19 10H5Z"
                      stroke="#1D2433"
                      stroke-width="2"/>
                <path d="M5 13H19"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linecap="round"/>
                <path d="M6 13V17H18V13"
                      stroke="#1D2433"
                      stroke-width="2"/>
            </svg>
            <span class="mb-1 text-[.6rem] font-bold">برگر</span>
        </div>
        <div class="flex gap-3 items-center rounded-full shadow_box p-2">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24"
                 viewBox="0 0 24 24"
                 fill="none" class="size-4">
                <path d="M6 17C6 12 9 8 12 8C15 8 18 12 18 17"
                      stroke="#1D2433"
                      stroke-width="2"/>
                <path d="M4 17H20"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linecap="round"/>
                <path d="M17 5L21 2"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linecap="round"/>
            </svg>
            <span class="mb-1 text-[.6rem] font-bold">پاستا</span>
        </div>
    </div>
    <div class="flex items-center gap-2 rounded-full w-11/12 shadow_box p-2  justify-between">
        <div class="flex items-center gap-1 p-1">
            <span class="text-[.6rem] text-nowrap font-bold">محبوب ترین ها</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-[#f39846]">
                <path d="M227.2 119.4c-9.9-12.4-30-32.8-49.4-51.6l-1.8-1.7c-14.7 14.8-32.7 34.3-50.7 56.6c-20.7 25.6-40.5 54.1-55 83C55.8 234.8 48 261.6 48 284.5C48 386.3 125.6 464 224 464c97.2 0 176-77.8 176-179.5c0-41.7-25.6-90.4-58.3-133.7c-11.3-14.9-22.6-28.1-32.5-38.9c-1.9 1.8-3.4 3.3-4.6 4.6c-1.3 1.3-1.8 2-1.9 2.1c0 0 0 0 0 0l-37.3 48.7-38.3-47.9zM0 284.5C0 152 176 0 176 0s29.4 27 55.9 53.8c12.8 12.9 24.9 25.8 32.7 35.6c6.8-8.9 23.5-23.3 35.1-32.9c7.1-5.8 12.3-9.9 12.3-9.9s136 121.4 136 237.9C448 412.2 348.2 512 224 512C98.4 512 0 412.1 0 284.5zM225.7 416C162.6 416 112 375.4 112 306.8c0-33.6 21.1-63 63.2-114.8c5.6 7 87.1 110.6 87.1 110.6l50.6-58.8c4.2 5.6 7 11.2 9.8 16.8c25.3 46.2 14 105-28.1 134.4c-21.1 14-43.5 21-68.8 21z"/>
            </svg>
        </div>
        <div class="flex items-center gap-1 p-1">
            <span class="text-[.6rem] text-nowrap font-bold">تخفیف دار</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-[#f39846]">
                <path d="M227.2 119.4c-9.9-12.4-30-32.8-49.4-51.6l-1.8-1.7c-14.7 14.8-32.7 34.3-50.7 56.6c-20.7 25.6-40.5 54.1-55 83C55.8 234.8 48 261.6 48 284.5C48 386.3 125.6 464 224 464c97.2 0 176-77.8 176-179.5c0-41.7-25.6-90.4-58.3-133.7c-11.3-14.9-22.6-28.1-32.5-38.9c-1.9 1.8-3.4 3.3-4.6 4.6c-1.3 1.3-1.8 2-1.9 2.1c0 0 0 0 0 0l-37.3 48.7-38.3-47.9zM0 284.5C0 152 176 0 176 0s29.4 27 55.9 53.8c12.8 12.9 24.9 25.8 32.7 35.6c6.8-8.9 23.5-23.3 35.1-32.9c7.1-5.8 12.3-9.9 12.3-9.9s136 121.4 136 237.9C448 412.2 348.2 512 224 512C98.4 512 0 412.1 0 284.5zM225.7 416C162.6 416 112 375.4 112 306.8c0-33.6 21.1-63 63.2-114.8c5.6 7 87.1 110.6 87.1 110.6l50.6-58.8c4.2 5.6 7 11.2 9.8 16.8c25.3 46.2 14 105-28.1 134.4c-21.1 14-43.5 21-68.8 21z"/>
            </svg>
        </div>
        <div class="flex items-center gap-1 p-1">
            <span class="text-[.6rem] text-nowrap font-bold">جدیدترین</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-[#f39846]">
                <path d="M227.2 119.4c-9.9-12.4-30-32.8-49.4-51.6l-1.8-1.7c-14.7 14.8-32.7 34.3-50.7 56.6c-20.7 25.6-40.5 54.1-55 83C55.8 234.8 48 261.6 48 284.5C48 386.3 125.6 464 224 464c97.2 0 176-77.8 176-179.5c0-41.7-25.6-90.4-58.3-133.7c-11.3-14.9-22.6-28.1-32.5-38.9c-1.9 1.8-3.4 3.3-4.6 4.6c-1.3 1.3-1.8 2-1.9 2.1c0 0 0 0 0 0l-37.3 48.7-38.3-47.9zM0 284.5C0 152 176 0 176 0s29.4 27 55.9 53.8c12.8 12.9 24.9 25.8 32.7 35.6c6.8-8.9 23.5-23.3 35.1-32.9c7.1-5.8 12.3-9.9 12.3-9.9s136 121.4 136 237.9C448 412.2 348.2 512 224 512C98.4 512 0 412.1 0 284.5zM225.7 416C162.6 416 112 375.4 112 306.8c0-33.6 21.1-63 63.2-114.8c5.6 7 87.1 110.6 87.1 110.6l50.6-58.8c4.2 5.6 7 11.2 9.8 16.8c25.3 46.2 14 105-28.1 134.4c-21.1 14-43.5 21-68.8 21z"/>
            </svg>
        </div>
        <div class="flex items-center gap-1 p-1">
            <span class="text-[.6rem] text-nowrap font-bold">پیشنهاد ویژه</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-[#f39846]">
                <path d="M227.2 119.4c-9.9-12.4-30-32.8-49.4-51.6l-1.8-1.7c-14.7 14.8-32.7 34.3-50.7 56.6c-20.7 25.6-40.5 54.1-55 83C55.8 234.8 48 261.6 48 284.5C48 386.3 125.6 464 224 464c97.2 0 176-77.8 176-179.5c0-41.7-25.6-90.4-58.3-133.7c-11.3-14.9-22.6-28.1-32.5-38.9c-1.9 1.8-3.4 3.3-4.6 4.6c-1.3 1.3-1.8 2-1.9 2.1c0 0 0 0 0 0l-37.3 48.7-38.3-47.9zM0 284.5C0 152 176 0 176 0s29.4 27 55.9 53.8c12.8 12.9 24.9 25.8 32.7 35.6c6.8-8.9 23.5-23.3 35.1-32.9c7.1-5.8 12.3-9.9 12.3-9.9s136 121.4 136 237.9C448 412.2 348.2 512 224 512C98.4 512 0 412.1 0 284.5zM225.7 416C162.6 416 112 375.4 112 306.8c0-33.6 21.1-63 63.2-114.8c5.6 7 87.1 110.6 87.1 110.6l50.6-58.8c4.2 5.6 7 11.2 9.8 16.8c25.3 46.2 14 105-28.1 134.4c-21.1 14-43.5 21-68.8 21z"/>
            </svg>
        </div>
    </div>
</section>


<!-- hossain end -->





<!-- mahdi start -->
<div class="w-full flex flex-col items-center gap-5">
    <!-- <section class="w-11/12 h-10 bg-red-500 mx-auto rounded-xl"></section> -->
    <section class="w-11/12 gap-2 rounded-xl flex flex-col items-center ">
        <div class="w-full px-2 py-1 bg-white rounded-xl flex justify-between items-center shadow_box">
            <div class="w-full flex gap-3 items-center">
                <div class="w-9/12">
                    <div class="absolute right-6">
                        <svg width="64" height="78" viewBox="0 0 64 78" class="size-8 rotate-180">
                            <path d="M8 0H56V60L32 78L8 60Z" fill="#FF8A00"/>
                            <circle cx="32" cy="8" r="4" fill="white" opacity="0.9"/>
                            <text x="60" y="38" textAnchor="middle" rotate="180" fontSize="20" fontWeight="700" fill="white" class="">02%</text>
                        </svg>
                    </div>
                    <img src="{{asset('storage/resturan_img/807c88cc-7948-4f75-88e5-4c4598ab8175_1767800481_6872954f6e4630ba6c0eda84b2ca1882.jpg')}}" alt="" class="w-full min-h-29 max-h-29 rounded-xl">
                </div>
                <div class="w-full flex h-full flex-col gap-2 items-start">
                    <div class="w-full flex gap-2 items-center">
                        <span class="w-2 h-2 rounded-full bg-[#f6911e]"></span>
                        <h3 class="text-md font-bold">کاپوچینو</h3>
                    </div>
                    <div class="flex gap-2">

                        <span class="text-sm text-[#f6911e]">360,000</span>
                        <span class="text-sm text-[#f6911e]">تومان</span>
                    </div>
                    <p class="text-[9px] text-[#6B7280] mt-1">اسپرسو. شیر بخار دیده و فوم شیر</p>
                    <div class="flex flex-wrap gap-1">
                        <span class="px-2 py-1 rounded-full text-[9px] bg-[#f5d4ae] text-[#f6911e]">محبوب ها</span>
                        <span class="px-2 py-1 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                        <span class="px-2 py-1 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                    </div>
                    <div class="w-full flex items-center gap-1 justify-end pl-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-3" fill="#6B7280"><path d="M53.9 186.1C19.4 220.6 0 267.4 0 316.2v11.5C0 429.5 82.5 512 184.3 512h15.1C301.4 512 384 429.4 384 327.4c0-66.1-27.1-129.2-74.9-174.8L225.9 73.5c-6.3-6-9.9-14.4-9.9-23.2v-13-16C216 9.6 206.4 0 194.7 0c-6.7 0-13 3.2-17.1 8.5L168 21.3l-9.9 13.2c-14.4 19.3-23.2 42.2-25.2 66.2l-.9 10.8c-.3 3.9-.5 7.8-.4 11.7c.2 22.9 6.6 45.4 18.4 65c2.2 3.7 4.6 7.2 7.2 10.6L168 213.3l21.2 28.3c7 9.3 10.8 20.7 10.8 32.4v14c0 22.1-17.9 40-40 40s-40-17.9-40-40V229.3v-2.5V188.3c0-15.6-12.7-28.3-28.3-28.3c-1.3 0-2.6 .1-3.9 .3c-6 .8-11.7 3.6-16.1 8L53.9 186.1zm18.1 53V288c0 48.6 39.4 88 88 88s88-39.4 88-88V274c0-22.1-7.2-43.5-20.4-61.2l-32-42.7c-11.8-15.7-17.4-35.1-15.7-54.6l.9-10.8c.3-3.1 .7-6.1 1.3-9.1c3.1 4.5 6.7 8.8 10.8 12.6L276 187.4c38.3 36.5 60 87.1 60 140C336 402.9 274.9 464 199.4 464H184.3C109 464 48 403 48 327.7V316.2c0-27.7 8.5-54.6 24-77.2z"/></svg>
                        </div>
                        <span class="text-[9px] text-[#6B7280]">گالری</span>
                        <span class="text-[9px] text-[#6B7280]">120</span>
                    </div>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <span class="w-[1px] h-23 bg-[#F3F3F3] rounded-full"></span>
                <div class="h-full flex flex-col gap-3 items-center justify-between px-1">
                    <div class="w-7 h-7 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md">
                        <span class="text-2xl text-white">+</span>
                    </div>
                    <div class="w-7 h-7 bg-[#F3F3F3] flex justify-center items-center rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
                    </div>
                    <div class="w-7 h-7 bg-[#F3F3F3] flex justify-center items-center rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="24"
                             height="24"
                             viewBox="0 0 24 24">
                            <circle cx="6" cy="12" r="2" fill="#1D2433"/>
                            <circle cx="12" cy="12" r="2" fill="#1D2433"/>
                            <circle cx="18" cy="12" r="2" fill="#1D2433"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- mahdi end -->
</body>
</html>