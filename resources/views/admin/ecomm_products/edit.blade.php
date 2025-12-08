@extends('admin.app.panel')
@section('title', 'ویرایش محصول ')
@section('content')
<section class="2xl:container mx-auto">
    <div class="w-full mx-auto pb-5">
        <fieldset class="border-2 rounded-[10px] border-gray-400 shadow">
            <legend class="lg:text-3xl md:text-2xl text-md font-semibold text-end text-gray-500 p-5 rounded-full">
     ویرایش اطلاعات محصول
            </legend>
            <form action="{{ route('ecomm_product.update')}}" method="post" enctype='multipart/form-data'
                class="w-11/12 lg:w-3/4 mx-auto py-5 rounded-lg">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 lg:gap-4">
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="title">
                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان
                            </legend>
                            <input type="title" name="title" value="{{$ecomm_product->title}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$ecomm_product -> id}}">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="image_path">
                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm"> عکس 
                            </legend>
                            <input type="file" name="image_path" class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    
                   
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="description">
                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">توضیحات
                            </legend>
                            <input type="province" name="description" value="{{$ecomm_product->description}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="price">
                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">قیمت
                            </legend>
                            <input type="city" name="price" value="{{$ecomm_product ->price}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="discount">
                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">تخفیف
                            </legend>
                            <input type="address" name="discount" value="{{$ecomm_product ->discount}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="ecomm_id">
                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">فروشگاه 
                            </legend>
                             <select class="bg-grey-500" name="ecomm_id" id="ecomm_id"  onchange="getEcommCategories(this,'edit')">
                                    @foreach($user->ecomms as $user_ecomm)
                                       <option value="<?php echo $user_ecomm->id;?>"  @if($ecomm_product->ecomm_id==$user_ecomm->id)
                                          {{"selected"}}
                                         @endif ><?php echo $user_ecomm->title ?></option>
          
                                    @endforeach
                               </select>
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="address">
                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">دسته بندی 
                            </legend>
                             <select class="bg-grey-500" name="ecomm_category_id" id="ecomCategories">
                                    @foreach($ecomm_categories as $ecomm_category)
                                       <option value="<?php echo $ecomm_category->id;?>"  @if($ecomm_product->ecomm_categories[0]->id==$ecomm_category->id)
                                               {{"selected"}}
                                         @endif ><?php echo $ecomm_category->title ?></option>
          
                                    @endforeach
                               </select>
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">

                        <lable class="w-30 text-sm mb-1 mt-2.5 flex">این محصول جز صفحه  اول هست</lable>
                              <input  value="1" type="checkbox" name="show_in_home"    
                              @if ($ecomm_product->show_in_home) {{"checked"}} @endif
                             >
                     </div>
                </div> 

                </div> 
                    
                   
                   
                <div class="text-center md:px-12 mt-5 lg:mt-10">
                    <button
                        class="w-5/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-10 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ثبت</button>
                </div>
            </form>
        </fieldset>
    </div>
</section>
@endsection