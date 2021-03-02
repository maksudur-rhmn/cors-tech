<?php

use App\Models\User;
use App\Models\BecomeTrainer;
use App\Models\GeneralSettings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MollieController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MemberAreaController;
use App\Http\Controllers\CreateAdminController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BecomeTrainerController;
use App\Http\Controllers\CoachInfoController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\CreateSubscriptionController;

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
Route::get('/proximite-coach', [FrontendController::class, 'coachProximite'])->name('front.proximite');
Route::get('/home', [FrontendController::class, 'indexlogin'])->name('front.indexlogin');
Route::get('/courses', [FrontendController::class, 'courses'])->name('front.courses');
Route::middleware(['auth:sanctum', 'verified'])->get('/owned/courses', [FrontendController::class, 'ownedCourses'])->name('front.ownedCourses');
Route::get('/search', [FrontendController::class, 'search'])->name('front.search');
Route::get('/courses/{slug}', [FrontendController::class, 'details'])->name('front.details');
Route::get('/subscribe', [FrontendController::class, 'subscribe'])->name('subscription.index');
Route::get('/about', [FrontendController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('front.contact');
Route::get('/become/an/instructor', [FrontendController::class, 'instructor'])->name('front.instructor');
Route::get('/info/{id}/coach', [FrontendController::class, 'coachProfile'])->name('front.coachProfile');
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


// AboutController 
Route::get('/about-area', [AboutController::class, 'index'])->name('about.index');
Route::post('/about-store', [AboutController::class, 'store'])->name('about.store');

// BecomeTrainerController 
Route::get('/be/a/trainer/settings', [BecomeTrainerController::class, 'index'])->name('become.index');
Route::post('/be/a/trainer/settings/store', [BecomeTrainerController::class, 'store'])->name('become.store');

// FacebookController
Route::get('/facebook/group', [FacebookController::class, 'index'])->name('facebook.index');
Route::post('/facebook/group/store', [FacebookController::class, 'store'])->name('facebook.store');
// FacebookController ENDS


// SocialController
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);


// GoogleSocialiteController
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);


// CoachInfoController 
Route::get('/coach-info', [CoachInfoController::class, 'index'])->name('coach.index');
Route::post('/coach-info-store', [CoachInfoController::class, 'store'])->name('coach.store');


//StudentController 
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/mes/{id}/cors', [StudentController::class, 'myCourse'])->name('my.course');
Route::get('/les/{slug}/{id}/player', [StudentController::class, 'player'])->name('my.player');
Route::get('/foo', [StudentController::class, 'foo']);
Route::get('/payment/history', [StudentController::class, 'history'])->name('payment.history');

//TrainerController 
Route::get('/trainer', [TrainerController::class, 'index'])->name('trainer.index');
Route::get('/create/programme', [TrainerController::class, 'create'])->name('trainer.create');
Route::get('/add/lesson', [TrainerController::class, 'lessonCreate'])->name('trainerlesson.create');
Route::get('/list/{id}/lesson', [TrainerController::class, 'lessonList'])->name('trainerlesson.list');
Route::get('/prog/del', [TrainerController::class, 'deleteprogramme'])->name('trainerdelete.programme');

// Important Do not EDit

Route::get('/automatic-payments',[FrontendController::class, 'auto']);


// FaqController 
Route::get('/faq/{id}/delete', [FaqController::class, 'delete'])->name('faqs.delete');
Route::resource('faqs', FaqController::class);

// GeneralSettings 
Route::get('/general-settings', [GeneralSettingsController::class, 'index'])->name('general.index');
Route::post('/general-store', [GeneralSettingsController::class, 'store'])->name('general.store');