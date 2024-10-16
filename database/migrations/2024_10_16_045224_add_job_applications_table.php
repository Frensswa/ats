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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('applicantID')->unsigned();
            $table->bigInteger('jobOpeningID')->unsigned();
            $table->timestamps();
    
            $table->unique(['applicantID', 'jobOpeningID']);
            $table->foreign('applicantID')->references('id')->on('applicants')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jobOpeningID')->references('id')->on('job_openings')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
