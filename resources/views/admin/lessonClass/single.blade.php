@extends('admin.app.panel')
@section('title', 'نمایش کلاس | ' . $class->title)

@section('content')
<div class="w-full min-h-screen bg-gradient-to-br from-gray-50 to-indigo-50/30 pb-10">

    {{-- Hero Section با طراحی کاملاً ریسپانسیو و بدون اسکرول افقی --}}
    <div class="relative w-full overflow-hidden bg-white shadow-lg rounded-b-3xl">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/5 to-purple-600/5"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-indigo-300/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-purple-300/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3"></div>
        
        <div class="relative px-4 py-5 md:px-8 md:py-8">
            {{-- برچسب‌ها: در موبایل به صورت خودکار در چند خط (wrap) --}}
            <div class="flex flex-wrap gap-2 mb-4">
                <a href="{{ route('institute.single', [$class->lesson->field->institute->id]) }}" 
                   class="inline-flex items-center gap-1 bg-white/80 hover:bg-white text-purple-700 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm transition-all">
                    🏫 آموزشگاه {{ $class->lesson->field->institute->title }}
                </a>
                <a href="{{ route('lesson.single', [$class->lesson->id]) }}" 
                   class="inline-flex items-center gap-1 bg-white/80 hover:bg-white text-sky-700 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm transition-all">
                    📘 درس {{ $class->lesson->title }}
                </a>
                <span class="inline-flex items-center gap-1 bg-white/80 text-gray-700 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm">
                    👨‍🏫 استاد: @if($class->master) {{ $class->master->name }} {{ $class->master->family }} @else — @endif
                </span>
            </div>

            {{-- عنوان و دکمه‌های مدیریت (در موبایل به صورت ستونی) --}}
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <h1 class="text-2xl md:text-4xl font-extrabold text-gray-800">
                    <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        کلاس {{ $class->title }}
                    </span>
                </h1>
                
                @if (Auth::user()->role[0]->title == 'admin')
                {{-- دکمه‌های ادمین: در موبایل به صورت دو ردیفی (grid با ۲ ستون) --}}
                <div class="grid grid-cols-2 gap-2 w-full lg:flex lg:w-auto">
                    <a href="{{ route('class.add_student', [$class]) }}" 
                       class="flex items-center justify-center gap-1 bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-2 rounded-xl text-sm font-medium shadow-md transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                        <span>دانش‌آموز</span>
                    </a>
                    <a href="{{ route('class.add_master', [$class]) }}" 
                       class="flex items-center justify-center gap-1 bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-2 rounded-xl text-sm font-medium shadow-md transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span>افزودن استاد</span>
                    </a>
                    <a href="{{ route('class.student_list', [$class]) }}"
class="flex items-center justify-center gap-1 bg-rose-500 hover:bg-rose-600 text-white px-3 py-2 rounded-xl text-sm font-medium shadow-md transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>لیست دانش‌آموزان</span>
                    </a>
                    <a href="{{ route('class.comments', [$class]) }}" 
                       class="flex items-center justify-center gap-1 bg-rose-500 hover:bg-rose-600 text-white px-3 py-2 rounded-xl text-sm font-medium shadow-md transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span>نظرات</span>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- محتوای اصلی --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        
        {{-- تصویر کلاس --}}
        <div class="mb-10 group">
            <div class="relative overflow-hidden rounded-2xl shadow-xl bg-gray-100">
                @if($class->image && Storage::disk('public')->exists($class->image))
                    <img src="{{ asset('storage/'.$class->image) }}" 
                         alt="تصویر کلاس {{ $class->title }}"
                         class="w-full h-72 md:h-96 object-cover transition-transform duration-700 group-hover:scale-105">
                @else
                    <div class="w-full h-72 md:h-96 flex flex-col items-center justify-center bg-gradient-to-br from-gray-200 to-gray-300 text-gray-500">
                        <svg class="w-28 h-28 mb-3 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="font-medium">تصویری برای این کلاس ثبت نشده</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                @if (Auth::user()->role[0]->title == 'admin')
                <div class="absolute top-4 left-4 z-10">
                    <a href="{{ route('class.edit', [$class]) }}" 
                       class="inline-flex items-center gap-2 bg-white/90 backdrop-blur-sm hover:bg-white text-gray-800 px-3 py-1.5 md:px-4 md:py-2 rounded-full text-xs md:text-sm font-medium shadow-lg transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        ویرایش
                    </a>
                </div>
                @endif
            </div>
        </div>

        {{-- توضیحات و تکالیف --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 mb-10">
            <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-all hover:shadow-lg">
                <div class="bg-gradient-to-r from-indigo-50 to-white px-5 py-3 md:px-6 md:py-4 border-b"><h3 class="flex items-center gap-2 text-base md:text-lg font-bold text-gray-800">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        توضیحات کلاس
                    </h3>
                </div>
                <div class="p-5 md:p-6 prose max-w-none text-gray-600 leading-relaxed">
                    @if ($class->description)
                        {!! nl2br(e($class->description)) !!}
                    @else
                        <div class="text-center py-8 text-gray-400 italic">📝 توضیحی برای این کلاس ثبت نشده است.</div>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-all hover:shadow-lg">
                <div class="bg-gradient-to-r from-amber-50 to-white px-5 py-3 md:px-6 md:py-4 border-b">
                    <h3 class="flex items-center gap-2 text-base md:text-lg font-bold text-gray-800">
                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        تکالیف
                    </h3>
                </div>
                <div class="p-5 md:p-6 prose max-w-none text-gray-600 leading-relaxed">
                    @if ($class->assignment)
                        {!! nl2br(e($class->assignment)) !!}
                    @else
                        <div class="text-center py-8 text-gray-400 italic">📌 تکلیفی برای این کلاس ثبت نشده است.</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- پیوست‌ها --}}
        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 mb-10">
            <div class="bg-gradient-to-r from-sky-50 to-white px-5 py-3 md:px-6 md:py-4 border-b">
                <h3 class="flex items-center gap-2 text-base md:text-lg font-bold text-gray-800">
                    <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                    پیوست‌های کلاس
                </h3>
            </div>
            <div class="p-5 md:p-6">
                @if($class->class_attachments->count() > 0)
                    @foreach($class->class_attachments as $attachment)
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-3 md:p-4 mb-3 md:mb-4 bg-gray-50 rounded-xl border border-gray-200 hover:border-sky-200 transition-all hover:shadow-md">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="font-bold text-gray-800 text-sm md:text-base">{{ $attachment->title }}</span>
                                <span class="text-xs bg-sky-100 text-sky-700 px-2 py-0.5 rounded-full">.{{ strtoupper($attachment->type) }}</span>
                            </div>
                            @if($attachment->description)
                                <p class="text-xs md:text-sm text-gray-500 mt-1">{{ $attachment->description }}</p>
                            @endif
                        </div>
                        <a href="{{ route('course.download', [$attachment->id]) }}" target="_blank" class="flex items-center gap-2 bg-sky-500 hover:bg-sky-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-xl text-xs md:text-sm font-medium shadow transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            دانلود
                        </a>
                    </div>
                    @endforeach
                @else
                    <div class="text-center py-8 md:py-12 text-gray-400 italic">
                        <svg class="w-10 h-10 md:w-12 md:h-12 mx-auto mb-3 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        پیوستی برای این کلاس ثبت نشده است.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection