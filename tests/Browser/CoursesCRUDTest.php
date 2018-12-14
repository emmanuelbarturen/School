<?php namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Class CoursesCRUDTest
 * @package Tests\Browser
 */
class CoursesCRUDTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     *
     * @test
     * @return void
     * @throws \Throwable
     */
    public function create_course()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cursos/create')
                ->assertSee('Agregar nuevo curso')
                ->type('@course-name', 'Ciencia Y Tecnología')
                ->type('@course-semester', '5')
                ->click('@save-course')
                ->assertPathIs('/cursos')
                ->assertSee('El Registro ha sido guardado');
        });
        $this->assertDatabaseHas('courses', ['name' => 'Ciencia Y Tecnología', 'semester' => '5']);
    }
}
