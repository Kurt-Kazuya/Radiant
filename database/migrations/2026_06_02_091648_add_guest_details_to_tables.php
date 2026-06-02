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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->text('address')->nullable();
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->string('arrival_time')->nullable();
            $table->text('special_requests')->nullable();
            $table->json('preferences')->nullable();
            $table->json('extras')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'nationality', 'address']);
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['arrival_time', 'special_requests', 'preferences', 'extras']);
        });
    }
};
