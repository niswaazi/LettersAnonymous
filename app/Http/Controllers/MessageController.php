<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MessageController extends Controller
{
    /**
     * Menampilkan halaman utama mading surat anonim.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mengambil pesan yang tidak disembunyikan (atau sesuaikan dengan kebutuhan aplikasi kamu)
        // Diurutkan dari yang paling baru didepan
        $messages = Message::when($search, function ($query, $search) {
                return $query->where('receiver_name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mading', compact('messages', 'search'));
    }

    /**
     * Menyimpan surat rahasia baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Data Terlebih Dahulu (Mencegah SQL/Field Error)
        $request->validate([
            'receiver_name' => 'required|string|max:255',
            'message_text'  => 'required|string',
            'pin_code'      => 'nullable|numeric|digits:4', // Harus berupa 4 digit angka jika diisi
        ]);

        // Protection dari Spamming menggunakan Cache berbasis IP Client
        $ipKey = 'spam_protection_' . $request->ip();
        if (Cache::has($ipKey)) {
            return redirect()->back()->with('error', 'Kamu mengirim pesan terlalu cepat! Tunggu 60 detik lagi. ⏳');
        }

        // 2. Sistem Filter Kata Kasar / Sensitif (Moderasi Otomatis)
        $badWords = ['kasar1', 'kasar2', 'toxicWord']; // Silakan isi/tambah daftar kata kasar di sini
        $isFlagged = false;

        foreach ($badWords as $word) {
            if (stripos($request->message_text, $word) !== false) {
                $isFlagged = true;
                break;
            }
        }

        // 3. Simpan Surat ke Database menggunakan Eloquent
        Message::create([
            'receiver_name' => $request->receiver_name,
            'message_text'  => $request->message_text,
            'pin_code'      => $request->pin_code, // Bernilai null jika user tidak mengisi PIN
            'is_flagged'    => $isFlagged,
            'sender_ip'     => $request->ip(),
        ]);

        // Kunci IP selama 60 detik sebelum bisa kirim pesan baru lagi
        Cache::put($ipKey, true, 60);

        return redirect()->route('mading.index')->with('success', 'Surat rahasia berhasil ditempel di mading! 📝');
    }

    /**
     * Fitur AJAX Endpoint untuk membuka kunci surat berbasis PIN.
     */
    public function unlockLetter(Request $request, $id)
    {
        $message = Message::findOrFail($id);

        if ($message->pin_code == $request->input_pin) {
            return response()->json([
                'success' => true,
                'text' => $message->message_text
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kode PIN yang kamu masukkan salah! Keliru mencoba. ❌'
        ], 403);
    }
    /**
     * Menampilkan halaman dashboard khusus Admin (FIX ERROR)
     */
    public function adminIndex()
    {
        // Mengambil semua pesan untuk dikelola oleh admin
        $messages = Message::orderBy('created_at', 'desc')->get();

        // Mengembalikan view khusus admin (pastikan kamu punya file ini nanti, misal: admin/dashboard.blade.php)
        return view('admin.dashboard', compact('messages'));
    }

    /**
     * Aksi untuk Admin menghapus pesan yang melanggar aturan
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Pesan berhasil dihapus dari mading! 🗑️');
    }
}
