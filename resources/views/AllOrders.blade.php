<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <title>سفارش‌های من</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- فونت وزیر -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        /* تنظیمات پایه */

        body {
            font-family: 'Vazir', Tahoma, Arial, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #d3d8ff);
            color: #2c2f7a;
            padding: 2rem 1rem;
            min-height: 100vh;
            direction: rtl;
            font-feature-settings: "tnum";
            font-variant-numeric: tabular-nums;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        h1 {
            font-weight: 900;
            font-size: 2.75rem;
            color: #4c51bf;
            text-align: center;
            margin-bottom: 3rem;
            user-select: none;
            text-shadow: 0 0 10px #696cff88;
        }

        .order-card {
            background: #fff;
            border-radius: 1.25rem;
            box-shadow:
                0 8px 20px rgba(72, 84, 255, 0.3),
                inset 0 0 12px rgba(255, 255, 255, 0.6);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
            overflow: hidden;
            margin-bottom: 2.5rem;
            border: 2px solid transparent;
        }
        .order-card:hover {
            transform: translateY(-6px);
            box-shadow:
                0 12px 40px rgba(72, 84, 255, 0.5),
                inset 0 0 15px rgba(255, 255, 255, 0.8);
            border-color: #5a4de8;
        }

        .accordion-button {
            width: 100%;
            cursor: pointer;
            padding: 1.25rem 2rem;
            background: transparent;
            border: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 900;
            font-size: 1.2rem;
            color: #5a4de8;
            user-select: none;
            transition: color 0.3s ease;
            border-bottom: 2px solid #d6dbff;
            letter-spacing: 0.04em;
        }
        .accordion-button:hover {
            color: #312ebf;
        }

        .accordion-icon {
            transition: transform 0.4s ease, color 0.4s ease;
            color: #5a4de8;
            font-size: 1.4rem;
            flex-shrink: 0;
        }
        .accordion-button.open .accordion-icon {
            transform: rotate(180deg);
            color: #312ebf;
        }

        .accordion-content {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transform: translateY(-10px);
            transition:
                max-height 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                opacity 0.4s ease,
                transform 0.4s ease;
            background: #eef1ff;
            padding: 0 2rem;
            border-top: 3px solid #5a4de8;
            font-feature-settings: "tnum";
            font-variant-numeric: tabular-nums;
        }


        .product-item {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.6rem;
            padding-bottom: 1.6rem;
            border-bottom: 1.5px solid #b9befd;
            align-items: center;
            transition: background-color 0.3s ease;
            border-radius: 12px;
        }
        .product-item:hover {
            background: #d7d9ff;
            box-shadow: 0 4px 15px rgba(72, 84, 255, 0.15);
        }
        .product-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .product-img {
            flex-shrink: 0;
            width: 120px;
            height: 120px;
            border-radius: 20px;
            object-fit: contain;
            background: white;
            box-shadow: 0 6px 20px rgba(91, 90, 236, 0.3);
            padding: 10px;
            transition: transform 0.3s ease;
        }
        .product-item:hover .product-img {
            transform: scale(1.07) rotate(-1deg);
        }
        .product-info {
            flex: 1;
            color: #2c2f7a;
            font-weight: 700;
            font-size: 1.05rem;
            line-height: 1.35;
            user-select: none;
        }
        .product-info h3 {
            font-size: 1.5rem;
            font-weight: 900;
            margin-bottom: 0.3rem;
            color: #312ebf;
            letter-spacing: 0.05em;
            text-shadow: 0 0 5px #a2a8ff88;
        }
        .product-info p {
            margin: 0.2rem 0;
            font-weight: 600;
            color: #4c51bf;
            display: flex;
            justify-content: space-between;
            padding: 0 0.5rem;
            border-radius: 8px;
            background: #f0f2ff;
            box-shadow: inset 0 0 10px #c3caf8;
            user-select: text;
        }
        .product-info span {
            font-weight: 800;
            color: #3333aa;
            font-family: 'Vazir', Tahoma, Arial, sans-serif;
            font-feature-settings: "tnum";
            font-variant-numeric: tabular-nums;
            font-size: 1rem;
            user-select: text;
        }
        .product-info p span[color] {
            font-weight: 900;
            color: inherit !important;
            user-select: text;
        }

        .empty-orders {
            text-align: center;
            padding: 4rem 2rem;
            background: #e6e8ff;
            border-radius: 1.5rem;
            box-shadow: 0 0 30px rgb(72 84 255 / 0.15);
            font-size: 1.4rem;
            color: #666;
            user-select: none;
            font-weight: 600;
            letter-spacing: 0.04em;
        }
        .empty-orders svg {
            margin-bottom: 2rem;
            color: #9a9ac0;
            stroke-width: 1.7;
            width: 90px;
            height: 90px;
            filter: drop-shadow(0 0 5px #8b8bf1cc);
        }

        .btn-products {
            display: inline-block;
            margin-top: 2rem;
            background: linear-gradient(135deg, #5a4de8, #312ebf);
            color: white;
            padding: 0.75rem 2.25rem;
            border-radius: 12px;
            font-weight: 900;
            font-size: 1.1rem;
            text-decoration: none;
            box-shadow:
                0 5px 15px rgba(72, 84, 255, 0.6);
            transition: all 0.35s ease;
            user-select: none;
        }
        .btn-products:hover {
            background: linear-gradient(135deg, #312ebf, #5a4de8);
            box-shadow:
                0 8px 25px rgba(48, 45, 209, 0.9);
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .product-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .product-img {
                width: 100%;
                height: auto;
            }
            .accordion-button {
                font-size: 1.1rem;
                padding: 1rem 1.25rem;
            }
        }
        /* حرکت‌ها نرم‌تر و ملایم‌تر */
        .order-card:hover {
            transition: transform 0.5s ease, box-shadow 0.5s ease;
            transform: translateY(-4px);
            box-shadow:
                0 12px 40px rgba(72, 84, 255, 0.4),
                inset 0 0 15px rgba(255, 255, 255, 0.85);
            border-color: #5a4de8;
        }

        .accordion-button {
            transition: color 0.4s ease;
        }

        .accordion-icon {
            transition: transform 0.5s ease, color 0.5s ease;
        }

        .accordion-content {
            transition:
                max-height 0.7s cubic-bezier(0.4, 0, 0.2, 1),
                opacity 0.5s ease,
                transform 0.5s ease;
        }

        /* طراحی جدید برای خطوط مشخصات محصول */
        .product-info p {
            background: white;
            box-shadow: 0 2px 10px rgba(91, 90, 236, 0.15);
            margin-bottom: 0.8rem;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            color: #4c51bf;
            font-weight: 600;
            font-size: 1.05rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: text;
            transition: background-color 0.3s ease;
            border: none; /* حذف خط کشیده */
        }

        .product-info p:last-child {
            margin-bottom: 0;
        }

        .product-info p span {
            font-weight: 700;
            color: #312ebf;
            font-family: 'Vazir', Tahoma, Arial, sans-serif;
        }

        .product-info p span[color] {
            color: inherit !important;
        }

        /* هاور ملایم روی هر خط مشخصات */
        .product-info p:hover {
            background-color: #e2e6ff;
        }

    </style>
</head>
<body>

<h1 style="margin-bottom: 20px">سفارش‌های ثبت‌شده {{auth()->user()->name}}</h1>

<div class="max-w-5xl mx-auto space-y-12">

    @if($orders->isEmpty())
        <div class="empty-orders" role="alert" aria-live="polite">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true" aria-label="آیکون خالی">
                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m15-9l2 9m-5-4h-8"/>
            </svg>
            شما هنوز سفارشی ثبت نکرده‌اید.
            <br>
            <a href="{{ route('Show-Index') }}" class="btn-products" role="button" tabindex="0">مشاهده محصولات</a>
        </div>
    @endif

        @foreach($orders as $order)
            @php
                $totalPrice = 0;
            @endphp
            <article class="order-card shadow-lg" aria-labelledby="order-title-{{ $order->id }}">
                <button
                    type="button"
                    id="order-title-{{ $order->id }}"
                    class="accordion-button"
                    aria-expanded="false"
                    aria-controls="order-content-{{ $order->id }}"
                    onclick="toggleAccordion(this)"
                >
                    <span>سفارش شماره <span class="text-indigo-700">{{ $loop->iteration }}</span></span>
                    <div class="flex gap-8 text-indigo-600 font-semibold text-sm shrink-0 whitespace-nowrap">
                        <span title="کد پیگیری">کد پیگیری: {{ $order->code }}</span>
                        <span title="شماره کارت">شماره کارت: {{ $order->cart_number }}</span>
                        <span title="وضعیت">
                    وضعیت:
                    @if($order->status == 1)
                                <span class="text-green-600 font-bold">پرداخت شده</span>
                            @elseif($order->status == 2)
                                <span class="text-green-600 font-bold">ارسال شده</span>
                            @else
                                <span class="text-gray-400 font-semibold">نامشخص</span>
                            @endif
                </span>

                        {{-- نمایش قیمت کل سفارش --}}
                        @foreach($order->products as $product)
                            @php
                                $totalPrice += $product->price * $product->pivot->quantity;
                            @endphp
                        @endforeach
                        <span title="قیمت کل سفارش" class="font-bold text-indigo-700">قیمت کل: {{ number_format($totalPrice) }} تومان</span>
                    </div>
                    <phosphor-icon name="caret-down" weight="bold" class="accordion-icon w-6 h-6"></phosphor-icon>
                </button>

                <section id="order-content-{{ $order->id }}" class="accordion-content" aria-hidden="true" tabindex="0">
                    @foreach($order->products as $product)
                        <div class="product-item" role="group" aria-label="{{ $product->name }}">
                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}"
                                 class="product-img"/>
                            <div class="product-info">
                                <h3>{{ $product->name }}</h3>

                                @php
                                    $p_price =  $product->price * $product->pivot->quantity
                                @endphp
                                <p>قیمت: <span>{{ number_format($p_price) }} تومان</span></p>
                                <p>تعداد: <span>{{ $product->pivot->quantity }}</span></p>
                                <p>سایز: <span>{{ $product->pivot->size }}</span></p>
                                <p>رنگ: <span
                                        style="color: {{ $product->pivot->color }}">{{ $product->pivot->color }}</span></p>
                            </div>
                        </div>
                    @endforeach
                </section>
            </article>
        @endforeach


</div>

<script>
    function toggleAccordion(button) {
        const contentId = button.getAttribute('aria-controls');
        const content = document.getElementById(contentId);
        const isOpen = content.classList.contains('open');

        if (isOpen) {
            content.classList.remove('open');
            content.setAttribute('aria-hidden', 'true');
            button.setAttribute('aria-expanded', 'false');
            button.classList.remove('open');
            content.parentElement.scrollIntoView({behavior: "smooth", block: "start"});
        } else {
            // قبل باز کردن همه آکاردئون‌ها رو می‌بندیم (اختیاری)
            document.querySelectorAll('.accordion-content.open').forEach(c => {
                c.classList.remove('open');
                c.setAttribute('aria-hidden', 'true');
                const btn = document.querySelector(`button[aria-controls="${c.id}"]`);
                if (btn) {
                    btn.setAttribute('aria-expanded', 'false');
                    btn.classList.remove('open');
                }
            });
            content.classList.add('open');
            content.setAttribute('aria-hidden', 'false');
            button.setAttribute('aria-expanded', 'true');
            button.classList.add('open');
            setTimeout(() => {
                content.scrollIntoView({behavior: "smooth", block: "start"});
            }, 350);
        }
    }
</script>

</body>
</html>

