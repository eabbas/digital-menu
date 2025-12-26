 <style>
     input:focus {
         color: #2196F3;
     }

     .selectbox {
         position: relative;
     }

     select {
         border: 1px solid #EEE;
         border-radius: .25rem;
         padding: .5rem 1.5rem .5rem .5rem;
         display: flex;
         background-color: white;
         outline: 0;
         cursor: pointer;
         appearance: none;
     }
 </style>
 @extends('admin.app.panel')
 @section('title', 'دسته بندی فروشگاه')
 @section('content')

     <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">فرم ایجاد دسته بندی فروشگاه </h1>
     <form action ="{{ route('ecomm_category.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="min-h-screen flex items-start justify-center">
             <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                 <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                     <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                         <label class="text-sm mb-1 mt-2.5 flex"> عنوان </label>

                         <div
                             class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                             <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                 name="title" title="title " required>
                         </div>
                     </div>
                     <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                         <label class="text-sm mb-1 mt-2.5 flex"> عکس دسته </label>

                         <div
                             class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                             <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                 name="image_path" title="image_path" placholder="عکس خود را وارد کنید">
                         </div>
                     </div>
                    

                     <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                         <label class="text-sm mb-1 mt-2.5 flex"> فروشگاه : </label>

                         <select
                             class="w-full px-4 py-3 bg-linear-to-r from-gray-50 to-white border border-gray-200 rounded-2xl shadow-sm focus:shadow-lg focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-300 cursor-pointer"
                             onchange="getEcommCategories(this,'category')" name="ecomm_id" id="ecomm_id">
                             @foreach ($user->ecomms as $user_ecomm)
                                 <option value="<?php echo $user_ecomm->id; ?>"><?php echo $user_ecomm->title; ?></option>
                             @endforeach
                         </select>
                     </div>

                     <div class="selectbox w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                         <label class="text-sm mb-1 mt-2.5 flex"> والددسته ها </label>
                         <select
                             class="w-full px-4 py-3 bg-linear-to-r from-gray-50 to-white border border-gray-200 rounded-2xl shadow-sm focus:shadow-lg focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-300 cursor-pointer"
                             name="parent_id" id="ecomCategories">

                             @foreach ($user->ecomms[0]->ecomm_category as $ecomm_category)
                             @if($ecomm_category->title!=="بدون دسته بندی")
                                 <option value="{{ $ecomm_category->id }}">{{ $ecomm_category->title }}</option>
                                 @endif
                                 @endforeach
                             <option value="0">بدون والد</option>
                         </select>
                     </div>

                     <div class="w-full flex flex-row items-center gap-3 max-md:flex-row max-md:gap-1">

                         <input class="" type="checkbox" name="show_in_home" value="1">
                         <lable class="text-sm mb-1 mt-2.5 flex">این دسته جز صفحه اول هست</lable>
                     </div>



                      <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1 lg:col-span-2">
                         <label class="text-sm mb-1 mt-2.5 flex">توضیحات</label>

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
