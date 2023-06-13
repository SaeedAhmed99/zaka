<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Route;

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
Route::get('institutions', [HomeController::class, 'InstitutionsPage'])->name('InstitutionsPage');

// Language Route
Route::post('/lang', [LanguageController::class, 'index'])->middleware('LanguageSwitcher')->name('lang');
// For Language direct URL link
Route::get('/lang/{lang}', [LanguageController::class, 'change'])->middleware('LanguageSwitcher')->name('langChange');
Route::get('/locale/{lang}', [LanguageController::class, 'locale'])->middleware('LanguageSwitcher')->name('localeChange');
// .. End of Language Route

// No Permission
Route::get('/403', function () {
    return view('errors.403');
})->name('NoPermission');


// Not Found
Route::get('/404', function () {
    return view('errors.404');
})->name('NotFound');

// Backend Routes
Route::get('/login', function () {
    return redirect('/');
});

Route::get('/register', function () {
    return redirect('/');
});

// RSS Feed Routes
if (env("RSS_STATUS", 0)) {
    Route::feeds();
}

// Social Auth
Route::get('/oauth/{driver}', [SocialAuthController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('/oauth/{driver}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');

 Route::Group(['prefix' => env('BACKEND_PATH')], function () {
     Auth::routes();
 });
// Route::get('/logout', function () {
//     Auth::logout();
//     return redirect('/');
// })->name('logout');

// Start of Frontend Routes
// ../site map
Route::get('/sitemap.xml', [SiteMapController::class, 'siteMap'])->name('siteMap');
Route::get('/{lang}/sitemap', [SiteMapController::class, 'siteMap'])->name('siteMapByLang');

Route::get('/', [HomeController::class, 'HomePage'])->name('Home');

Route::post('/form-submit', [HomeController::class, 'formSubmit'])->name('formSubmit');

// ../home url
Route::get('/home', [HomeController::class, 'HomePage'])->name('HomePage');
Route::get('/{lang?}/home', [HomeController::class, 'HomePageByLang'])->name('HomePageByLang');
// ../subscribe to newsletter submit  (ajax url)
Route::post('/subscribe', [HomeController::class, 'subscribeSubmit'])->name('subscribeSubmit');
// ../Comment submit  (ajax url)
Route::post('/comment', [HomeController::class, 'commentSubmit'])->name('commentSubmit');
// ../Order submit  (ajax url)
Route::post('/order', [HomeController::class, 'orderSubmit'])->name('orderSubmit');
// ..Custom URL for contact us page ( www.site.com/contact )
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('contactPage');
Route::get('/{lang?}/contact', [HomeController::class, 'ContactPageByLang'])->name('contactPageByLang');
// ../contact message submit  (ajax url)
Route::post('/contact/submit', [HomeController::class, 'ContactPageSubmit'])->name('contactPageSubmit');
//about page
Route::get('/about-us', [HomeController::class, 'AboutPage'])->name('aboutPage');
Route::get('/{lang?}/about-us', [HomeController::class, 'AboutPageByLang'])->name('aboutPageByLang');
Route::get('/fatwa-request', [HomeController::class, 'fatwaRequest'])->name('FatwaRequest');
Route::get('/{lang?}/fatwa-request', [HomeController::class, 'FatwaRequestPageByLang'])->name('fatwaRequestPageByLang');
// ../contact message submit  (ajax url)
Route::post('/fatwa-request/submit', [HomeController::class, 'FatwaRequestPageSubmit'])->name('fatwaRequestPageSubmit');


Route::get('/presenting-a-project', [HomeController::class, 'presentingProject'])->name('presentingProject');
Route::get('/{lang?}/presenting-a-project', [HomeController::class, 'PresentingProjectPageByLang'])->name('presentingProjectPageByLang');
// ../contact message submit  (ajax url)
Route::post('/presenting-a-project/submit', [HomeController::class, 'PresentingProjectPageSubmit'])->name('PresentingProjectPageSubmit');

Route::get('/zakat-declaration', [HomeController::class, 'zakatDeclaration'])->name('ZakatDeclaration');
Route::get('/{lang?}/zakatDeclarationt', [HomeController::class, 'ZakatDeclarationPageByLang'])->name('zakatDeclarationPageByLang');
// ../contact message submit  (ajax url)
Route::post('/zakat-declaration/submit', [HomeController::class, 'ZakatDeclarationPageSubmit'])->name('ZakatDeclarationPageSubmit');

Route::get('/library-books', [HomeController::class, 'LibraryTest'])->name('LibraryTest');
Route::get('/{lang?}/library-books', [HomeController::class, 'LibraryTestPageByLang'])->name('LibraryTestPageByLang');
Route::get('/gallery', [HomeController::class, 'Gallery'])->name('Gallery');
Route::get('/{lang?}/gallery', [HomeController::class, 'GalleryPageByLang'])->name('GalleryPageByLang');

Route::get('/zakat-calculations', [HomeController::class, 'ZakatCalculations'])->name('ZakatCalculations');
Route::get('/{lang?}/zakat-calculations', [HomeController::class, 'ZakatCalculationsPageByLang'])->name('ZakatCalculationsPageByLang');

Route::get('/zakat-calculations/zakat-on-real-estates', [HomeController::class, 'ZakatRealEstate'])->name('ZakatRealEstate');
Route::get('/{lang?}/zakat-calculations/zakat-on-real-estates', [HomeController::class, 'ZakatRealEstatePageByLang'])->name('ZakatRealEstatePageByLang');

Route::get('/zakat-calculations/zakat-on-companies', [HomeController::class, 'ZakatCompany'])->name('ZakatCompany');
Route::get('/{lang?}/zakat-calculations/zakat-on-companies', [HomeController::class, 'ZakatCompanyPageByLang'])->name('ZakatCompanyPageByLang');

Route::get('/zakat-calculations/zakat-on-crops', [HomeController::class, 'ZakatCrops'])->name('ZakatCrops');
Route::get('/{lang?}/zakat-calculations/zakat-on-crops', [HomeController::class, 'ZakatCropsPageByLang'])->name('ZakatCropsPageByLang');

Route::get('/zakat-calculations/zakat-on-cash', [HomeController::class, 'ZakatCash'])->name('ZakatCash');
Route::get('/{lang?}/zakat-calculations/zakat-on-cash', [HomeController::class, 'ZakatCashPageByLang'])->name('ZakatCashPageByLang');

Route::get('/payment-page', [PayPalController::class, 'PaymentPage'])->name('PaymentPage');
Route::get('/{lang?}/payment-page', [PayPalController::class, 'PaymentPageByLang'])->name('PaymentPageByLang');
Route::get('/payment', [PayPalController::class, 'payment'])->name('payment');
Route::get('/cancel',[PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('/payment/success', [PayPalController::class, 'success'])->name('payment.success');

Route::get('/events', [HomeController::class, 'Events'])->name('Events');
Route::get('/{lang?}/events', [HomeController::class, 'EventsPageByLang'])->name('EventsPageByLang');
//Route::get('/videos', [HomeController::class, 'videos'])->name('Videos');
Route::get('/fatwes', [HomeController::class, 'Fatwes'])->name('Fatwes');
Route::get('/{lang?}/fatwes', [HomeController::class, 'FatwesPageByLang'])->name('FatwesPageByLang');
Route::get('/achievements', [HomeController::class, 'Achievements'])->name('Achievements');
Route::get('/{lang?}/achievements', [HomeController::class, 'AchievementsPageByLang'])->name('AchievementsPageByLang');

// ..if page by name ( ex: www.site.com/about )
Route::get('/topic/{id}', [HomeController::class, 'topic'])->name('FrontendPage');
// ..if page by user id ( ex: www.site.com/user )
Route::get('/user/{id}', [HomeController::class, 'userTopics'])->name('FrontendUserTopics');
Route::get('/{lang?}/user/{id}', [HomeController::class, 'userTopicsByLang'])->name('FrontendUserTopicsByLang');
// ../search
Route::get('/search', [HomeController::class, 'searchTopics'])->name('searchTopics');

// ..Topics url  ( ex: www.site.com/news/topic/32 )
Route::get('/{section}/topic/{id}', [HomeController::class, 'topic'])->name('FrontendTopic');
Route::get('/{lang?}/{section}/topic/{id}', [HomeController::class, 'topicByLang'])->name('FrontendTopicByLang');

// ..Sub category url for Section  ( ex: www.site.com/products/2 )
Route::get('/{section}/{cat}', [HomeController::class, 'topics'])->name('FrontendTopicsByCat');
Route::get('/{lang?}/{section}/{cat}', [HomeController::class, 'topicsByLang'])->name('FrontendTopicsByCatWithLang');

// ..Section url by name  ( ex: www.site.com/news )
Route::get('/{section}', [HomeController::class, 'topics'])->name('FrontendTopics');
Route::get('/{lang?}/{section}', [HomeController::class, 'topicsByLang'])->name('FrontendTopicsByLang');

// ..SEO url  ( ex: www.site.com/title-here )
Route::get('/{seo_url_slug}', [HomeController::class, 'SEO'])->name('FrontendSEO');
Route::get('/{lang?}/{seo_url_slug}', [HomeController::class, 'SEOByLang'])->name('FrontendSEOByLang');

// ..if page by name and language( ex: www.site.com/ar/about )
Route::get('/{lang?}/topic/{id}', [HomeController::class, 'topicByLang'])->name('FrontendPageByLang');
// .. End of Frontend Route
Route::get('website-menu/status/{id}', 'WebsiteMenuController@updateStatus')->name('website-menu.status');
 Route::resource('menu', 'MenuController');
  Route::resource('website-menu', 'WebsiteMenuController');

 Route::post('website-menu/post/item', 'WebsiteMenuController@postIndex')->name('website-menu.store.item');


 
Route::post('createorder', array('as' => 'paypal.createorder','uses' => 'PayPalController@postPaymentWithpaypal'));

