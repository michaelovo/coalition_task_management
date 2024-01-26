<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/project/view');
});

//Projects
Route::group(['prefix' => 'project'], function () {
    Route::get('/create', [ProjectController::class, 'createProject']);
    Route::post('/store', [ProjectController::class, 'storeProject']);
    Route::get('/view', [ProjectController::class, 'viewProjects']);
    Route::get('/{projectId}/edit', [ProjectController::class, 'editProject']);
    Route::post('/{projectId}/update', [ProjectController::class, 'updateProject']);
    Route::get('/{projectId}/delete', [ProjectController::class, 'deleteProject']);
    Route::get('/{projectId}/tasks', [ProjectController::class, 'fetchProjectTasks']);
});

//Tasks
Route::group(['prefix' => 'task'], function () {
    Route::get('/create', [TaskController::class, 'createTask']);
    Route::post('/store', [TaskController::class, 'storeTask']);
    Route::get('/view', [TaskController::class, 'viewTasks']);
    Route::get('/{taskId}/edit', [TaskController::class, 'editTask']);
    Route::post('/{taskId}/update', [TaskController::class, 'updateTask']);
    Route::get('/{taskId}/delete', [TaskController::class, 'deleteTask']);
});
