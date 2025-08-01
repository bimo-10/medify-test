<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kategori_master_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_item_id');
            $table->unsignedBigInteger('kategori_item_id');
            $table->timestamps();
            $table->foreign('master_item_id')->references('id')->on('master_items')->onDelete('cascade');
            $table->foreign('kategori_item_id')->references('id')->on('kategori_items')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('kategori_master_item');
    }
};
