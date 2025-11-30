<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (Frontend)
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication pages (Guest only)
/* Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
});

// Student pages (Authenticated)
Route::middleware('auth.token')->group(function () {
    
    // Dashboard - empty state
    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('dashboard');
    
    // Course detail page
    Route::get('/course/{course}', function ($course) {
        return view('student.course-detail', compact('course'));
    })->name('course.show');
    
    // CLO detail with chat
    Route::get('/course/{course}/clo/{clo}', function ($course, $clo) {
        return view('student.chat', compact('course', 'clo'));
    })->name('course.clo');
    
    // Chat session (if starting from history)
    Route::get('/chat/{session}', function ($session) {
        return view('student.chat', compact('session'));
    })->name('chat.show');
    
    // Chat history
    Route::get('/history', function () {
        return view('student.history');
    })->name('history');
    
    // Profile
    Route::get('/profile', function () {
        return view('student.profile');
    })->name('profile');
    
    // Logout
    Route::post('/logout', function () {
        session()->forget('auth_token');
        return redirect()->route('login');
    })->name('logout');
});
*/

Route::get('/dashboard', function () {
    return view('student.dashboard');
})->name('dashboard');

Route::get('/course/{course}', function ($course) {
    return view('student.course-detail', compact('course'));
})->name('course.show');

Route::get('/course/{course}/clo/{clo}', function ($course, $clo) {
    return view('student.chat', compact('course', 'clo'));
})->name('course.clo');

Route::get('/chat/{session}', function ($session) {
    return view('student.chat', compact('session'));
})->name('chat.show');

Route::get('/history', function () {
    return view('student.history');
})->name('history');

Route::post('/logout', function () {
    session()->forget('auth_token');
    return redirect()->route('login');
})->name('logout');

// API routes are in routes/api.php (already handled by backend)