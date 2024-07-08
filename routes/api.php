<?php

  use App\Http\Controllers\ApartmentController;
  use App\Models\Apartment;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Route;

  Route::get('/user', function (Request $request) {
    return $request->user();
  })->middleware('auth:sanctum');

  Route::get('/apartment', [ApartmentController::class, 'get']);
