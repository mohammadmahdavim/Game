<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'link',
        'link_title'
    ];

    // ساخت slug به‌صورت خودکار هنگام ذخیره
    protected static function booted()
    {
        static::creating(function ($portfolio) {
            $portfolio->slug = Str::slug($portfolio->title);
        });
    }
}
