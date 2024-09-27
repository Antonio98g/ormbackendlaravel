<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Level;

Route::get('/', function () {
    $users = User::all(); // Cambiar a all() para cargar todos los usuarios

    return view('welcome', ['users' => $users]);
});

Route::get('/profile/{id}', function($id) {
    $user = User::with(['posts' => function($query) {
            $query->with('category', 'image', 'tags')->withCount('comments');
        }, 'videos' => function($query) {
            $query->with('category', 'image', 'tags')->withCount('comments');
        }])->find($id);

    // Verificar si el usuario existe
    if (!$user) {
        return redirect('/')->with('error', 'Usuario no encontrado');
    }

    return view('profile', [
        'user' => $user,
        'posts' => $user->posts,
        'videos' => $user->videos
    ]);
})->name('profile');

Route::get('/level/{id}', function($id) {
    $level = Level::with(['posts' => function($query) {
            $query->with('category', 'image', 'tags')->withCount('comments');
        }, 'videos' => function($query) {
            $query->with('category', 'image', 'tags')->withCount('comments');
        }])->find($id);

    // Verificar si el nivel existe
    if (!$level) {
        return redirect('/')->with('error', 'Nivel no encontrado');
    }

    return view('level', [
        'level' => $level,
        'posts' => $level->posts,
        'videos' => $level->videos
    ]);
})->name('level');
