<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('activity')->nullable();
            $table->string('quiz')->nullable();
            $table->string('performance')->nullable();
            $table->string('exam')->nullable();
            $table->string('total_grade')->nullable();
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
        Schema::dropIfExists('grade_students');
    }
}
