<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('service')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('customer.appointments', compact('appointments'));
    }

    public function create()
    {
        $services = Service::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('customer.appointments-create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'customer_phone' => 'required|string|max:30',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string|max:1000',
        ]);

        $customer = Auth::user();

        Appointment::create([
            'user_id' => $customer->id,
            'service_id' => $validated['service_id'],
            'customer_name' => $customer->name,
            'customer_email' => $customer->email,
            'customer_phone' => $validated['customer_phone'],
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('customer.appointments')
            ->with('success', 'Your appointment has been booked successfully!');
    }
}
