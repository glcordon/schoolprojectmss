<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lesson
 *
 * @package App
 * @property string $lesson
 * @property string $lesson_title
 * @property string $lesson_video
 * @property text $lesson_description
*/
class Lesson extends Model
{
    use SoftDeletes;

    protected $fillable = ['lesson_title', 'lesson_video', 'lesson_description', 'lesson_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLessonIdAttribute($input)
    {
        $this->attributes['lesson_id'] = $input ? $input : null;
    }
    
    public function lesson()
    {
        return $this->belongsTo(Course::class, 'lesson_id')->withTrashed();
    }
    
}