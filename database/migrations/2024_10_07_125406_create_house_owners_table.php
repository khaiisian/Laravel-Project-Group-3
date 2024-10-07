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
        Schema::create('house_owners', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('phNo');
            $table->string('fbLink')->nullable();
            $table->string('profile')->nullable();
            $table->string('NRC');
            $table->string('NRCImage');
            $table->foreignIdFor(App\Models\User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_owners');
    }
};
