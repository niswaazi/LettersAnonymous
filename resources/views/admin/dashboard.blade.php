<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Letters Anonymous</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        .aurora-bg {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: -2; overflow: hidden; background: #f8fafc;
        }
        .aurora-blob {
            position: absolute; border-radius: 50%; filter: blur(80px); opacity: 0.4; mix-blend-mode: multiply; pointer-events: none;
        }
        .blob-1 { top: -10%; left: -10%; width: 50vw; height: 50vw; background: #60a5fa; }
        .blob-2 { bottom: -10%; right: -5%; width: 55vw; height: 55vw; background: #c084fc; }

        .light-glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(148, 163, 184, 0.3); border-radius: 99px; }
    </style>
</head>
<body class="min-h-screen w-screen p-4 md:p-8 flex flex-col items-center relative">

    <div class="aurora-bg">
        <div class="aurora-blob blob-1"></div>
        <div class="aurora-blob blob-2"></div>
    </div>

    <div class="w-full max-w-6xl z-10">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 pb-6 border-b border-slate-200/60">
            <div>
                <span class="text-[10px] font-bold tracking-wider uppercase bg-indigo-50 text-indigo-600 px-2.5 py-1 rounded-md border border-indigo-100 shadow-sm">
                    🛡️ Control Panel Admin
                </span>
                <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900 mt-1.5">
                    Moderasi Surat Mading
                </h1>
                <p class="text-slate-500 text-xs mt-0.5">
                    Kelola, pantau rahasia, dan bersihkan pesan mading yang melanggar ketentuan.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('mading.index') }}" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl border border-slate-200 shadow-sm transition-all flex items-center gap-1.5">
                    🏠 Lihat Mading
                </a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-xl shadow-sm transition-all">
                        Keluar Akun 🚪
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold rounded-xl shadow-sm">
                🎉 {{ session('success') }}
            </div>
        @endif

        <div class="light-glass-panel rounded-2xl shadow-xl overflow-hidden border border-slate-200/50">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-100/70 border-b border-slate-200 text-slate-400 text-[10px] uppercase font-bold tracking-wider">
                            <th class="py-3 px-4">Status / Waktu</th>
                            <th class="py-3 px-4">Kepada (Receiver)</th>
                            <th class="py-3 px-4 w-1/3">Isi Rahasia Pesan</th>
                            <th class="py-3 px-4 text-center">Pengunci PIN</th>
                            <th class="py-3 px-4">Alamat IP Pengirim</th>
                            <th class="py-3 px-4 text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200/60 text-xs font-medium text-slate-700 bg-white/40">
                        @forelse($messages as $msg)
                            <tr class="hover:bg-white/80 transition-colors">
                                <td class="py-4 px-4 whitespace-nowrap">
                                    @if($msg->is_flagged)
                                        <span class="inline-block px-2 py-0.5 text-[9px] font-extrabold bg-rose-50 border border-rose-200 text-rose-600 rounded mb-1">⚠️ Terindikasi Kasar</span>
                                    @else
                                        <span class="inline-block px-2 py-0.5 text-[9px] font-extrabold bg-emerald-50 border border-emerald-200 text-emerald-600 rounded mb-1">✅ Aman</span>
                                    @endif
                                    <div class="text-[10px] text-slate-400 font-normal">{{ $msg->created_at->format('d M Y, H:i') }}</div>
                                </td>

                                <td class="py-4 px-4 font-bold text-slate-900 whitespace-nowrap">
                                    {{ $msg->receiver_name }}
                                </td>

                                <td class="py-4 px-4 break-words font-normal text-slate-600">
                                    {{ $msg->message_text }}
                                </td>

                                <td class="py-4 px-4 text-center whitespace-nowrap">
                                    @if($msg->pin_code)
                                        <span class="bg-amber-50 text-amber-700 border border-amber-200 text-[10px] px-2 py-0.5 rounded-md font-bold">
                                            🔒 {{ $msg->pin_code }}
                                        </span>
                                    @else
                                        <span class="text-slate-400 font-normal">-</span>
                                    @endif
                                </td>

                                <td class="py-4 px-4 font-mono text-slate-400 text-[11px] whitespace-nowrap">
                                    {{ $msg->sender_ip ?? '127.0.0.1' }}
                                </td>

                                <td class="py-4 px-4 text-center whitespace-nowrap">
                                    <form action="{{ route('mading.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus surat rahasia ini dari mading secara permanen?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 bg-rose-50 border border-rose-200 hover:bg-rose-600 hover:text-white text-rose-600 font-bold rounded-lg text-[11px] transition-all shadow-sm">
                                            Hapus Surat 🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8 text-slate-400 font-medium bg-white/40">
                                    📭 Belum ada surat rahasia apa pun yang ditempel di mading saat ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
