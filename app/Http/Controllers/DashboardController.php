<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Patient;
use App\Models\Chat;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if ( $user->isAdmin() ) {
            return redirect(route('admin.dashboard'));
        } elseif ( $user->isDoctor() ) {
            return redirect(route('doctor.dashboard'));
        } elseif ( $user->isPatient() ) {
            return redirect(route('patient.dashboard'));
        }

    }

        /**
     * Show the profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(Request $request)
    {
        $user = $request->user();

        if ( $user->isDoctor() ) {
            return redirect(route('doctor.profile'));
        } elseif ( $user->isPatient() ) {
            return redirect(route('patient.profile'));
        }

        abort('404');
    }

    /**
     * Show doctors.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function doctors(Request $request)
    {
        $user = $request->user();

        if ( $user->isAdmin() ) {
            return redirect(route('admin.doctors'));
        } elseif ( $user->isDoctor() ) {
            return redirect(route('doctor.doctors'));
        } elseif ( $user->isPatient() ) {
            return redirect(route('patient.doctors'));
        }

    }

    /**
     * Show doctors.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function patients(Request $request)
    {
        $user = $request->user();

        if ( $user->isAdmin() ) {
            return redirect(route('admin.patients'));
        } elseif ( $user->isDoctor() ) {
            return redirect(route('doctor.patients'));
        } elseif ( $user->isPatient() ) {
            return redirect(route('patient.patients'));
        }

    }

    /**
     * Show doctors.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function appointments(Request $request)
    {
        $user = $request->user();

        if ( $user->isDoctor() ) {
            return redirect(route('doctor.appointments'));
        } elseif ( $user->isPatient() ) {
            return redirect(route('patient.appointments'));
        }

        abort('404');

    }

    /**
     * Show doctors.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chats(Request $request)
    {
        $user = $request->user();

        if ( $user->isDoctor() ) {
            return redirect(route('doctor.chats'));
        } elseif ( $user->isPatient() ) {
            return redirect(route('patient.chats'));
        }

        abort('404');

    }

    /**
     * Save chat. (AJAX)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function savechat(Request $request)
    {
        $validatedData = $request->validate([
            'reciepient_id' => ['required', 'numeric'],
            'message' => ['required'],
        ]);

        $validatedData['sender_id'] = $request->user()->id;

        $chat = Chat::create($validatedData);

        return response()->json("success!");

    }

    /**
     * . (AJAX)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function conversation(Request $request)
    {
        $validatedData = $request->validate([
            'reciepient_id' => ['required', 'numeric'],
            'last_message_id' => ['required', 'numeric'],
        ]);

        
        $user = $request->user();
        
        $reciepient_id = $validatedData['reciepient_id'];
        $last_message_id = $validatedData['last_message_id'];
    
        $reciepient = User::find($reciepient_id);
        if(!$reciepient){return response()->json('');}
        
        $chats = $user->getLatestConversationWith($reciepient, $last_message_id);
        $conversation = '';
        $id = 0;
        foreach($chats as $chat){
            $id += $chat->id;
            $sender = $chat->isAuthor($user)?'me':'you';
            $conversation .= "<div class='bubble $sender'>"
                                .'<div class="sender">'
                                    .'<span>'.'</span>'
                                .'</div>'
                                .'<div class="msg">'
                                    .'<span>'.$chat->getMessage().'</span>'
                                .'</div>'
                                .'<div class="timestamp">'
                                    .'<span>'.$chat->getDate().'</span>'
                                .'</div>'
                            .'</div>';
        }

        $data = [
            'msg' => $conversation,
            'last_message_id' => $id,
        ];

        return response()->json($data);
        

        // return response()->json($conversation);

    }

    /**
     * Show doctors.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function videochats(Request $request)
    {
        $user = $request->user();

        if ( $user->isDoctor() ) {
            return redirect(route('doctor.videochats'));
        } elseif ( $user->isPatient() ) {
            return redirect(route('patient.videochats'));
        }

        abort('404');

    }


}
