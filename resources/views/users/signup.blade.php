<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>ثبت نام</title>
    <style>
        .kt-card{
            border-radius: 12px;
            border: 1px solid white;
            box-shadow: 0 1px  2px 0 #0000000d;
        }
        .kt-btn{
            height: calc(.25rem * 8.5);
            gap: calc(.25rem * 1.5);
            border-radius: calc(.5rem - 2px);
            padding-inline: calc(.25rem * 3);
            font-size: .8125rem;
            line-height: calc(1.25/.875);
        }
        .kt-btn-outline{
            border: 1px solid #e7e3e4;
            color: #1b1718;
            box-shadow: 0 0 #0000;
        }
        .kt-btn-outline:hover{
            background-color: #f5f4f4;
            color: #439699;
        }
        .kt-form-label{
            align-items: center;
            gap: calc(.25rem * 2);
            width: 100%;
            font-size: .875rem;
            line-height: 1;
            font-weight: 500;
            display: flex;
        }
        .kt-input{
            width: 100%;
            height: calc(.25rem * 8.5);
            border-radius: calc(.5rem - 2px);
            padding-inline: calc(.25rem * 3);
            font-size: .8125rem;
            line-height: calc(1.25/.875);
            outline: none;
            border: 1px solid #e7e3e4;
            color: #0b0809;
            box-shadow: 0 0 #0000;
            transition: all .15s;
        }
        .kt-input:focus-visible{
            border: 1px solid #9f9fa9;
            box-shadow: 0px 0px 3px 2px #b2b2ca;
        }
        .kt-input:not(input) {
            align-items: center;
            gap: calc(.25rem * 1.5);
            display: flex;
        }
        .kt-input:not(input) input{
            border-style: solid;
            width: 100%;
            height: auto;
            padding: calc(.25rem * 0);
            color: #0b0809;
            box-shadow: 0 0 #0000, 0 0 #0000, 0 0 #0000, 0 0 #0000, 0 0 #0000;
            transition: all .15s;
            background-color: #0000;
            border-width: 0;
            outline-style: none;
            display: flex;
        }
    </style>
</head>
<body>
    <main class="w-full h-svh bg-[url('https://keenthemes.com/static/metronic/tailwind/dist/assets/media/images/2600x1200/bg-10.png')] bg-cover bg-no-repeat flex flex-row justify-center items-center">
        <div class="kt-card max-w-[370px] w-full">
            <form action="{{url('user/store')}}" method="post" class="flex flex-col gap-5 p-10 bg-white">
                @csrf
                <div class="text-center mb-2.5">
                    <h3 class="text-lg font-medium text-mono leading-none mb-2.5">
                        ثبت نام
                    </h3>
                    <div class="flex items-center justify-center">
                        <span class="text-sm text-secondary-foreground me-1.5">
                            اکانت دارید؟
                        </span>
                        <a href="#" class="text-sm">ورود</a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2.5">
                    <a href="#" class="kt-btn kt-btn-outline flex items-center justify-center">
                        <img src="https://keenthemes.com/static/metronic/tailwind/dist/assets/media/brand-logos/google.svg" class="size-3.5 shrink-0" alt="google logo">
                        استفاده از گوگل
                    </a>
                    <a href="#" class="kt-btn kt-btn-outline flex items-center justify-center">
                        <img src="https://keenthemes.com/static/metronic/tailwind/dist/assets/media/brand-logos/apple-black.svg" class="size-3.5 shrink-0" alt="google logo">
                        استفاده از اپل
                    </a>
                </div>
                <div class="flex items-center gap-2">
                    <span class="border-t border-[#eeeaeb] w-full"></span>
                    <span class="text-xs text-[#1b1718] uppercase">یا</span>
                    <span class="border-t border-[#eeeaeb] w-full"></span>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="name" class="kt-form-label text-[#0b0809]">نام</label>
                    <input type="text" name="name" id="name" class="kt-input" placeholder="...">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="phoneNumber" class="kt-form-label text-[#0b0809]">شماره تلفن</label>
                    <input type="phoneNumber" name="phoneNumber" id="phoneNumber" class="kt-input" >
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password" class="kt-form-label text-[#0b0809]">گذرواژه</label>
                    <div class="kt-input">
                        <input type="password" name="password" id="password" class="outline-none">

                    </div>
                </div>
                <div class="flex flex-row justify-start items-center">
                    <input type="checkbox" name="accept" id="accept">
                    <label for="accept" class="text-sm text-[#0b0809] mr-2 flex flex-row justify-start items-center">
                        <a href="#">شرایط و قوانین</a>
                        را میپذیرم
                    </label>
                </div>
                <button class="py-1.5 rounded-md text-white text-sm font-bold bg-[#2b7fff] cursor-pointer hover:bg-[#2b7fff]/90">ثبت نام</button>
            </form>
        </div>
    </main>
</body>
</html>