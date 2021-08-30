<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('h1');
            $table->string('subtitle')->nullable();
            $table->string('slug')->nullable();
            $table->date('next_start')->nullable();
            $table->integer('lesson_count')->nullable();
            $table->integer('lesson_duration')->nullable();
            $table->integer('lesson_per_week')->nullable();
            $table->integer('price')->nullable();
            $table->string('price_desc')->nullable();
            $table->integer('price_extra')->nullable();
            $table->string('price_extra_desc')->nullable();
            $table->integer('price_vip')->nullable();
            $table->string('price_vip_desc')->nullable();
            $table->string('skills')->nullable();
            $table->string('forwhom')->nullable();
            $table->text('program')->nullable();
            $table->text('text')->nullable();
            $table->text('finish_skills')->nullable();
            $table->text('meta')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('published')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
