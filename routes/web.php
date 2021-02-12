<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MollieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MemberAreaController;
use App\Http\Controllers\CreateAdminController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CreateSubscriptionController;
use App\Http\Controllers\TrainerController;

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

// Route::get('/', function () {
//     return view('aa');
// });

Route::middleware(['auth:sanctum', 'verified', 'checkRole'])->get('/dashboard', function () {
    return view('admin.dashboard', [
      'admins'     => User::where('role', 'admin')->get(),
      'students'   => User::where('role', 'student')->get(),
      'trainers'   => User::where('role', 'coach')->get(),
    ]);
})->name('dashboard');

//CreateAdminController
Route::middleware(['auth:sanctum', 'verified', 'checkRole'])->get('/user/{id}', [CreateAdminController::class, 'makeAdmin'])->name('create.admin');
Route::middleware(['auth:sanctum', 'verified', 'checkRole'])->get('/revoke/{id}', [CreateAdminController::class, 'revokeAdmin'])->name('revoke.admin');
//CreateAdminController ENDS

// FrontendController
Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/home', [FrontendController::class, 'indexlogin'])->name('front.indexlogin');
Route::get('/courses', [FrontendController::class, 'courses'])->name('front.courses');
Route::middleware(['auth:sanctum', 'verified'])->get('/owned/courses', [FrontendController::class, 'ownedCourses'])->name('front.ownedCourses');
Route::get('/search', [FrontendController::class, 'search'])->name('front.search');
Route::get('/courses/{slug}', [FrontendController::class, 'details'])->name('front.details');
Route::get('/subscribe', [FrontendController::class, 'subscribe'])->name('subscription.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/myaccount', [FrontendController::class, 'account'])->name('front.account');
Route::middleware(['auth:sanctum', 'verified'])->get('/courses/{slug}/{id}', [FrontendController::class, 'player'])->name('front.player');
Route::middleware(['auth:sanctum', 'verified'])->post('/subscriptions/store/{plan}', CreateSubscriptionController::class)->name('subscriptions.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/cancel/subscription', [CreateSubscriptionController::class, 'cancel'])->name('subscription.cancel');
Route::middleware(['auth:sanctum', 'verified'])->get('/member-area', [FrontendController::class, 'member'])->name('member.area');
// FrontendController ENDS

//CategoryController
Route::get('delete/{id}', [CategoryController::class, 'delete']);
Route::resource('category', CategoryController::class);
//CategoryController ENDS

//SubCategoryController
Route::get('subcategory/delete/{id}/', [SubCategoryController::class, 'delete']);
Route::resource('subcategory', SubCategoryController::class);
//SubCategoryController ENDS

// CourseController
Route::get('/course/{id}/delete', [CourseController::class, 'delete'])->name('course.delete');
Route::post('/get/sub/category', [CourseController::class, 'getSubCategory']);
Route::resource('course', CourseController::class);
// CourseController ENDS

// LessonController
Route::get('/lesson/{id}/list', [LessonController::class, 'list'])->name('lesson.list');
Route::post('/edit/lesson', [LessonController::class, 'lessonedit'])->name('edit.lesson');
Route::resource('lesson', LessonController::class);
// LessonController ENDS

// MollieController
Route::any('/mollie-payment',[MollieController::class, 'preparePayment'])->name('mollie.payment');
Route::name('webhooks.mollie')->post('webhooks/mollie', [MollieController::class, 'handle']);
Route::get('/payment-success', [MollieController::class, 'paymentSuccess'])->name('payment.success');
// MollieController ENDS

// SaleController
Route::get('/sales', [SaleController::class, 'index'])->name('sale.index');
// SaleController ENDS

// MemberAreaController
Route::get('/{id}/destroy', [MemberAreaController::class, 'delete'])->name('members.delete');
Route::resource('members', MemberAreaController::class);
// MemberAreaController ENDS

// FacebookController
Route::get('/facebook/group', [FacebookController::class, 'index'])->name('facebook.index');
Route::post('/facebook/group/store', [FacebookController::class, 'store'])->name('facebook.store');
// FacebookController ENDS


//StudentController 


//TrainerController 
Route::get('/trainer', [TrainerController::class, 'index'])->name('trainer.index');
Route::get('/create/programme', [TrainerController::class, 'create'])->name('trainer.create');
Route::get('/add/lesson', [TrainerController::class, 'lessonCreate'])->name('trainerlesson.create');

// Important Do not EDit

Route::get('/automatic-payments',[FrontendController::class, 'auto']);
