<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views_forms', function (Blueprint $table) {
            $table->id();

            // Crear una llave foránea
            $table->foreignId('file_pdf_id')
            ->nullable()
            ->constrained('files_pdf', 'id')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('base_url')->nullable();
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
        Schema::dropIfExists('views_forms');
    }
}
