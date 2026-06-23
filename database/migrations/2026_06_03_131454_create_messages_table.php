<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('receiver_name');
            $table->text('message_text');
            $table->string('pin_code')->nullable(); // Kolom kunci pesan (Advance Feature)
            $table->boolean('is_flagged')->default(false); // Deteksi otomatis konten sensitif/kasar
            $table->string('sender_ip')->nullable(); // Untuk keperluan keamanan / anti-spam tracking
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
