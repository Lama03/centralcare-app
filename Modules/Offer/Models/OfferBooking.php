<?php

namespace Modules\Offer\Models;


use App\Constants\BookingStatuses;
use Eloquent;
use Mail;
use Modules\Offer\Models\Offer;
use Modules\Branche\Models\Branche;

class OfferBooking extends Eloquent
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'offer_id',
        #'date_of_birth',
        'order_reference',
        #'available_time',
        #'attendance_date',
        'type_pay',
        'source',
        'notes',
        'status'
    ];


    /**
     * Get the post that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

     /**
     * Get the post that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branche()
    {
        return $this->belongsTo(Branche::class,'sub_branche_id','id');
    }


    protected $appends = [
        'statusLabel'
    ];

    public function getStatusLabelAttribute()
    {
        return BookingStatuses::getLabel($this->status);
    }
}
