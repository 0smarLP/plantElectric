<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectricCharge extends Model
{
    use HasFactory;
    /**
     * Summary of table
     * @var string
     */
    protected $table = 'electric_charges';

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'id',
        'room_id',
        'name',
        'kw',
        'a',
        'total_kw',
        'total_a',
        'fu_general',
        'fu_kw',
        'fu_a',
        'measurement_date',
    ];

    protected $casts = [
        'measurement_date' => 'datetime',
    ];

    /*-------------------------------- RELACIONES ------------------------------*/

    /**
     * Summary of room
     * @return mixed
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    /**
     * Summary of amount
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function amount()
    {
        return $this->hasMany(ElectricCharge::class);
    }

    /*------------------------------------------------------------------------*/
}
