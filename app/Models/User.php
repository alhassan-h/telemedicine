<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'phone',
        'profile',
        'password',
        'usertype',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the user as a doctor.
     *
     */
    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class);
    }

    /**
     * Get the user as a patient.
     *
     */
    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class);
    }

    /**
     * Get the user as a patient.
     *
     */
    public function chat(): HasMany
    {
        return $this->hasMany(Patient::class, 'user_id', 'sender_id');
    }

        /**
     * .
     *
     */
    public function getDoctor()
    {
        return Doctor::withTrashed()
            ->where('user_id', $this->id)
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
            ->where('user_id', $this->id)
            ->get()
            ->first();    }

    /**
     * Get usertype.
     *
     */
    public function getType(): string
    {
        return $this->usertype?$this->usertype:'';
    }

    /**
     * Check if user is admin.
     *
     */
    public function isAdmin(): bool
    {
        return strtolower($this->getType()) == 'admin';
    }

    /**
     * Check if user is doctor.
     *
     */
    public function isDoctor(): bool
    {
        return strtolower($this->getType()) == 'doctor';
    }

    /**
     * Check if user is patient.
     *
     */
    public function isPatient(): bool
    {
        return strtolower($this->getType()) == 'patient';
    }

        /**
     * .
     *
     */
    public function getFullname()
    {
        return ucwords($this->first_name." ".$this->last_name);
    }

    /*
     ****************************************************
     * Chat Message    
     ****************************************************
     */
    public function getSentMessages()
    {
        return Chat::where('sender_id', $this->id)
        ->get()
        ->sortByDesc('created_at');
    }

    /**
     * .
     *
     */
    public function getRecievedMessages()
    {
        return Chat::where('reciepient_id', $this->id)
        ->get()
        ->sortByDesc('created_at');
    }
    
    /**
     * .
     *
     */
    public function getMessagesFrom(User $user)
    {
        return Chat::where([
            ['sender_id', $user->id],
            ['reciepient_id', $this->id],
            ])
        ->get();
    }
    
        /**
         * .
         *
         */
        public function getConversations()
        {
            return Chat::where([
                    ['sender_id', $this->id],
                ])
                ->OrWhere([
                    ['reciepient_id', $this->id],
                ])
            ->get();
        }
   
    /**
     * .
     *
     */
    public function getConversationWith(User $user)
    {
        return Chat::where([
            ['sender_id', $this->id],
            ['reciepient_id', $user->id],
            ])
            ->OrWhere([
                ['sender_id', $user->id],
                ['reciepient_id', $this->id],
            ])
        ->get();
    }
   
    /**
     * .
     *
     */
    public function getLatestConversationWith(User $user, $last_msg_offset)
    {
        return Chat::where([
            ['sender_id', $this->id],
            ['reciepient_id', $user->id],
            ['id', '>', $last_msg_offset],
            ])
            ->OrWhere([
                ['sender_id', $user->id],
                ['reciepient_id', $this->id],
                ['id', '>', $last_msg_offset],
            ])
        ->get();
    }

    /*
     ****************************************************
     * Appointmet    
     ****************************************************
     */

    /**
     * .
     *
     */
    public function getAppointments()
    {
        return ($this->isDoctor())?
            $this->getDoctor()->getAppointments():$this->getPatient()->getAppointments();
    }

}
