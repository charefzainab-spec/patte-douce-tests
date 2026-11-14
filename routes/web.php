<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\LostFoundController;
use App\Http\Controllers\VeterinaireController;

use App\Models\User;
use App\Models\Animal;
use App\Models\LostFound;
use App\Models\Veterinaire;
use App\Http\Controllers\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Routes protégées (auth)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | Animals
    |--------------------------------------------------------------------------
    */
    Route::resource('animals', AnimalController::class);

    Route::get('/my-animals', [AnimalController::class, 'myAnimals'])
        ->name('animals.my');


    /*
    |--------------------------------------------------------------------------
    | Lost & Found
    |--------------------------------------------------------------------------
    */
    Route::resource('lost-found', LostFoundController::class);

    Route::get('/my-lostfound', [LostFoundController::class, 'myLostFound'])
    ->name('lostfound.my');
    /*
    |--------------------------------------------------------------------------
    | Veterinaires
    |--------------------------------------------------------------------------
    */
    Route::resource('vet', VeterinaireController::class);


    /*
    |--------------------------------------------------------------------------
    | User Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/user', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/veterinaires', [VeterinaireController::class, 'index'])
    ->name('veterinaires.index');
    /*
    |--------------------------------------------------------------------------
    | Vet Dashboard
    |--------------------------------------------------------------------------
    */
    


    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard (admin only)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin'])->group(function () {

        Route::get('/admin', function () {
            return view('admin.dashboard', [
                'usersCount' => User::count(),
                'animalsCount' => Animal::count(),
                'lostCount' => LostFound::count(),
                'vetsCount' => Veterinaire::count(),
            ]);
        })->name('admin.dashboard');
        Route::resource('users', AdminUserController::class);
        Route::get('/admin/animals', [AnimalController::class, 'adminIndex'])
        ->name('admin.animals');
        Route::get('/admin/lost-found', [LostFoundController::class, 'adminIndex'])
        ->name('admin.lostfound');
        Route::get('/admin/veterinaires', [VeterinaireController::class, 'adminIndex'])
            ->name('admin.vets');

        Route::get('/admin/veterinaires/create', [VeterinaireController::class, 'create'])
            ->name('admin.vets.create');

        Route::post('/admin/veterinaires', [VeterinaireController::class, 'store'])
            ->name('admin.vets.store');

        Route::get('/admin/veterinaires/{id}/edit', [VeterinaireController::class, 'edit'])
            ->name('admin.vets.edit');

        Route::put('/admin/veterinaires/{id}', [VeterinaireController::class, 'update'])
            ->name('admin.vets.update');

        Route::delete('/admin/veterinaires/{id}', [VeterinaireController::class, 'destroy'])
            ->name('admin.vets.destroy');

            });

});


require __DIR__.'/auth.php';