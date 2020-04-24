<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testAddNewsForm1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/addNews')
                ->assertSee('Добавление новости')
                ->type('title', 'НОВ')
                ->type('text', 'Текст')
                ->press('Добавить')
                ->assertSee('Количество символов в поле текст новости должно быть не менее 20.');
        });
    }

    public function testAddNewsForm2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/addNews')
                ->assertSee('Добавление новости')
                ->type('title', 'новая новость')
                ->type('text', 'Текст текст текст текст текст')
                ->press('Добавить')
                ->assertSee('Новость успешно создана!')
                ->assertPathIs('/admin');
        });
    }

    public function testAddCategoryForm1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/addCategory')
                ->assertSee('Добавление новой категории новостей')
                ->type('category', 'новая категория')
                ->type('slug', 'novaya category')
                ->press('Добавить')
                ->assertSee('Поле транскрипция категории может содержать только буквы.');
        });
    }
    public function testAddCategoryForm2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/addCategory')
                ->assertSee('Добавление новой категории новостей')
                ->type('category', 'новая категория')
                ->type('slug', 'novayacategory')
                ->press('Добавить')
                ->assertSee('Категория успешно создана!')
                ->assertPathIs('/admin/category/categoryIndex');
        });
    }
    public function testEditCategoryForm1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/category/editCategory/1')
                ->assertSee('Редактирование категории')
                ->type('category', 'Политика2')
                ->type('slug', 'politic')
                ->press('Изменить')
                ->assertSee('Категория успешно обновлена!')
                ->assertPathIs('/admin/category/categoryIndex');
        });
    }

}
