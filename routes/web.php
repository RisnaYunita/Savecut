<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentications\LoginController;
use App\Http\Controllers\authentications\RegisterController;
use App\Http\Controllers\authentications\ForgotPasswordController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\home\BookingController;
use App\Http\Controllers\home\TreatmentController;
use App\Http\Controllers\home\SalonProfileController;
use App\Http\Controllers\home\PaymentController;
use App\Http\Controllers\home\MidtransCallbackController;
use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\admin\SalonManagementController;
use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\admin\ReviewManagementController;
use App\Http\Controllers\admin\BookingManagementController;
use App\Http\Controllers\owner\HomeOwnerController;
use App\Http\Controllers\owner\OwnerSalonProfileController;
use App\Http\Controllers\owner\BookingListController;
use App\Http\Controllers\owner\TreatmentListController;
use App\Http\Controllers\owner\ReviewListController;
use App\Http\Controllers\review\ReviewController;
use App\Http\Controllers\landing\LandingPage;

// Landing Page Route
Route::get('/', [LandingPage::class, 'index'])->name('landing-page');

//forgot password
Route::get('/auth/forgot-password', [ForgotPasswordController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/auth/forgot-password/actionforgot', [ForgotPasswordController::class, 'actionforgot'])->name(
  'actionforgot'
);
Route::get('/auth/reset-password/{token}', [ForgotPasswordController::class, 'resetpassword'])->name('resetpassword');
Route::post('/auth/reset-password/actionreset', [ForgotPasswordController::class, 'actionreset'])->name('actionreset');
//register
Route::get('/auth/register', [RegisterController::class, 'register'])->name('register');
Route::post('/auth/actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('/auth/register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

//login
Route::get('/auth/login', [LoginController::class, 'login'])->name('login');
Route::post('/auth/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

//logout
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
  Route::get('home', [HomeController::class, 'index'])->name('home');
  Route::get('treatment', [TreatmentController::class, 'index'])->name('treatment');
  Route::get('booking', [BookingController::class, 'index'])->name('booking');
  Route::get('booking-history', [BookingController::class, 'history'])->name('booking-history');
  Route::post('bookings/book', [BookingController::class, 'store'])->name('booking-store');
  Route::get('bookings/payment/{booking_id}', [PaymentController::class, 'index'])->name('payment');
  Route::get('booking/invoice/{booking_id}', [BookingController::class, 'invoice'])->name('invoice');
  Route::get('salon-profile', [SalonProfileController::class, 'index'])->name('salon-profile');
  Route::get('salon-profile/{id}', [SalonProfileController::class, 'details'])->name('salon-details');
  Route::post('salon-profile/{salon_id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
  Route::delete('salon-profile/reviews/delete{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('home-admin');
  Route::get('/admin/booking-list', [BookingManagementController::class, 'index'])->name('booking-admin');
  Route::post('/admin/booking-list/add', [BookingManagementController::class, 'store'])->name('add-booking');
  Route::patch('/admin/booking-list/{booking_id}/mark-as-done', [
    BookingManagementController::class,
    'markAsDone',
  ])->name('mark-as-done');
  Route::delete('/admin/booking-list/delete/{booking_id}', [BookingManagementController::class, 'destroy'])->name(
    'delete-booking'
  );
  Route::get('/admin/salon-list', [SalonManagementController::class, 'index'])->name('salon-list');
  Route::post('/admin/salon-list/add', [SalonManagementController::class, 'store'])->name('add-salon');
  Route::delete('/admin/salon-list/delete/{salon_id}', [SalonManagementController::class, 'destroy'])->name(
    'delete-salon'
  );
  Route::post('/admin/salon-list/edit-salon/{salon_id}', [SalonManagementController::class, 'editSalon'])->name(
    'edit-salon'
  );
  Route::get('/admin/user-list', [UserManagementController::class, 'index'])->name('user-list');
  Route::delete('/admin/users/{id}', [UserManagementController::class, 'destroy'])->name('delete-user');
  Route::post('/admin/users/update-role/{id}', [UserManagementController::class, 'updateRole'])->name('update-role');
  Route::get('/admin/review-list', [ReviewManagementController::class, 'index'])->name('review-list');
  Route::delete('/admin/review_list/{reviews_id}', [ReviewManagementController::class, 'destroy'])->name(
    'review-delete-admin'
  );
});

//Owner Routes List
Route::middleware(['auth', 'user-access:owner'])->group(function () {
  Route::get('/owner/home', [HomeController::class, 'ownerHome'])->name('home-owner');
  Route::get('/owner/salon-profile', [OwnerSalonProfileController::class, 'index'])->name('salon-profile');
  Route::post('/owner/salon-profile/edit-profile/{salon_id}', [
    OwnerSalonProfileController::class,
    'editProfile',
  ])->name('edit-profile');
  Route::get('/owner/booking-list', [BookingListController::class, 'index'])->name('booking-owner');
  Route::patch('/owner/booking-list/{booking_id}/mark-as-done', [BookingListController::class, 'markAsDone'])->name(
    'mark.as.done'
  );
  Route::delete('/owner/booking-list/delete/{booking_id}', [BookingListController::class, 'destroy'])->name(
    'deleteBooking'
  );
  Route::get('/owner/treatment-list', [TreatmentListController::class, 'index'])->name('treatment-owner');
  Route::post('/owner/treatment-list/add', [TreatmentListController::class, 'store'])->name('add-treatment');
  Route::post('/owner/treatment-list/edit/{treatment_id}', [TreatmentListController::class, 'editTreatment'])->name(
    'edit-treatment'
  );
  Route::delete('/owner/treatment-list/{treatment_id}', [TreatmentListController::class, 'destroy'])->name(
    'delete-treatment'
  );
  Route::get('/owner/review-list', [ReviewListController::class, 'index'])->name('review-owner');
});
