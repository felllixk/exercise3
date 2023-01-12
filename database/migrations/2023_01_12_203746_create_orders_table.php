<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->json('products');
            $table->foreignId('user_id')->nullable()->unique()->references('id')->on('users')->nullOnDelete();
            // Можно добавить секретный ключ исходя из json для проверки подлинности заказа
            $table->bigInteger('amount');
            $table->enum('status', ['WAITING', 'PAID', 'REJECTED']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
