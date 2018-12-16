<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher
 * @package App
 */
class Teacher extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['names', 'phone'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teacher')->withTimestamps();
    }
}
