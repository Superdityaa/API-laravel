<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class majalah extends Model
{
    use HasFactory;
    
    protected $table = 'majalahs';
    protected $fillable = [
        'cover', 'judul', 'seri', 'genre', 'penerbit'
    ];
}
