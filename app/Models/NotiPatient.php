<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotiPatient extends Model
{
    use HasFactory;

    protected $primaryKey = 'nop_id';

    protected $table = 'notificationpatient';

    protected $fillable = [
        'nop_id',
        'nop_name',
        'nop_temperature',
        'nop_text',
        'nop_video',
        'created_at',
        'updated_at',
    ];
}
