<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ojr extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'id_user',
        'id_aosr',
        'date_start',
        'date_end'
    ];

    public function collection()
    {
        return Docs::all();
    }
}
