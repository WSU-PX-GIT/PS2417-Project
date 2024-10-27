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
            // Add AgencyName if it doesn't exist
            if (!Schema::hasColumn('users', 'AgencyName')) {
                $table->string('AgencyName')->nullable();
            }
            // Add AgencyID if it doesn't exist
            if (!Schema::hasColumn('users', 'AgencyID')) {
                $table->integer('AgencyID')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove columns on rollback if they exist
            if (Schema::hasColumn('users', 'AgencyName')) {
                $table->dropColumn('AgencyName');
            }
            if (Schema::hasColumn('users', 'AgencyID')) {
                $table->dropColumn('AgencyID');
            }
        });
    }
};
