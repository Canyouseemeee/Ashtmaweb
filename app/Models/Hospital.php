<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $primaryKey = 'h_id';

    protected $table = 'hospital';

    protected $fillable = [
        'h_id',
        'h_name',
        'h_tel',
        'created_at',
        'updated_at',
    ];
}
