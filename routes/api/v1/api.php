<?php

use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\api\v1\AjaxController;
use App\Http\Controllers\Pages\CategoryController;
use App\Http\Controllers\Pages\HeaderController;
use App\Http\Controllers\Pages\RegionController;

use App\Http\Controllers\api\v1\LoginController;
use App\Http\Controllers\api\v1\RegisterController;
use App\Http\Controllers\api\v1\ForgotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\ProfileController;
use App\Http\Controllers\api\v1\TaskController;


use App\Http\Controllers\api\v1\ReviewController;
use App\Http\Controllers\api\v1\ReitingController;
use App\Http\Controllers\api\v1\AppliedWorkController;
use App\Http\Controllers\api\v1\BalanceController;
use App\Http\Controllers\api\v1\ChatController;
use App\Http\Controllers\api\v1\ClickOnTaskController;
use App\Http\Controllers\api\v1\EmployerController;
use App\Http\Controllers\api\v1\VerificationController;


// ------ExecutorProfile start---------
use App\Http\Controllers\api\v1\ExecutorProfileController;
use App\Http\Controllers\api\v1\LocalityNameController;
use App\Http\Controllers\api\v1\MessageForSupportController;
use App\Http\Controllers\GetStatusTinkoffTransactionController;
use App\Http\Controllers\api\v1\NotificationController;
use App\Http\Controllers\api\v1\SmsController;
use App\Http\Controllers\api\v1\SpecialTaskController;
use App\Http\Controllers\api\v1\TestEnrollmentController;
use App\Http\Controllers\Pages\CallbackController;
use App\Http\Controllers\Pages\ExecutorProfileController as PagesExecutorProfileController;
use App\Http\Controllers\Pages\FindExecutorController;
use App\Http\Controllers\Pages\GiveQuestionController;
use App\Http\Controllers\Pages\LocalityController;
use App\Http\Controllers\Pages\RayonController;
use App\Http\Controllers\Pages\ShowProfileController;
use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Users
Route::prefix('/user')->group( function(){
    // user
    Route::post('/register',[RegisterController::class,'register']);
    Route::get('/email/resend', [VerificationController::class,'resend'])->name('verification.resend');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify');

    Route::post('/login',[LoginController::class,'login']);
    Route::post('/logout',[RegisterController::class,'logout'])->middleware('auth:api');

    Route::post('forgot',[ForgotController::class,'forgot']);
    Route::post('reset',[ForgotController::class,'reset']);



    Route::group(['middleware' => ['auth:api', 'verified']], function() {

        Route::get('/profile-page',[ProfileController::class,'show']);
        // updating avatar, personal-data, soclink,notification
        Route::post('/update-avatar',[ProfileController::class,'updateAvatar']);
        Route::post('/update-soclink',[ProfileController::class,'updateSocLink']);
        Route::post('/update-notification',[ProfileController::class,'updateNotification']);
        // deleting user
        Route::delete('/{id}/delete',[ProfileController::class,'destroy']);


        // show employer rating
        Route::get('/employer-review',[EmployerController::class,'showEmployerReview']);
        // create  new task
        Route::post('/create-new-task',[TaskController::class,'createNewTask']);

        // submit button for  complated task
        Route::post('/employer-complate-task',[TaskController::class,'employerComplateTask']);


        // making reiting
        Route::post('/create-reiting',[ReitingController::class,'createReiting']);
        Route::post('/click-on-task',[ClickOnTaskController::class,'clickOnTask']);
         //-----------------------ExecutorProfile start-------------------
        Route::get('/show-executor-profile',[ExecutorProfileController::class,'index']);
        Route::post('/update-executor-personal-data',[ExecutorProfileController::class,'updateExecutorPersonalData']);
        Route::post('/region-address',[ExecutorProfileController::class,'regionAddress']);
        Route::post('/user-region-address',[ProfileController::class,'userRegionAddress']);

        // ----------------------executor selected Locality name --------------------------------
        Route::post('/locality',[LocalityNameController::class,'index']);
        Route::post('/profession-and-experience',[ExecutorProfileController::class,'professionAndExperience']);
        Route::post('/portfolio',[ExecutorProfileController::class,'portfolioBase']);
        Route::post('/education-and-certificate',[ExecutorProfileController::class,'educationAndCertificates']);





         // displaying autherizated user's tasks status
        Route::get('/completed-tasks',[TaskController::class,'completedTasks']);
        Route::get('/in-process-task',[TaskController::class,'inProcessTask']);
        //employer created tasks which executor not applied
        Route::get('/not-applied-task',[TaskController::class,'notAppliedTask']);
        //employer created tasks which executor  applied
        Route::get('/responded-executor',[TaskController::class,'respondedExecutor']);
        Route::post('/employer-watched-click',[ClickOnTaskController::class,'employerWatchedClick']);

        Route::post('meeting-with-responded-executor',[TaskController::class,'meetingWithRespondedExecutor']);
        // employer click on special task
        // Route::get('tasks/{id}',[TaskController::class,'']);

        //selecting task executor
        Route::post('/select-task-executor',[TaskController::class,'selectTaskExecutor']);
        Route::post('/reject-task-executor',[TaskController::class,'rejectTaskExecutor']);
        // show all task to executor Не выбранные заказы
        Route::get('/show-all-tasks-to-executor',[TaskController::class,'showAllTaskToExecutor']);
        // write spacial route for socket getting count of show-all-tasks-to-executor  Не выбранные заказы
        Route::get('/show-all-tasks-to-executor-count',[TaskController::class,'showAllTaskToExecutorCount']);
        // show special task
        Route::post('/click-on-special-task',[TaskController::class,'showClikTask']);




        Route::get('/as-in-application',[ExecutorProfileController::class,'asInApplication']);
        Route::post('/filter',[TaskController::class,'filter']);
        // delete task
        Route::delete('/task/{id}/delete',[TaskController::class,'destroy']);
        // TRANSACTION increase-balance,balance
        Route::post('/increase-balance',[BalanceController::class, 'increaseBalance']);
        Route::get('/balance',[BalanceController::class,'index']);
        // writing route for geting request from tinkoff page and updating executor balance



        // show notification
        Route::post('/notification/get',[NotificationController::class,'get']);
        Route::post('/notification/read',[NotificationController::class,'read']);
        Route::delete('/notification/{id}/delete',[NotificationController::class,'destroy']);
        // =======
        Route::get('/unread_notification_count',[NotificationController::class,'unreadNotificationCount']);


        // executor which applied for work
        Route::get('responded-task-for-executor',[ClickOnTaskController::class,'respondedTaskForExecutor']);
        Route::get('tasks-in-progress-for-executor',[TaskController::class,'tasksInProgressForExecutor']);
        // new api for writing material price and working price
        Route::post('/material-work-price',[TaskController::class,'materialWorkPrice']);
        Route::get('completed-task-executor',[TaskController::class,'completedTasksForExecutor']);

        //chat-message
        Route::get('/employer-tasks-chat',[ChatController::class,'index']);
        Route::post('/chat-room',[ChatController::class,'store']);

        Route::post('task-chat',[ChatController::class,'taskChat']);
        //employer uploading file
        Route::post('chat-file',[ChatController::class,'chatFileUpload']);


        // support
        Route::post('/message-for-support',[MessageForSupportController::class,'store']);

        // employer write message to moderator for solving problem
        Route::post('/problem-message',[MessageForSupportController::class,'problemMssage']);

        // getting  phone number when user inserting its data
        Route::post('/get-phone-number',[SmsController::class,'GetPhoneNumber']);
        Route::post('/phone-number-verification',[SmsController::class,'getSms']);

        Route::post('/task_list', [TaskController::class,'getList']);

        Route::get('/special-task-for/{type}',[SpecialTaskController::class,'index']);

        // reject employer for spesial task
        Route::post('/reject-employer-for-special-task',[SpecialTaskController::class,'rejectEmployerForSpecialTask']);
        // Route::post('/select-special-task-executor',[SpecialTaskController::class,'selectSpecialTaskExecutor']);
    });


    // creating executor   routs

    Route::post('/aplliedWork',[AppliedWorkController::class,'aplliedWork'])->middleware('auth:api');

    Route::get('/send-testenrollment',[TestEnrollmentController::class,'sendTestNotification'])->middleware('auth:api');


});

Route::prefix('/pages')->group(function(){
    Route::get('/category',[CategoryController::class,'category']);
    Route::get('/header',[HeaderController::class,'index']);
    Route::get('/header/{id}',[ShowProfileController::class,'show']);
    Route::get('/regions',[RegionController::class,'index']);
    Route::get('/regions_and_rayons',[RegionController::class,'regionsAndRayons']);
    Route::get('/rayons',[RayonController::class,'index']);
    Route::post('/locality',[LocalityController::class,'index']);
    Route::post('/callback',[CallbackController::class,'store']);
    Route::post('/givequestiontoadmin',[GiveQuestionController::class,'store']);
    // porz kadastry hamar
    Route::post('/upload_file_test',[GiveQuestionController::class,'uploadFileTest']);

    // not auth user can click on subcategory  and find matched subcategory executor
    Route::get('/subcategory/{categoryId}/{subcategoryName}/show',[FindExecutorController::class,'show']);
    Route::get('/filter-executor/{category_id}/{region}/{executor_subcategory}',[FindExecutorController::class,'filter']);

});


Route::get('/tinkoff-transaction',[GetStatusTinkoffTransactionController::class,'fails']);


