<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Medic extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'm_id';

    protected $table = 'medic';

    public  $incrementing = false; 

    protected $fillable = [
        'm_fullname',
        'password',
        'm_position',
        'admin',
        'h_id',
        'm_startdate',
        'm_enddate',
        'created_at',
        'updated_at',

    ];

    
}
