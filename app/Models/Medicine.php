<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $primaryKey = 'me_id';

    protected $table = 'medicine';

    protected $fillable = [
        'me_id',
        'me_name',
        'me_dose',
        'me_time',
        'me_day',
        'me_when',
        'me_type',
        'me_image',
        'created_at',
        'updated_at',
    ];
}
