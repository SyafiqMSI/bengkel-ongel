<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('admin.appointment.index', compact('appointments'));
    }

    public function view($id)
    {
        $appointment = Appointment::findOrFail($id);
        $username = User::findOrFail($appointment->user_id)->name;
        return view('admin.appointment.view', compact('appointment', 'username'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.appointment.create', compact('users'));
    }

    public function store(Request $request)
    {

        Appointment::create([
            'id_appointment' => $request->id_appointment,
            'ordered_id' => $request->ordered_id,
            'user_id' => $request->user_id,
            'day' => $request->day,
            'status' => $request->status
        ]);

        return redirect()->route('admin.appointment.index')
            ->with('success', 'Appointment created successfully.');
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('admin.appointment.edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        //belum selesai

        // Update the appointment with new data
        $appointment->update($request->all());

        return redirect()->route('admin.appointment.index')
            ->with('success', 'Appointment updated successfully.');
    }

    public function destroy($id)
    {
        $appointments = Appointment::findOrFail($id);

        $appointments->delete();

        return redirect()->route('admin.appointment.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}
