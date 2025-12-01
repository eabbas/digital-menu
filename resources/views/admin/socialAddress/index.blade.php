@extends('admin.app.panel')
    @section('title', ' لیست  شبکه های اجتماعی ')
    @section('content')


    <div class="w-full flex flex-col pb-4">
    <div class="bg-white rounded-lg">
        <div class="pb-4">
            <h2 class="text-lg font-bold text-gray-800"> لیست   شبکه های اجتماعی </h2>
        </div>
        <div class="flex flex-col gap-2">
            <div class="overflow-x-auto shadow-md" style="scrollbar-width: none;">
                <div class="min-w-full bg-gray-200">
                    <div class="bg-gray-100 grid grid-cols-8 items-center divide-x divide-[#f1f1f4]">
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600">عنوان</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-3">عملیات</div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
      @foreach($socialAddresses as $socialAddress)
                        @if($socialAddress)
                        <div class="grid grid-cols-8 items-center divide-x divide-[#f1f1f4]">
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $socialAddress->username}}</div>
                            </div>
                            <div class="w-full grid grid-cols-2 col-span-3 h-full divide-x divide-[#f1f1f4]">
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('socialAddress.edit', [$socialAddress])}}" class="ml-4 text-sky-700">ویرایش</a>
                                </div>
                            </div>
                            <div class="w-full grid grid-cols-2 col-span-3 h-full divide-x divide-[#f1f1f4]">
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('socialAddress.delete', [$socialAddress])}}" class="ml-4 text-sky-700">حذف</a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div>
                            <div class="px-6 py-4 text-center text-sm text-gray-500">
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
    @endsection