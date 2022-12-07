<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadMemberUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'description',
        'homepage_url',
        'fb_url',
        'twitter_url',
        'blog_url',
        'country',
    ];
}
