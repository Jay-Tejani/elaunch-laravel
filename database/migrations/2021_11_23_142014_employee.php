<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 200);
            $table->string('last_name', 200);
            $table->date('birth_date', 200);
            $table->string('mobile_no', 200);
            $table->string('email', 200)->unique();
            $table->string('password', 200);
            $table->string('salary', 200);
            $table->date('joining_date', 200);
            $table->string('image', 200);
            $table->string('passport_number', 200);
            $table->string('department_id', 11);
            $table->string('designation_id', 11);
            $table->enum('gender', ['1', '2']);
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
        //
    }
}
