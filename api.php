<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\PdfController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/departments', [DepartmentController::class, 'index']);
Route::get('/departments/{id}', [DepartmentController::class, 'show']);
Route::get('/departments/{departmentId}/semesters', [SemesterController::class, 'index']);
Route::get('/departments/{departmentId}/semesters/{semesterNumber}/subjects', [SemesterController::class, 'getSubjects']);

Route::get('/subjects/{code}', [SubjectController::class, 'show']);
Route::get('/subjects/{code}/pdfs', [PdfController::class, 'getBySubject']);

Route::get('/pdfs/{id}', [PdfController::class, 'show']);
Route::get('/pdfs/{id}/preview', [PdfController::class, 'getPreview']);

Route::get('/search', [SearchController::class, 'search']);

// Authentication Routes
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me', [AuthController::class, 'me']);

    // Favorites Routes
    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle']);
    Route::get('/favorites/check/{subjectId}', [FavoriteController::class, 'isFavorited']);
});
