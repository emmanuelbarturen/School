<?php namespace Tests\Browser;

use App\Course;
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

    /**
     * @test
     * @throws \Throwable
     */
    public function read_course()
    {
        $course = factory(Course::class)->create();
        $this->browse(function (Browser $browser) use ($course) {
            $browser->visit('/')
                ->clickLink('Cursos')
                ->assertSee('Todos los cursos')
                ->visit('/cursos/' . $course->id)
                ->assertSee($course->name);
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function update_course()
    {
        $course = factory(Course::class)->create();
        $this->browse(function (Browser $browser) use ($course) {
            $browser->visit('/cursos/' . $course->id . '/edit')
                ->assertSee('Editar curso')
                ->type('@course-name', 'Personal Social')
                ->type('@course-semester', '8')
                ->click('@update-teacher')
                ->assertPathIs('/cursos/' . $course->id)
                ->assertSee('Actualizado correctamente');
        });

        $this->assertDatabaseHas('courses', ['name' => 'Personal Social', 'semester' => '8']);
    }
}
