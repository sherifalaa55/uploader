<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * the images that this user owns
     */
    public function ownerImages()
    {
        return $this->hasMany(Image::class, "owner_id");
    }

    /**
     * the images that this user has permission to view
     */
    public function images()
    {
        return $this->belongsToMany(Image::class, "user_image", "user_id", "image_id");
    }
}
