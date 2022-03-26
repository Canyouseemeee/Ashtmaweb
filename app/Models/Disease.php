<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $primaryKey = 'd_id';

    protected $table = 'disease';


    protected $fillable = [
        'd_id',
        'd_name',
        'created_at',
        'updated_at',
    ];
}
