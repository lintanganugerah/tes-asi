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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nomor', 15);
            $table->string('nama', 150);
            $table->string('jabatan', 200)->nullable()->default('NULL');
            $table->timestamp('talahir')->nullable()->default('NULL');
            $table->string('photo_upload_path', 150)->nullable()->default('NULL');
            $table->string('created_by', 150)->nullable()->default('NULL');
            $table->string('updated_by', 150)->nullable()->default('NULL');
            $table->string('deleted_on', 45)->nullable()->default('NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
