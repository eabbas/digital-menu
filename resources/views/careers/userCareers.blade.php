
   @extends('user.panel')

   @section('title', 'کسب و کارهای من')
    
    @section('content')
      
    <div class="w-full flex flex-col p-4">
        <div class="bg-white rounded-lg">
            <div class="px-6 py-4">
                <h2 class="text-lg font-bold text-gray-800">اطلاعات کسب و کار</h2>
            </div>
            <div class="flex flex-col gap-5">
                <div class="overflow-x-auto shadow-md" style="scrollbar-width: none;">
                    <table class="min-w-full bg-gray-200">
                        <thead class="bg-gray-100">
                           
                            <tr>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 ">عنوان</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">استان</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">شهر</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">ادرس</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">توضیحات</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">نام کاربری</th>
                                <!-- <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">ایمیل</th> -->
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">لوگو</th>
                               
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">عملیات</th>
                              
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">-</th>
                                
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">-</th>
                               
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">-</th>
                            </tr>
                        </thead>
                        
                        
                        <tbody class="bg-white divide-y divide-[#f1f1f4]">
                                @foreach($user->careers as $career)
                                @if($career)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $career->title}}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $career->province}}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $career->city}}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $career->address}}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $career->description}}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $career->email}}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                          <img class="max-w-[50px] max-h-[50px]" src="<?= asset("storage/" . $career->logo) ?>">
                                    </td>
                                     <td class="px-6 py-4 text-sm font-medium">
                                        <a href="#" class="ml-4 text-sky-700">مشاهده</a>
                                        
                                    </td>
                                     <td class="px-6 py-4 text-sm font-medium">
                                        <a href="{{ route('user.career.edit', [$career])}}" class="ml-4 text-sky-700">ویرایش</a>
                                        
                                    </td>
                                     <td class="px-6 py-4 text-sm font-medium">
                                        <a href="{{ route('user.career.delete', [$career])}}" class="ml-4 text-sky-700">حذف</a>
                                        
                                    </td>
                                    @if($career->menu)
                                     <td class="px-6 py-4 text-sm font-medium">
                                        <a href="{{ route('user.career.menu.list', [$career])}}" class="ml-4 text-sky-700">مشاهده منو</a>
                                        
                                    </td>
                                    @endif
                                     @if(!$career->menu)
                                    <td class="px-6 py-4 text-sm font-medium"> 
                                        <a href="{{ route('user.career.menu.create', [$career])}}" class="ml-4 text-sky-700">ایجاد منو</a>
                                        
                                    </td>
                                @endif
                                </tr>
                                @else
                                <tr>
                                    <td  class="px-6 py-4 text-center text-sm text-gray-500">
                                        هیچ اطلاعاتی یافت نشد
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                       
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endsection
    
