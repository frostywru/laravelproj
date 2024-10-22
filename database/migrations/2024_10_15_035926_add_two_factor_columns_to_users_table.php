<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Check if 'two_factor_secret' exists before adding it
            if (!Schema::hasColumn('users', 'two_factor_secret')) {
                $table->text('two_factor_secret')->nullable();
            }

            // Check if 'two_factor_recovery_codes' exists before adding it
            if (!Schema::hasColumn('users', 'two_factor_recovery_codes')) {
                $table->text('two_factor_recovery_codes')->nullable();
            }

            // Check if 'two_factor_confirmed_at' exists before adding it
            if (!Schema::hasColumn('users', 'two_factor_confirmed_at') && Fortify::confirmsTwoFactorAuthentication()) {
                $table->timestamp('two_factor_confirmed_at')
                    ->after('two_factor_recovery_codes')
                    ->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the columns only if they exist
            if (Schema::hasColumn('users', 'two_factor_confirmed_at')) {
                $table->dropColumn('two_factor_confirmed_at');
            }

            if (Schema::hasColumn('users', 'two_factor_secret')) {
                $table->dropColumn('two_factor_secret');
            }

            if (Schema::hasColumn('users', 'two_factor_recovery_codes')) {
                $table->dropColumn('two_factor_recovery_codes');
            }
        });
    }
};
