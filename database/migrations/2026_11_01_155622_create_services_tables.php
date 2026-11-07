<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('price')->nullable();
            $table->timestamps();
        });


        Schema::create('service_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')
                ->constrained('services')
                ->cascadeOnDelete();
            $table->string('locale', 5);
            $table->string('name', 200);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unique(['service_id', 'locale']);
            $table->index('locale');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_translations');
        Schema::dropIfExists('services');
    }
};
