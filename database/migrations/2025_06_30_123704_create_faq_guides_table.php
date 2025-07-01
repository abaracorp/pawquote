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
        Schema::create('faq_guides', function (Blueprint $table) {
            $table->id();
            $table->string('question_text');
            $table->longText('content');
            $table->tinyInteger('status')->default(0)->comment('0 => for published , 1 => for draft');
            $table->tinyInteger('type')->default(0)->comment('0 => for faq , 1 => for guide');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_guides');
    }
};
