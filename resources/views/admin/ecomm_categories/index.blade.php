@extends('admin.app.panel')
@section('title', ' دسته بندی فروشگاه')
@section('content')
<label for="">فیلتر بر اساس فروشگاه:</label>
<div class="items-center flex flex-cols justify-between mb-2">
<select class=" px-4 py-3 bg-gradient-to-r from-gray-50 to-white border border-gray-200 rounded-2xl shadow-sm focus:shadow-lg focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-300"  onchange="getEcommCategories(this,'filter')" class="bg-grey-500" name="ecomm_id" id="ecomm_id">
    <option  value="all">همه دسته بندی ها</option>
          @foreach($user->ecomms as $user_ecomm)
          <option  value="<?php echo $user_ecomm->id;?>"><?php echo $user_ecomm->title ?></option>
          
          @endforeach
        </select>

        </div>
                                         
                              
        <div class="">

            <div class="w-full flex flex-col pb-4">
                <div class="bg-white rounded-lg">
                    <div class="pb-4">
                        <h2 class="text-lg font-bold text-gray-800">اطلاعات دسته بندی</h2>
                    </div>
                    <div class="flex flex-col gap-5">
                        <div class="overflow-x-auto shadow-md" style="scrollbar-width: none;">
                            <div class="min-w-full bg-gray-200">
                                <div  class="w-full flex flex-row lg:grid lg:grid-cols-4 items-center divide-x divide-[#f1f1f4]">
                                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                          <span class="block w-20 lg:w-full">عنوان</span>
                                    </div>
                                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                        <span class="block w-24 lg:w-full">توضیحات</span>
                                    </div>
                                    
                                    
                                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                       <span class="block w-20 lg:w-full">عکس دسته بندی</span>
                                    </div>
                                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                       <span class="block w-20 lg:w-full"> بخش های دیگر</span>
                                    </div>
                         </div>
                         <div id="ecomCategories" class="bg-white divide-y divide-[#f1f1f4]">

                             <div   class="bg-white divide-y divide-[#f1f1f4]">
                                 @foreach ($user->ecomm_categories as $ecomm_category)
                                     @if ($ecomm_category)
                                         <div  class='w-full flex flex-row lg:grid lg:grid-cols-4 items-center divide-x divide-[#f1f1f4]'
                                            >
                                             <div
                                                 class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                                 <span class="block w-20 lg:w-full">{{ $ecomm_category->title }}</span>
                                             </div>
                                             <div
                                                 class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 w-[500px] lg:w-full text-center">
                                                 <span class="block w-24 lg:w-full">{{ $ecomm_category->description }}</span>
                                             </div>
                                            
                                            
                                             <div
                                                 class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                                 <div class="w-20 lg:w-full">
                                                     <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover"
                                                         src="<?= asset('storage/' . $ecomm_category->image_path) ?>">
                                                 </div>
                                             </div>
                                             <div class="flex justify-center items-center gap-1 w-full ">
                                                 
                                                     <div
                                                         class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                         <a href="{{ route('ecomm_category.show', [$ecomm_category]) }} " class="transition-all duration-150 hover:text-sky-400   hover:border-teal-500"
                                                            >مشاهده</a>
                                                     </div>
                                                     <div
                                                         class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                         <a href="{{route('ecomm_product.category_product',[$ecomm_category])}}" class="transition-all duration-150 hover:text-sky-400   hover:border-teal-500"
                                                            >مشاهده محصولات</a>
                                                     </div>
                                                     @if($ecomm_category->id!==1)
                                                     <div
                                                         class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                         <a href="{{ route('ecomm_category.edit', [$ecomm_category]) }}" class="transition-all duration-150 hover:text-sky-400   hover:border-teal-500"
                                                            >ویرایش</a>
                                                     </div>
                                                     <div
                                                         class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                         <a href="{{ route('ecomm_category.delete', [$ecomm_category]) }}" class="transition-all duration-150 hover:text-sky-400   hover:border-teal-500"
                                                            >حذف</a>
                                                     </div>
                                                     @endif
                                                     
                                                     @if ($ecomm_category->menu)
                                                         <div
                                                             class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                             <a href="{{ route('menu.list', [$ecomm_category]) }}"
                                                                >مشاهده منو</a>
                                                         </div>
                                                     @endif
                                                     <!-- @if (!$ecomm_category->menu)
                                                         <div
                                                             class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                             <a href="ssss{sss{ddd route ddd( dd'menu.create', [$ecomm_category])ddddddd }}"
                                                                 class="text-sky-700">ایجاد منو</a>
                                                         </div>
                                                     @endif -->
                                                  
                                             </div>
                                         </div>
                                     @else
                                         <div>
                                             <div class="px-1 lg:px-6 py-4 text-center text-xs lg:text-sm text-gray-500">
                                                 هیچ اطلاعاتی یافت نشد
                                             </div>
                                         </div>
                                     @endif
                                 @endforeach

                             </div>
                         </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
