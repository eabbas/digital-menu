<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="2xl:container mx-auto w-10/12">
        <div class="w-full p-5 border-none mt-5 rounded-3xl relative shadow__header bg-[#e8355d]">
            <h1 class="text-[20px] text-center text-3xl font-bold py-5 text-white">
                لیست منوی {{ $career->title }}
            </h1>
            <div class="w-full flex flex-col gap-3 p-3 border border-gray-300 rounded-lg bg-[#ffff] in__shadow">
                @foreach(json_decode($career->menu->page_data) as $data)
                <div class="w-full m-auto">
                    <h2 class="text-xl font-semibold text-[#8e180f] mb-3">{{ $data->name }}</h2>
                    <div class="w-full flex flex-col gap-3">
                        @foreach($data->values as $value)
                        <div class="flex grid grid-cols-3 gap-4">
                            <div class="py-1 rounded-lg p-3 items__shadow text-center text-sm active:text-white active:bg-[#8e180f]">{{ $value->title }}</div>
                            <div class="py-1 rounded-lg p-3 items__shadow text-center text-sm active:text-white active:bg-[#8e180f]">{{ $value->price }}</div>
                            <div class="py-1 rounded-lg p-3 items__shadow text-center text-sm active:text-white active:bg-[#8e180f]">{{ $value->description }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    

</body>
</html>