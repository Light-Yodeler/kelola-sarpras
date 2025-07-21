<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom baru
            $table->string('role')->default('student')->after('password');

            // Ubah kolom yang sudah ada
            $table->string('email')->nullable()->change();

            // Hapus kolom yang tidak perlu
            $table->dropColumn('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert perubahan
            $table->dropColumn('role');
            $table->string('email')->nullable(false)->change();
            $table->rememberToken();
        });
    }
};
