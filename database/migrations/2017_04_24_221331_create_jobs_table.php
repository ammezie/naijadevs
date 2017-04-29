<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('apply');
            $table->string('apply_url')->nullable();
            $table->string('apply_email')->nullable();
            $table->string('apply_email_subject')->nullable();
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('location_id')->nullable();
            $table->boolean('is_remote')->default(0);
            $table->string('salary')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
