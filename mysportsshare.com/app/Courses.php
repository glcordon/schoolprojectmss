<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Support\Str;

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

    protected $guarded = [];
    protected $hidden = [];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->{$course->getKeyName()} = (string) Str::uuid();
        });
    }
    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }
    public function lessons() {
        return $this->hasMany(Lesson::class, 'course_id');
    }
}