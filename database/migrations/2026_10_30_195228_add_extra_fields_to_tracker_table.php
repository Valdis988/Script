<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tracker', function (Blueprint $table) {
            // Часто використовувані для групування параметри — окремі колонки
            $table->string('method', 10)->default('GET')->after('status');
            $table->string('route_name', 100)->nullable()->after('method');
            $table->string('device', 10)->default('desktop')->after('route_name');

            // Універсальне сховище для решти параметрів (JSON)
            $table->json('meta')->nullable()->after('device');

            $table->index('route_name');
        });
    }

    public function down(): void
    {
        Schema::table('tracker', function (Blueprint $table) {
            $table->dropIndex(['route_name']);
            $table->dropColumn(['method', 'route_name', 'device', 'meta']);
        });
    }
};
