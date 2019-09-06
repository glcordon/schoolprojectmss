<?php

namespace Wave;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Cashier\Billable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Wave\Announcement;
use Wave\ApiToken;

class User extends \TCG\Voyager\Models\User implements JWTSubject
{
    use Notifiable, Impersonate, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'verification_code', 'verified', 'trial_ends_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function keyValues()
    {
        return $this->morphMany('Wave\KeyValue', 'keyvalue');
    }

    public function keyValue($key){
        return $this->morphMany('Wave\KeyValue', 'keyvalue')->where('key', '=', $key)->first();
    }

    public function profile($key){
        $keyValue = $this->keyValue($key);
        return isset($keyValue->value) ? $keyValue->value : '';
    }

    /**
     * @return bool
     */
    public function canImpersonate()
    {
        // If user is admin they can impersonate
        return $this->hasRole('admin');
    }

    /**
     * @return bool
     */
    public function canBeImpersonated()
    {
        // Any user that is not an admin can be impersonated
        return !$this->hasRole('admin');
    }

    public function hasAnnouncements(){
        // Get the latest Announcement
        $latest_announcement = Announcement::orderBy('created_at', 'DESC')->first();
        if($latest_announcement)
        {
            return !$this->announcements->contains($latest_announcement->id);
        }
    }

    public function announcements(){
        return $this->belongsToMany('Wave\Announcement');
    }

    public function createApiKey($name){
        return ApiKey::create(['user_id' => $this->id, 'name' => $name, 'key' => str_random(60)]);
    }

    public function apiKeys(){
        return $this->hasMany('Wave\ApiKey')->orderBy('created_at', 'DESC');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function daysLeftOnTrial(){
        if($this->trial_ends_at && $this->trial_ends_at >= now()){
            $trial_ends = Carbon::parse($this->trial_ends_at)->addDay();
            return $trial_ends->diffInDays(now());
        }
        return 0;
    }

    public function daysLeftOnGrace(){
        if($this->subscribed('main') && $this->subscription('main')->ends_at && $this->subscription('main')->ends_at >= now()){
            $grace_ends = Carbon::parse($this->subscription('main')->ends_at)->addDay();
            return $grace_ends->diffInDays(now());
        }
        return NULL;
    }
}
