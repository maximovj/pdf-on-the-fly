<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratesPdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generates_pdf', function (Blueprint $table) {
            $table->id();

            // Crear una llave foránea
            $table->foreignId('file_pdf_id')
            ->nullable()
            ->constrained('files_pdf','id')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            // Crear una llave foránea
            $table->foreignId('view_form_id')
            ->nullable()
            ->constrained('views_forms','id')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('ip');
            $table->boolean('generated')->default(false);
            $table->string('download')->nullable()->default('file_download.pdf');
            $table->string('path')->nullable();
            $table->json('fields')->nullable();
            $table->string('hash')->nullable();
            $table->integer('count')->nullable()->default(0);
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
        Schema::dropIfExists('generates_pdf');
    }
}
