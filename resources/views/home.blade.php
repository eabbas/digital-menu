<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>home</title>
</head> 
<body class="p-2 bg-[#fffff]">
    <header>
        <div class="w-full px-6 pt-4 pb-4 rounded-[15px] bg-[#00897b] flex flex-row-reverse justify-between">
            <div class="size-10 flex justify-center items-center rounded-[7px] bg-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                </svg>
            </div>
            <div class="w-[calc(100%-3rem)] bg-white flex flex-row rounded-[7px] items-center gap-2 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input class="focus:border-none" type="text" placeholder="جستجو">
            </div>
        </div>
    </header>
    <main class="w-full h-full p-5">
        <section>
            <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">پیشنهادات ویژه</h1>
                <a class="text-[13px] text-[#00897b]" href="#">مشاهده همه</a>
            </div>
            <div class="w-full bg-green-300 h-40 overflow-hidden rounded-[15px] my-3">
                <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/b1ddaeba-d51c-4633-9813-5c71022038d1.png') }}" alt="">
            </div>
            <div class="my-3 flex flex-row justify-center items-center gap-2">
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-[#00897b]"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
            </div>
             <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">محصولات</h1>
                <a class="text-[13px] text-[#00897b]" href="#">مشاهده همه</a>
            </div>
            <div class="flex flex-row gap-1 justify-between my-4">
                <div class="flex flex-col justify-center items-center">
                    <div class="size-17 rounded-full bg-gray-200 overflow-hidden">
                         <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/FiletMignon.png') }}" alt="">
                    </div>
                    <span class="text-sm ">غذای اصلی</span>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <div class="size-17 rounded-full bg-gray-200 overflow-hidden">
                         <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/Griledsalmon.png') }}" alt="">
                    </div>
                    <span class="text-sm ">دسر</span>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <div class="size-17 rounded-full bg-gray-200 overflow-hidden">
                        <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/CoqauVin.png') }}" alt="">
                    </div>
                    <span class="text-sm ">پیش غذا</span>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <div class="size-17 rounded-full bg-gray-200 overflow-hidden">
                         <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/AsianDuckBreast.png') }}" alt="">
                    </div>
                    <span class="text-sm ">نوشیدنی</span>
                </div>
            </div>
            <div class="flex flex-row justify-between items-center mt-5 mb-3">
          <h1 class="text-xl">پر فروش ترین محصولات</h1>
          <a class="text-[13px] text-[#00897b]" href="#">مشاهده همه</a>
      </div>
      <div class="flex flex-col gap-2">
        <div class="flex flex-row gap-3">
            <div class="relative after:content-[''] after:absolute after:top-2 after:right-2 after:size-7 after:bg-white after:rounded-full px-9 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2">
                <div class="w-full h-28 rounded-md overflow-hidden">
                    <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/38281431-4660-4c1c-a751-919550661c45.png') }}" alt="">
                </div>
            </div>
            <div class="relative after:content-[''] after:absolute after:top-2 after:right-2 after:size-7 after:bg-white after:rounded-full px-9 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2">
                <div class="w-full h-28 rounded-md overflow-hidden">
                    <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/d23dd270-36e2-4a16-b6f6-2f36ce0e3f14.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="flex flex-row gap-2">
            <div class="relative after:content-[''] after:absolute after:top-2 after:right-2 after:size-7 after:bg-white after:rounded-full px-9 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2">
                <div class="w-full h-28 rounded-md overflow-hidden">
                    <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/180026cb-69d9-4c84-9141-b98aa94d7c55.png') }}" alt="">
                </div>
            </div>
            <div class="relative after:content-[''] after:absolute after:top-2 after:right-2 after:size-7 after:bg-white after:rounded-full px-9 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2">
                <div class="w-full h-28 rounded-md overflow-hidden">
                    <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/2b83bf62-ce71-4225-82c5-33b0ad1d7e4d.png') }}" alt="">
                </div>
            </div>
        </div>
      </div>
        </section>
    </main>
</body>

</html>