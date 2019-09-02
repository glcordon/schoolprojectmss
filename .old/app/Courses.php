<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Course
 *
 * @package App
 * @property string $course_title
*/
class Course extends Model
{
    use SoftDeletes;
    // use HasMediaTrait;

    protected $fillable = ['course_title'];
    protected $hidden = [];
    
    
    
    public function lessons() {
        return $this->hasMany(Lesson::class, 'course_id');
    }
}