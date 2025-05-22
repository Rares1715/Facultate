<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{

    use HasFactory;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'client_name', // Name of the client
        'service',     // Service type (haircut, beard trim, etc.)
        'time',        // Scheduled date and time
        'status',      // Current status (confirmed, pending, cancelled)
        'price',       // Price of the service
    ];

    /**

     */
    const STATUS_CONFIRMED = 'confirmed';   // Reservation is confirmed
    const STATUS_PENDING = 'pending';       // Reservation is pending confirmation
    const STATUS_CANCELLED = 'cancelled';   // Reservation has been cancelled

    /**

     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', self::STATUS_CONFIRMED);
    }

    /**

     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**

     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCancelled($query)
    {
        return $query->where('status', self::STATUS_CANCELLED);
    }
}
