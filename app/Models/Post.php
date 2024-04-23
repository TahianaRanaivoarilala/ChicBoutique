<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'price',
        'featuredImage',
        'sold'
    ];

    public function urlFeaturedImage():string{
        return Storage::disk('public')->url($this->featuredImage);
    }
}
