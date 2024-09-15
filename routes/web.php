<?php

use App\Http\Controllers\DayController;
use App\Http\Controllers\EposterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThemeController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('event.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // routes of my application

    Route::resource('event', EventController::class);
    Route::get('/download/{event}' , [EventController::class , 'download_zip_file'])->name('event.download');
    
    Route::get('generate-code-source/{event}' , function (Event $event) {
        return view('event.generate-code' , compact('event'));
    })->name('generate-code-source');
    
    Route::get('/day/{event_id}',[DayController::class , 'index'])->name('day.index');
    Route::get('/day/{event_id}/create',[DayController::class , 'create'])->name('day.create');
    Route::post('/day/{event_id}',[DayController::class , 'store'])->name('day.store');
    Route::PUT('/day/{day}',[DayController::class , 'update'])->name('day.update');
    Route::get('/day/{day}/edit',[DayController::class , 'edit'])->name('day.edit');
    Route::delete('/day/{day}',[DayController::class , 'destroy'])->name('day.destroy');
    
    Route::get('/theme/{day_id}' , [ThemeController::class , 'index'])->name('theme.index');
    Route::get('/theme/{day_id}/create' , [ThemeController::class , 'create'])->name('theme.create');
    Route::get('/theme/{theme}/edit' , [ThemeController::class , 'edit'])->name('theme.edit');
    Route::put('/theme/{theme}' , [ThemeController::class , 'update'])->name('theme.update');
    Route::post('/theme' , [ThemeController::class , 'store'])->name('theme.store');
    Route::delete('/theme/{theme}' , [ThemeController::class , 'destroy'])->name('theme.destroy');
    
    Route::get('/event-programme/{event_id}' , [ProgrammeController::class , 'event_programme'])->name('event-programme');
    Route::get('/event-programme-show/{event_id}' , [ProgrammeController::class , 'event_programme_show'])->name('event-programme-show');
    Route::post('/event-programme/{event_id}' , [ProgrammeController::class , 'event_programme_store'])->name('event-programme');
    Route::delete('/event-programme/{programme}' , [ProgrammeController::class , 'event_programme_destroy'])->name('event-programme');
    
    Route::get('/event-eposter/{event_id}' , [EposterController::class , 'event_eposter'])->name('event-eposter');
    Route::get('/event-eposter-show/{event_id}' , [EposterController::class , 'event_eposter_show'])->name('event-eposter-show');
    Route::post('/event-eposter/{event_id}' , [EposterController::class , 'event_eposter_store'])->name('event-eposter');
    Route::delete('/event-eposter/{event_id}' , [EposterController::class , 'event_eposter_destroy'])->name('event-eposter');
    
    Route::get('/event-image/{event_id}' , [ImageController::class , 'event_image'])->name('event-image');
    Route::get('/event-image-show/{event_id}' , [ImageController::class , 'event_image_show'])->name('event-image-show');
    Route::post('/event-image/{event_id}' , [ImageController::class , 'event_image_store'])->name('event-image');
    Route::delete('/event-image/{event}' , [ImageController::class , 'event_image_destroy'])->name('event-image');
    
    
});


require __DIR__.'/auth.php';
