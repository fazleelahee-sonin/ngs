<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('channel_id', 36);
            $table->string('name', 100);
            $table->string('description');
            $table->string('thumbnail');
            $table->string('day_on_streaming');
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('sequence');
            $table->timestamps();

            $table->foreign('channel_id')
                ->on('channels')
                ->references('id')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programmes');
    }
}