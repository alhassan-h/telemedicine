<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;


class Chat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sender_id',
        'reciepient_id',
        'message',
    ];

    
    /**
     * Get the doctor as a user.
     *
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * .
     *
     */
    public function getUser()
    {
        return User::withTrashed()
            ->where('id', $this->sender_id)
            ->get()
            ->first();
    }

    /**
     * .
     *
     */
    public function get_thread_id()
    {
        return ($this->sender_id) + ($this->reciepient_id);
    }

    /**
     * .
     *
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * .
     *
     */
    public function isAuthor(User $user)
    {
        return $this->sender_id == $user->id;
    }

    /**
     * .
     *
     */
    public function getSender()
    {
        $user = User::find($this->sender_id);
        return $user->isDoctor()?$user->getDoctor():$user->getPatient();
    }

    /**
     * .
     *
     */
    public function getSenderAlias(User $user)
    {
        $user = $this->isAuthor($user)?User::find($this->reciepient_id):User::find($this->sender_id);
        return $user->isDoctor()?$user->getDoctor()->getFullname():$user->getPatient()->getFullname();
    }

    /**
     * .
     *
     */
    public function getSenderAliasID(User $user)
    {
        $sender_id = $this->sender_id;
        $s_id = $this->isAuthor($user)?$this->reciepient_id:$this->sender_id;
        return $s_id;
    }

    /**
     * .
     *
     */
    public function getReciepient()
    {
        $user = User::find($this->reciepient_id);
        return $user->isDoctor()?$user->getDoctor():$user->getPatient();
    }

    /**
     * .
     *
     */
    public function getDate()
    {
        $date = date('g:i A', strtotime($this->created_at));
        return $date;
        // return $this->created_at->humanDiff();
    }
    
    /**
     * .
     *
     */
    public static function getMessagesBetween(User $sender, User $recipient)
    {
        $messages = Chat::where([
            ['sender_id', $sender->id],
            ['reciepient_id', $recipient->id],
            ])
            ->OrWhere([
                ['sender_id', $recipient->id],
                ['reciepient_id', $sender->id],
            ]
            )
        ->get();
        return $messages;
    }
    
    /**
     * .
     *
     */
    public static function getMessagesFrom(User $user)
    {
        $messages = Chat::where('sender_id', $user->id)
        ->get()
        ->sortByDesc('created_at');
        return $messages;
    }
    
    /**
     * .
     *
     */
    public static function getMessagesTO(User $user)
    {
        $messages = Chat::where('reciepient_id', $user->id)
        ->get()
        ->sortByDesc('created_at');
        return $messages;
    }

}
