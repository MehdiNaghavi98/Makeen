<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <title>درگاه پرداخت ملت</title>
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
</head>
<body>
<div class="payment-box">
    <div class="header">
        <div class="top-bar">
            <img src="{{ asset('img/bank.png') }}" alt="لوگو" class="logo"/>
            <span class="title">پرداخت الکترونیکی به پرداخت ملت</span>
            <span class="url">www.behpardakht.com</span>
        </div>
        <div class="red-wave"></div>
    </div>

    <div class="form-content">
        <div class="timer" id="timer">۱۰:۰۰ : زمان باقی مانده</div>

        <script>
            // مدت زمان اولیه بر حسب ثانیه (10 دقیقه)
            let timeLeft = 600;

            function updateTimer() {
                const timerEl = document.getElementById('timer');

                // محاسبه دقیقه و ثانیه
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;

                // ساخت متن تایمر به صورت mm:ss با صفر پیشوند
                const formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')} : زمان باقی مانده`;

                timerEl.textContent = formattedTime;

                if (timeLeft > 0) {
                    timeLeft--;
                    setTimeout(updateTimer, 1000);
                } else {
                    // تایمر به صفر رسید - می‌تونی اینجا کاری انجام بدی مثلا فرم رو غیر فعال کنی
                    timerEl.textContent = "زمان به پایان رسید";
                }
            }

            // شروع تایمر
            updateTimer();
        </script>


        <form action="{{route('Show-Final' , $id)}}"  method="Get">
            @csrf
            <div class="input-group">
                <input
                    type="text"
                    id="card-number"
                    placeholder="____-____-____-____"
                    maxlength="19"
                    autocomplete="off"
                    name="cart_number"
                    required
                />
                <script>
                    const cardInput = document.getElementById('card-number');
                    cardInput.addEventListener('input', function (e) {
                        let value = e.target.value;
                        value = value.replace(/[^0-9\-]/g, '');
                        value = value.replace(/\-/g, '');
                        let formattedValue = '';
                        for (let i = 0; i < value.length; i++) {
                            if (i > 0 && i % 4 === 0) {
                                formattedValue += '-';
                            }
                            formattedValue += value[i];
                        }
                        e.target.value = formattedValue;
                    });
                </script>
                <i class="bi bi-credit-card icon"></i>
            </div>

            <div class="input-group">
                <input type="password" placeholder="رمز اینترنتی کارت" required/>
                <i class="bi bi-lock icon"></i>
            </div>

            <div class="input-group">
                <input type="password" placeholder="شماره شناسایی دوم (CVV2)" required/>
                <i class="bi bi-question-circle icon"></i>
            </div>

            <div class="input-double">
                <input style="width: 90%" type="text" placeholder="سال" required/>
                <input style="width: 90%" type="text" placeholder="ماه" required/>
            </div>

            <div class="captcha">
                <canvas style="margin-bottom:20px; margin-top: 20px" id="captcha" width="90" height="30"></canvas>
                <i class="bi bi-arrow-clockwise icon" id="refreshCaptcha"></i>
                <div style="margin-top: 15px" class="input-group">
                    <input type="text" placeholder="کد امنیتی کپچا" autocomplete="off" required>
                    <i class="bi bi-shield-lock icon"></i>
                </div>
            </div>


            <script>
                function randomText(length) {
                    const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
                    let result = '';
                    for (let i = 0; i < length; i++) {
                        result += chars.charAt(Math.floor(Math.random() * chars.length));
                    }
                    return result;
                }

                function drawCaptcha(text) {
                    const canvas = document.getElementById('captcha');
                    const ctx = canvas.getContext('2d');
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.fillStyle = '#ddd';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    ctx.font = '22px Arial';
                    ctx.fillStyle = '#000';
                    ctx.textBaseline = 'middle';
                    ctx.textAlign = 'center';
                    ctx.fillText(text, canvas.width / 2, canvas.height / 2);
                }

                function refreshCaptcha() {
                    const text = randomText(5);
                    drawCaptcha(text);
                    window.currentCaptcha = text;
                }

                document.getElementById('refreshCaptcha').addEventListener('click', refreshCaptcha);

                refreshCaptcha();
            </script>
            <div class="input-group">
                <input type="email" placeholder="ایمیل اختیاری"/>
            </div>
            <div class="amount">
                مبلغ قابل پرداخت: <span class="amount-number">{{number_format($id)}}</span> تومان
            </div>


            <div class="buttons">
                <a href="{{ route('Show-Orders') }}"
                   class="cancel"
                   style="width: 40%; text-decoration: none; display: flex; align-items: center; justify-content: center;">
                    انصراف
                </a>

                <button type="submit" class="pay">پرداخت</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<style>
    @font-face {
        font-family: 'Yekan';
        src: url('https://cdn.fontcdn.ir/Font/Persian/Yekan/Yekan.woff2') format('woff2');
    }

    .amount {
        text-align: center;
        font-weight: bold;
        font-size: 16px;
        color: #333;
        margin-top: 20px;
        margin-bottom: 10px;
        background: #f9f9f9;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    .amount .amount-number {
        color: #28a745;
        font-size: 18px;
    }

    body {
        margin: 0;
        background: #f2f2f2;
        font-family: 'Yekan', Tahoma, sans-serif;
    }

    .payment-box {
        max-width: 440px;
        margin: 40px auto;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .header {
        position: relative;
        background: white;
        padding: 10px 20px;
    }

    .top-bar {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo {
        height: 35px;
        float: left;
    }

    .title {
        font-weight: bold;
        font-size: 15px;
        color: #333;
        flex-grow: 1;
        margin-right: 10px;
    }

    .url {
        color: #007bff;
        font-size: 13px;
        white-space: nowrap;
    }

    .red-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 40px;
        width: 100%;
        background: linear-gradient(to left top, red 70%, transparent 30%);
        z-index: 1;
        transform: skewY(-3deg);
    }

    .form-content {
        padding: 25px;
    }

    .timer {
        text-align: left;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    /* گروه ورودی‌ها */
    .input-group {
        position: relative;
        margin-bottom: 15px;
    }

    .input-group input {
        width: 100%;
        padding: 12px 40px 12px 12px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-sizing: border-box;
    }

    .input-group .icon {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        color: #555;
        font-size: 18px;
        pointer-events: none;
    }

    /* ورودی دوتایی کنار هم */
    .input-double {
        position: relative;
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
        align-items: center;
    }

    .input-double input {
        flex: 1;
        padding: 12px 40px 12px 12px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-sizing: border-box;
    }

    /* آیکون روی ورودی دوتایی */
    .input-double .icon {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        color: #555;
        font-size: 18px;
        pointer-events: none;
    }

    /* کپچا */
    .captcha {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        position: relative;
    }

    .captcha canvas {
        height: 35px;
        width: 100px;
        border: 1px solid #ccc;
        border-radius: 5px;
        user-select: none;
    }

    .captcha .icon {
        font-size: 20px;
        color: #007bff;
        cursor: pointer;
    }

    /* دکمه‌ها */
    .buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
    }

    .cancel, .pay {
        width: 48%;
        padding: 12px;
        font-size: 15px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .cancel {
        background: #ffc107;
        color: black;
    }

    .pay {
        background: #28a745;
        color: white;
    }

    /* فوتر (اگر نیاز شد) */
    .footer {
        text-align: center;
        padding: 15px;
        background: #fff;
        border-top: 1px solid #eee;
    }

    .edd-logo {
        height: 40px;
    }

    /* === ریسپانسیو کامل === */
    @media (max-width: 480px) {
        .payment-box {
            max-width: 100%;
            margin: 20px 10px;
            border-radius: 12px;
        }

        .form-content {
            padding: 20px 15px;
        }

        /* ورودی دوتایی ستون می‌شود */
        .input-double {
            flex-direction: column;
            gap: 12px;
            position: relative;
            align-items: stretch;
        }

        .input-double input {
            width: 100%;
            padding: 12px 12px;
            box-sizing: border-box;
        }

        /* آیکون در input-double در موبایل زیر فیلدها و کنار هم قرار می‌گیرد */
        .input-double .icon {
            position: static;
            font-size: 18px;
            color: #555;
            margin: 5px 0 0 0;
            cursor: default;
            pointer-events: none;
            align-self: flex-start;
            order: 1;
        }

        /* ورودی‌های تکی */
        .input-group input {
            padding: 12px 35px 12px 12px;
            font-size: 14px;
        }

        .input-group .icon {
            right: 10px;
            font-size: 16px;
        }

        /* دکمه‌ها در موبایل ستون می‌شوند */
        .buttons {
            flex-direction: column;
            gap: 10px;
        }

        .buttons button {
            width: 100%;
        }
    }

    body::before {
        content: "";
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: url('{{ asset('img/payment_melat.png') }}') no-repeat center center;
        background-size: 900px; /* اندازه دلخواه */
        opacity: 0.2; /* خیلی کم‌رنگ */
        z-index: -1;
    }

</style>
