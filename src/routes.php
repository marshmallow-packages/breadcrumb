<?php

use Illuminate\Support\Facades\Route;

$prefix = (config('statistics.prefix')) ? config('statistics.prefix') : 'statistics';

Route::group(['prefix' => $prefix, 'middleware' => ['web'], 'namespace' => 'Marshmallow\Statistics\App\Http'], function () {
    Route::get('/demo/toplist', 'Statistics\Controllers\StatisticsController@toplist')->middleware('auth.basic');
    Route::get('/demo/timer', 'Statistics\Controllers\StatisticsController@timer')->middleware('auth.basic');
    Route::get('/demo/piechart', 'Statistics\Controllers\StatisticsController@piechart')->middleware('auth.basic');
    Route::get('/demo/numberanddifference', 'Statistics\Controllers\StatisticsController@numberanddifference')->middleware('auth.basic');
    Route::get('/demo/namedlinegraph', 'Statistics\Controllers\StatisticsController@namedlinegraph')->middleware('auth.basic');
    Route::get('/demo/linegraph', 'Statistics\Controllers\StatisticsController@linegraph')->middleware('auth.basic');
    Route::get('/demo/hourdensity', 'Statistics\Controllers\StatisticsController@hourdensity')->middleware('auth.basic');
    Route::get('/demo/gauge', 'Statistics\Controllers\StatisticsController@gauge')->middleware('auth.basic');
    Route::get('/demo/daydensity', 'Statistics\Controllers\StatisticsController@daydensity')->middleware('auth.basic');
    Route::get('/demo/number', 'Statistics\Controllers\StatisticsController@number')->middleware('auth.basic');
    Route::get('/demo/label', 'Statistics\Controllers\StatisticsController@label')->middleware('auth.basic');
});
