<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>سبد خرید</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fa;
            font-family: "Vazir", sans-serif;
        }

        /* جدول اصلی */
        .table {
            border-collapse: separate;
            border-spacing: 0 16px;
        }

        .table-responsive {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.05);
        }

        /* تیتر جدول */
        .table thead th {
            background-color: transparent;
            border: none;
            color: #212529;
            font-size: 13px;
            text-transform: uppercase;
        }

        /* ردیف‌ها شبیه کارت */
        .table tbody tr {
            background: linear-gradient(135deg, #e9f5ec, #f8fcf9);
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }

        .table tbody tr:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.07);
        }

        /* سلول‌های جدول */
        .table td {
            border: none !important;
            background-color: transparent !important;
            padding: 16px 12px;
            font-size: 14px;
            color: #212529;
            vertical-align: middle !important;
        }

        .table td:first-child {
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        .table td:last-child {
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        /* عکس محصول */
        img.rounded {
            border-radius: 10px;
            border: 1px solid #d0e3d6;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        img.rounded:hover {
            transform: scale(1.05);
        }

        /* دکمه‌ها */
        .btn {
            border-radius: 8px !important;
            font-size: 13px;
            padding: 6px 12px;
            font-weight: 500;
        }

        .btn-success {
            background-color: #198754;
            color: white;
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-success:hover {
            background-color: #157347;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-danger:hover {
            background-color: #b02a37;
            transform: scale(1.05);
        }

        /* دکمه ثبت سفارش نهایی */
        .btn.btn-lg.btn-success {
            font-size: 16px;
            padding: 12px 32px;
            border-radius: 12px;
            background: linear-gradient(135deg, #198754, #28c76f);
            box-shadow: 0 8px 16px rgba(25, 135, 84, 0.25);
            transition: all 0.3s ease;
        }

        .btn.btn-lg.btn-success:hover {
            background: linear-gradient(135deg, #157347, #198754);
            transform: translateY(-2px);
        }

        /* دکمه بازگشت */
        .btn-back {
            background: linear-gradient(135deg, #e0f2f1, #c8e6c9);
            color: #14532d;
            padding: 10px 24px;
            font-weight: bold;
            font-size: 15px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            display: inline-block;
            text-decoration: none;
        }

        .btn-back:hover {
            background: linear-gradient(135deg, #d1e7dd, #a5d6a7);
            color: #0f3d2e;
            transform: translateY(-2px);
        }

        /* جمع کل */
        .table-light.fw-bold {
            background-color: #eef5f0 !important;
            font-weight: bold;
            font-size: 15px;
            box-shadow: inset 0 0 0 999px rgba(0, 0, 0, 0.01);
            color: #198754;
        }

        /* هشدار کمبود موجودی */
        .text-danger {
            font-weight: bold;
            color: #dc3545 !important;
        }

        /* ریسپانسیو */
        @media (max-width: 768px) {
            .table td, .table th {
                font-size: 12px;
            }

            img.rounded {
                width: 50px;
                height: 50px;
            }

            .btn {
                font-size: 12px;
                padding: 5px 10px;
            }

            .btn.btn-lg.btn-success {
                font-size: 14px;
                padding: 10px 24px;
            }

            h2 {
                font-size: 20px;
            }
        }

        .gateway-selection {
            margin-top: 30px;
            text-align: center;
        }

        .choose-text {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .gateways {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .gateway-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px 15px;
            width: 160px;
            transition: 0.3s;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
        }

        .gateway-box:hover {
            background: #e6f2ff;
            border-color: #007bff;
        }

        .gateway-box span {
            font-size: 14px;
            color: #333;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .gateway-box img {
            width: 80px;
            height: auto;
        }

        /* ریسپانسیو برای موبایل */
        @media (max-width: 480px) {
            .gateways {
                flex-direction: column;
                align-items: center;
            }

            .gateway-box {
                width: 90%;
            }
        }


    </style>

</head>
<body>
<div class="container py-5">
    <h2 class="text-success mb-4 text-center">سبد خرید شما</h2>

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle shadow-sm">
            <thead class="table-success">
            <tr>
                <th>تصویر</th>
                <th>نام</th>
                <th>رنگ</th>
                <th>سایز</th>
                <th>قیمت واحد</th>
                <th>تعداد</th>
                <th>جمع</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            <!-- حلقه foreach برای آیتم‌ها -->
            @foreach($products as $product)
                <tr>
                    <form action="{{route('UpdateOrder' , $product->id)}}" method="POST">
                        @csrf
                        <td>
                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="محصول" width="60"
                                 height="60" class="rounded">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td><input type="hidden" name="color"
                                   value="{{ $product->pivot->color }}">{{ $product->pivot->color }}</td>
                        <td><input type="hidden" name="size"
                                   value="{{ $product->pivot->size }}">{{ $product->pivot->size }}</td>

                        <td>{{ number_format($product->price) . ' تومان' }}</td>

                        @if($product->pivot->quantity > $product->quantity)
                            <td class="text-danger">تعداد درخواستی بیشتر از موجودی است</td>
                        @else
                            <td>
                                <input type="number"
                                       name="quantity"
                                       class="form-control form-control-sm w-50"
                                       value="{{ $product->pivot->quantity }}"
                                       min="1"
                                       max="{{ $product->quantity }}">
                            </td>
                        @endif

                        <td>{{ number_format($product->price * $product->pivot->quantity) . ' تومان' }}</td>
                        <td class="d-flex">
                            <button type="submit" class="btn btn-success">بروزرسانی</button>
                    </form>
                    <form action="{{ route('DeleteOrder') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="color" value="{{ $product->pivot->color }}">
                        <input type="hidden" name="size" value="{{ $product->pivot->size }}">
                        <button style="margin-right:10px; justify-content: center; margin-top: 5px;:  " type="submit"
                                class="btn btn-danger btn-sm">حذف
                        </button>
                    </form>
                </tr>

            @endforeach

            <!-- پایان foreach -->
            @php $total = 0;     @endphp
            @foreach($products as $product)
                @php
                    $total += $product->price * $product->pivot->quantity
                @endphp
            @endforeach
            <tr class="table-light fw-bold">
                <td colspan="6" class="text-end">جمع کل:</td>
                <td colspan="2" class="text-success">{{number_format($total) . ' ' . 'تومان'}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <form action="{{route('Show-Payment-Mellat',  $total)}}" method="GET">
        @csrf
        <div class="text-end mt-4">
            <a href="{{ route('Show-Shop') }}" style="margin-top: 20px;margin-left: 1150px" class="btn btn-back mb-4">←
                بازگشت</a>
            <div class="gateway-selection">
                <p class="choose-text">لطفاً درگاه پرداخت مورد نظر را انتخاب کنید:</p>

                <div class="gateways">
                    <a href="{{ route('Show-Payment-Mellat', $total) }}" class="gateway-box">
                        <span>پرداخت با درگاه ملت</span>
                        <img src="{{ asset('/img/payment_melat.png') }}" alt="ملت">
                    </a>

                    <a href="{{ route('Show-Payment-Sedad', $total) }}" class="gateway-box">
                        <span>پرداخت با درگاه سداد</span>
                        <img src="{{ asset('/img/payment_sedad.png') }}" alt="سداد">
                    </a>
                </div>


            </div>

        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
