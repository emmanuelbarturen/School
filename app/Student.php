<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * @package App
 */
class Student extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['names', 'email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student')->withPivot('rating')->withTimestamps();
    }
}
