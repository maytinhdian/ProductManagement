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
        Schema::create('computer_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpu_serial',50)->unique();
            $table->string('ssd_serial',50)->unique();
            $table->string('hdd_serial',50)->unique();
            $table->macAddress('lan_mac',50)->unique();
            $table->macAddress('wifi_mac',50)->unique();
            $table->unsignedInteger('customer_id');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_info');
    }
};
