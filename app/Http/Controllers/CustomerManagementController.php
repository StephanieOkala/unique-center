<?php

namespace App\Http\Controllers;

use App\Models\User;

class CustomerManagementController extends Controller
{
    public function index()
    {
        $customers = User::where('is_admin', false)
            ->latest()
            ->get();

        return view('admin.customers', compact('customers'));
    }
}