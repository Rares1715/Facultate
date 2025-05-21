<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    /**
     * Use the HasFactory trait to enable factory creation of reservations
     * for database seeding and testing purposes.
     */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * These fields can be filled using mass assignment methods like create() or fill().
     *
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
     * Status constants for reservation statuses.
     * Using constants helps maintain consistency and prevents typos.
     */
    const STATUS_CONFIRMED = 'confirmed';   // Reservation is confirmed
    const STATUS_PENDING = 'pending';       // Reservation is pending confirmation
    const STATUS_CANCELLED = 'cancelled';   // Reservation has been cancelled

    /**
     * Scope for confirmed reservations.
     *
     * This scope allows you to easily query only confirmed reservations.
     * Usage: Reservation::confirmed()->get();
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', self::STATUS_CONFIRMED);
    }

    /**
     * Scope for pending reservations.
     *
     * This scope allows you to easily query only pending reservations.
     * Usage: Reservation::pending()->get();
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope for cancelled reservations.
     *
     * This scope allows you to easily query only cancelled reservations.
     * Usage: Reservation::cancelled()->get();
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCancelled($query)
    {
        return $query->where('status', self::STATUS_CANCELLED);
    }
}
