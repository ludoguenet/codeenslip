<?php

declare(strict_types=1);

use App\Models\Ad;
use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::get('/media/{media}', function (Media $media) {
    $path = $media->getPath();

    return response()->file($path);
})->name('media.url');

Route::post('/upload', function () {
    DB::table('media')->truncate();

    $ad = Ad::factory()->create();

    $file = request('file');

    $ad->addMedia($file, 'logos');

    $ad->firstMedia()->getPath();
    $ad->firstMedia()->stream();
    $ad->firstMedia()->getUrl();

})->name('upload');
