<?php

use App\Http\Controllers\Client\DanhgiaController;
use Illuminate\Support\Facades\Route;

  Route::get('/reviews/{san_pham_id}', [DanhgiaController::class, 'getReviews']);
    Route::get('/reviews/check-eligibility/{san_pham_id}', [DanhGiaController::class, 'checkReviewEligibility']);
    Route::post('/reviews', [DanhGiaController::class, 'storeReview']);
  ?>