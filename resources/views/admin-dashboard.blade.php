<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Kontrol Eksekutif Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-neutral-50 py-12 px-4">

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center bg-white p-6 rounded-2xl border shadow-sm mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-neutral-800">System Monitoring & Moderation Panel 🛡️</h1>
                <p class="text-xs text-neutral-400">Kelola keamanan konten, tinjau kata kasar otomatis, dan awasi kesehatan mading publik.</p>
            </div>
            <div class="flex gap-2 w-full md:w-auto">
                <a href="{{ route('mading.index') }}" class="text-xs bg-neutral-200 text-neutral-700 px-4 py-2.5 rounded-xl hover:bg-neutral-300 font-semibold text-center flex-1 md:flex-none">Lihat Mading</a>
                <form method="POST" action="{{ route('logout') }}" class="flex-1 md:flex-none">
                    @csrf
                    <button type="submit" class="text-xs bg-red-600 text-white px-4 py-2.5 rounded-xl hover:bg-red-700 font-semibold w-full">Log Out Admin</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-5 rounded-2xl border shadow-sm">
                <p class="text-xs font-bold text-neutral-400 uppercase">Total Pesan</p>
                <h3 class="text-3xl font-extrabold text-neutral-800 mt-1">{{ $totalMessages }}</h3>
            </div>
            <div class="bg-white p-5 rounded-2xl border shadow-sm">
                <p class="text-xs font-bold text-neutral-400 uppercase">Pesan Hari Ini</p>
                <h3 class="text-3xl font-extrabold text-amber-700 mt-1">{{ $todayCount }}</h3>
            </div>
            <div class="bg-white p-5 rounded-2xl border shadow-sm bg-red-50/50 border-red-100">
                <p class="text-xs font-bold text-red-500 uppercase">⚠️ Terindikasi Toxic (Flagged)</p>
                <h3 class="text-3xl font-extrabold text-red-700 mt-1">{{ $flaggedCount }}</h3>
            </div>
            <div class="bg-white p-5 rounded-2xl border shadow-sm">
                <p class="text-xs font-bold text-neutral-400 uppercase">🔒 Terkunci PIN</p>
                <h3 class="text-3xl font-extrabold text-neutral-600 mt-1">{{ $lockedCount }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-5 border-b bg-neutral-50/50">
                <h3 class="font-bold text-neutral-700 text-sm">Daftar Antrean Surat & Log Keamanan IP</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-neutral-100 border-b text-[11px] font-bold text-neutral-500 uppercase tracking-wider">
                            <th class="p-4">Tanggal & IP Pengirim</th>
                            <th class="p-4">Target (To)</th>
                            <th class="p-4">Konten Surat</th>
                            <th class="p-4">Security Status</th>
                            <th class="p-4 text-center">Aksi Moderasi</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-neutral-700 divide-y">
                        @forelse($messages as $msg)
                            <tr class="hover:bg-neutral-50/60 {{ $msg->is_flagged ? 'bg-red-50/30' : '' }}">
                                <td class="p-4">
                                    <div class="font-semibold">{{ $msg->created_at->format('d M Y H:i') }}</div>
                                    <div class="text-[10px] text-neutral-400 font-mono mt-0.5">IP: {{ $msg->sender_ip ?? 'Unknown' }}</div>
                                </td>
                                <td class="p-4 font-bold text-neutral-900">To: {{ $msg->receiver_name }}</td>
                                <td class="p-4 max-w-xs md:max-w-md break-words italic text-neutral-600">
                                    "{{ $msg->message_text }}"
                                </td>
                                <td class="p-4">
                                    @if($msg->is_flagged)
                                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded-md font-bold text-[10px] uppercase">🚨 Auto Flagged</span>
                                    @else
                                        <span class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-md font-bold text-[10px] uppercase">Clean</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center justify-center gap-2">
                                        @if($msg->is_flagged)
                                            <form action="{{ route('message.clearFlag', $msg->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-2.5 py-1.5 rounded-lg font-semibold transition-colors">
                                                    Loloskan ✅
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('message.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus permanen surat ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="bg-red-100 text-red-700 hover:bg-red-200 px-2.5 py-1.5 rounded-lg font-semibold transition-colors">
                                                Hapus 🗑️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-neutral-400 italic">Mading kosong, tidak ada data log yang terekam.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
