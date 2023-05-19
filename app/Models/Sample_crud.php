<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample_crud extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'n_of_mouse',
            'n_0f_keyboard',
            'n_of_functioning',
            'n_of_not_connected'
        ];
}