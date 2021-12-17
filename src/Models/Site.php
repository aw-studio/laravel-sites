<?php

namespace AwStudio\Sites\Models;

use Astrotomic\Fileable\Concerns\HasFiles;
use Astrotomic\Fileable\Contracts\Fileable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model implements Fileable
{
    use HasFactory, HasFiles;

    protected $fillable = [
        'content', 'name', 'slug',
    ];

    protected $casts = [
        'content' => 'json',
    ];
}
