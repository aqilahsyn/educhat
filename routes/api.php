<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Route di sini akan otomatis diprefix dengan /api
| dan pakai middleware group "api" dari Kernel.
|
*/

// AUTH
Route::post('/register', [AuthController::class, 'register']); // mahasiswa
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // ADMIN
    Route::get('/admin/lecturers', [AdminController::class, 'searchLecturers']);
    Route::post('/admin/coordinator', [AdminController::class, 'assignCoordinator']);
    Route::get('/admin/courses', [AdminController::class, 'coursesWithClos']);

    // EDITOR MATA KULIAH (admin + dosen)
    Route::get('/lecturer/courses', [LecturerController::class, 'myCourses']);
    Route::get('/lecturer/profile', [LecturerController::class, 'profile']);
    Route::put('/lecturer/clos/{clo}', [LecturerController::class, 'updateClo']);
    Route::get('/lecturer/materials/suggest', [LecturerController::class, 'suggestMaterials']);
    Route::post('/lecturer/clos/{clo}/materials-with-file',
        [LecturerController::class, 'storeMaterialWithFile']);
    Route::post('/lecturer/courses/{course}/header',
        [LecturerController::class, 'uploadCourseHeader']);

    // MAHASISWA
    Route::get('/student/courses', [StudentController::class, 'courses']);
    Route::get('/student/clos/{clo}', [StudentController::class, 'cloDetail']);
    Route::get('/student/profile', [StudentController::class, 'profile']);

    // CHATBOT
    Route::get('/student/chats', [ChatController::class, 'index']);
    Route::post('/student/chats', [ChatController::class, 'store']);
    Route::get('/student/chats/{chatSession}', [ChatController::class, 'show']);
    Route::post('/student/chats/{chatSession}/messages', [ChatController::class, 'sendMessage']);
});
