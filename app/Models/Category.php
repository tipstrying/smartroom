<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $children = [] ;
    protected $fillable = [
        'name',
        'level',
        'ccode',
        'fcode',
    ];
    public function getRouteKeyName(): string
    {
        return 'ccode';
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
