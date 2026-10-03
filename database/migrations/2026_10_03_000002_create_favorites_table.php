<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->string('firebase_uid')->index();
            $table->foreignId('discount_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            // One user can favorite a given discount only once.
            $table->unique(['firebase_uid', 'discount_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
