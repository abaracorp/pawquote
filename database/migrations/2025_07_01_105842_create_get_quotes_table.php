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
        Schema::create('get_quotes', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->integer('zip_code');
            $table->string('email_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->tinyInteger('pet')->default(0)->comment('0 => for dog , 1 => for cat');
            $table->string('pet_name')->nullable();
            $table->tinyInteger('is_have_pet_yet')->default(0)->comment('0 => for yes , 1 => for no');
            $table->tinyInteger('pet_breed')->nullable();
            $table->tinyInteger('pet_gender')->default(0)->comment('0 => for male , 1 => for female');
            $table->tinyInteger('pet_age_years')->nullable();
            $table->tinyInteger('pet_age_months')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_quotes');
    }
};
