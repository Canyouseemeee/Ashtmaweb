<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dose extends Model
{
    use HasFactory;

    protected $primaryKey = 'do_id';

    protected $table = 'dose';

    protected $fillable = [
        'do_id',
        'do_name',
        'created_at',
        'updated_at',
    ];
}
