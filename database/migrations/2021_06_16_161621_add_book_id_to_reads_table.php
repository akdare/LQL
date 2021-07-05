<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookIdToReadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('to_reads', function (Blueprint $table) {
            //
                $table->unsignedBigInteger('book_id');
                $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
                Schema::enableForeignKeyConstraints();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('to_reads', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['book_id']);
            $table->dropColumn('book_id');
        });
    }
}
