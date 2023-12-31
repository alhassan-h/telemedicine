<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Appointment extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'summary',
        'date',
        'time',
        'status',
        'action',
    ];

    /**
     * .
     *
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    /**
     * .
     *
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    /**
     * .
     *
     */
    public function getDoctor()
    {
        return Doctor::withTrashed()
            ->where('id', $this->doctor_id)
            ->get()
            ->first();
    }

    /**
     * .
     *
     */
    public function getPatient()
    {
        return Patient::withTrashed()
            ->where('id', $this->patient_id)
            ->get()
            ->first();
    }

    /**
     * .
     *
     */
    public function getScheduledDate()
    {
        return date('M d, Y H:m A', strtotime("$this->date $this->time"));
    }


}
