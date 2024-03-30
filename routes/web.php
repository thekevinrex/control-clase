<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PeriodosController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AsignatureController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ObservacionController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();


    Route::middleware(['auth', 'verified'])->group(function () {

        Route::get('/sitemap', [HomeController::class, 'navigation'])->name('sitemap');

        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/notification', [NotificationController::class, 'show'])->name('notification');
        Route::get('/notification/{notificacion}', [NotificationController::class, 'view'])->name('notification.view');

        Route::middleware('can:viewAny,App\Models\User')->group(function () {

            // Profesors
            Route::get('/profesors', [ProfesorController::class, 'show'])->name('profesors.show');

            Route::get('/profesors/create', [ProfesorController::class, 'create'])->name('profesors.create');
            Route::get('/profesors/{user}/edit', [ProfesorController::class, 'edit'])->name('profesors.edit');

            Route::patch('/profesors/{user}/edit', [ProfesorController::class, 'update'])->name('profesors.update');
            Route::delete('/profesors/{user}/delete', [ProfesorController::class, 'destroy'])->name('profesors.delete');
        });

        // Categories
        Route::middleware('can:viewAny,App\Models\Category')->group(function () {
            Route::get('/categories', [CategoryController::class, 'show'])->name('categories.show');
            Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');


            Route::post('/categories/add', [CategoryController::class, 'add'])->name('categories.add');
            Route::patch('/categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');
        });

        // Asignatures
        Route::middleware('can:viewAny,App\Models\Asignature')->group(function () {
            Route::get('/asignature', [AsignatureController::class, 'show'])->name('asignature.show');
            Route::get('/asignature/create', [AsignatureController::class, 'create'])->name('asignature.create');
            Route::get('/asignature/{asignature}/edit', [AsignatureController::class, 'edit'])->name('asignature.edit');


            Route::post('/asignature/add', [AsignatureController::class, 'add'])->name('asignature.add');
            Route::patch('/asignature/{asignature}/update', [AsignatureController::class, 'update'])->name('asignature.update');
            Route::delete('/asignature/{asignature}/delete', [AsignatureController::class, 'destroy'])->name('asignature.delete');
        });

        // Roles
        Route::middleware('can:viewAny,App\Models\Role')->group(function () {
            Route::get('/role', [RoleController::class, 'show'])->name('role.show');

            Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
            Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');


            Route::post('/role/add', [RoleController::class, 'add'])->name('role.add');
            Route::patch('/role/{role}/update', [RoleController::class, 'update'])->name('role.update');
            Route::delete('/role/{role}/delete', [RoleController::class, 'destroy'])->name('role.delete');
        });

        Route::middleware('can:viewAny,App\Models\Departament')->group(function () {
            Route::get('/departament', [DepartamentController::class, 'show'])->name('departament.show');

            Route::get('/departament/create', [DepartamentController::class, 'create'])->name('departament.create');
            Route::get('/departament/{departament}/edit', [DepartamentController::class, 'edit'])->name('departament.edit');


            Route::post('/departament/add', [DepartamentController::class, 'add'])->name('departament.add');
            Route::patch('/departament/{departament}/update', [DepartamentController::class, 'update'])->name('departament.update');
            Route::delete('/departament/{departament}/delete', [DepartamentController::class, 'destroy'])->name('departament.delete');
        });

        Route::middleware('can:viewAny,App\Models\Plan')->group(function () {

            Route::get('/plan/actual', [PlanController::class, 'actual'])->name('plan.actual');
            Route::get('/plan/show/{plan}', [PlanController::class, 'show'])->name('plan.show');

            Route::middleware('can:create,App\Models\Plan')->group(function () {
                Route::get('/plan/create', [PlanController::class, 'create'])->name('plan.create');
                Route::post('/plan/create', [PlanController::class, 'add'])->name('plan.add');
            });


            Route::delete('/plan/delete/{plan}', [PlanController::class, 'delete'])->name('plan.delete');

            Route::get('/plan/update/{plan}', [PlanController::class, 'edit'])->name('plan.edit');
            Route::patch('/plan/update/{plan}', [PlanController::class, 'update'])->name('plan.update');
        });

        Route::middleware('can:viewAny,App\Models\Plan')->group(function () {

            Route::post('/observacion/create/{plan}', [ObservacionController::class, 'add'])->name('observacion.add');
            Route::delete('/observacion/delete/{observacion}', [ObservacionController::class, 'delete'])->name('observacion.delete');
            Route::patch('/observacion/update/{observacion}', [ObservacionController::class, 'update'])->name('observacion.update');
        });

        Route::middleware('can:viewAny,App\Models\Informe')->group(function () {

            Route::get('/informes', [InformeController::class, 'show'])->name('informe.show');

            Route::get('/informe/{informe}', [InformeController::class, 'view'])
                ->name('informe.view')
                ->middleware('can:view,informe');

            Route::middleware('can:create,App\Models\Informe')->group(function () {
                Route::get('/informes/create', [InformeController::class, 'create'])->name('informe.create');
                Route::post('/informes/create', [InformeController::class, 'add'])->name('informe.start');
            });

            Route::middleware('can:update,informe')->group(function () {
                Route::get('/informes/edit/{informe}', [InformeController::class, 'edit'])->name('informe.edit');
                Route::patch('/informes/edit/{informe}', [InformeController::class, 'update'])->name('informe.update');
            });

            Route::delete('/informes/delete/{informe}', [InformeController::class, 'delete'])
                ->name('informe.delete')
                ->middleware('can:delete,informe');
        });

        Route::middleware('can:viewAny,App\Models\Periodo')->group(function () {

            Route::get('/periodos', [PeriodosController::class, 'show'])->name('periodos.show');

            Route::get('/peridos/v/{periodo}', [PeriodosController::class, 'view'])->name('periodos.view');

            Route::post('/periodos/create', [PeriodosController::class, 'create'])->name('periodos.create')->middleware('can:create,App\Models\Periodo');
            Route::post('/periodos/archivar', [PeriodosController::class, 'archivar'])->name('periodos.archivar')->middleware('can:archivar,App\Models\Periodo');
            Route::delete('/periodos/delete/{periodo}', [PeriodosController::class, 'delete'])->name('periodos.delete')->middleware('can:delete,App\Models\Periodo,periodo');
        });
    });

    require __DIR__ . '/auth.php';
});
