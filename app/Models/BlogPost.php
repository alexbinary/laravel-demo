<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    use HasUlids;

    // /**
    //  * 
    //  */
    // public string $title;

    // /**
    //  * 
    //  */
    // public string $content;

    // /**
    //  * 
    //  */
    // public string $category;


    protected $fillable = [
        'title',
        'content',
        'category',
    ];
}
