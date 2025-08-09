<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <title>سفارش‌های من</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        /* انیمیشن نرم‌تر باز و بسته شدن محتوا */
        .content-collapsed {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.6s ease-in-out, padding 0.6s ease-in-out;
            padding-top: 0;
            padding-bottom: 0;
        }

        .content-expanded {
            max-height: 1500px; /* عدد بزرگ برای باز شدن کامل */
            transition: max-height 0.6s ease-in-out, padding 0.6s ease-in-out;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        /* هاور کارت سفارش */
        .order-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 25px rgba(99, 102, 241, 0.5);
        }

        /* آیکون چرخشی */
        .rotate-0 {
            transform: rotate(0deg);
            transition: transform 0.4s ease;
        }

        .rotate-180 {
            transform: rotate(180deg);
            transition: transform 0.4s ease;
        }
    </style>
</head>
<body class="bg-gradient-to-tr from-gray-50 to-purple-100 min-h-screen py-10 px-4 font-vazir">

<h1 class="text-4xl font-extrabold text-center text-purple-800 mb-10">سفارش‌های ثبت‌شده شما</h1>


<div class="space-y-8 max-w-5xl mx-auto">

    @if($orders->isEmpty())
        <div class="text-center p-8 bg-gray-100 rounded-xl shadow-md">
            <svg class="mx-auto mb-4 w-16 h-16 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m15-9l2 9m-5-4h-8"/>
            </svg>
            <h2 class="text-xl font-bold text-gray-700">هیچ سفارشی ثبت نکرده‌اید</h2>
            <p class="text-gray-500 mt-2">برای ثبت سفارش، به صفحه محصولات بروید و خرید خود را انجام دهید.</p>
            <a href="{{ route('Show-Index') }}"
               class="inline-block mt-4 px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition">
                مشاهده محصولات
            </a>
        </div>
    @endif

    @foreach($orders as $order)
        <div tabindex="0"
             class="order-card bg-white rounded-3xl shadow-xl p-6 cursor-pointer transition-transform duration-300 select-none"
             onclick="toggleOrder({{ $order->id }})"
             onkeypress="if(event.key === 'Enter') toggleOrder({{ $order->id }})">

            <div class="flex justify-between items-center">
                <div>

                    <h2 class="text-2xl font-bold text-indigo-800">سفارش شماره {{ $loop->iteration }} -
                        کد: {{ $order->code }}</h2>


                </div>
                <ph-icon name="caret-down" id="icon-{{ $order->id }}" class="rotate-0 text-indigo-600"
                         size="32"></ph-icon>
            </div>

            <div id="products-{{ $order->id }}" class="content-collapsed mt-5 space-y-6">
                @foreach($order->products as $product)
                    <div
                        class="flex flex-col md:flex-row bg-gradient-to-br from-purple-200 to-indigo-300 rounded-2xl p-4 shadow-md items-center">
                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}"
                             class="w-full md:w-40 h-40 object-contain rounded-xl shadow-md"/>
                        <div class="md:mr-6 mt-4 md:mt-0 flex-1 space-y-2 text-gray-700 text-right">
                            <h3 class="text-xl font-semibold text-indigo-900">{{ $product->name }}</h3>
                            <p><strong>قیمت:</strong> {{ number_format($product->price) }} تومان</p>
                            <p><strong>تعداد:</strong> {{ $product->pivot->quantity }}</p>
                            <p><strong>سایز:</strong> {{ $product->pivot->size }}</p>
                            <p><strong>رنگ:</strong> {{ $product->pivot->color }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

</div>

<script>
    function toggleOrder(id) {
        const productsDiv = document.getElementById('products-' + id);
        const icon = document.getElementById('icon-' + id);

        if (productsDiv.classList.contains('content-expanded')) {
            productsDiv.classList.remove('content-expanded');
            productsDiv.classList.add('content-collapsed');
            icon.classList.remove('rotate-180');
            icon.classList.add('rotate-0');
        } else {
            productsDiv.classList.remove('content-collapsed');
            productsDiv.classList.add('content-expanded');
            icon.classList.remove('rotate-0');
            icon.classList.add('rotate-180');
        }
    }
</script>

</body>
</html>
