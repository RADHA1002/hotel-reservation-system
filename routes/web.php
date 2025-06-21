<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroqController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AgentAIController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OllamaAIController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\GuestReservationController;
use App\Http\Controllers\StripeController;
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

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/api/rooms', [PublicController::class, 'getRooms']);

Route::get('/rooms', [PublicController::class, 'rooms'])->name('rooms');
Route::get('/rooms/{id}', [PublicController::class, 'roomDetail'])->name('rooms.show');
Route::get('/restaurant', [PublicController::class, 'restaurant'])->name('restaurant');
Route::post('/rooms/book', [PublicController::class, 'bookRoom'])->name('rooms.book');
Route::get('/ask-ai', [PublicController::class, 'askAI'])->name('ask-ai');
Route::post('/groq-chat', [GroqController::class, 'chat']);

Route::post('/admin/reservations/{id}/toggle-payment', [ReservationController::class, 'togglePayment'])->name('admin.reservations.togglePayment');
Route::post('/admin/reservations/{id}/toggle-checkin', [ReservationController::class, 'toggleCheckInStatus'])->name('admin.reservations.toggleCheckInStatus');

Route::get('/search', [PublicController::class, 'search'])->name('search');

Route::get('/payment/{room_id}', [PublicController::class, 'payment'])->name('payment');

Route::post('/stripe/create-payment-intent', [StripeController::class, 'createPaymentIntent']);
Route::get('/stripe/success', [StripeController::class, 'paymentSuccess']);

// =================

// =================
// Admin routes

Route::resource('hotels', HotelController::class);
// Route::resource('rooms', RoomController::class);


Route::middleware(['auth'])->group(function () {
    Route::get('/bookings/create/{room}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
});

Route::post('/ai/ask', [AgentAIController::class, 'ask'])->name('ai.ask');
Route::view('/ai', 'ai');

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});
Route::post('/ask-ollama', [OllamaAIController::class, 'ask'])->name('ollama.ask');

Route::get('/reserve', [ReservationController::class, 'create'])->name('reserve.create');
Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve.store');
Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::resource('reservations', ReservationController::class)->except(['create', 'store', 'show']);

Route::get('/reserve', [GuestReservationController::class, 'create'])->name('reservations.create');
Route::post('/reserve', [GuestReservationController::class, 'store'])->name('reservations.store');

Route::get('/admin/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
Route::put('/admin/reservations/{id}', [ReservationController::class, 'update'])->name('admin.reservations.update');
Route::delete('/admin/reservations/{id}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/admin/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::put('/admin/reservations/{id}', [ReservationController::class, 'update'])->name('admin.reservations.update');
    Route::delete('/admin/reservations/{id}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/admin/reservations/create', [ReservationController::class, 'create'])->name('admin.reservations.create');
    Route::post('/admin/reservations', [ReservationController::class, 'store'])->name('admin.reservations.store');
    Route::get('/admin/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::put('/admin/reservations/{id}', [ReservationController::class, 'update'])->name('admin.reservations.update');
    Route::delete('/admin/reservations/{id}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');
    Route::post('/admin/reservations/{id}/send-confirmation', [ReservationController::class, 'sendConfirmation'])->name('admin.reservations.sendConfirmation');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');
    
require __DIR__.'/auth.php';

Route::get('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\Auth\AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::post('/reservations/{reservation}/check-in', [ReservationController::class, 'checkIn'])->name('admin.reservations.checkIn');
Route::post('/reservations/{reservation}/check-out', [ReservationController::class, 'checkOut'])->name('admin.reservations.checkOut');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    
    return 'Application cache, config, route, and view cleared!';
});

Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email from Hotel Reservation System', function($message) {
            $message->to('ab.pk012@gmail.com')
                  ->subject('Test Email from Hotel Reservation System');
        });
        
        return 'Test email sent successfully!';
    } catch (\Exception $e) {
        return 'Error sending email: ' . $e->getMessage();
    }
});

