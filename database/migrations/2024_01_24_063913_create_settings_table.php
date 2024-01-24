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
    Schema::create('settings', function (Blueprint $table) {
        $table->id();
        $table->integer('return_days')->default(7); // Adjust the default value as needed
        // Other columns...
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('settings');
}
};
