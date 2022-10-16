<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    //protected $with=['posts','profile','books'];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_author', 'user_id', 'book_id')->withTimestamps();
    }
}
