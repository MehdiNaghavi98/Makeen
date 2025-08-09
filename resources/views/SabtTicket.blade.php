<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ارسال تیکت</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<div class="max-w-4xl mx-auto px-4 py-10">
    <div class="bg-white rounded-2xl shadow-md p-6 md:p-10 border border-green-200">
        <h2 class="text-2xl font-bold text-green-700 mb-6">🎫 ارسال تیکت جدید</h2>

        <form action="{{route('AddTicket')}}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="subject" class="block text-sm font-semibold text-gray-700">عنوان تیکت</label>
                <input  type="text" name="title" id="subject"
                       class="mt-2 w-full px-4 py-3 rounded-xl border border-green-300 focus:ring-2 focus:ring-green-400 focus:outline-none"
                       placeholder="مثلاً: سفارش من هنوز نرسیده">
            </div>

            <div>
                <label for="category" class="block text-sm font-semibold text-gray-700">دسته‌بندی</label>
                <select name="category" id="category"
                        class="mt-2 w-full px-4 py-3 rounded-xl border border-green-300 bg-white focus:ring-2 focus:ring-green-400 focus:outline-none">
                    <option value="order">سفارشات</option>
                    <option value="product">محصولات</option>
                    <option value="payment">پرداخت</option>
                    <option value="other">سایر</option>
                </select>
            </div>

            <div>
                <label for="message" class="block text-sm font-semibold text-gray-700">پیام شما</label>
                <textarea name="message" id="message" rows="5"
                          class="mt-2 w-full px-4 py-3 rounded-xl border border-green-300 focus:ring-2 focus:ring-green-400 focus:outline-none"
                          placeholder="اینجا بنویسید..."></textarea>
            </div>

            <div class="text-left">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl shadow transition-all duration-200">
                    ارسال تیکت
                </button>
            </div>
            <div style="margin-top:-50px;" class="text-left mt-4">
                <a style="margin-left: 550px" href="{{route('Show-All-Tickets')}}"
                   class="inline-flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-xl transition-all duration-200">
                    ⬅️ بازگشت به لیست تیکت‌ها
                </a>
            </div>

        </form>
    </div>
</div>

</body>
</html>
