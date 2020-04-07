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
            $table->boolean('isPrivate')->default(0)->comment('Приватность новости');
            $table->string('image')->nullable(true)->comment('Фотография');
            $table->bigInteger('category_id')->nullable(false)->comment('Категория новости');
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
        Schema::dropIfExists('news');
    }
}
