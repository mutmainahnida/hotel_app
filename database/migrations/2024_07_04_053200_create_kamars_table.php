<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->string('jenis_kamar');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga_permalam', 10, 2)->default(0.00);
            $table->boolean('ketersediaan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kamars');
    }
};
