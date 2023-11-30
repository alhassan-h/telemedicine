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
use App\Models\Appointment;

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
    public function index(Request $request)
    {
        $doctor = $request->user()->getDoctor();
        
        $data = [
            'page_name' => 'dashboard',
            'appointments' => $doctor->getApprovedAppointments(),
            'appt_count' => count($doctor->getApprovedAppointments()),
            'req_count' => count($doctor->getRequestedAppointments()),
        ];

        return view('doctor.dashboard', compact('data'));
    }

    /**
     * Show the doctor profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(Request $request)
    {
        $doctor = $request->user()->getDoctor();
        
        $data = [
            'page_name' => 'profile',
            'doctor' => $doctor,
        ];

        return view('doctor.profile', compact('data'));
    }

    /**
     * Update profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $doctor = $user->getDoctor();
        
        $validatedData =  $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female'],
            'phone' => ['required', 'string', 'size:11', Rule::unique('users')->ignore($user)],
            'profile' => ['sometimes', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ]);
        
        // if new password is provided, hash it.
        if( isset($validatedData['password']) ){
            $validatedData['password'] = Hash::make($request->validate(
                ['password' => ['sometimes','string', 'min:8']])['password']
            );
        }
        // dd($validatedData);

        // if changing profile picture, save it.
        if(isset($request->profile)){
            $fileName = $doctor->getEmail() . '_' . time() . '.' . $validatedData['profile']->extension();
            $validatedData['profile']->storeAs('storage/images/users', $fileName);
            $validatedData['profile'] = $fileName;
        }


        $user->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully!');

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
            'appointments' => $request->user()->getAppointments(),
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
        $user = $request->user();

        $validatedData = $request->validate([
            'appointment_id' => ['required', 'numeric'],
            'date' => ['sometimes'],
            'time' => ['sometimes'],
        ]);
        $validatedData['action'] = 'approved';
        $request = Appointment::find($validatedData['appointment_id']);
        $update = $request->update($validatedData);
        
        return redirect()->back()->with('success', 'Request approved successfully!');

    }

    /**
     * .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function rejectAppointment(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'appointment_id' => ['required', 'numeric'],
        ]);

        $request = Appointment::find($validatedData['appointment_id']);
        $update = $request->update(['action' => 'rejected']);
        
        return redirect()->back()->with('success', 'Request rejected successfully!');

    }

    /**
     * .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cancelAppointment(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'appointment_id' => ['required', 'numeric'],
        ]);

        $request = Appointment::find($validatedData['appointment_id']);
        $update = $request->update(['action' => 'canceled']);
        
        return redirect()->back()->with('success', 'Request cancelled successfully!');

    }

    /**
     * Show chats.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chats(Request $request)
    {
        $user = $request->user();

        $conversations = $user->getConversations()->sortByDesc('created_at');

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
        $patient = User::find($id);
        if(!$patient) abort('404');

        $reciepient = $request->user();

        $chats = $reciepient->getConversationWith($patient);

        $data = [
            'page_name' => 'chat',
            'reciepient_id' => $id,
            'patient' => $patient,
            'chats' => $chats,
            
        ];
        
        return view('doctor.chat', compact('data'));
    }

    /**
     * Show videochats.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function videochats(Request $request)
    {

        $doctor = $request->user()->getDoctor();

        $data = [
            'page_name' => 'videochats',
            'appointments' => $doctor->getApprovedAppointments(),
        ];
        
        return view('doctor.videochats', compact('data'));
    }

    /**
     * Show videochats.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function startVideoCall(Request $request)
    {

        $doctor = $request->user()->getDoctor();

        $validatedData = $request->validate([
            'appointment_id' => ['required', 'numeric'],
        ]);
        
        $appointment = Appointment::find($validatedData['appointment_id']);
        $validatedData['patient_id'] = $appointment->id;
        $appointment->update(['status' => 'done']);
        
        // $videoChat = VideoChat::create($validatedData);

        return redirect()->back()->with('success', 'Video call session created successfully!');

    }
  
    /**
     * Show videochats.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function endVideoCall(Request $request)
    {

        $doctor = $request->user()->getDoctor();

        $validatedData = $request->validate([
            'appointment_id' => ['required', 'numeric'],
        ]);
        
        $appointment = Appointment::find($validatedData['appointment_id']);
        $appointment->delete();
        
        // $validatedData['patient_id'] = $appointment->id;
        // $videoChat = VideoChat::create($validatedData);

        return redirect()->back()->with('success', 'Video call session ended successfully!');

    }
}
