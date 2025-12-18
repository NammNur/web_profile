<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('produk_id');
            $table->string('nama_produk');
            $table->bigInteger('harga');

            $table->integer('quantity');
            $table->bigInteger('total_price');

            $table->string('no_wa');
            $table->text('catatan')->nullable();

            $table->string('status')->default('pending');

            $table->timestamps();

            $table->foreign('produk_id')
                ->references('id_produk')
                ->on('produk')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
