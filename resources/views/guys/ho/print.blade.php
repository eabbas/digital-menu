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

<!-- mahdi start -->
<div class="w-full flex flex-col items-center gap-5">
    <!-- <section class="w-11/12 h-10 bg-red-500 mx-auto rounded-xl"></section> -->
    <section class="w-11/12 gap-2 rounded-xl flex flex-col items-center mt-2 ">
        <div class="w-full px-2 py-1.5 bg-white rounded-xl flex justify-between items-center shadow_box">
            <div class="w-full flex gap-3 items-center">
                <div class="w-7/12">
                    <div class="absolute right-6">
                        <svg width="64" height="78" viewBox="0 0 64 78" class="size-8 rotate-180">
                            <path d="M8 0H56V60L32 78L8 60Z" fill="#FF8A00"/>
                            <circle cx="32" cy="8" r="4" fill="white" opacity="0.9"/>
                            <text x="60" y="38" textAnchor="middle" rotate="180" fontSize="20" fontWeight="700" fill="white" class="">02%</text>
                        </svg>
                    </div>
                    <img src="{{asset('storage/resturan_img/807c88cc-7948-4f75-88e5-4c4598ab8175_1767800481_6872954f6e4630ba6c0eda84b2ca1882.jpg')}}" alt="" class="w-full min-h-24 max-h-24 rounded-xl">
                </div>
                <div class="w-full flex h-full flex-col gap-1 items-start">
                    <div class="w-full flex gap-1 items-center">
                        <span class="w-[7px] h-[7px] rounded-full bg-[#f6911e]"></span>
                        <h3 class="text-[14px] font-bold">کاپوچینو</h3>
                    </div>
                    <div class="flex gap-1">

                        <span class="text-[10px] text-[#f6911e]">360,000</span>
                        <span class="text-[10px] text-[#f6911e]">تومان</span>
                    </div>
                    <p class="text-[10px] text-[#6B7280] mt-0.5">اسپرسو. شیر بخار دیده و فوم شیر</p>
                    <div class="flex flex-wrap gap-1">
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#f5d4ae] text-[#f6911e]">محبوب ها</span>
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                    </div>
                    <div class="w-full flex items-center gap-1 justify-end pl-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-3" fill="#6B7280"><path d="M53.9 186.1C19.4 220.6 0 267.4 0 316.2v11.5C0 429.5 82.5 512 184.3 512h15.1C301.4 512 384 429.4 384 327.4c0-66.1-27.1-129.2-74.9-174.8L225.9 73.5c-6.3-6-9.9-14.4-9.9-23.2v-13-16C216 9.6 206.4 0 194.7 0c-6.7 0-13 3.2-17.1 8.5L168 21.3l-9.9 13.2c-14.4 19.3-23.2 42.2-25.2 66.2l-.9 10.8c-.3 3.9-.5 7.8-.4 11.7c.2 22.9 6.6 45.4 18.4 65c2.2 3.7 4.6 7.2 7.2 10.6L168 213.3l21.2 28.3c7 9.3 10.8 20.7 10.8 32.4v14c0 22.1-17.9 40-40 40s-40-17.9-40-40V229.3v-2.5V188.3c0-15.6-12.7-28.3-28.3-28.3c-1.3 0-2.6 .1-3.9 .3c-6 .8-11.7 3.6-16.1 8L53.9 186.1zm18.1 53V288c0 48.6 39.4 88 88 88s88-39.4 88-88V274c0-22.1-7.2-43.5-20.4-61.2l-32-42.7c-11.8-15.7-17.4-35.1-15.7-54.6l.9-10.8c.3-3.1 .7-6.1 1.3-9.1c3.1 4.5 6.7 8.8 10.8 12.6L276 187.4c38.3 36.5 60 87.1 60 140C336 402.9 274.9 464 199.4 464H184.3C109 464 48 403 48 327.7V316.2c0-27.7 8.5-54.6 24-77.2z"/></svg>
                        </div>
                        <span class="text-[8px] text-[#6B7280]">گالری</span>
                        <span class="text-[8px] text-[#6B7280]">120</span>
                    </div>
                </div>
            </div>
            <div class="flex gap-1 items-center">
                <span class="w-[1px] h-23 bg-[#F3F3F3] rounded-full"></span>
                <div class="h-full flex flex-col gap-3 items-center justify-between px-1">
                    <div class="size-7 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md">
                        <span class="text-2xl text-white">+</span>
                    </div>
                    <div class="size-7 bg-[#F3F3F3] flex justify-center items-center rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
                    </div>
                    <div class="size-7 bg-[#F3F3F3] flex justify-center items-center rounded-md">
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
        <div class="w-full px-2 py-1.5 bg-white rounded-xl flex justify-between items-center shadow_box">
            <div class="w-full flex gap-3 items-center">
                <div class="w-7/12">
                    <div class="absolute right-6">
                        <svg width="64" height="78" viewBox="0 0 64 78" class="size-8 rotate-180">
                            <path d="M8 0H56V60L32 78L8 60Z" fill="#FF8A00"/>
                            <circle cx="32" cy="8" r="4" fill="white" opacity="0.9"/>
                            <text x="60" y="38" textAnchor="middle" rotate="180" fontSize="20" fontWeight="700" fill="white" class="">02%</text>
                        </svg>
                    </div>
                    <img src="{{asset('storage/resturan_img/807c88cc-7948-4f75-88e5-4c4598ab8175_1767800481_6872954f6e4630ba6c0eda84b2ca1882.jpg')}}" alt="" class="w-full min-h-24 max-h-24 rounded-xl">
                </div>
                <div class="w-full flex h-full flex-col gap-1 items-start">
                    <div class="w-full flex gap-1 items-center">
                        <span class="w-[7px] h-[7px] rounded-full bg-[#f6911e]"></span>
                        <h3 class="text-[14px] font-bold">کاپوچینو</h3>
                    </div>
                    <div class="flex gap-1">

                        <span class="text-[10px] text-[#f6911e]">360,000</span>
                        <span class="text-[10px] text-[#f6911e]">تومان</span>
                    </div>
                    <p class="text-[10px] text-[#6B7280] mt-0.5">اسپرسو. شیر بخار دیده و فوم شیر</p>
                    <div class="flex flex-wrap gap-1">
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#f5d4ae] text-[#f6911e]">محبوب ها</span>
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                    </div>
                    <div class="w-full flex items-center gap-1 justify-end pl-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-3" fill="#6B7280"><path d="M53.9 186.1C19.4 220.6 0 267.4 0 316.2v11.5C0 429.5 82.5 512 184.3 512h15.1C301.4 512 384 429.4 384 327.4c0-66.1-27.1-129.2-74.9-174.8L225.9 73.5c-6.3-6-9.9-14.4-9.9-23.2v-13-16C216 9.6 206.4 0 194.7 0c-6.7 0-13 3.2-17.1 8.5L168 21.3l-9.9 13.2c-14.4 19.3-23.2 42.2-25.2 66.2l-.9 10.8c-.3 3.9-.5 7.8-.4 11.7c.2 22.9 6.6 45.4 18.4 65c2.2 3.7 4.6 7.2 7.2 10.6L168 213.3l21.2 28.3c7 9.3 10.8 20.7 10.8 32.4v14c0 22.1-17.9 40-40 40s-40-17.9-40-40V229.3v-2.5V188.3c0-15.6-12.7-28.3-28.3-28.3c-1.3 0-2.6 .1-3.9 .3c-6 .8-11.7 3.6-16.1 8L53.9 186.1zm18.1 53V288c0 48.6 39.4 88 88 88s88-39.4 88-88V274c0-22.1-7.2-43.5-20.4-61.2l-32-42.7c-11.8-15.7-17.4-35.1-15.7-54.6l.9-10.8c.3-3.1 .7-6.1 1.3-9.1c3.1 4.5 6.7 8.8 10.8 12.6L276 187.4c38.3 36.5 60 87.1 60 140C336 402.9 274.9 464 199.4 464H184.3C109 464 48 403 48 327.7V316.2c0-27.7 8.5-54.6 24-77.2z"/></svg>
                        </div>
                        <span class="text-[8px] text-[#6B7280]">گالری</span>
                        <span class="text-[8px] text-[#6B7280]">120</span>
                    </div>
                </div>
            </div>
            <div class="flex gap-1 items-center">
                <span class="w-[1px] h-23 bg-[#F3F3F3] rounded-full"></span>
                <div class="h-full flex flex-col gap-3 items-center justify-between px-1">
                    <div class="size-7 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md">
                        <span class="text-2xl text-white">+</span>
                    </div>
                    <div class="size-7 bg-[#F3F3F3] flex justify-center items-center rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
                    </div>
                    <div class="size-7 bg-[#F3F3F3] flex justify-center items-center rounded-md">
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
        <div class="w-full px-2 py-1.5 bg-white rounded-xl flex justify-between items-center shadow_box">
            <div class="w-full flex gap-3 items-center">
                <div class="w-7/12">
                    <div class="absolute right-6">
                        <svg width="64" height="78" viewBox="0 0 64 78" class="size-8 rotate-180">
                            <path d="M8 0H56V60L32 78L8 60Z" fill="#FF8A00"/>
                            <circle cx="32" cy="8" r="4" fill="white" opacity="0.9"/>
                            <text x="60" y="38" textAnchor="middle" rotate="180" fontSize="20" fontWeight="700" fill="white" class="">02%</text>
                        </svg>
                    </div>
                    <img src="{{asset('storage/resturan_img/807c88cc-7948-4f75-88e5-4c4598ab8175_1767800481_6872954f6e4630ba6c0eda84b2ca1882.jpg')}}" alt="" class="w-full min-h-24 max-h-24 rounded-xl">
                </div>
                <div class="w-full flex h-full flex-col gap-1 items-start">
                    <div class="w-full flex gap-1 items-center">
                        <span class="w-[7px] h-[7px] rounded-full bg-[#f6911e]"></span>
                        <h3 class="text-[14px] font-bold">کاپوچینو</h3>
                    </div>
                    <div class="flex gap-1">

                        <span class="text-[10px] text-[#f6911e]">360,000</span>
                        <span class="text-[10px] text-[#f6911e]">تومان</span>
                    </div>
                    <p class="text-[10px] text-[#6B7280] mt-0.5">اسپرسو. شیر بخار دیده و فوم شیر</p>
                    <div class="flex flex-wrap gap-1">
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#f5d4ae] text-[#f6911e]">محبوب ها</span>
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                    </div>
                    <div class="w-full flex items-center gap-1 justify-end pl-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-3" fill="#6B7280"><path d="M53.9 186.1C19.4 220.6 0 267.4 0 316.2v11.5C0 429.5 82.5 512 184.3 512h15.1C301.4 512 384 429.4 384 327.4c0-66.1-27.1-129.2-74.9-174.8L225.9 73.5c-6.3-6-9.9-14.4-9.9-23.2v-13-16C216 9.6 206.4 0 194.7 0c-6.7 0-13 3.2-17.1 8.5L168 21.3l-9.9 13.2c-14.4 19.3-23.2 42.2-25.2 66.2l-.9 10.8c-.3 3.9-.5 7.8-.4 11.7c.2 22.9 6.6 45.4 18.4 65c2.2 3.7 4.6 7.2 7.2 10.6L168 213.3l21.2 28.3c7 9.3 10.8 20.7 10.8 32.4v14c0 22.1-17.9 40-40 40s-40-17.9-40-40V229.3v-2.5V188.3c0-15.6-12.7-28.3-28.3-28.3c-1.3 0-2.6 .1-3.9 .3c-6 .8-11.7 3.6-16.1 8L53.9 186.1zm18.1 53V288c0 48.6 39.4 88 88 88s88-39.4 88-88V274c0-22.1-7.2-43.5-20.4-61.2l-32-42.7c-11.8-15.7-17.4-35.1-15.7-54.6l.9-10.8c.3-3.1 .7-6.1 1.3-9.1c3.1 4.5 6.7 8.8 10.8 12.6L276 187.4c38.3 36.5 60 87.1 60 140C336 402.9 274.9 464 199.4 464H184.3C109 464 48 403 48 327.7V316.2c0-27.7 8.5-54.6 24-77.2z"/></svg>
                        </div>
                        <span class="text-[8px] text-[#6B7280]">گالری</span>
                        <span class="text-[8px] text-[#6B7280]">120</span>
                    </div>
                </div>
            </div>
            <div class="flex gap-1 items-center">
                <span class="w-[1px] h-23 bg-[#F3F3F3] rounded-full"></span>
                <div class="h-full flex flex-col gap-3 items-center justify-between px-1">
                    <div class="size-7 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md">
                        <span class="text-2xl text-white">+</span>
                    </div>
                    <div class="size-7 bg-[#F3F3F3] flex justify-center items-center rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
                    </div>
                    <div class="size-7 bg-[#F3F3F3] flex justify-center items-center rounded-md">
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