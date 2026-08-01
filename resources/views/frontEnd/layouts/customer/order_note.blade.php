@php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

$customer = Auth::guard('customer')->user();
$customerId = $customer ? $customer->id : null;

// Site Name & Logo
$siteName = \App\Models\GeneralSetting::first();
$siteInitial = strtoupper(substr($siteName->name ?? 'G', 0, 1));
$siteDisplayName = Str::limit($siteName->name ?? 'GadgetShop', 8);
$generalsetting = $siteName;
$darkLogo = $siteName->dark_logo ?? null;

// Pending Orders Count for Badge
$pendingOrdersCount = $customerId ? \App\Models\Order::where('customer_id', $customerId)
    ->whereNotIn('order_status', ['6', '11'])
    ->count() : 0;

// Profile Image - Use direct image path
$profileImage = ($customer && $customer->image) ? asset($customer->image) : asset('public/uploads/default/no-image.png');

// Note Text
$rawNote = !empty($order->admin_note) ? $order->admin_note : (!empty($order->order_note) ? $order->order_note : (!empty($order->note) ? $order->note : null));
$noteContent = $rawNote ? trim(strip_tags($rawNote)) : null;
@endphp

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Order Note #{{ $order->invoice_id ?? $order->id }} | {{ $siteName->name ?? 'Gadget Style' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Hind Siliguri', sans-serif; background-color: #F0F2F5; }
        .sidebar-item:hover { background-color: #f3f4f6; color: #4f46e5; }
        .active-menu { background-color: #EEF2FF; color: #4f46e5; border-right: 3px solid #4f46e5; }
        #sidebar { transition: transform 0.3s ease-in-out; }
    </style>
</head>
<body class="flex min-h-screen relative">

    <div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    @include('frontEnd.layouts.customer.sidebar')

    <main class="flex-1 overflow-y-auto h-screen w-full">
        
        <header class="bg-white px-6 lg:px-8 flex justify-between items-center sticky top-0 z-20 shadow-sm border-b" style="height: 73px; min-height: 73px;">
            <div class="lg:hidden mr-4">
                <button onclick="toggleSidebar()" class="text-gray-600 text-xl p-2"><i class="fas fa-bars"></i></button>
            </div>

            <div class="flex-1">
                <h2 class="text-xl font-bold text-gray-800">অর্ডার নোট (Order Note)</h2>
                <p class="text-xs text-gray-400 mt-0.5 hidden sm:block">ইনভয়েস #{{ $order->invoice_id ?? $order->id }} এর নোট বিবরণী</p>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('customer.orders') }}" class="bg-indigo-50 hover:bg-indigo-100 text-indigo-600 text-xs sm:text-sm font-bold px-3 sm:px-4 py-2 rounded-lg transition flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    <span>অর্ডারে ফিরে যান</span>
                </a>

                <img src="{{ $profileImage }}" onerror="this.src='{{ asset('public/uploads/default/no-image.png') }}'" class="w-10 h-10 rounded-full border-2 border-white shadow-sm cursor-pointer" alt="Profile">
            </div>
        </header>

        <div class="p-4 lg:p-8 max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 sm:p-8 border-b border-gray-100 bg-gradient-to-r from-indigo-50 to-blue-50 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-indigo-600 text-white rounded-xl flex items-center justify-center text-xl shadow-md">
                            <i class="fas fa-sticky-note"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">অর্ডার নোট বিবরণী</h3>
                            <p class="text-xs text-gray-500">ইনভয়েস আইডি: <span class="font-semibold text-indigo-600">#{{ $order->invoice_id ?? $order->id }}</span></p>
                        </div>
                    </div>

                    <span class="bg-white text-indigo-700 text-xs px-3 py-1.5 rounded-full font-bold shadow-sm border border-indigo-100">
                        {{ $order->created_at ? $order->created_at->format('d M, Y - h:i A') : 'N/A' }}
                    </span>
                </div>

                <div class="p-6 sm:p-8">
                    @if($noteContent)
                        <div class="relative bg-gray-50 p-6 rounded-xl border-l-4 border-indigo-600 text-gray-700 leading-relaxed text-base shadow-inner">
                            <i class="fas fa-quote-left text-3xl text-indigo-200 absolute top-4 right-4 opacity-40"></i>
                            <div class="relative z-10 font-medium whitespace-pre-line">
                                {{ $noteContent }}
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-3 text-2xl">
                                <i class="fas fa-comment-slash"></i>
                            </div>
                            <h4 class="text-base font-bold text-gray-700">কোনো বিশেষ নোট নেই</h4>
                            <p class="text-xs text-gray-400 mt-1">এই অর্ডারের সাথে কোনো অতিরিক্ত নোট যুক্ত করা হয়নি।</p>
                        </div>
                    @endif
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center text-xs text-gray-500">
                    <span>অর্ডার স্ট্যাটাস: <strong class="text-gray-700">{{ $order->status ? $order->status->name : 'Pending' }}</strong></span>
                    <a href="{{ route('customer.invoice', ['id' => $order->id]) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1">
                        <i class="fas fa-file-invoice"></i> ইনভয়েস দেখুন
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
    </script>
</body>
</html>