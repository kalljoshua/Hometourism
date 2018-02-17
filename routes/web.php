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

//users routes
//index routes
Route::get('/', 'User\HomeController@index')->name('home');

//Routes for loading more subcategories
Route::get('/load-more-sub-categories', 'User\HomeController@loadMoreSubCategories');
//End of routes for loading more subcategories

//Route for loading more categories
Route::get('/load-more-categories', 'User\HomeController@loadMoreCategories');
//End of route for loading more categories

Route::get('contact-us', 'User\HomeController@contact')->name('user.contact');
Route::get('about-us', 'User\HomeController@about')->name('user.about');
Route::get('terms-and-conditions', 'User\HomeController@termsofUse')->name('user.termsofUse');
Route::get('Privacy', 'User\HomeController@privacy')->name('user.privacy');
Route::get('Personal-Safety', 'User\HomeController@personalsafety')->name('user.personalsafety');
Route::get('Disclaimer', 'User\HomeController@disclaimer')->name('user.disclaimer');
Route::get('faq', 'User\HomeController@faq')->name('user.faq');
Route::get('/user/packages', 'User\PackageSubsriptionController@showPackages')->name('user.package');

//search routes
Route::get('/search', 'User\SearchController@search')->name('users.search');

//review routes
Route::post('review', 'User\ReviewsController@serviceReview')->name('user.review.submit');

//request routes
Route::post('request', 'User\ServiceRequestsController@submitRequest')->name('submit.request');

//authentication routes
Route::post('/user/registration', 'User\RegisterController@registerUser')->name('user.submit');
Route::post('/login', 'User\LoginController@login')->name('user.login.submit');
Route::get('/user/logout', 'User\LoginController@logout')->name('user.logout');
Route::get('//register', 'User\RegisterController@userRegister')->name('user.register');
Route::get('/login', 'User\LoginController@userLogin')->name('user.login');
Route::get('/user-account-details', 'User\ServiceController@displayProfile')->name('user.profile.display');

//User blog routes
Route::get('blog/posts', 'User\BlogPostController@getAllPosts')->name('user.blog.posts');
Route::get('blog/{slug}', 'User\BlogPostController@showPost')->name('user.show.posts');
Route::post('comment', 'User\BlogPostController@postComment')->name('user.comment.submit');

//service routes
Route::get('/host-homes', 'User\ServiceController@getAll')->name('services.all');
Route::get('/homes/{id}', 'User\CompanyController@getCategory')->name('services.category');
Route::get('/services/{id}/details', 'User\HomeController@adsDetails')->name('services.details');


Route::group(['middleware' => 'user'], function () {
//user account
    //experience routes
    Route::post('experience', 'User\UserExperienceController@submitExperience')->name('submit.experience');
    Route::get('/user-account', 'User\UserProfileController@showUserProfile')->name('user.profile');
    Route::get('/user-profile', 'User\UserProfileController@editUserProfile')->name('user.profile.edit');
    Route::get('/user/{userId}/myads', 'User\UserProfileController@myAds')->name('user.myads');
    Route::get('/user/{userId}/favourites', 'User\FavouritesController@myFavourites')->name('user.favourites');
    Route::get('/user/{userId}/mysearch', 'User\UserProfileController@mySearch')->name('user.search');
    Route::get('/user/{userId}/archived', 'User\UserProfileController@showArchived')->name('user.archived');
    Route::get('/user/{userId}/pending', 'User\UserProfileController@pendingAds')->name('user.pending');
    Route::post('/user_data', 'User\UserProfileController@addUserProfileData')->name('user.profile_data');
    Route::post('/user/edit', 'User\UserProfileController@userEditSubmit')->name('user.edit.submit');
    Route::post('/user/update', 'User\UserProfileController@userUpdatePassword')->name('user.update.submit');
    Route::post('/user/select-package', 'User\PackageSubsriptionController@addPackage')->name('user.select.package.submit');
    Route::post('/user/account-close', 'User\UserProfileController@deleteAccount')->name('account.close');

//Full Booking
    Route::get('/user/fully-booked-homes', 'User\UserFullyBookController@suspendCompany')->name('book.home');
    Route::get('/user/get-fully-booked-homes', 'User\UserFullyBookController@getSuspendedCompanies')->name('booked.homes');
    Route::get('/user/home/{id}/unbook', 'User\UserFullyBookController@unsuspendCompany')->name('user.home.unbook');

//company Routes
    Route::get('/user/company', 'User\CompanyController@newCompany')->name('company.create');
    Route::post('/user/company', 'User\CompanyController@postCompany')->name('company.submit');
    Route::get('/home/{slug}/edit', 'User\CompanyController@companyEdit')->name('company.edit');
    Route::post('/home/edit', 'User\CompanyController@submitEdit')->name('company.edit.submit');

    //service routes
    Route::get('/user/select-package', 'User\UserCreateServiceController@showSelectPackage')->name('user.select.package');
    Route::get('/user/add-new-service', 'User\UserCreateServiceController@showNewServiceForm')->name('user.create.service');
    Route::post('/user/submit-new-service', 'User\UserCreateServiceController@createService')->name('user.create.service.submit');
    Route::get('/user/add-payment', 'User\UserCreateServiceController@showPaymentForm')->name('user.payment.form');
    Route::post('/user/add-payment', 'User\UserCreateServiceController@addPayment')->name('user.payment.submit');
    Route::get('/user/{id}/edit-service', 'User\UserCreateServiceController@editServiceForm')->name('user.edit.service');
    Route::post('/user/edit-service', 'User\UserCreateServiceController@submitChanges')->name('user.edit.service.submit');
    Route::get('/user/{id}/delete-service', 'User\UserCreateServiceController@deleteService')->name('user.delete.service');


    Route::get('/orders/user', 'SubmissionController@orders')->name('delete.image');

});

//company routes
Route::get('/{slug}', 'User\CompanyController@companyDetails')->name('company.details');
Route::get('/popular-destination/{slug}', 'User\HomeController@destinationDetails')->name('destination.details');
Route::get('/companies/{id}/category', 'User\CompanyController@getCategory')->name('company.category');


//newsletter routes
Route::post('/subscribe-to-newsletter', 'User\NewsletterController@subscribe')->name('subscribe.to.newsletter');


//Socialite logins
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//ajax routes
Route::get('/submission/getSubCategories/{id}', 'User\CompanyController@getSubCategories')->name('sub_categories');
Route::get('loadsubcat/{id}', 'SubmissionController@secondMethod');
use Illuminate\Http\Request;
Route::get('/form/tryout', function (Request $request) {

    return view('user.image');

});

Route::post('/form/tryout-submit', function (Request $request) {

    dd($request->image);

});

//multiple file upload with dropzone routes
Route::get('/multi-upload', 'User\UserCreateServiceController@multi_upload_form')->name('post.upload.form');
Route::post('/multi-pload', 'User\UserCreateServiceController@post_upload')->name('post.upload');
Route::post('/multi-upld', 'User\UserCreateServiceController@upld')->name('post.upld');


/*
* Begining of Admin routes
*/
//login routes
Route::get('/admin/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/submit', 'Admin\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');

//dashboard routes
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', 'Admin\AdminDashboard@index')->name('admin.dashboard');
    Route::get('/admin/users', 'Admin\AdminUsersController@getAllUsers')->name('admin.user.list');
    Route::get('/admin/users/{id}', 'Admin\AdminUsersController@showUser')->name('admin.user');
    Route::get('/admin/users/{id}/edit', 'Admin\AdminUsersController@editUser')->name('admin.user.edit.form');
    Route::post('/admin/users/save', 'Admin\AdminUsersController@save')->name('admin.user.edit.submit');
    Route::get('/admin/users/{id}/delete', 'Admin\AdminUsersController@delete')->name('admin.user.delete');
    Route::post('/admin/users/delete', 'Admin\AdminUsersController@destroy')->name('admin.user.destroy');

    //servises routes
    Route::get('/admin/services', 'Admin\AdminServicesController@showAll')->name('admin.all.services');
    Route::get('/admin/suspended/services', 'Admin\AdminServicesController@suspended')->name('admin.suspended.services');
    Route::get('/admin/pending/services', 'Admin\AdminServicesController@pending')->name('admin.pending.services');
    Route::get('/admin/service/{id}/approve', 'Admin\AdminServicesController@approveService')->name('admin.service.approve');
    Route::get('/admin/service/{id}', 'Admin\AdminServicesController@getService')->name('admin.service.show');
    Route::get('/admin/service/{id}/delete', 'Admin\AdminServicesController@delete')->name('admin.service.delete');
    Route::post('/admin/service/delete', 'Admin\AdminServicesController@destroy')->name('admin.service.destroy');

    //Companies routes
    Route::get('/admin/companies', 'Admin\AdminCompanyController@showAll')->name('admin.all.companies');
    Route::get('/admin/pending/companies', 'Admin\AdminCompanyController@pending')->name('admin.pending.companies');
    Route::get('/admin/company/{id}', 'Admin\AdminCompanyController@getService')->name('admin.company.show');
    Route::get('/admin/company/{id}/delete', 'Admin\AdminCompanyController@delete')->name('admin.company.delete');
    Route::get('/admin/company/{id}/approve', 'Admin\AdminCompanyController@approveCompany')->name('admin.company.approve');
    Route::get('/admin/suspended/companies', 'Admin\AdminCompanyController@suspended')->name('admin.suspended.companies');
    /*
     Route::post('/admin/service/delete', 'Admin\AdminServicesController@destroy')->name('admin.service.destroy');*/

    //destinations routes admin
    Route::get('/admin/all-destinations', 'Admin\PopularDestinationsController@allDestinations')->name('admin.destination.listings');
    Route::get('/admin/new-destination', 'Admin\PopularDestinationsController@newDestination')->name('admin.create.destination.form');
    Route::post('/admin/new-destination', 'Admin\PopularDestinationsController@submitDestination')->name('admin.submit.destination');

    //requests routes admin
    Route::get('/admin/all-requests', 'Admin\ServiceRequestsController@serviceRequests')->name('admin.service.requests');
    Route::get('/admin/all-orders', 'Admin\ServiceRequestsController@serviceOrders')->name('admin.service.orders');

    //types routes
    Route::get('/admin/types', 'Admin\AdminTypesController@showAll')->name('admin.all.types');
    Route::get('/admin/type/new', 'Admin\AdminTypesController@typeForm')->name('admin.new.type');
    Route::post('/admin/type', 'Admin\AdminTypesController@submitType')->name('admin.new.type.submit');
    Route::get('/admin/type/{id}/edit', 'Admin\AdminTypesController@edit')->name('admin.type.edit');
    Route::post('/admin/type/edit', 'Admin\AdminTypesController@editSubmit')->name('admin.type.edit.submit');
    Route::get('/admin/type/{id}/delete', 'Admin\AdminTypesController@delete')->name('admin.type.delete');
    Route::post('/admin/type/delete', 'Admin\AdminTypesController@destroy')->name('admin.type.destroy');

    //Admin news letter routes
    Route::get('/admin/news-letters', 'Admin\AdminNewsLetterController@createNewsLetter')->name('admin.create.news.letter.form');
    Route::post('/admin/news-letters', 'Admin\AdminNewsLetterController@saveNewsLetter')->name('admin.create.news.letter.submit');
    Route::get('/admin/subscribers', 'Admin\AdminNewsLetterSubscribersController@getSubscribers')->name('admin.subscribers.listings');

    //Admin blog routes
    Route::get('/admin/blog', 'Admin\BlogPostController@createPost')->name('admin.create.post.form');
    Route::post('/admin/blog', 'Admin\BlogPostController@savePost')->name('admin.create.post.submit');
    Route::get('/admin/blog/posts', 'Admin\BlogPostController@getAllPosts')->name('admin.blog.list');
    Route::get('/admin/blog/posts/{id}/edit', 'Admin\BlogPostController@edit')->name('admin.post.edit.form');
    Route::post('/admin/blog/posts/edit', 'Admin\BlogPostController@save')->name('admin.post.edit.submit');
    Route::get('/admin/blog/posts/{id}/delete', 'Admin\BlogPostController@delete')->name('admin.post.delete');
    Route::post('/admin/blog/posts/delete', 'Admin\BlogPostController@destroy')->name('admin.post.destroy');

    //Categories routes
    Route::get('/admin/all-categories', 'Admin\AdminCategoriesController@showAll')->name('admin.all.categories');
    Route::get('/admin/categories', 'Admin\AdminCategoriesController@categoriesForm')->name('admin.new.category');
    Route::post('/admin/categories', 'Admin\AdminCategoriesController@submitCategory')->name('admin.new.category.submit');
    Route::get('/admin/category/{id}/edit', 'Admin\AdminCategoriesController@edit')->name('admin.category.edit');
    Route::post('/admin/category/edit', 'Admin\AdminCategoriesController@editSubmit')->name('admin.category.edit.submit');
    Route::get('/admin/category/{id}/delete', 'Admin\AdminCategoriesController@delete')->name('admin.category.delete');
    Route::post('/admin/category/delete', 'Admin\AdminCategoriesController@destroy')->name('admin.category.destroy');

    //Sub-Categories routes
    Route::get('/admin/all-sub-categories', 'Admin\AdminSubCategoriesController@showAll')->name('admin.all.subcategories');
    Route::get('/admin/sub-categories', 'Admin\AdminSubCategoriesController@subcategoriesForm')->name('admin.new.subcategory');
    Route::post('/admin/sub-categories', 'Admin\AdminSubCategoriesController@submitCategory')->name('admin.new.subcategory.submit');
    Route::get('/admin/sub-category/{id}/edit', 'Admin\AdminSubCategoriesController@edit')->name('admin.subcategory.edit');
    Route::post('/admin/sub-category/edit', 'Admin\AdminSubCategoriesController@editSubmit')->name('admin.subcategory.edit.submit');
    Route::get('/admin/sub-category/{id}/delete', 'Admin\AdminSubCategoriesController@delete')->name('admin.subcategory.delete');
    Route::post('/admin/sub-category/delete', 'Admin\AdminSubCategoriesController@destroy')->name('admin.subcategory.destroy');

    //Suspend service
    Route::get('/admin/suspend-service', 'Admin\AdminSuspendServicesController@suspendService')->name('suspend.service');
    Route::get('/admin/get-suspended-services', 'Admin\AdminSuspendServicesController@getSuspendedServices')->name('suspended.services');
    Route::get('/admin/service/{id}/unsuspend', 'Admin\AdminSuspendServicesController@unsuspendService')->name('admin.service.unsuspend');

    //Feature Service
    Route::get('/admin/feature-service', 'Admin\AdminFeatureServicesController@featureService')->name('feature.service');
    Route::get('/admin/get-featured-services', 'Admin\AdminFeatureServicesController@getFeatured')->name('featured.services');

    //Feature Company
    Route::get('/admin/feature-company', 'Admin\AdminFeatureCompaniesController@featureCompany')->name('feature.company');
    Route::get('/admin/get-featured-companies', 'Admin\AdminFeatureCompaniesController@getFeatured')->name('featured.company');

    //Suspend company
    Route::get('/admin/suspend-company', 'Admin\AdminSuspendCompaniesController@suspendCompany')->name('suspend.company');
    Route::get('/admin/get-suspended-companies', 'Admin\AdminSuspendCompaniesController@getSuspendedCompanies')->name('suspended.companies');
    Route::get('/admin/company/{id}/unsuspend', 'Admin\AdminSuspendCompaniesController@unsuspendCompany')->name('admin.company.unsuspend');

    //Random Company
    Route::get('/admin/random-company', 'Admin\AdminRandomCompaniesController@randomCompany')->name('random.company');
    Route::get('/admin/get-random-companies', 'Admin\AdminRandomCompaniesController@getRandom')->name('random.company');

});
