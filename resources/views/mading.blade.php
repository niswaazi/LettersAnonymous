<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letters Anonymous - Premium Light Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
            color: #1e293b;
        }

        .font-handwriting {
            font-family: 'Caveat', cursive;
        }

        /* 1. Efek Background Aurora / Mesh Gradient Lembut */
        .aurora-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -2;
            overflow: hidden;
            background: #ffffff;
        }
        .aurora-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.45;
            mix-blend-mode: multiply;
            pointer-events: none;
        }
        .blob-1 { top: -10%; left: -10%; width: 50vw; height: 50vw; background: #60a5fa; }
        .blob-2 { bottom: -10%; right: -5%; width: 55vw; height: 55vw; background: #c084fc; }
        .blob-3 { top: 30%; right: 15%; width: 35vw; height: 35vw; background: #fde047; }
        .blob-4 { bottom: 10%; left: 10%; width: 40vw; height: 40vw; background: #34d399; }

        /* 2. Animasi Pergeseran Warna Gradient pada Teks Judul Utama */
        @keyframes shiftingGradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .moving-gradient-text {
            background: linear-gradient(-45deg, #3b82f6, #6366f1, #ec4899, #8b5cf6);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
            animation: shiftingGradient 6s ease infinite;
            padding-bottom: 4px;
            margin-bottom: -4px;
        }

        /* 3. Animasi Ikon & Teks Pop Melayang Otomatis */
        @keyframes float3D {
            0% { transform: translateY(0px) rotate(0deg) scale(1); }
            50% { transform: translateY(-10px) rotate(2deg) scale(1.02); }
            100% { transform: translateY(0px) rotate(0deg) scale(1); }
        }
        .floating-ui-icon {
            position: absolute;
            pointer-events: none;
            z-index: -1;
            animation: float3D 6s ease-in-out infinite;
            filter: drop-shadow(0 10px 20px rgba(15, 23, 42, 0.04));
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* 4. Panel Glassmorphism Terang Berkualitas Tinggi */
        .light-glass-panel {
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.05);
        }

        .light-glass-card {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.03);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .light-glass-card:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.85);
            border-color: rgba(96, 165, 254, 0.5);
            box-shadow: 0 15px 30px -10px rgba(96, 165, 254, 0.15);
        }

        /* Custom Scrollbar Halus untuk Area Grid Surat */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.3);
            border-radius: 99px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(148, 163, 184, 0.5);
        }

        /* Efek Klik Tombol Premium */
        .premium-btn {
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 4px 14px 0 rgba(79, 70, 229, 0.2);
        }
        .premium-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px 0 rgba(79, 70, 229, 0.3);
        }

        /* Partikel Hamburan Emojis */
        .burst-emoji {
            position: fixed;
            pointer-events: none;
            z-index: 100;
            font-size: 28px;
            animation: moveOut 1.4s cubic-bezier(0.1, 0.8, 0.25, 1) forwards;
        }
        @keyframes moveOut {
            0% { transform: translate(-50%, -50%) scale(0.3); opacity: 1; }
            100% { transform: translate(var(--dx), var(--dy)) scale(1.3) rotate(var(--dr)); opacity: 0; }
        }

        /* Layout Grid Masonry */
        .masonry-layout { display: block; columns: 1; gap: 1rem; }
        @media (min-width: 640px) { .masonry-layout { columns: 2; } }
        .masonry-item { break-inside: avoid; }
    </style>
</head>
<body class="h-screen w-screen overflow-hidden p-4 md:p-6 flex flex-col justify-between relative">

    <div class="aurora-bg">
        <div class="aurora-blob blob-1"></div>
        <div class="aurora-blob blob-2"></div>
        <div class="aurora-blob blob-3"></div>
        <div class="aurora-blob blob-4"></div>
    </div>

    <div class="floating-ui-icon top-6 left-12 px-3 py-1.5 rounded-xl flex items-center gap-2 text-[11px] font-bold text-slate-600" style="animation-delay: 0s;">
        <span>👋</span> <span>Hi, siapa di sana?</span>
    </div>
    <div class="floating-ui-icon top-12 right-20 px-3 py-1.5 rounded-xl flex items-center gap-2 text-[11px] font-bold text-slate-600" style="animation-delay: 1.2s;">
        <span>🤫</span> <span>Ada rahasia apa hari ini?</span>
    </div>
    <div class="floating-ui-icon bottom-12 left-20 px-3 py-1.5 rounded-xl flex items-center gap-2 text-[11px] font-bold text-slate-600" style="animation-delay: 2.5s;">
        <span>✨</span> <span>Halo orang rahasia!</span>
    </div>

    <div class="w-full max-w-6xl mx-auto flex flex-col h-full z-10 overflow-hidden">

        <div class="text-center pb-4 pt-2 max-w-3xl mx-auto flex-shrink-0">
            <span class="inline-flex items-center gap-1.5 text-[10px] font-bold tracking-wider uppercase bg-slate-100 text-slate-600 px-3 py-1 rounded-full border border-slate-200/60 mb-2.5 shadow-sm">
                🤫 Ssshh... identitasmu sepenuhnya aman bersama kami
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight text-slate-900 mb-2 leading-none">
                Letters <span class="moving-gradient-text">Anonymous</span>
            </h1>
            <p class="text-slate-500 text-xs md:text-sm font-medium leading-relaxed max-w-2xl mx-auto">
                Yuk, kirim pesan rahasia kamu di sini! Kamu bebas meluapkan unek-unek, cerita random, kekaguman rahasia, atau confess apa pun tanpa perlu takut ketahuan. Ekspresikan dirimu dengan jujur tanpa beban identitas sekarang juga!
            </p>
        </div>

        @if(session('error'))
            <div class="max-w-md mx-auto mb-3 p-2.5 bg-rose-50 border border-rose-200 text-rose-700 text-[11px] font-semibold rounded-xl text-center shadow-sm flex-shrink-0">
                ⚠️ {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-stretch flex-grow overflow-hidden mb-2">

            <div class="light-glass-panel rounded-2xl p-5 shadow-lg flex flex-col justify-between h-full overflow-y-auto custom-scrollbar">
                <div>
                    <h2 class="text-sm font-bold text-slate-800 mb-3 flex items-center gap-2">
                        <span class="text-indigo-500">📝</span> Buat Surat Rahasia
                    </h2>

                    @if(session('success'))
                        <div class="mb-3 p-2.5 bg-emerald-50 border border-emerald-200 text-emerald-700 text-[11px] font-semibold rounded-xl">
                            🎉 {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('mading.store') }}" method="POST" class="space-y-3">
                        @csrf
                        <div>
                            <label class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Untuk Siapa:</label>
                            <input type="text" name="receiver_name" class="w-full mt-1 p-2.5 bg-white/70 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all text-xs" placeholder="Nama inisial / target kamu..." required>
                        </div>
                        <div>
                            <label class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Isi Pesan:</label>
                            <textarea name="message_text" rows="3" class="w-full mt-1 p-3 bg-white/70 border border-slate-200 rounded-xl text-lg font-handwriting text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all resize-none" placeholder="Tumpahkan isi hatimu di sini..." required></textarea>
                        </div>
                        <div>
                            <label class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">PIN Pengunci (Opsional):</label>
                            <input type="password" maxlength="4" pattern="\d*" name="pin_code" class="w-full mt-1 p-2.5 bg-white/70 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all text-center tracking-widest text-xs" placeholder="4 angka rahasia...">
                            <p class="text-[9px] text-slate-400 mt-1">*Hanya yang tahu PIN yang bisa membaca isi pesan.</p>
                        </div>

                        <button type="submit" id="submitFormBtn" class="premium-btn w-full py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl text-[11px] tracking-wide mt-2">
                            Gantung di Mading 🚀
                        </button>
                    </form>
                </div>

                <div class="pt-4 border-t border-slate-200/50 mt-4 text-center">
                    <a href="{{ route('login') }}" class="text-[10px] inline-flex items-center gap-1 text-slate-400 hover:text-indigo-600 font-bold transition-colors">
                        🛡️ Masuk sebagai Admin Sistem
                    </a>
                </div>
            </div>

            <div class="lg:col-span-2 flex flex-col h-full overflow-hidden space-y-3">

                <form method="GET" action="{{ route('mading.index') }}" class="flex gap-2 flex-shrink-0">
                    <div class="relative flex-grow">
                        <span class="absolute left-3.5 top-2.5 text-slate-400 text-xs">🔍</span>
                        <input type="text" name="search" value="{{ $search }}" class="w-full pl-9 pr-4 py-2 bg-white/80 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500 text-slate-800 placeholder-slate-400 shadow-sm backdrop-blur-md" placeholder="Ketik nama kamu untuk menyaring surat...">
                    </div>
                    <button type="submit" class="premium-btn bg-indigo-600 hover:bg-indigo-700 text-white px-4 rounded-xl font-bold text-xs shadow-sm">
                        Cari
                    </button>
                </form>

                <div class="flex-grow overflow-y-auto pr-1 custom-scrollbar">
                    <div class="masonry-layout">
                        @foreach($messages as $msg)
                            <div class="light-glass-card p-4 rounded-xl masonry-item mb-3 relative overflow-hidden group">
                                <div class="absolute top-0 left-0 right-0 h-[2.5px] bg-gradient-to-r {{ $msg->is_flagged ? 'from-rose-400 to-orange-400' : 'from-blue-400 to-indigo-400' }}"></div>

                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-md bg-indigo-50 text-indigo-600 border border-indigo-100">
                                        To: {{ $msg->receiver_name }}
                                    </span>
                                    @if($msg->pin_code)
                                        <span class="text-[8px] bg-amber-50 text-amber-700 border border-amber-200 px-1.5 py-0.5 rounded font-bold flex items-center gap-0.5">
                                            🔒 Terkunci
                                        </span>
                                    @endif
                                </div>

                                @if($msg->pin_code)
                                    <div id="locked-card-{{ $msg->id }}" class="py-3 text-center bg-slate-50/50 rounded-lg border border-slate-200/60 border-dashed my-2">
                                        <p class="text-[10px] text-slate-400 font-medium mb-2">Surat disandi pengirim</p>
                                        <button onclick="triggerPinModal('{{ $msg->id }}')" class="premium-btn text-[9px] bg-white text-slate-700 font-bold px-3 py-1 rounded-md border border-slate-200 shadow-sm">
                                            Buka Segel
                                        </button>
                                    </div>
                                    <p id="text-card-{{ $msg->id }}" class="text-xl font-handwriting text-slate-800 leading-snug hidden"></p>
                                @else
                                    <p class="text-xl font-handwriting text-slate-700 leading-snug my-2">
                                        "{!! nl2br(e($msg->message_text)) !!}"
                                    </p>
                                @endif

                                <div class="text-[9px] text-slate-400 border-t border-slate-100 pt-2 flex justify-between items-center mt-1">
                                    <span class="font-medium">{{ $msg->is_flagged ? 'Moderated ⚠️' : 'Verified ✅' }}</span>
                                    <span>{{ $msg->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div id="pinModalWindow" class="fixed inset-0 bg-slate-900/30 hidden backdrop-blur-md items-center justify-center p-4 z-50">
        <div class="bg-white/90 border border-white/80 p-5 rounded-2xl max-w-xs w-full text-center shadow-xl backdrop-blur-xl">
            <div class="w-8 h-8 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-2 text-sm border border-indigo-100">🔒</div>
            <h3 class="font-bold text-xs text-slate-800 mb-0.5">Butuh Kode Akses PIN</h3>
            <p class="text-[10px] text-slate-400 mb-3">Input PIN 4-digit khusus untuk membuka kunci pesan.</p>
            <input type="password" id="modalPinField" maxlength="4" class="w-full p-2 bg-slate-50 border border-slate-200 rounded-xl text-center font-mono tracking-widest text-lg text-indigo-600 mb-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="••••">
            <div class="grid grid-cols-2 gap-2">
                <button onclick="dismissPinModal()" class="py-1.5 bg-slate-100 hover:bg-slate-200 rounded-xl text-[11px] font-semibold text-slate-600 transition-colors">Batal</button>
                <button onclick="processPinVerification()" class="premium-btn py-1.5 bg-indigo-600 text-white rounded-xl text-[11px] font-bold shadow-md">Buka 🔓</button>
            </div>
        </div>
    </div>

    <script>
        const emojiPool = ['✉️', '💖', '✨', '🚀', '🔮', '🎉', '💡', '🍀', '🌸'];

        document.getElementById('submitFormBtn').addEventListener('click', function(e) {
            const form = this.closest('form');
            if(form.checkValidity()) {
                triggerEmojiExplosion(e.clientX, e.clientY);
            }
        });

        function triggerEmojiExplosion(originX, originY) {
            for (let i = 0; i < 20; i++) {
                const element = document.createElement('div');
                element.className = 'burst-emoji';
                element.innerText = emojiPool[Math.floor(Math.random() * emojiPool.length)];
                element.style.left = originX + 'px';
                element.style.top = originY + 'px';

                const angle = Math.random() * Math.PI * 2;
                const radius = 50 + Math.random() * 120;

                element.style.setProperty('--dx', Math.cos(angle) * radius + 'px');
                element.style.setProperty('--dy', Math.sin(angle) * radius + 'px');
                element.style.setProperty('--dr', (Math.random() * 360) + 'deg');

                document.body.appendChild(element);
                element.addEventListener('animationend', () => element.remove());
            }
        }

        let targetMessageId = null;
        function triggerPinModal(id) {
            targetMessageId = id;
            document.getElementById('pinModalWindow').style.display = 'flex';
            document.getElementById('modalPinField').value = '';
        }
        function dismissPinModal() {
            document.getElementById('pinModalWindow').style.display = 'none';
        }
        function processPinVerification() {
            const codeInput = document.getElementById('modalPinField').value;
            fetch(`/unlock-letter/${targetMessageId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ input_pin: codeInput })
            })
            .then(response => response.json())
            .then(resData => {
                if(resData.success) {
                    document.getElementById(`locked-card-${targetMessageId}`).style.display = 'none';
                    const activeTextNode = document.getElementById(`text-card-${targetMessageId}`);
                    activeTextNode.innerText = `"${resData.text}"`;
                    activeTextNode.classList.remove('hidden');
                    dismissPinModal();
                } else {
                    alert(resData.message);
                }
            });
        }
    </script>
</body>
</html>
