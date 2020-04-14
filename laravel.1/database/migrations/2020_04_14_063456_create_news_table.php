<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {

            $table->bigIncrements('id')->unsigned();
            $table->string('title')->comment('Заголовок');
            $table->text('text')->comment('Текст новости');
            $table->boolean('isPrivate')->default(false)->comment('Приватность новости');
            $table->string('image')->nullable(true)->comment('Фотография');
            $table->timestamp('created_at')->useCurrent()->comment('Время создания новости');
            $table->timestamp('updated_at')->useCurrent()->comment('Время редактирования новости');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
