 <style>
     input:focus {
         color: #2196F3;
     }
     textarea:focus{
        color: #2196F3;
     }
 </style>
 @extends('admin.app.panel')
 @section('title', ' محصولات فروشگاه')
 @section('content')

 <h1 class="text-2xl font-bold text-gray-800 text-center mb-5"> ایجاد محصولات فروشگاه </h1>
     <form action ="{{ route('ecomm_product.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="min-h-screen flex items-start justify-center">
             <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                     <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                         <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                             <label class="text-sm mb-1 mt-2.5 flex"> عنوان </label>
                             <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                             <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text" name="title" title="title">
                             </div>
                         </div>
                         <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                             <label class="text-sm mb-1 mt-2.5 flex"> تصویر </label>

                             <div
                                 class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                 <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                     name="image_path" title="image_path">
                             </div>
                         </div>
                         <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                             <label class="text-sm mb-1 mt-2.5 flex">قیمت</label>
                             <div
                                 class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                 <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                     name="price" title="price">
                             </div>
                         </div>
                         <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                             <label class="text-sm mb-1 mt-2.5 flex">تخفیف</label>
                             <div
                                 class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                 <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                     name="discount" title="discount">
                             </div>
                         </div>

                         <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                             <label class="text-sm mb-1 mt-2.5 flex">
                                فروشگاه
                             </label>
                             <select
                                 class="w-full px-4 py-3 bg-linear-to-r from-gray-50 to-white border border-gray-200 rounded-2xl shadow-sm focus:shadow-lg focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-300 cursor-pointer"
                                 onchange="getEcommCategories(this,'product')" class="bg-grey-500" name="ecomm_id"
                                 id="ecomm_id">
                                 @foreach ($user->ecomms as $user_ecomm)
                                     <option value="{{ $user_ecomm->id }}">{{ $user_ecomm->title }}</option>
                                 @endforeach
                             </select>
                         </div>

                         <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                             <label class="text-sm mb-1 mt-2.5 flex"> دسته بندی </label>
                             <select
                                 class="w-full px-4 py-3 bg-linear-to-r from-gray-50 to-white border border-gray-200 rounded-2xl shadow-sm focus:shadow-lg focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-300 cursor-pointer"
                                 name="ecomm_category_id" id="ecomCategories">
                                 @if (count($user->ecomms) < 0)
                                     @foreach ($user->ecomms[0]->ecomm_category as $ecomm_category)
                                         <option value="{{ $ecomm_category->id }}">{{ $ecomm_category->title }}</option>
                                     @endforeach
                                 @endif
                                 <option value="0">بدون والد</option>
                             </select>
                         </div>
                         <div class="w-full flex flex-row items-center gap-3 max-md:flex-col max-md:gap-1">
                             <input class="" type="checkbox" name="show_in_home" value="1">
                             <lable class="text-sm mb-1 mt-2.5 flex">این محصول جز صفحه اول هست</lable>
                         </div>

                         <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1 lg:col-span-2">
                             <label class="text-sm mb-1 mt-2.5 flex">توضیحات </label>
                             <div
                                 class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                 <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                     name="description" title="description"></textarea>
                             </div>
                         </div>
                     </div>
                     <div class="w-full text-left">

                         <button
                             class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer"
                             type="submit">ثبت</button>
                     </div>
             </div>
         </div>
     </form>

 @endsection
