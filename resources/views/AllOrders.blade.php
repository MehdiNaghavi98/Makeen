<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>سفارش‌های من</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        @keyframes pop-in {
            0% {opacity: 0; transform: scale(0.95);}
            100% {opacity: 1; transform: scale(1);}
        }
        .animate-pop {
            animation: pop-in 0.5s ease-out;
        }
    </style>
</head>
<body class="bg-gradient-to-tr from-gray-50 to-purple-100 min-h-screen py-10 px-4">

<h1 class="text-4xl font-extrabold text-center text-purple-800 mb-10">سفارش‌های ثبت‌شده شما</h1>

<div class="space-y-10 max-w-5xl mx-auto">

    <!-- شروع سفارش -->
    <div class="bg-white shadow-xl rounded-3xl overflow-hidden flex flex-col md:flex-row animate-pop">

        <!-- عکس محصول -->
        <div class="md:w-1/3 bg-gradient-to-br from-purple-200 to-indigo-300 p-6 flex justify-center items-center">
            <img src="https://via.placeholder.com/300x300" alt="محصول" class="w-full h-60 object-contain rounded-2xl shadow-md">
        </div>

        <!-- اطلاعات سفارش -->
        <div class="md:w-2/3 p-6 space-y-4 bg-white">

            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-indigo-800">کفش اسپرت مردانه</h2>
                <span class="text-sm font-medium text-gray-500">کد پیگیری: <span class="text-indigo-700">AB123456789</span></span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
                <div class="flex items-center gap-2">
                    <i class="ph ph-currency-circle-dollar text-indigo-600 text-lg"></i>
                    قیمت: ۳۲۰٬۰۰۰ تومان
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph ph-number-circle-eight text-indigo-600 text-lg"></i>
                    تعداد: ۲ عدد
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph ph-credit-card text-indigo-600 text-lg"></i>
                    شماره کارت: 6037 **** **** 1234
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph ph-shirt-folded text-indigo-600 text-lg"></i>
                    سایز: ۴۲
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph ph-palette text-indigo-600 text-lg"></i>
                    رنگ:
                    <span class="inline-block w-4 h-4 rounded-full border ml-1" style="background-color: #1f2937;"></span>
                    مشکی
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph ph-check-circle text-indigo-600 text-lg"></i>
                    وضعیت:
                    <span class="text-green-600 font-semibold">ارسال شده</span>
                </div>
            </div>

        </div>
    </div>
    <!-- پایان سفارش -->

    <!-- سفارش بعدی: می‌تونی کپی کنی و مقادیرشو عوض کنی -->

</div>

</body>
</html>
