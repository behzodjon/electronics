<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->string('attributes_hash');
            $table->float('price')->default(0);
            $table->foreignId('cart_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('product_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('storage_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('condition_id')->constrained()->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('cart_items');
    }
}
