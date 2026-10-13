<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Appointment;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $serviceCount = Service::count();

        $activeServices = Service::where('is_active', true)->count();

        $todayAppointments = Appointment::whereDate(
            'appointment_date',
            today()
        )->count();

        $customerCount = User::where('is_admin', false)->count();

        $recentAppointments = Appointment::with('service')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'serviceCount',
            'activeServices',
            'todayAppointments',
            'customerCount',
            'recentAppointments'
        ));
    }
}
