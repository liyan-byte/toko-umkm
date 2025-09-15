<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sellers', function (Blueprint $table) {
            if (!Schema::hasColumn('sellers', 'whatsapp')) {
                $table->string('whatsapp')->nullable()->after('email');
            }
            if (!Schema::hasColumn('sellers', 'nama_toko')) {
                $table->string('nama_toko')->nullable()->after('whatsapp');
            }
            if (!Schema::hasColumn('sellers', 'alamat_toko')) {
                $table->text('alamat_toko')->nullable()->after('nama_toko');
            }
            if (!Schema::hasColumn('sellers', 'profile_picture')) {
                $table->string('profile_picture')->nullable()->after('alamat_toko');
            }
        });
    }

    public function down(): void
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->dropColumn(['whatsapp', 'nama_toko', 'alamat_toko', 'profile_picture']);
        });
    }
};
