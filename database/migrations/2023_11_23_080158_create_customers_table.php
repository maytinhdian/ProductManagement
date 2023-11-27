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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shortname', 50);
            $table->string('fullname', 100);
            $table->string('email');
            $table->string('handphone')->unique();
            $table->enum('customer_group', ['cá nhân', 'công ty'])->default('cá nhân');
            $table->string('handphone2');
            $table->geometry('gps_map');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
