<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // id (bigint, auto increment)

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('produk_id')->nullable();

            $table->string('nama_produk')->nullable();
            $table->decimal('harga_jual', 15, 2)->nullable();
            $table->integer('quantity')->nullable();

            $table->string('no_wa', 20)->nullable();
            $table->text('catatan')->nullable();

            $table->string('order_code')->nullable();

            $table->enum('status', [
                'pending',
                'process',
                'delivered',
                'cancel'
            ])->default('pending');

            $table->decimal('total_price', 15, 2)->default(0.00);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
