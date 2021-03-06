<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/print/{any}', function () {

    $segment = Request::segment(2);

    //return view($segment);

    $pdf = PDF::loadView($segment);
	return $pdf->stream($segment . '.pdf');

});

Route::get('/print/{any}/L', function () {

    $segment = Request::segment(2);

    //return view($segment);

    $pdf = PDF::loadView($segment, [],[], [
        'format' => 'A4-L'
      ]);

	return $pdf->stream($segment . '.pdf');

});

Route::get('/print2/{any}', function () {

    $segment = Request::segment(2);

    //return view($segment);

    $pdf = PDFDOM::loadView($segment);
	return $pdf->stream($segment . '.pdf');

});
