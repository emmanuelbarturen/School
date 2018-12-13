<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * @package App
 */
class Course extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'semester'];
}
