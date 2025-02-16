<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone_number',
        'booking_trx_id',
        'is_paid',
        'started_at',
        'total_amount',
        'duration',
        'ended_at',
        'office_space_id',
    ];

    // Generate Unique of Booking Transaction
    public static function generateUniqueTransId() {
        $prefix = 'TRANS';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('booking_trans_id', $randomString)->exists());

        return $randomString;
    }

    /**
     * Get the officeSpace that owns the BookingTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function officeSpace(): BelongsTo
    {
        return $this->belongsTo(OfficeSpace::class, 'office_space_id'); // [optional] cara kedua jika ingin mendetailkan field yg mana yg akan menjadi relasi 
    }
}
