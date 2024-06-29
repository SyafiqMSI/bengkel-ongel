<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsOrdered extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_items_ordered';
    protected $table = 'items_ordereds';

    protected $fillable = [
        'id_items_ordered',
        'appointment_id',
        'spare_part_id',
        'amount',
    ];


    public function sparePart()
    {
        return $this->belongsTo(SparePart::class, 'spare_part_id', 'id_spare_part');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'id_appointment', 'appointment_id');
    }
}
