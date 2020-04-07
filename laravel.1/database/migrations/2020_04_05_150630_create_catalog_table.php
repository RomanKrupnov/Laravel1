<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title')->comment('название категории');
            $table->string('slug')->comment('Slug категории');
            $table->timestamp('created_at')->useCurrent()->comment('Время создания новости');
            $table->timestamp('updated_at')->useCurrent()->comment('Время редактирования новости');

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog');
    }
}
