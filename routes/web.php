<?php

use App\Http\Controllers\Admin\AjaxController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SupportletterProblemMessageController;
use App\Http\Controllers\GetStatusTinkoffTransactionController;
use App\Http\Controllers\logoController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Events\NewMessage;
use App\Events\RejectTaskExecutor;
use App\Events\NotificationEvent;
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

Route::get('/a', function () {
    event(new NotificationEvent(72,['name'=>'test']));
});

Auth::routes();
Route::get('/clear-cache', function() {
        //   $run = Artisan::call('migrate');
        //   $run = Artisan::call('passport:install');
        //   $run = Artisan::call('make:seeder CreateAdminUserSeeder');
        //   $run = Artisan::call('db:seed --class=CreateAdminUserSeeder');
        //   $run = Artisan::call('db:seed --class=PermissionTableSeeder');
        //   $run = Artisan::call('db:seed --class=CategorySeeder');
        //   $run = Artisan::call('db:seed --class=SubcategorySeeder');
        //   $run = Artisan::call('db:seed --class=RegionSeeder');
        //   $run = Artisan::call('db:seed --class=RayonSeeder');

//         $run = Artisan::call('config:clear');
//         $run = Artisan::call('cache:clear');
        $run = Artisan::call('config:cache');
        // $run = Artisan::call('websockets:serve');
      //   $run = Artisan::call('make:command CalculateTheRatingOfThePartiesCron --command=calculate_the_rating_of_the_parties:cron');
      //   $run = Artisan::call('demo:cron');

       //   $run = Artisan::call('schedule:run');

       return 'FINISHED';
    });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('Admin')->group(function () {

    Route::get('/admin/login', [DashboardController::class,'index']);
    Route::get('/admin/index', [DashboardController::class,'dashboard']);
    // create country
    Route::resource('country',CountryController::class);


    // create category, edit,update,delete
    Route::resource('category',CategoryController::class);
    // create subcategory edit,update,delete
    Route::resource('subcategory',SubcategoryController::class);
    Route::resource('task',TaskController::class);
    Route::resource('user',FullUsersController::class);
    Route::resource('executor', ExecutorProfileController::class);
    Route::resource('letters',SupportsLetterController::class);
    Route::resource('supportfeedback',SupportFeedback::class);

    Route::resource('employer',EmployerProfileController::class);

// if we dont write via resourse we must mentian our namespace
    Route::post('/ajax/request/store',[AjaxController::class,'store'])->name('ajax.request.store');
//uploading contract  file
    Route::resource('contract', ContractController::class);

    // notification for admin
    Route::resource('/notification',NotificationController::class);
    Route::resource('/callback',CallBackController::class);
    Route::resource('/user-question',UserGiveQuestionController::class);
    // ---
    Route::get('pdf',[PDFController::class,'index']);
    Route::get('create-pdf-file', [PDFController::class, 'index']);

    // letter from employer about task problems
    Route::get('admin/support-problem-message',[SupportletterProblemMessageController::class,'index'])->name('problem-message');
    Route::get('admin/support-problem-message/{id}',[SupportletterProblemMessageController::class,'show'])->name('problem-message-show');
    Route::post('admin/support-problem-message-feedback',[SupportletterProblemMessageController::class,'supportFeedBack'])->name('sopport-feedback-problem-message');
});

Route::post('/tinkoff-transaction',[GetStatusTinkoffTransactionController::class,'index']);
Route::get('/tinkoff-transaction-success',[TinkoffSuccessController::class,'success']);


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});
Route::get('email_log',[logoController::class,'index']);





