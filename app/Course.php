<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Course extends Model
{
    // Only allow the title and article field to get updated via mass assignment
    protected $fillable = ["title", "description", "price", "difficulty", "rating", "complete", "score"];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
