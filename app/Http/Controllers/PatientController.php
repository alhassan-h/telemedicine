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

class PatientController extends Controller
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

            if( $request->user()->isPatient() ){
                return $next($request);
            }

            return redirect(route('dashboard'));
    
        });
    }

    
    /**
     * Show the patient profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(Request $request)
    {
        $patient = $request->user()->getPatient();
        
        $data = [
            'page_name' => 'profile',
            'patient' => $patient,
        ];

        return view('patient.profile', compact('data'));
    }

        /**
     * Update profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $patient = $user->getPatient();
        
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
            $fileName = $patient->getEmail() . '_' . time() . '.' . $validatedData['profile']->extension();
            $validatedData['profile']->storeAs('public/images/users', $fileName);
            $validatedData['profile'] = $fileName;
        }


        $user->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully!');

    }

    /**
     * Show the patient dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $patient = $request->user()->getPatient();
        
        $data = [
            'page_name' => 'dashboard',
            'appointments' => $patient->getApprovedAppointments(),
            'appt_count' => count($patient->getApprovedAppointments()),
            'req_count' => count($patient->getRequestedAppointments()),
        ];

        return view('patient.dashboard', compact('data'));
    }

    /**
     * Show doctors.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function doctors()
    {
        $data = [
            'page_name' => 'doctors',
            'doctors' => Doctor::get(),
        ];
        
        return view('patient.doctors', compact('data'));
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
            'doctors' => Doctor::get(),
            'appointments' => $request->user()->getPatient()->appointment,
        ];
        // dd($data['appointments']);
        
        return view('patient.appointments', compact('data'));
    }

    /**
     * Show appointments.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function requestAppointment(Request $request)
    {
        $patient = $request->user()->getPatient();
        $validatedData = $request->validate([
            'doctor_id' => ['required','numeric'],
            'date' => ['sometimes'],
            'time' => ['sometimes'],
            'summary' => ['sometimes'],
        ]);

        $validatedData['patient_id'] = $patient->id;

        $appointment = Appointment::create($validatedData);

        return redirect()->back()->with('success', 'Request sent successfully!');
    }
    
    /**
     * .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearAppointment(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'appointment_id' => ['required', 'numeric'],
        ]);

        $appointment = Appointment::find($validatedData['appointment_id']);
        $delete = $appointment->delete();
        
        return redirect()->back()->with('success', 'Request cleared successfully!');

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
        
        return view('patient.chats', compact('data'));
    }

    /**
     * Show chat.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chat(Request $request, $id)
    {
        $doctor = User::find($id);
        if(!$doctor) abort('404');

        $reciepient = $request->user();

        $chats = $reciepient->getConversationWith($doctor);

        $data = [
            'page_name' => 'chat',
            'reciepient_id' => $id,
            'doctor' => $doctor,
            'chats' => $chats,
            
        ];
        
        return view('patient.chat', compact('data'));
    }

    /**
     * Show videochats.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function videochats(Request $request)
    {
        $patient = $request->user()->getPatient();

        $data = [
            'page_name' => 'videochats',
            'appointment' => $patient->getFirstApprovedAppointment(),
        ];
        
        return view('patient.videochats', compact('data'));
    }
}
