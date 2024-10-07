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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\PropertyType::class);
            $table->foreignIdFor(App\Models\HouseOwner::class);
            $table->foreignIdFor(App\Models\Township::class);
            $table->foreignIdFor(App\Models\SelectionType::class);
            $table->text('content');
            $table->string('address');
            $table->integer('bedRoom');
            $table->integer('bathRoom');
            $table->integer('area');
            $table->decimal('price', 15, 2);
            $table->string('status');
            $table->string('description');
            $table->integer('room');
            $table->string('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
