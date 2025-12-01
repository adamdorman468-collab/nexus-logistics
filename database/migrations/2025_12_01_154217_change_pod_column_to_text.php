<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Disable transaction for this migration.
     */
    // public $withinTransaction = false; // Commented out because I'm not 100% sure if it's supported in this version/setup without checking, but let's try just running it.
    // Actually, let's just try to run it. If it fails, I'll add it.
    // Wait, I already ran it and it failed.
    
    // Let's try to just run the SQL manually in tinker to see if it works.
    // If it works in tinker, then the migration system is the issue.
    
    public function up(): void
    {
        DB::statement('ALTER TABLE status_updates ALTER COLUMN proof_of_delivery TYPE TEXT');
        DB::statement('ALTER TABLE status_updates ALTER COLUMN proof_of_delivery DROP NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE status_updates ALTER COLUMN proof_of_delivery TYPE VARCHAR(255)');
    }
};
