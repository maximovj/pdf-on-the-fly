<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesPdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_pdf', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default('NA');
            $table->text('description')->nullable();
            $table->string('file_name')->nullable()->default('NA');
            $table->string('file_extension')->nullable()->default('NA');
            $table->string('file_storage')->nullable()->default('NA');
            $table->json('fields')->nullable();
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
        Schema::dropIfExists('files_pdf');
    }
}
