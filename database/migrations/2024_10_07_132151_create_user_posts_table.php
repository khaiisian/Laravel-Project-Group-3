<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('end_user_id');
            $table->unsignedBigInteger('township_id');
            $table->unsignedBigInteger('selection_type_id');
            $table->text('content');
            $table->date('currentDate');
            $table->string('requirement');
            $table->string('status');
            $table->timestamps();
            $table->foreign('end_user_id')->references('id')->on('end_users')->onDelete('cascade');
            $table->foreign('township_id')->references('id')->on('townships')->onDelete('cascade');
            $table->foreign('selection_type_id')->references('id')->on('selection_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_posts');
    }
};
