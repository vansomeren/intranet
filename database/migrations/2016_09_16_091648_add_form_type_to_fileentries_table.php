<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFormTypeToFileentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fileentries', function (Blueprint $table) {

            $table->unsignedInteger('filetype_id')->index()->nullable();
            $table->foreign('filetype_id')->references('id')->on('filetypes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fileentries', function (Blueprint $table) {
            //
        });
    }
}
