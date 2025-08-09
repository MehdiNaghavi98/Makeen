<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>سفارش ثبت شد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #e9f5ec, #d4ede1);
            font-family: "Vazir", sans-serif;
            padding: 50px 20px;
        }

        .success-box {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 30px;
            max-width: 700px;
            margin: auto;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .success-box:hover {
            transform: scale(1.01);
        }

        .success-box h2 {
            color: #198754;
            margin-bottom: 20px;
        }

        .detail-card {
            background: #f7fcfa;
            border: 1px solid #c9e4d5;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            text-align: right;
        }

        .detail-card strong {
            color: #14532d;
        }

        .btn-home {
            margin-top: 25px;
            padding: 12px 30px;
            background: linear-gradient(135deg, #198754, #28c76f);
            color: white;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-home:hover {
            background: linear-gradient(135deg, #157347, #198754);
            transform: translateY(-2px);
            color: #fff;
        }

        .tracking-code {
            font-size: 18px;
            background: #fff6e0;
            border: 1px dashed #ffc107;
            padding: 10px 15px;
            border-radius: 10px;
            margin-top: 20px;
            display: inline-block;
            color: #ff6f00;
            font-weight: bold;
        }

        .detail-card {
            text-align: right;
        }

    </style>
</head>
<body>
<div class="success-box">
    <h2>✅ سفارش شما با موفقیت ثبت شد، {{ auth()->user()->name }} عزیز</h2>

    <div class="detail-card" style="text-align: right;">
        <p><strong>شماره کارت:</strong> {{ substr($order->cart_number, -4) }}-****-****-****</p>
    </div>

    <div class="detail-card" style="text-align: right;">
        <p><strong>محصولات خریداری‌شده:</strong></p>
        <ul style="list-style-type: none; padding: 0;">
            @foreach($OrderProducts as $product)

                <li style="margin-bottom: 15px; background: #f9f9f9; padding: 12px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); display: flex; align-items: center; gap: 15px;">
                    <img src="{{ asset('uploads/products/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px; border: 1px solid #ddd;">
                    <div>
                        <strong>نام محصول:</strong> {{ $product->name }} <br>
                        <strong>رنگ:</strong> {{ $product->pivot->color }} <br>
                        <strong>سایز:</strong> {{ $product->pivot->size }} <br>
                        <strong>تعداد:</strong> {{ $product->pivot->quantity }}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="detail-card">
        <p><strong>مبلغ پرداختی:</strong> {{ number_format($order->total_price) }} تومان</p>
    </div>
    <div class="detail-card">
        @if($order->status == 1)
            <p><strong> وضعیت : </strong><strong style="color: orange">پرداخت شده</strong></p>
        @endif
    </div>

    <div class="tracking-code">
        کد پیگیری: {{ $order->code }}
    </div>

    <a href="/" class="btn-home">بازگشت به فروشگاه</a>
</div>


<script>
    // تولید کد پیگیری رندوم
    function generateTrackingCode() {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let code = '';
        for (let i = 0; i < 10; i++) {
            code += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        document.getElementById('trackingCode').innerText = 'کد پیگیری: ' + code;
    }

    window.onload = generateTrackingCode;
</script>

</body>
</html>
