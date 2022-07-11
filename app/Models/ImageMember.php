<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageMember extends Model
{
    use HasFactory;
    protected $table = 'images_member';
    protected $fillable = [
        'image_src',
        'member_id'
    ];
}
