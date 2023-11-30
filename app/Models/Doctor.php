<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'specialization',
        'work_status',
        'chat_status',
        'video_conference_status',
    ];

    /**
     * Get the doctor as a user.
     *
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * .
     *
     */
    public function appointment(): HasMany
    {
        return $this->HasMany(Appointment::class);
    }

    /**
     * .
     *
     */
    public function getUser()
    {
        return User::withTrashed()
            ->where('id', $this->user_id)
            ->get()
            ->first();
    }

    /**
     * .
     *
     */
    public function getFirstName()
    {
        return $this->getUser()->first_name;
    }
    
    /**
     * .
     *
     */
    public function getLastName()
    {
        return $this->getUser()->last_name;
    }
  
    /**
     * .
     *
     */
    public function getFullname()
    {
        return ucwords($this->getUser()->first_name." ".$this->getUser()->last_name);
    }

    /**
     * .
     *
     */
    public function getGender()
    {
        return $this->getUser()->gender;
    }

    
    /**
     * .
     *
     */
    public function getPhone()
    {
        return $this->getUser()->phone;
    }

    /**
     * .
     *
     */
    public function getEmail()
    {
        return $this->getUser()->email;
    }

    /**
     * .
     *
     */
    public function getSpecialization()
    {
        return $this->specialization;
    }

    /**
     * .
     *
     */
    public function getProfilePicture(): string
    {
        return $this->getUser()->profile;
    }

    // Appointments

    /**
     * .
     *
     */
    public function getAppointments()
    {
        return Appointment::where([
            ['doctor_id', $this->id],
            ])
        ->get();
    }

    /**
     * .
     *
     */
    public function getRequestedAppointments()
    {
        return Appointment::where([
            ['doctor_id', $this->id],
            ['action', 'noaction'],
            ])
        ->get();
    }

    /**
     * .
     *
     */
    public function getApprovedAppointments()
    {
        return Appointment::where([
            ['doctor_id', $this->id],
            ['action', 'approved'],
            ])
        ->get();
    }
}
