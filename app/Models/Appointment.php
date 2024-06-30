<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'appointment_id';

    protected $fillable = [
        'appointment_id',
        'items_ordered_id',
        'user_id',
        'date',
        'status',
    ];

    public function itemsOrdered()
    {
        return $this->belongsTo(ItemsOrdered::class, 'items_ordered_id', 'items_ordered_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

}
