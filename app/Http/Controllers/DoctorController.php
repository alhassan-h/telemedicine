<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Chat;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function (Request $request, Closure $next) {

            if( $request->user()->isDoctor() ){
                return $next($request);
            }

            return redirect(route('dashboard'));
    
        });
    }

    /**
     * Show the doctor dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'page_name' => 'dashboard',
            'analytics' => [],
        ];

        return view('doctor.dashboard', compact('data'));
    }

    /**
     * Show patients.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function patients()
    {
        $data = [
            'page_name' => 'patients',
            'patients' => Patient::get(),
        ];
        
        return view('doctor.patients', compact('data'));
    }

    /**
     * Show appointments.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function appointments(Request $request)
    {
        $data = [
            'page_name' => 'appointments',
            'patients' => Patient::get(),
            'appointments' => $request->user()->doctor->appointment,
        ];
        
        return view('doctor.appointments', compact('data'));
    }

    /**
     * .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function approveAppointment(Request $request)
    {

        
        return redirect()->back()->with('success', '');
    }

    /**
     * .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function rejectAppointment(Request $request)
    {

        
        return redirect()->back()->with('success', '');
    }

    /**
     * .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cancelAppointment(Request $request)
    {

        
        return redirect()->back()->with('success', '');
    }

    /**
     * Show chats.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chats(Request $request)
    {
        $user = $request->user();

        $conversations = Chat::getRecievedMessages();
        // $a = [];
        // foreach($conversations as $c){
        //     array_search
        //     if( in_array([$c->sender_id, $c->reciepient_id], $a) || in_array([$c->reciepient_id, $c->sender_id], $a)){
        //         if($c->created_at > )
        //     }
        // }

        $data = [
            'page_name' => 'chats',
            'chats' => $conversations,
            
        ];
        
        return view('doctor.chats', compact('data'));
    }

    /**
     * Show chat.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chat(Request $request, $id)
    {
        $sender = User::find($id);
        $reciepient = $request->user();

        if(!$sender) abort('404');

        $chats = Chat::getMessagesFrom($sender, $reciepient);

        $data = [
            'page_name' => 'chat',
            'reciepient_id' => $id,
            'chats' => $chats,
            
        ];
        
        return view('doctor.chat', compact('data'));
    }

    /**
     * Show videochats.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function videochats()
    {
        $data = [
            'page_name' => 'videochats',
            'analytics' => [],
        ];
        
        return view('doctor.videochats', compact('data'));
    }
}
