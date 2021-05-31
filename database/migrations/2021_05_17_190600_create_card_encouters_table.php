<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardEncoutersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_encouters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->unique();
            $table->integer('order')->unsigned();
            $table->timestamps();
        });

        Schema::table('cards', function (Blueprint $table) {
            $table->integer('card_encounter_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_encouters');

        Schema::table('cards', function (Blueprint $table) {
            $table->dropColumn(['card_encounter_id']);
        });
    }
}
