<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_appointment';

    protected $fillable = [
        'appointment_id',
        'ordered_id',
        'user_id',
        'day',
        'status',
    ];


    public function itemsOrdered()
    {
        return $this->belongsTo(ItemsOrdered::class, 'ordered_id', 'id_ordered');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

}
