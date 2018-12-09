<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdfformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfforms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pdf_owner_id');
            $table->string('title');
            $table->longText('pdf_form_answer');
            $table->longText('pdf_form_empty');
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
        Schema::dropIfExists('pdfforms');
    }
}
