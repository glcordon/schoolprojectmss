<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Course
 *
 * @package App
 * @property string $course_title
*/
class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['course_title'];
    protected $hidden = [];
    
    
    
    public function lessons() {
        return $this->hasMany(Lesson::class, 'lesson_id');
    }
}