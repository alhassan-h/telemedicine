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

class AdminController extends Controller
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

            if( $request->user()->isAdmin() ){
                return $next($request);
            }

            return redirect(route('dashboard'));
    
        });
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'page_name' => 'dashboard',
            'analytics' => [
                'doctors_count' => count(Doctor::get()),
                'patients_count' => count(Patient::get()),
            ],
        ];

        return view('admin.dashboard', compact('data'));
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
        
        return view('admin.doctors', compact('data'));
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
        
        return view('admin.patients', compact('data'));
    }

    /**
     * Save doctor.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveDoctor(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'size:11', 'unique:users'],
            'specialization' => ['required', 'string', 'max:100',],
            // 'profile' => ['sometimes', 'image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $validatedData['usertype'] = 'doctor';
        $user = User::create($validatedData);
        $validatedData['user_id'] = $user->id;
        $doctor = Doctor::create($validatedData);

        return back()->with('success', 'Doctor added successfully!');
        
    }

    /**
     * Update doctor.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateDoctor(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $doctor = Doctor::find($doctor_id);
        $user = $doctor->user;

        $validatedData = $request->validate([
            'doctor_id' => ['required', 'numeric'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($doctor->user)],
            'phone' => ['required', 'string', 'size:11', Rule::unique('users')->ignore($doctor->user)],
            'specialization' => ['required', 'string', 'max:100',],
            // 'profile' => ['sometimes', 'image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $doctor->update($validatedData);
        $user->update($validatedData);

        return back()->with('success', 'Doctor updated successfully!');
        
    }

    /**
     * Delete doctor.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteDoctor(Request $request)
    {
        
        $validatedData = $request->validate([
            'doctor_id' => ['required', 'numeric'],
        ]);
        
        $doctor_id = $validatedData['doctor_id'];
        $doctor = Doctor::find($doctor_id);
        $user = $doctor->user;

        $doctor->delete();
        $user->delete();

        return back()->with('success', 'Doctor deleted successfully!');
        
    }

    /**
     * Delete patient.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deletePatient(Request $request)
    {
        
        $validatedData = $request->validate([
            'patient_id' => ['required', 'numeric'],
        ]);
        
        $patient_id = $validatedData['patient_id'];
        $patient = Patient::find($patient_id);
        $user = $patient->user;

        $patient->delete();
        $user->delete();

        return back()->with('success', 'Patient deleted successfully!');
        
    }


}
