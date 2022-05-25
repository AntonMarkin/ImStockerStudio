<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_elements', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('url')->nullable();
            $table->boolean('in_header');
            $table->boolean('in_footer');
            $table->boolean('is_studio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_elements');
    }
}
