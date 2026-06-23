<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Secret Wall - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Arimo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fff3dd; font-family: 'Arimo', sans-serif; }
        .font-handwriting { font-family: 'Caveat', cursive; }
        .note-paper {
            background-color: #fffaf1;
            border-left: 5px solid #8b4513;
            transition: transform 0.2s ease;
        }
        .note-paper:hover { transform: translateY(-5px) rotate(1deg); }
    </style>
</head>
<body class="py-12 px-4">

    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-12 border-b border-neutral-300/40 pb-6">
            <div>
                <h1 class="text-3xl font-bold text-neutral-800">My Secret Wall ✉️</h1>
                <p class="text-sm text-neutral-500 italic">Selamat datang kembali, {{ Auth::user()->name }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-xs font-semibold bg-neutral-800 text-white px-4 py-2 rounded-xl hover:bg-neutral-900 transition-all">
                    Keluar Akun
                </button>
            </form>
        </div>

        <div class="bg-white/60 border border-white/40 rounded-2xl p-6 mb-12 text-center shadow-sm backdrop-blur-sm">
            <p class="text-xs text-neutral-500 font-bold uppercase tracking-wider mb-2">Link Anonymous Kamu</p>
            <div class="inline-block bg-white px-5 py-2.5 rounded-xl font-mono text-sm text-amber-900 border border-amber-200 select-all cursor-pointer shadow-inner">
                {{ url('/user/'.Auth::user()->name) }}
            </div>
            <p class="text-[10px] text-neutral-400 mt-2">Salin link di atas lalu bagikan ke teman-temanmu</p>
        </div>

        <h2 class="text-lg font-bold text-neutral-700 mb-6">Pesan Masuk ({{ $messages->count() }})</h2>

        @if($messages->isEmpty())
            <div class="text-center py-20 bg-white/20 border border-dashed border-neutral-300 rounded-2xl">
                <p class="font-handwriting text-3xl text-neutral-400">Dindingmu masih sepi belon ada pesan...</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($messages as $msg)
                    <div class="note-paper p-6 shadow-md rounded-r-2xl flex flex-col justify-between min-h-[180px]">
                        <p class="text-3xl font-handwriting text-neutral-800 leading-tight mb-6">
                            "{{ $msg->message_text }}"
                        </p>
                        <div class="flex justify-between items-center text-[10px] uppercase font-bold tracking-wider text-neutral-400 pt-4 border-t border-neutral-200/60">
                            <span>{{ $msg->created_at->format('d M Y') }}</span>
                            <form action="{{ route('message.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus note ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-neutral-400 hover:text-red-600 transition-colors">Hapus 🗑️</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>
