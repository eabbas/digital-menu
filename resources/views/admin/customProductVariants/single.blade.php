@extends('admin.app.panel')
@section('title', 'صفحه تک انواع محصول ')
@section('content')
<div class="w-full">
            <div class="pb-5 w-full">
                <h1 class="text-xl text-center lg:text-start">صفحه تک  نوع محصول</h1>
            </div>
    <div class="pt-3 mt-4 lg:mt-8">
        <div class="shadow__profaill__karbary rounded-md lg:p-5 p-2 mb-3 lg:mb-5">
            <h1 class="lg:text-xl mt-5 font-bold pb-3 border-b border-gray-200">جزییات محصول </h1>
           
            <div class="w-full lg:w-1/2 flex flex-col gap-y-3 lg:gap-y-5 mt-5">
                <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                    <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                        نام محصول
                    </div>
                    <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                       {{ $cpVariants->title }}
                    </div>
                </div>
                <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                    <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                       توضیحات
                    </div>
                    <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                       {{ $cpVariants->description }}
                    </div>
                </div>
                <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                    <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                       حداقل مقدار واحد   
                    </div>
                    <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                       {{ $cpVariants->min_amount_unit }}
                    </div>
                </div>
                <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                    <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                         محصول سفارشی شده   
                    </div>
                    <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                       {{ $cpVariants->custom_product->title }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection