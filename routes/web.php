<?php 
use msuhels\newtestplugin\Http\Controllers\ChatController;

Route::domain(config('filament.domain'))
    ->middleware(config('filament.middleware.base'))
    ->name('filament.')
    ->group(function () {
        Route::post('/createchat',[ChatController::class, 'createchat'])->name('createchat');

            });
       