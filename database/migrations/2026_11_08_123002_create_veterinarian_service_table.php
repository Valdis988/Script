<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('veterinarian_service', function (Blueprint $table) {
            $table->foreignId('veterinarian_id')
                ->constrained('veterinarians')->cascadeOnDelete();
            $table->foreignId('service_id')
                ->constrained('services')->cascadeOnDelete();
            $table->primary(['veterinarian_id', 'service_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('veterinarian_service');
    }
};
