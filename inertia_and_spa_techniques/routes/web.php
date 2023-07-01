<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/', function () {
        return inertia('Home');
    });

    Route::get('/users', function () {
        return inertia('Users/Index', [
            'users' => User::query()
            ->when(request('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'can' => [
                    'edit' => auth()->user()->can('edit', $user) //Authorization pode ser incluida por linha
                ]
            ]),
            'filters' => request()->only(['search']), //Retorna do servidor o que foi digitado
            'can' => [
                'createUser' => auth()->user()->can('create', User::class) //Authorization global
            ]
        ]);
    });

    Route::get('/users/create', function () {
        return inertia('Users/Create');
    })->can('create', 'App\Models\User');

    Route::post('/users', function () {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        User::create($attributes);
        return redirect('/users');
    });


    Route::get('/settings', function () {
        return inertia('Settings');
    });
});

