<?php

namespace App\Http\Controllers\User;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AppointmentControllerUser extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('client.appointment.index', compact('appointments'));
    }

    public function view($id)
    {
        $appointment = Appointment::findOrFail($id);
        $username = User::findOrFail($appointment->user_id)->name;
        return view('client.appointment.view', compact('appointment', 'username'));
    }

    public function create()
    {
        $users = User::all();
        return view('client.appointment.create', compact('users'));
    }

    public function store(Request $request)
    {

        //belum selesai

        Appointment::create([
            'appointment_id' => $request->appointment_id,
            'user_id' => $request->user_id,
            'date' => $request->date,
            'status' => $request->status
        ]);

        return redirect()->route('client.appointment.index')
            ->with('success', 'Appointment created successfully.');
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('client.appointment.edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        //belum selesai

        // Update the appointment with new data
        $appointment->update($request->all());

        return redirect()->route('client.appointment.index')
            ->with('success', 'Appointment updated successfully.');
    }

    public function destroy($id)
    {
        $appointments = Appointment::findOrFail($id);

        $appointments->delete();

        return redirect()->route('client.appointment.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}
