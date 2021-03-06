<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function setCourse(Course $course)
    {
        $this->courses()->attach($course['id']);

        return $this->courses();
    }

    public function deleteCourse(Course $course)
    {
        $this->courses()->detach($course['id']);
    }

    public function updateCourse($data, Course $course)
    {
        $this->courses()->updateExistingPivot($course['id'], ['completed' => $data['complete']]);
    }
}
