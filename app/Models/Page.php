<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        'heading',
        'ordering',
        'status',
        'url_key',
        'description',
        'banner_image'
    ];
}
