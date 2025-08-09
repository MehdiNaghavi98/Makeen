<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>درگاه پرداخت سداد</title>
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
    <style>
        body::before {
            content: "";
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: url('{{ asset('img/payment_sedad.png') }}') no-repeat center center;
            background-size: 1000px; /* اندازه دلخواه */
            opacity: 0.2; /* خیلی کم‌رنگ */
            z-index: -1;
        }

        body {
            font-family: tahoma, sans-serif;
            margin: 0;
            background: #f2f2f2;
            direction: rtl;
            direction: rtl;
        }

        .top-bar {
            background-color: #fbd100;
            padding: 10px 20px;
        }

        .logo {
            height: 40px;
        }

        .container {
            display: flex;
            justify-content: center;
            margin: 30px auto;
            max-width: 1000px;
        }

        .left-box {
            width: 40%;
            background: white;
            padding: 20px;
            text-align: center;
            border-left: 1px solid #ccc;
        }

        .left-box h4 {
            margin-bottom: 20px;
            color: #555;
        }

        .keypad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin: 15px 0;
        }

        .keypad div {
            padding: 10px;
            background: #eee;
            border-radius: 6px;
            font-size: 18px;
        }

        .info {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        .right-box {
            width: 60%;
            background: #fbd100;
            padding: 25px;
            box-sizing: border-box;
        }

        .right-box h3 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-size: 15px;
        }

        .amount-box {
            background: #fffbe6;
            border: 1px solid #ffd633;
            border-radius: 8px;
            padding: 12px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #444;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .amount-box .amount {
            color: #2fad41;
            font-size: 18px;
        }

        input[type="text"],
        input[type="password"],
        select {
            padding: 8px;
            border: none;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .row {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .captcha-row {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .captcha-img {
            height: 38px;
            border-radius: 6px;
            background: white;
        }

        .refresh-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .buttons {
            margin-top: 20px;
            display: flex;
            gap: 15px;
        }

        .pay {
            background: #2fad41;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }

        .cancel {
            background: #e43f3f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #555;
        }

        .footer img {
            height: 50px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<img style="width: 100px;height: 100px" src="{{ asset('/img/logos.png') }}" alt="لوگوی سداد" class="logo">
<div class="top-bar"></div>

<div class="container">

    <div class="right-box">
        <h3 style="margin-right: 180px">درگاه پر
            داخت سداد</h3>
        <form action="{{route('Final-Order' , $id)}}"  method="post">
            @csrf
            <label>شماره کارت:</label>
            <input name="cart_number" type="text" id="cardNumber" placeholder="0000-0000-0000-0000" maxlength="19"
                   style="direction: ltr; text-align: right;" required>

            <div class="row">
                <div style="flex: 1;">
                    <label>ماه انقضا:</label>
                    <select required>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                </div>
                <div style="flex: 1;">
                    <label>سال انقضا:</label>
                    <select required>
                        @for($i = 1403; $i <= 1410; $i++)
                            <option>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <label>CVV2:</label>
            <input required type="text">

            <!-- کپچا -->
            <label>کد امنیتی:</label>
            <div class="captcha-row">
                <canvas id="captchaCanvas" width="100" height="38" class="captcha-img"></canvas>
                <button type="button" class="refresh-btn" onclick="generateCaptcha()">🔄</button>
                <input type="text" id="captchaInput" placeholder="کد را وارد کنید">
            </div>

            <label>رمز دوم اینترنتی:</label>
            <input required type="password">
            <label>ایمیل :</label>
            <input type="text">
            <div class="amount-box">
                مبلغ قابل پرداخت: <span class="amount">{{number_format($id)}}</span> تومان
            </div>

            <div class="buttons">
                <button type="submit" class="pay">پرداخت</button>
                <a href="{{route('Show-Orders')}}" style="text-decoration: none" class="cancel">انصراف</a>
            </div>
        </form>
    </div>
</div>

<div class="footer">
    <img style="height:120px;width: 120px; border-radius: 10px" src="{{ asset('img/payment_sedad.png') }}" alt="نماد">
    <p>درگاهی مطمئن برای پرداخت‌های اینترنتی</p>
</div>


<script>
    function refreshCaptcha() {
        const captcha = document.getElementById('captcha');
        const rand = Math.floor(Math.random() * 5) + 1;
        captcha.src = "{{ asset('img/captcha/captcha') }}" + rand + ".png";
    }

    let generatedCaptcha = '';

    function randomCaptchaText(length) {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        let result = '';
        for (let i = 0; i < length; i++) {
            result += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return result;
    }

    function drawCaptcha(text) {
        const canvas = document.getElementById('captchaCanvas');
        const ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // پس‌زمینه
        ctx.fillStyle = '#fff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // متن
        ctx.font = '20px Tahoma';
        ctx.fillStyle = '#000';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(text, canvas.width / 2, canvas.height / 2);

        // خطوط نویز
        for (let i = 0; i < 2; i++) {
            ctx.strokeStyle = '#ccc';
            ctx.beginPath();
            ctx.moveTo(Math.random() * canvas.width, Math.random() * canvas.height);
            ctx.lineTo(Math.random() * canvas.width, Math.random() * canvas.height);
            ctx.stroke();
        }
    }

    function generateCaptcha() {
        generatedCaptcha = randomCaptchaText(5);
        drawCaptcha(generatedCaptcha);
    }


    window.onload = generateCaptcha;

    const cardInput = document.getElementById('cardNumber');

    cardInput.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // فقط عدد
        value = value.substring(0, 16); // حداکثر ۱۶ رقم

        // اضافه کردن فاصله بین هر 4 رقم
        const formatted = value.replace(/(.{4})/g, '$1 ').trim();
        e.target.value = formatted;
    });


</script>

</body>
</html>
