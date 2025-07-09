<?php

namespace Modules\Booking\Models;


use App\Constants\BookingStatuses;
use Eloquent;
use Mail;
use Modules\Branche\Models\Branche;
use Modules\Doctor\Models\Doctor;
use Modules\Offer\Models\Offer;
use Modules\Specificity\Models\Specificity;

class Booking extends Eloquent
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
        'notes',
        #'date_of_birth',
        'speciality_id',
        'doctor_id',
        #'attendance_date',
        'source',
        'sourceid',
        'urlsourceid',
        'sent'
    ];

    /**
     * The attributes that are appended.
     *
     * @var array
     */
    protected $appends = [
        'sentLabel'
    ];

    /**
     * Get the post that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Get the post that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function speciality()
    {
        return $this->belongsTo(Specificity::class);
    }

    public function setSent($sent)
    {
        $this->sent = $sent;
    }
    public function getSentLabelAttribute()
    {
        return BookingStatuses::getLabel($this->sent);
    }
}
