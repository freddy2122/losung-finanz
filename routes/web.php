<?php

use App\Http\Middleware\ValidLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test-simple', function () {
    return 'OK SIMPLE';
});

Route::prefix('/theme')->group(function () {
    Route::get('/', [\App\Http\Controllers\Theme::class, 'index']);
    Route::get('/config', [\App\Http\Controllers\Theme::class, 'generate_config']);
});

Route::prefix('/{language}')->middleware([ValidLanguage::class])->group(function () {

    Route::get('/index', [\App\Http\Controllers\App::class, 'index'])->name('site.index');

    Route::get('/contact-us', [\App\Http\Controllers\Contact::class, 'create'])->name('site.contact_us');
    Route::post('/contact-us', [\App\Http\Controllers\Contact::class, 'store'])->name('site.contact_us.post');
    
    Route::get('/obtain-financing', [\App\Http\Controllers\Financing::class, 'create'])->name('site.obtain_financing');
    Route::post('/obtain-financing', [\App\Http\Controllers\Financing::class, 'store'])->name('site.obtain_financing.post');

    Route::get('/complete-financing/{reference}', [\App\Http\Controllers\Financing::class, 'showCompleteFinancingForm'])->name('site.complete_financing');
    Route::post('/complete-financing', [\App\Http\Controllers\Financing::class, 'completeFinancing'])->name('site.complete_financing.submit');

    Route::get('/how-it-works', [\App\Http\Controllers\App::class, 'how_it_works'])->name('site.how_it_works');
    Route::get('/loans/{type?}', [\App\Http\Controllers\App::class, 'loan_offers'])->name('site.loan_offers');
    Route::get('/insurances/{type?}', [\App\Http\Controllers\App::class, 'assurances'])->name('site.assurances');
    
    Route::get('/merci', function () {
        return view('pages.thank-you');
    })->name('thankyou.localized');

    Route::prefix('/legal')->group(function () {
        Route::get('/cookie-policy', [\App\Http\Controllers\App::class, 'cookie_policy'])->name('site.cookie_policy');
        Route::get('/legal-notice', [\App\Http\Controllers\App::class, 'legal_notice'])->name('site.legal_notice');
        Route::get('/privacy-policy', [\App\Http\Controllers\App::class, 'privacy_policy'])->name('site.privacy_policy');
        Route::get('/accessibility', [\App\Http\Controllers\App::class, 'accessibility_statement'])->name('site.accessibility_statement');
        Route::get('/vulnerability-disclosure', [\App\Http\Controllers\App::class, 'vulnerability_disclosure'])->name('site.vulnerability_disclosure');
        Route::get('/fraud-risks', [\App\Http\Controllers\App::class, 'fraud_risks'])->name('site.fraud_risks');
    });
});

Route::get('/merci', function () {
    return view('pages.thank-you');
})->name('thankyou');


Route::get('/{language?}', [\App\Http\Controllers\App::class, 'index'])
    ->middleware([ValidLanguage::class])
    ->name('site.index.root');
