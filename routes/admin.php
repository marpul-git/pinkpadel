<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourtController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TariffController;
use App\Http\Controllers\Admin\SectionController;

Route::get('', [HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');

Route::post('tariffs/update', [UserController::class, 'updateTariff'])->name('admin.users.updateTariff');

Route::post('level/update', [UserController::class, 'updateLevel'])->name('admin.users.updateLevel');
Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');

Route::resource('roles',RoleController::class)->names('admin.roles');

// Si no vamos a utilizar un metodo en una ruta resource, podemos utilizar except() para que no genere la ruta
Route::resource('courts', CourtController::class)->except('show')->names('admin.courts');
Route::resource('sections', SectionController::class)->names('admin.sections');

Route::resource('tariffs', TariffController::class)->names('admin.tariffs');

Route::get('events/by-day', [EventController::class, 'eventsByDay'])->name('admin.events.by-day');
Route::get('events/by-day-table', [EventController::class, 'eventsByDayTable'])->name('admin.events.by-day-table');
Route::resource('events', EventController::class)->names('admin.events');
