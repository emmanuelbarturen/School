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
}
