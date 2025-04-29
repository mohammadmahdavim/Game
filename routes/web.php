<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Panel\AboutUsController;
use App\Http\Controllers\Panel\ContactUsController;
use App\Http\Controllers\Panel\FaqController;
use App\Http\Controllers\Panel\HowWeWorkController;
use App\Http\Controllers\Panel\PortfolioController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\ServiceController;
use App\Http\Controllers\Panel\SliderController;
use App\Http\Controllers\Panel\TestimonialController;
use App\Http\Controllers\Site\SiteController;
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
    return view('welcome');
});
Route::get('/sitee', function () {
    return view('site.index');
});
Route::get('/services', function () {
    return view('panel.service.index');
});


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name('site.index');
    Route::get('/services', 'services')->name('site.services');
    Route::get('/portfolios', 'portfolios')->name('site.portfolios');
    Route::get('/services/{id}', 'service')->name('site.service');
    Route::get('/faqs', 'faqs')->name('site.faqs');
    Route::get('/contact-us', 'contact_us')->name('site.contact_us');
    Route::post('/contact-us', 'store_contact_us')->name('site.store_contact_us');
    Route::get('/about-us', 'about_us')->name('site.about_us');
    Route::get('/how-we-work', 'how_we_work')->name('site.how_we_work');
});


Route::middleware('auth')->prefix('panel')->name('panel.')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('services', ServiceController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::get('how_we_work/edit', [HowWeWorkController::class, 'edit'])->name('how_we_work.edit');
    Route::put('how_we_work/update', [HowWeWorkController::class, 'update'])->name('how_we_work.update');
    Route::get('about_us/edit', [AboutUsController::class, 'edit'])->name('about_us.edit');
    Route::put('about_us/update', [AboutUsController::class, 'update'])->name('about_us.update');
    Route::get('contact_us', [ContactUsController::class, 'index'])->name('contact_us.index');
    Route::delete('contact_us/{contact}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy');
    Route::patch('contact_us/{contact}/seen', [ContactUsController::class, 'markAsSeen'])->name('contact_us.seen');
    Route::get('slider', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('slider', [SliderController::class, 'update'])->name('slider.update');
});
