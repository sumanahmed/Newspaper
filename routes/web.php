<?php
/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'NewspaperController@index');
Route::get('/post-details/{id}', 'NewspaperController@postDetails');
Route::get('/post-category/{id}', 'NewspaperController@categoryPost');

//Front End About Content
Route::get('/about-content', 'NewspaperController@aboutContent');
Route::get('/contact-content', 'NewspaperController@contactContent');
Route::post('/send-email', 'NewspaperController@sendEmail');


//user
Route::group(['middleware' => 'UserMiddleware'], function (){
    Route::get('/add-user','UserController@addUser');
    Route::post('/new-user','UserController@saveUser');
    Route::get('/manage-user','UserController@manageUser');
    Route::get('/edit-user/{id}','UserController@editUser');
    Route::post('/update-user','UserController@updateUser');
    Route::get('/delete-user/{id}','UserController@deleteUser');
    Route::get('/change-password/{id}','UserController@changePassword');
    Route::post('/update-password','UserController@updatePassword');
});

//Front End Comment
Route::post('/new-comment', 'CommentController@saveComment');
Route::get('/comments', 'CommentController@manageComment');
Route::get('/show-comment', 'CommentController@showComment');
Route::get('/unapproved-comment/{id}', 'CommentController@unapprovedComment');
Route::get('/approved-comment/{id}', 'CommentController@approvedComment');
Route::get('/view-comment/{id}', 'CommentController@viewComment');
Route::get('/delete-comment/{id}', 'CommentController@deleteComment');


//Login And Registration
Route::get('/login-registration','CustomerController@loginRegsitration');
Route::post('/new-customer','CustomerController@customerRegistration');
Route::post('/customer-login','CustomerController@customerLogin');
Route::get('/customer-logout','CustomerController@customerLogout');



/* Back End */
//Pages
Route::get('/edit-about', 'PagesController@addAboutContent');
Route::post('/update-pages', 'PagesController@updateAboutContent');


//category
Route::group(['middleware'=>'CategoryMiddleware'], function(){

    Route::get('/add-category', 'CategoryController@addCategory');
    Route::post('/new-category', 'CategoryController@saveCategory');
    Route::get('/manage-category', 'CategoryController@manageCategory');
    Route::get('/edit-category/{id}', 'CategoryController@editCategory');
    Route::get('/unpublished-category/{id}', 'CategoryController@unpublishedCategory');
    Route::get('/published-category/{id}', 'CategoryController@publishedCategory');
    Route::get('/view-category/{id}', 'CategoryController@viewCategory');
    Route::post('/update-category', 'CategoryController@updateCategory');
    Route::get('/delete-category/{id}', 'CategoryController@deleteCategory');
});


//Tag manages Code
Route::group(['middleware'=>'TagMiddleware'], function (){
    Route::get('/add-tag','TagController@addTagInfo');
    Route::post('/new-tag','TagController@saveTagInfo');
    Route::get('/manage-tag','TagController@manageTagInfo');
    Route::get('/unpublished-tag/{id}', 'TagController@unpublishedTagInfo');
    Route::get('/published-tag/{id}', 'TagController@publishedTagInfo');
    Route::get('/edit-tag/{id}', 'TagController@editTagInfo');
    Route::post('/update-tag', 'TagController@updateTagInfo');
    Route::get('/delete-tag/{id}', 'TagController@deleteTagInfo');
});


//Post
Route::group(['middleware'=>'PostMiddleware'], function (){
    Route::get('/add-post','PostController@addPostInfo');
    Route::post('/new-post','PostController@savePostInfo');
    Route::get('/manage-post','PostController@managePostInfo');
    Route::get('/unpublished-post/{id}', 'PostController@unpublishedPostInfo');
    Route::get('/published-post/{id}', 'PostController@publishedPostInfo');
    Route::get('/view-post/{id}', 'PostController@viewPostInfo');
    Route::get('/edit-post/{id}', 'PostController@editPostInfo');
    Route::post('/update-post', 'PostController@updatePostInfo');
    Route::get('/delete-post/{id}', 'PostController@deletePostInfo');
});


//Slider
Route::group(['middleware'=>'SliderMiddleware'], function (){
    Route::get('/add-slider', 'SliderController@addNewSlider');
    Route::post('/new-slider', 'SliderController@saveNewSlider');
    Route::get('/manage-slider', 'SliderController@manageSlider');
    Route::get('/unpublished-slider/{id}', 'SliderController@unpublishedSlider');
    Route::get('/published-slider/{id}', 'SliderController@publishedSlider');
    Route::get('/edit-slider/{id}', 'SliderController@editSlider');
    Route::post('/update-slider', 'SliderController@updateSlider');
    Route::get('/delete-slider/{id}', 'SliderController@deleteSlider');

});


//Auth class for login/registration control
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
