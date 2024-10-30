<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_type_id'); // Ensure this matches the type in property_types
            $table->unsignedBigInteger('house_owner_id'); // Ensure this matches the type in house_owners
            $table->unsignedBigInteger('township_id'); // Ensure this matches the type in townships
            $table->unsignedBigInteger('selection_type_id'); // Ensure this matches the type in selection_types
            $table->text('content');
            $table->string('address');
            $table->integer('bedRoom');
            $table->integer('bathRoom');
            $table->integer('area');
            $table->decimal('price', 15, 2);
            $table->string('status');
            $table->string('description');
            $table->integer('room');
            $table->string('images')->nullable();
            $table->timestamps();

            // Foreign keys with cascade on delete
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->foreign('house_owner_id')->references('id')->on('house_owners')->onDelete('cascade');
            $table->foreign('township_id')->references('id')->on('townships')->onDelete('cascade');
            $table->foreign('selection_type_id')->references('id')->on('selection_types')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
