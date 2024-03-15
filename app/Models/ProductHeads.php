<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHeads extends Model
{
    use HasFactory;

    
    protected $fillable = [
        "id",
        "aligen",
        "key",
        "sortable",
        "title",
    ] ;
    
    protected $hidden = [
        "id",
        "sortable",
    ];
    
}
