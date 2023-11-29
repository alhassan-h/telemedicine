<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'chat_status',
        'video_conference_status',
    ];

    /**
     * Get the patient as a user.
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
    public function getFirstName()
    {
        return $this->user->first_name;
    }
    
    /**
     * .
     *
     */
    public function getLastName()
    {
        return $this->user->last_name;
    }

    /**
     * .
     *
     */
    public function getFullname()
    {
        return ucwords($this->user->first_name." ".$this->user->last_name);
    }

    /**
     * .
     *
     */
    public function getGender()
    {
        return $this->user->gender;
    }

    /**
     * .
     *
     */
    public function getPhone()
    {
        return $this->user->phone;
    }

    /**
     * .
     *
     */
    public function getEmail()
    {
        return $this->user->email;
    }

    /**
     * .
     *
     */
    public function getProfilePicture(): string
    {
        return $this->user->profile;
    }

    // Appointments
    
    /**
     * .
     *
     */
    public function getAppointments()
    {
        return Appointment::where([
            ['patient_id', $this->id],
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
            ['patient_id', $this->id],
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
            ['patient_id', $this->id],
            ['action', 'approved'],
            ])
        ->get();
    }

}
