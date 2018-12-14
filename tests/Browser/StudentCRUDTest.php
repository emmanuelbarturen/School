<?php namespace Tests\Browser;

use App\Student;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class StudentCRUDTest
 * @package Tests\Browser
 */
class StudentCRUDTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @test
     * @return void
     * @throws \Throwable
     */
    public function create_student()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/alumnos/create')
                ->assertSee('Crear nuevo alumno')
                ->type('@student-name', 'Juan')
                ->type('@student-email', 'juan@school.com')
                ->click('@save-student')
                ->assertPathIs('/alumnos')
                ->assertSee('Se ha guardado a un nuevo alumno');
        });
        $this->assertDatabaseHas('students', ['names' => 'Juan', 'email' => 'juan@school.com']);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function read_student()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/alumnos')
                ->assertSee('Todos los alumnos');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function update_student()
    {
        $student = factory(Student::class)->create();
        $this->browse(function (Browser $browser) use ($student) {
            $browser->visit('/alumnos/' . $student->id . '/edit')
                ->assertSee('Editar alumno')
                ->type('@student-name', 'Jhon Doe')
                ->type('@student-email', 'jhondoe@school.com')
                ->click('@update-student')
                ->assertPathIs('/alumnos/' . $student->id)
                ->assertSee('Se ha actualizado los datos de un alumno');
        });

        $this->assertDatabaseHas('students', ['names' => 'Jhon Doe', 'email' => 'jhondoe@school.com']);
    }

    public function delete_student()
    {

    }


}
