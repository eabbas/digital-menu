<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام رستوران - دیجیتال منو</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <form action="{{url('resturant/store')}}" enctype='multipart/form-data'></form>
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
            <!-- هدر -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">ثبت نام رستوران</h1>
                <p class="text-gray-600 mt-2">اطلاعات رستوران خود را وارد کنید</p>
            </div>

            <!-- فرم ثبت نام -->
            <form class="space-y-6">
               
               
                <!--  شماره تلفن -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"> شماره تلفن</label>
                    <input 
                        type="text" 
                        name='phone_number'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="+98"
                    >
                </div>
                <!-- رمز عبور -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">رمز عبور</label>
                    <input 
                        type="password" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="حداقل 8 کاراکتر"
                    >
                </div>

                <!-- دکمه ثبت نام -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-medium"
                >
                    ثبت نام رستوران
                </button>
            </form>

            <!-- لینک ورود -->
            <div class="text-center mt-6">
                <p class="text-gray-600">
                    قبلاً ثبت نام کرده‌اید؟
                    <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">وارد شوید</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>