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
     *
     * @throws \Throwable
     */
    public function read_student()
    {
        $students = Student::all();
        $this->browse(function (Browser $browser) use ($students) {
            $browser->visit('/')
                ->assertSee('Alumnos')
                ->click('Alumnos')
                ->assertSee('Todos los alumnos')
                ->type('@student-name', 'Juan')
                ->type('@student-email', 'juan@school.com')
                ->click('@save-student')
                ->assertSee('Se ha guardado a un nuevo alumno');
            foreach ($students as $student) {
                $browser->assertSee($student->name);
            }
        });
    }

    /**
     *
     * @throws \Throwable
     */
    public function update_student()
    {

    }

    public function delete_student()
    {

    }


}
