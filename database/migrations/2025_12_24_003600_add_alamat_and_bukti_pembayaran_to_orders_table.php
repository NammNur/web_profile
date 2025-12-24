<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            // Alamat pengiriman
            $table->text('alamat')->after('no_wa');

            // Bukti pembayaran (path / nama file)
            $table->string('bukti_pembayaran')->nullable()->after('metode_pembayaran');

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn('alamat');
            $table->dropColumn('bukti_pembayaran');

        });
    }
};
