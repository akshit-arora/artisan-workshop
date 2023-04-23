<?php

namespace App\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'location',
        'link',
    ];

/**
 * Create a new factory instance for the model.
 */
protected static function newFactory(): Factory
{
    return ProjectFactory::new();
}
}
