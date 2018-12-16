<?php namespace Tests\Browser;

use App\Course;
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
                ->assertSee('El Registro ha sido guardado');
        });
        $this->assertDatabaseHas('students', ['names' => 'Juan', 'email' => 'juan@school.com']);
    }

    /**
     *
     * @test
     * @return void
     * @throws \Throwable
     */
    public function create_student_with_courses()
    {
        $courses = factory(Course::class, 10)->create();
        $this->browse(function (Browser $browser) use ($courses) {
            $browser->visit('/alumnos/create')
                ->assertSee('Crear nuevo alumno')
                ->type('@student-name', 'Jazmin')
                ->type('@student-email', 'jazz@school.com');
            foreach ($courses->take(5) as $course) {
                $browser->check('@c-' . $course->id);
            }

            $browser->click('@save-student')
                ->assertPathIs('/alumnos')
                ->assertSee('El Registro ha sido guardado');
        });

        $this->assertDatabaseHas('students', ['names' => 'Jazmin', 'email' => 'jazz@school.com']);
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
                ->assertSee('Actualizado correctamente');
        });

        $this->assertDatabaseHas('students', ['names' => 'Jhon Doe', 'email' => 'jhondoe@school.com']);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function delete_student()
    {
        $student = factory(Student::class)->create();
        $this->browse(function (Browser $browser) use ($student) {
            $browser->visit('/alumnos/' . $student->id)
                ->assertSee('Detalle del Alumno')
                ->click('@delete-student')
                ->driver->switchTo()->alert()->accept();
            $browser->assertPathIs('/alumnos')
                ->assertSee('Se ha eliminado el registro');
        });

        $this->assertDatabaseMissing('students', ['names' => $student->names, 'email' => $student->email]);
    }


}
