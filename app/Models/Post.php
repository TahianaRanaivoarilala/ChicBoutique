<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
/**
 * Undocumented variable
 *
 * @var array
 */
    protected $fillable=[
        'title',
        'description',
        'featuredImage',
        'sold',
        'price',
    ];
}
