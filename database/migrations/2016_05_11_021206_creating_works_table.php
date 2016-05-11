<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatingWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses'); // fk de cursos
            $table->string('theme'); // tema
            $table->string('authors'); //autores
            $table->string('advisor'); //orientador
            $table->string('examiners'); // banca
            $table->string('description'); // descrição
            $table->string('subject'); // assunto
            $table->string('url'); //link de upload
            $table->tinyInteger('status'); //ativo ou não
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
        Schema::drop('works');
    }
}
