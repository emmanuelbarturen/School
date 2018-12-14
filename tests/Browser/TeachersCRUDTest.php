<?php namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class TeachersCRUDTest
 * @package Tests\Browser
 */
class TeachersCRUDTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     *
     * @test
     * @return void
     * @throws \Throwable
     */
    public function create_teacher()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/profesores/create')
                ->assertSee('Agregar nuevo profesor')
                ->type('@teacher-name', 'Elon')
                ->type('@teacher-phone', '942424244')
                ->click('@save-teacher')
                ->assertPathIs('/profesores')
                ->assertSee('El Registro ha sido guardado');
        });
        $this->assertDatabaseHas('teachers', ['names' => 'Elon', 'phone' => '942424244']);
    }
}
