@extends('client.document')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/tailwind.js') }}"></script>
@section('title', 'سینگل')
@section('content')
    <div class="flex justify-center">
        <div class="w-16/18">
            <section class="w-fill h-38 bg-[#1dcd0e] justify-between rounded-2xl flex gap-2 px-3 pt-3 overflow-hidden">
                <div class="w-5/12 h-full flex flex-col pb-3 justify-center gap-2">
                    <h2 class="text-[20px] text-[#fff] font-bold"> خریدخریدخ ریخرید</h2>
                    <button class="w-10/12 min-h-8 bg-[#fff] text-sm rounded-2xl text-[green] font-bold"> بالای 50 درصد</button>
                </div>
                <div class="w-7/12 h-40 flex  overflow-hidden">
                    <img src="{{ asset('assets/img/product/قیمت-گوشی-سامسونگ-Samsung-Galaxy-S24-Ultra-حافظه-512-رم-12-پارت-ویتنام.jpeg') }}" alt="" class=" h-45">
                </div>
            </section>
            <section class="w-full flex flex-col gap-3">
                <div class="w-full h-10 flex items-center justify-between ">
                    <span> مشاهده کردن بیشتر</span>
                    <a href="" class="text-[#1dcd0e]">دیدن همه</a>
                </div>
                <div class="w-full h-12 overflow-auto flex gap-2 items-center pb-1 text-[15px]">
                    <a href="" class="px-3 h-8 text-nowrap bg-[#fff] shadow-sm shadow-[#afa4a4] flex justify-center items-center font-bold rounded-xl">همه همه</a>
                    <a href="" class="px-3 h-8 text-nowrap bg-[#fff] shadow-sm shadow-[#afa4a4] flex justify-center items-center font-bold rounded-xl">همه همه</a>
                    <a href="" class="px-3 h-8 text-nowrap bg-[#fff] shadow-sm shadow-[#afa4a4] flex justify-center items-center font-bold rounded-xl">همه همه</a>
                    <a href="" class="px-3 h-8 text-nowrap bg-[#fff] shadow-sm shadow-[#afa4a4] flex justify-center items-center font-bold rounded-xl">همه همه</a>
                    <a href="" class="px-3 h-8 text-nowrap bg-[#fff] shadow-sm shadow-[#afa4a4] flex justify-center items-center font-bold rounded-xl">همه همه</a>
                </div>
                <div class="flex justify-between gap-2 flex-wrap gap-y-6 " >
                    <div class="w-[48%] flex flex-col gap-3 bg-[#fafafa] p-1 shadow-sm  rounded-xl">
                        <div class="w-full flex justify-center relative bg-[#afa4a4]">
                            <div class="absolute right-2 top-2 w-10 h-10 bg-[#fff] rounded-xl flex justify-center items-center">
                                <svg class="w-[28px] h-[28px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                </svg>
                            </div>
                            <img src="{{ asset('assets/img/product/images.jpg') }}" alt="" class="w-full rounded-xl ">
                        </div>
                        <div class="flex justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/product/icons8-star-15.png') }}" alt="">
                                <span>4.9</span>
                            </div>
                            <span class="text-[#868a88]"> ایرپاد پرو</span>
                        </div>
                        <span class="font-bold">1.500.000 تومان</span>

                    </div>
                    <div class="w-[48%] flex flex-col gap-3 bg-[#fafafa] p-1 shadow-sm rounded-xl">
                        <div class="w-full flex justify-center relative bg-[#afa4a4]">
                            <div class="absolute right-2 top-2 w-10 h-10 bg-[#fff] rounded-xl flex justify-center items-center">
                                <svg class="w-[28px] h-[28px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                </svg>
                            </div>
                            <img src="{{ asset('assets/img/product/images.jpg') }}" alt="" class="w-full rounded-xl ">
                        </div>
                        <div class="flex justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/product/icons8-star-15.png') }}" alt="">
                                <span>4.9</span>
                            </div>
                            <span class="text-[#868a88]"> ایرپاد پرو</span>
                        </div>
                        <span class="font-bold">1.500.000 تومان</span>

                    </div>
                    <div class="w-[45%] flex flex-col gap-3 bg-[#fafafa] p-1 shadow-sm  rounded-xl">
                        <div class="w-full flex justify-center relative bg-[#afa4a4]">
                            <div class="absolute right-2 top-2 w-10 h-10 bg-[#fff] rounded-xl flex justify-center items-center">
                                <svg class="w-[28px] h-[28px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                </svg>
                            </div>
                            <img src="{{ asset('assets/img/product/images.jpg') }}" alt="" class="w-full rounded-xl ">
                        </div>
                        <div class="flex justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/product/icons8-star-15.png') }}" alt="">
                                <span>4.9</span>
                            </div>
                            <span class="text-[#868a88]"> ایرپاد پرو</span>
                        </div>
                        <span class="font-bold">1.500.000 تومان</span>

                    </div>
                    <div class="w-[45%] flex flex-col gap-3 bg-[#fafafa] p-1 shadow-sm  rounded-xl">
                        <div class="w-full flex justify-center relative bg-[#afa4a4]">
                            <div class="absolute right-2 top-2 w-10 h-10 bg-[#fff] rounded-xl flex justify-center items-center">
                                <svg class="w-[28px] h-[28px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                </svg>
                            </div>
                            <img src="{{ asset('assets/img/product/images.jpg') }}" alt="" class="w-full rounded-xl ">
                        </div>
                        <div class="flex justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/img/product/icons8-star-15.png') }}" alt="">
                                <span>4.9</span>
                            </div>
                            <span class="text-[#868a88]"> ایرپاد پرو</span>
                        </div>
                        <span class="font-bold">1.500.000 تومان</span>

                    </div>

                </div>



            </section>






        </div>






    </div>
@endsection