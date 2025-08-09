<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تیکت‌های من</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>


    <style>
        @keyframes fade-in {
            0% {opacity: 0; transform: translateY(20px);}
            100% {opacity: 1; transform: translateY(0);}
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-in-out;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-100 to-indigo-200 min-h-screen py-10 px-4">

<h1 style="font-family:'B Kamran' " class="text-4xl font-extrabold text-center text-indigo-900 mb-6 tracking-tight">
    تیکت‌های پشتیبانی {{ auth()->user()->name }}
</h1>

<div class="flex justify-center mb-10">
    <a href="{{ route('Show-Index') }}"
       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold
              bg-white/60 backdrop-blur-md text-indigo-700 shadow-md hover:shadow-xl
              hover:bg-white/80 transition duration-300">
        <i  class="ph ph-arrow-left text-lg"></i>
        بازگشت به صفحه اصلی
    </a>
</div>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
    @foreach($tickets as $ticket)
        <div class="relative glass-card rounded-2xl p-6 hover:shadow-2xl transition-shadow duration-300 animate-fade-in">

            {{-- نوار وضعیت بالای کارت --}}
            <div class="absolute top-0 right-0 rounded-bl-xl px-4 py-1 text-xs font-bold text-white
            {{ $ticket->answer ? 'bg-green-500' : 'bg-yellow-500' }}">
                {{ $ticket->answer ? 'پاسخ داده شده ✅' : 'در انتظار پاسخ ⏳' }}
            </div>

            {{-- هدر تیکت --}}
            <div class="flex justify-between items-center mb-4 mt-4">
                <h2 class="text-lg sm:text-xl font-bold text-indigo-800 flex items-center gap-2">
                    <i class="ph-light ph-chat-centered-text"></i> {{$ticket->title}}
                </h2>
                <span class="bg-indigo-100 text-indigo-700 text-xs font-semibold px-3 py-1 rounded-full">
                {{ $ticket->category }}
            </span>
            </div>

            {{-- توضیحات تیکت --}}
            <div class="text-sm text-gray-700 bg-white/70 border border-gray-200 p-4 rounded-xl shadow-inner mb-4">
                <div class="flex items-center gap-2 mb-2 text-indigo-600 font-semibold">
                    <i class="ph-light ph-note-pencil"></i>
                    توضیحات شما:
                </div>
                <p class="leading-relaxed">{{ $ticket->description }}</p>
            </div>

            {{-- پاسخ پشتیبانی --}}
            @if($ticket->answer)
                <div class="bg-green-50 border border-green-200 rounded-xl p-4 shadow-sm">
                    <div class="flex items-center gap-2 text-green-800 font-semibold mb-1">
                        <i class="ph-light ph-chat-teardrop-text"></i>
                        پاسخ پشتیبانی:
                    </div>
                    <p class="text-sm text-gray-800 leading-relaxed">{{ $ticket->answer }}</p>
                </div>
            @else
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 shadow-sm">
                    <div class="flex items-center gap-2 text-yellow-700 font-semibold">
                        <i class="ph-light ph-clock-afternoon"></i>
                        در انتظار پاسخ...
                    </div>
                    <p class="text-xs text-gray-600 mt-1">پشتیبانی هنوز پاسخی برای این تیکت ثبت نکرده است.</p>
                </div>
            @endif

        </div>
    @endforeach

</div>

</body>
</html>
