<?php
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Controllers\Admin\DashboardController;

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Appointments\CreateAppointmentForm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/dashboard', DashboardController::class)->name('admin.dashboard');

Route::get('admin/users', ListUsers::class)->name('admin.users');
Route::get('admin/appointments', ListAppointments::class)->name('admin.appointments');

Route::get('admin/appointment/create', CreateAppointmentForm::class)->name('admin.appointment.create');