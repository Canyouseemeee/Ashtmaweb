<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'hn_id';

    protected $table = 'patient';

    public $incrementing = false;

    protected $fillable = [
        'hn_id',
        'p_tname',
        'p_name',
        'p_surname',
        'p_etname',
        'p_ename',
        'p_esurname',
        'p_address',
        'p_birthdate',
        'p_gender',
        'p_tel',
        'p_weight',
        'p_height',
        'p_race',
        'p_nationality',
        'p_religion',
        'p_passwordcode',
        'p_image',
        'p_sysptom',
        'p_status',
        'u_id',
        'd_id',
        'h_id',
        'created_at',
        'updated_at',

    ];
}
