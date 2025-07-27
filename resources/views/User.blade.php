<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>پروفایل کاربر</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            background: linear-gradient(to right, #e8f5e9, #dcedc8);
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .profile-card {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(76, 175, 80, 0.3);
            padding: 2.5rem 2rem;
            max-width: 450px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .profile-avatar {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: #c8e6c9;
            margin: 0 auto 1.2rem auto;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 38px;
            color: #2e7d32;
            font-weight: bold;
            box-shadow: 0 0 0 4px #a5d6a7;
        }

        .profile-info h2 {
            margin-bottom: 0.75rem;
            color: #2e7d32;
            font-size: 22px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            flex-direction: row-reverse;
            align-items: center;
            background: #f1f8e9;
            padding: 10px 15px;
            border-radius: 10px;
            margin-bottom: 12px;
            border-right: 4px solid #81c784;
        }

        .info-row span.label {
            color: #388e3c;
            font-weight: bold;
        }

        .info-row span.value {
            color: #4caf50;
        }

        .status-box {
            margin-top: 20px;
            padding: 10px;
            background-color: #a5d6a7;
            color: white;
            border-radius: 10px;
            font-weight: bold;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(76,175,80, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(76,175,80, 0); }
            100% { box-shadow: 0 0 0 0 rgba(76,175,80, 0); }
        }

        .edit-button {
            margin-top: 1.8rem;
            background-color: #66bb6a;
            color: #fff;
            padding: 0.6rem 2rem;
            border: none;
            border-radius: 30px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .edit-button:hover {
            background-color: #388e3c;
            transform: translateY(-2px);
        }
        .edit-button {
            display: inline-block;
            font-family: 'B Koodak', Tahoma, sans-serif;
            background-color: #4CAF50; /* سبز اصلی */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .edit-button:hover {
            background-color: #45a049; /* سبز تیره‌تر در حالت هاور */
        }

    </style>
</head>
<body>

<div class="profile-card">
    <div class="profile-avatar">
        {{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
    </div>

    <div class="profile-info">
        <h2>{{ Auth::user()->name }}</h2>

        <div class="info-row">
            <span class="label">: ایمیل شما</span>
            <span class="value">{{ Auth::user()->email }}</span>
        </div>

        <div class="info-row">
            <span class="label">: تلفن شما</span>
            <span class="value">{{ Auth::user()->phone ?? 'ثبت نشده' }}</span>
        </div>

        <div class="status-box {{ Auth::user()->is_active == 1 ? 'status-active' : 'status-inactive' }}">
            @if(Auth::user()->is_active == 1)
                ✅ وضعیت حساب: فعال
            @else
                ❌ وضعیت حساب: غیرفعال
            @endif
        </div>


        <a href="{{route('Show-Index')}}" class="edit-button">بازگشت</a>



    </div>
</div>

</body>
</html>
