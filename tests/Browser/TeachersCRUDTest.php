<?php namespace Tests\Browser;

use App\Teacher;
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

    /**
     * @test
     * @throws \Throwable
     */
    public function read_teacher()
    {
        $teacher = factory(Teacher::class)->create();
        $this->browse(function (Browser $browser) use ($teacher) {
            $browser->visit('/')
                ->assertSee('Profesores')
                ->clickLink('Profesores')
                ->assertSee('Todos los profesores')
                ->visit('/profesores/' . $teacher->id)
                ->assertSee($teacher->names);
        });
    }


    /**
     * @test
     * @throws \Throwable
     */
    public function update_teacher()
    {
        $teacher = factory(Teacher::class)->create();
        $this->browse(function (Browser $browser) use ($teacher) {
            $browser->visit('/profesores/' . $teacher->id . '/edit')
                ->assertSee('Editar profesor')
                ->type('@teacher-name', 'Miss Liz')
                ->type('@teacher-phone', '123456789')
                ->click('@update-teacher')
                ->assertPathIs('/profesores/' . $teacher->id)
                ->assertSee('Actualizado correctamente');
        });

        $this->assertDatabaseHas('teachers', ['names' => 'Miss Liz', 'phone' => '123456789']);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function delete_student()
    {
        $teacher = factory(Teacher::class)->create();
        $this->browse(function (Browser $browser) use ($teacher) {
            $browser->visit('/profesores/' . $teacher->id)
                ->assertSee('Detalle del profesor')
                ->click('@delete-teacher')
                ->driver->switchTo()->alert()->accept();
            $browser->assertPathIs('/profesores')
                ->assertSee('Se ha eliminado el registro');
        });

        $this->assertDatabaseMissing('teachers', ['names' => $teacher->names, 'phone' => $teacher->phone]);
    }

}
