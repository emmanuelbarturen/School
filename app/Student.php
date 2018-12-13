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
}
