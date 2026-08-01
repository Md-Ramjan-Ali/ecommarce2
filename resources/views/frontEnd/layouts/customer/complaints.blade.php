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

// Profile Image
$profileImage = ($customer && $customer->image) ? asset($customer->image) : asset('public/uploads/default/no-image.png');

// Total Order Amount
$totalOrderAmount = $customerId ? \App\Models\Order::where('customer_id', $customerId)->sum('amount') : 0;

$pendingCount = $complaints->where('status', 'pending')->count();
$processingCount = $complaints->where('status', 'processing')->count();
$resolvedCount = $complaints->where('status', 'resolved')->count();
@endphp

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>আমার কমপ্লেইন | {{ $siteName->name ?? 'Gadget Style' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Hind Siliguri', sans-serif; background-color: #F0F2F5; }
        .sidebar-item:hover { background-color: #f3f4f6; color: #4f46e5; }
        .active-menu { background-color: #EEF2FF; color: #4f46e5; border-right: 3px solid #4f46e5; }
        .custom-table th { background-color: #F9FAFB; color: #6B7280; font-weight: 600; font-size: 0.85rem; }
        .custom-table td { border-bottom: 1px solid #F3F4F6; padding: 16px; font-size: 0.9rem; }
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
                <h2 class="text-xl font-bold text-gray-800">আমার কমপ্লেইন সমূহ</h2>
                <p class="text-xs text-gray-400 mt-0.5 hidden sm:block">আপনার জমা দেওয়া সকল কমপ্লেইনের তালিকা ও আপডেট</p>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('complaint') }}" class="hidden sm:inline-flex items-center gap-2 bg-rose-600 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-rose-700 transition shadow-sm">
                    <i class="fas fa-plus"></i> নতুন কমপ্লেইন
                </a>
                
                <img src="{{ $profileImage }}" onerror="this.src='{{ asset('public/uploads/default/no-image.png') }}'" class="w-10 h-10 rounded-full border-2 border-white shadow-sm cursor-pointer" alt="Profile">
            </div>
        </header>

        <div class="p-4 lg:p-8 max-w-7xl mx-auto space-y-6">
            
            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl font-bold">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Pending</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $pendingCount }}</h3>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Processing</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $processingCount }}</h3>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Resolved</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $resolvedCount }}</h3>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">📋 অভিযোগের তালিকা</h3>
                        <p class="text-xs text-gray-400 mt-0.5">আপনার সমস্যাসমূহের বিবরণ ও বর্তমান অবস্থা</p>
                    </div>
                    <a href="{{ route('complaint') }}" class="sm:hidden inline-flex items-center gap-1 bg-rose-600 text-white px-3 py-1.5 rounded-lg text-xs font-semibold">
                        <i class="fas fa-plus"></i> নতুন
                    </a>
                </div>

                @if($complaints->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left custom-table">
                            <thead>
                                <tr>
                                    <th class="pl-6 py-4"># ID</th>
                                    <th class="py-4">অর্ডার আইডি</th>
                                    <th class="py-4">বিবরণ</th>
                                    <th class="py-4">তারিখ</th>
                                    <th class="pr-6 py-4 text-center">স্ট্যাটাস</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($complaints as $complaint)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="pl-6 font-bold text-indigo-600">#CMP-{{ $complaint->id }}</td>
                                        <td class="font-bold text-gray-700">
                                            @if($complaint->order_id)
                                                <span class="bg-indigo-50 text-indigo-600 px-2.5 py-1 rounded text-xs font-bold">#INV-{{ $complaint->order_id }}</span>
                                            @else
                                                <span class="text-gray-400 text-xs">N/A</span>
                                            @endif
                                        </td>
                                        <td class="max-w-xs">
                                            <p class="text-gray-700 text-sm leading-relaxed">{{ $complaint->description }}</p>
                                            @if($complaint->image)
                                                <a href="{{ asset('public/'.$complaint->image) }}" target="_blank" class="inline-flex items-center gap-1 text-xs text-indigo-600 font-semibold hover:underline mt-1">
                                                    <i class="fas fa-image"></i> ছবি দেখুন
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-gray-500 text-xs whitespace-nowrap">
                                            {{ $complaint->created_at ? $complaint->created_at->format('d M, Y') : 'N/A' }}
                                        </td>
                                        <td class="pr-6 text-center whitespace-nowrap">
                                            @if($complaint->status == 'pending')
                                                <span class="bg-amber-50 text-amber-600 px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1">
                                                    <i class="fas fa-clock"></i> Pending
                                                </span>
                                            @elseif($complaint->status == 'processing')
                                                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1">
                                                    <i class="fas fa-spinner fa-spin"></i> Processing
                                                </span>
                                            @else
                                                <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1">
                                                    <i class="fas fa-check-circle"></i> Resolved (সমাধানকৃত)
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($complaints->hasPages())
                        <div class="p-6 border-t border-gray-100 flex justify-center">
                            {{ $complaints->links() }}
                        </div>
                    @endif
                @else
                    <div class="text-center py-16 px-4">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-rose-50 rounded-full mb-4 text-rose-500 text-3xl">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5 class="text-lg font-bold text-gray-800 mb-1">কোনো কমপ্লেইন পাওয়া যায়নি</h5>
                        <p class="text-gray-500 text-sm mb-6">আপনার জমা দেওয়া কোনো অভিযোগ নেই।</p>
                        <a href="{{ route('complaint') }}" class="inline-flex items-center gap-2 bg-rose-600 hover:bg-rose-700 text-white px-6 py-2.5 rounded-lg font-semibold transition shadow-sm">
                            <i class="fas fa-paper-plane"></i>
                            কমপ্লেইন জমা দিন
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            if (sidebar && overlay) {
                if (sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            }
        }
    </script>
</body>
</html>
