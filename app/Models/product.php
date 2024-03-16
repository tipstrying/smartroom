<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'pcode',
        'name',
        'image',
        'type',
        'unit',
        'brand',
        'ccode',
    ];

    public function getRouteKeyName(): string
    {
        return 'pcode';
    }
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
