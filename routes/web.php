
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\WorkingHour;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerAppointmentController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/register', [CustomerAuthController::class, 'showRegister'])->name('customer.register');
Route::post('/register', [CustomerAuthController::class, 'register']);
Route::get('/login', [CustomerAuthController::class, 'showLogin'])->name('customer.login');
Route::post('/login', [CustomerAuthController::class, 'login']);
Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->middleware(['auth', 'admin'])->name('admin.logout');

Route::middleware('auth')->group(function () {
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    Route::get('/customer/appointments', [CustomerAppointmentController::class, 'index'])->name('customer.appointments');
    Route::get('/customer/appointments/create', [CustomerAppointmentController::class, 'create'])->name('customer.appointments.create');
    Route::post('/customer/appointments', [CustomerAppointmentController::class, 'store'])->name('customer.appointments.store');

    Route::get('/customer/profile', function () {
        $customer = Auth::user();
        return view('customer.profile', compact('customer'));
    })->name('customer.profile');
});

Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

    Route::get('/customers', function () {
        $customers = User::where('is_admin', false)->latest()->get();
        return view('admin.customers', compact('customers'));
    })->name('customers');

    Route::get('/time-slots', function () {
        $workingHours = WorkingHour::all();
        return view('admin.time-slots', compact('workingHours'));
    })->name('time-slots');

    Route::get('/settings', function () {
        $admin = Auth::user();
        return view('admin.settings', compact('admin'));
    })->name('settings');
});
