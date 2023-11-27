<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Patient;
use App\Models\Chat;

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
     * Save chat.
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
