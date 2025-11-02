
   @extends('user.panel')

   @section('title', 'کسب و کارهای من')
    
    @section('content')
      
    <div class="w-full flex flex-col p-4">
        <div class="bg-white rounded-lg">
            <div class="px-6 py-4">
                <h2 class="text-lg font-bold text-gray-800">اطلاعات کسب و کار</h2>
            </div>
            <div class="flex flex-col gap-5">
            @foreach($user->careers as $career)
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
                                @if(!$career->menu)
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">عملیات</th>
                                @endif
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">-</th>
                                @if($career->menu)
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">-</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white">
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
                              @if(!$career->menu)
                                <td class="px-6 py-4 text-sm font-medium"> 
                                    <a href="{{ route('user.career.menu.create')}}" class="ml-4 text-sky-700">ایجاد منو</a>
                                    
                                </td>
                            @endif
                                 <td class="px-6 py-4 text-sm font-medium">
                                    <a href="#" class="ml-4 text-sky-700">مشاهده</a>
                                    
                                </td>
                                @if($career->menu)
                                 <td class="px-6 py-4 text-sm font-medium">
                                    <a href="{{ route('user.career.menu.list')}}" class="ml-4 text-sky-700">مشاهده منو</a>
                                    
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
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
    @endsection
    
