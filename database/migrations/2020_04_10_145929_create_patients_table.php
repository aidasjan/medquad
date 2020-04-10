<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->integer('age');
            $table->string('group')->nullable();
            $table->boolean('cardiac_arrest');
            $table->boolean('irreversible_hypotension');
            
            //Glasgow comma scale
            $table->integer('best_motor_response')->nullable();
            $table->integer('best_verbal_response')->nullable();
            $table->integer('best_eye_response')->nullable();

            $table->integer('burn_size')->nullable();
            $table->boolean('other_mortality_conditions');

            //Sofa scale
            $table->double('pao2_fio2')->nullable();
            $table->double('platelets')->nullable();
            $table->double('bilirubin')->nullable(); // mg/dL are used in calculations
            $table->double('mabp')->nullable();
            $table->double('dopamine')->nullable();
            $table->double('epinephrine')->nullable();
            $table->double('norepinephrine')->nullable();
            $table->double('creatinine')->nullable(); // mg/dL are used in calculations
            $table->boolean('at_least_one_organ_failure')->nullable();

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
        Schema::dropIfExists('patients');
    }
}
