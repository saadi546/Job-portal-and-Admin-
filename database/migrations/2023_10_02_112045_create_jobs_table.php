<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('job_image')->nullable();
            $table->string('job_title');
            $table->string('job_location')->nullable();
            $table->date('published_date')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('job_nature')->nullable();
            $table->text('job_description')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('job_summary')->nullable();
            $table->text('company_details')->nullable();
            $table->text('qualifications')->nullable();
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('jobs');
        
    }
};
