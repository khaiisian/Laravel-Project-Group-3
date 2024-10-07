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
            $table->foreignIdFor(App\Models\EndUser::class);
            $table->foreignIdFor(App\Models\Township::class);
            $table->foreignIdFor(App\Models\SelectionType::class);
            $table->text('content');
            $table->date('currentDate');
            $table->string('requirement');
            $table->string('status');
            $table->timestamps();
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
