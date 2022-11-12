<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_activities', function (Blueprint $table) {
            $table->foreignId('visitor_id')->constrained();
            $table->foreignId('activity_id')->constrained();
            $table->boolean('finished')->default(0);
            $table->timestamps();
            $table->unique(['visitor_id', 'activity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitor_activities');
    }
};
