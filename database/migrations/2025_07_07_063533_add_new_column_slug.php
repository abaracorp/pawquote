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
        Schema::table('faq_guides', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('question_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faq_guides', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
