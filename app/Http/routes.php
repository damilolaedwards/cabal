<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*
Login page (home)


*/

Route::get('refresh-csrf', function(){
    return csrf_token();
});


Route::post('forum/{postId}/post/like', [
	'uses'=>'\App\Http\Controllers\CampusPostController@Like',
	'as'=>'campuspost.like',
	'middleware' => ['auth'],
	]);

	
	Route::get('forum/{postId}/post/report', [
	'uses'=>'\App\Http\Controllers\CampusPostController@getReport',
	'as'=>'campuspost.report',
	'middleware' => ['auth']
	]);

	Route::post('forum/{postId}/post/report', [
	'uses'=>'\App\Http\Controllers\CampusPostController@postReport',
	'as'=>'campuspost.report',
	'middleware' => ['auth']
	]);


/*
Authentication
*/
	Route::get('/signup', [
	'uses'=>'\App\Http\Controllers\AuthController@getFirstSignUp',
	'as'=>'Auth.firstsignup',
	'middleware' => ['guest'],
	]);

	Route::post('/signup', [
	'uses'=>'\App\Http\Controllers\AuthController@postFirstSignUp',
	'as'=>'Auth.firstsignup',
	'middleware' => ['guest'],
	]);

	Route::get('/login', [
	'uses'=>'\App\Http\Controllers\AuthController@getLogin',
	'as'=>'Auth.login',
	'middleware' => ['guest'],
	]);

	Route::post('/login', [	
	'uses'=>'\App\Http\Controllers\AuthController@postLogin',
	'as'=>'Auth.login',
	'middleware' => ['guest'],
	]);

	Route::get('password/email', [
	'uses'=>'\App\Http\Controllers\ResetPasswordController@getEmail',
	'as'=>'password.reset',
	'middleware' => ['guest'],
	]);


	Route::post('password/email', [
	'uses'=>'\App\Http\Controllers\ResetPasswordController@postEmail',
	'as'=>'password.reset',
	'middleware' => ['guest'],
	]);

	Route::get('password/reset/{token}', [
	'uses'=>'\App\Http\Controllers\ResetPasswordController@getReset',
	'as'=>'resetlink',
	'middleware' => ['guest'],
	]);

	Route::post('password/reset/{token}', [
	'uses'=>'\App\Http\Controllers\ResetPasswordController@postReset',
	'as'=>'resetlink',
	'middleware' => ['guest'],
	]);

	

	Route::get('/register', [
	'uses'=>'\App\Http\Controllers\AuthController@getRegister',
	'as'=>'register',
	'middleware' => ['guest'],
	]);

	Route::post('/register', [
	'uses'=>'\App\Http\Controllers\AuthController@postRegister',
	'as'=>'register',
	'middleware' => ['guest'],
	]);

	Route::get('/', [
	'uses'=>'\App\Http\Controllers\HomeController@getHome',
	'as'=>'homepage',
	
	]);

	Route::get('/logout', [
	'uses'=>'\App\Http\Controllers\AuthController@getLogOut',
	'as'=>'logout',
	'middleware' => ['auth'],
	]);

	Route::get('/disclaimer', [
	'uses'=>'\App\Http\Controllers\HomeController@getDisclaimer',
	'as'=>'disclaimer'
	
	]);

	Route::get('/rules&regulations', [
	'uses'=>'\App\Http\Controllers\HomeController@getRules',
	'as'=>'rules',
	'middleware' => ['auth'],
	]);

	Route::get('/contact', [
	'uses'=>'\App\Http\Controllers\HomeController@getContact',
	'as'=>'contact'
	]);

	Route::post('/contact', [
	'uses'=>'\App\Http\Controllers\HomeController@postContact',
	'as'=>'contact'
	
	]);

	Route::get('/welcome', [
	'uses'=>'\App\Http\Controllers\HomeController@getWelcome',
	'as'=>'welcome',
	'middleware' => ['auth'],
	]);


/*
Search
*/	

	Route::get('/search', [
	'uses'=>'\App\Http\Controllers\SearchController@getResults',
	'as'=>'search'
	]);

/*
Profile
*/
	Route::get('/profile/edit/', [
	'uses'=>'\App\Http\Controllers\ProfileController@getEdit',
	'as'=>'editprof',
	'middleware' => ['auth'],
	]);

	Route::post('/profile/edit/', [
	'uses'=>'\App\Http\Controllers\ProfileController@postEdit',
	'as'=>'editprofile',
	'middleware' => ['auth'],
	]);
	
	Route::get('/user/{username}', [
	'uses'=>'\App\Http\Controllers\ProfileController@getProfile',
	'as'=>'profile'
	]);

	Route::get('/user/{username}/ban', [
	'uses'=>'\App\Http\Controllers\ProfileController@banUser',
	'as'=>'user.ban',
	'middleware' => ['auth'],
	]);

	Route::get('/user/{username}/unban', [
	'uses'=>'\App\Http\Controllers\ProfileController@unbanUser',
	'as'=>'user.unban',
	'middleware' => ['auth'],
	]);


	/*
	Notification
*/
	Route::get('/notification', [
	'uses'=>'\App\Http\Controllers\FriendController@getIndex',
	'as'=>'notification',
	'middleware' => ['auth'],
	]);

	/*
Friends
*/

	Route::get('/friends/add/{username}', [
	'uses'=>'\App\Http\Controllers\FriendController@getAdd',
	'as'=>'friend.add',
	'middleware' => ['auth'],
	]);

	Route::get('/friends/accept/{username}', [
	'uses'=>'\App\Http\Controllers\FriendController@getAccept',
	'as'=>'friend.accept',
	'middleware' => ['auth'],
	]);

	Route::get('/friends/ignore/{username}', [
	'uses'=>'\App\Http\Controllers\FriendController@getIgnore',
	'as'=>'friend.ignore',
	'middleware' => ['auth'],
	]);

	Route::post('/friends/delete/{username}', [
	'uses'=>'\App\Http\Controllers\FriendController@postDelete',
	'as'=>'friend.delete',
	'middleware' => ['auth'],
	]);

	/*
Messages
*/
	Route::get('/messages', [
	'uses'=>'\App\Http\Controllers\MessageController@getMessages',
	'as'=>'messages',
	'middleware' => ['auth'],
	]);
	

	Route::get('/messages/create/{username}', [
	'uses'=>'\App\Http\Controllers\MessageController@getCreateMessage',
	'as'=>'message.create',
	'middleware' => ['auth'],
	]);

	Route::post('/messages/create/{username}', [
	'uses'=>'\App\Http\Controllers\MessageController@createMessage',
	'as'=>'message.create',
	'middleware' => ['auth'],
	]);
	
	Route::get('/messages/sentmessages', [
	'uses'=>'\App\Http\Controllers\MessageController@getSentMessages',
	'as'=>'messages.sent',
	'middleware' => ['auth'],
	]);

	Route::get('/messages/{messageId}/delete', [
	'uses'=>'\App\Http\Controllers\MessageController@deleteMessage',
	'as'=>'message.delete',
	'middleware' => ['auth'],
	]);

	Route::get('messages/sentmessages/{messageId}/delete', [
	'uses'=>'\App\Http\Controllers\MessageController@deleteSentMessage',
	'as'=>'message.sent.delete',
	'middleware' => ['auth'],
	]);
/*
Marketplace
*/

	Route::get('/advert', [
	'uses'=>'\App\Http\Controllers\HomeController@getAdvertTab',
	'as'=>'advert.index'
	
	]);

	Route::get('/advert/{advertId}/{slug}/edit', [
	'uses'=>'\App\Http\Controllers\AdvertController@getEditAdvert',
	'as'=>'advert.edit',
	'middleware' => ['auth'],
	]);

	Route::post('/advert/{advertId}/{slug}/edit', [
	'uses'=>'\App\Http\Controllers\AdvertController@postEditAdvert',
	'as'=>'advert.edit',
	'middleware' => ['auth'],
	]);

	Route::get('/advert/{advertId}/{slug}/delete', [
	'uses'=>'\App\Http\Controllers\AdvertController@deleteAdvert',
	'as'=>'advert.delete',
	'middleware' => ['auth'],
	]);

	Route::get('/advert/{advertId}/{slug}/image1/delete', [
	'uses'=>'\App\Http\Controllers\AdvertController@deleteFirstImage',
	'as'=>'advert.image1.delete',
	'middleware' => ['auth'],
	]);

	Route::get('/advert/{advertId}/{slug}/image2/delete', [
	'uses'=>'\App\Http\Controllers\AdvertController@deleteSecondImage',
	'as'=>'advert.image2.delete',
	'middleware' => ['auth'],
	]);

	Route::get('/advert/{advertId}/{slug}/image3/delete', [
	'uses'=>'\App\Http\Controllers\AdvertController@deleteThirdImage',
	'as'=>'advert.image3.delete',
	'middleware' => ['auth'],
	]);

	Route::get('/advert/{advertId}/{slug}/file/delete', [
	'uses'=>'\App\Http\Controllers\AdvertController@deleteFile',
	'as'=>'advert.file.delete',
	'middleware' => ['auth'],
	]);

	Route::post('/marketplace/{advertId}/like', [
	'uses'=>'\App\Http\Controllers\AdvertController@Like',
	'as'=>'advert.like',
	'middleware' => ['auth'],
	]);

	Route::get('/marketplace/{advertId}/{slug}/report', [
	'uses'=>'\App\Http\Controllers\AdvertController@getReport',
	'as'=>'advert.report',
	
	]);

	Route::post('/marketplace/{advertId}/{slug}/report', [
	'uses'=>'\App\Http\Controllers\AdvertController@postReport',
	'as'=>'advert.report'
	]);
	
	Route::get('/marketplace/{advertId}/{slug}', [
	'uses'=>'\App\Http\Controllers\AdvertController@getMarketplace',
	'as'=>'marketplace.view'
	]);

	Route::get('/marketplace/create', [
	'uses'=>'\App\Http\Controllers\AdvertController@getAdvertForm',
	'as'=>'marketplace.post',
	'middleware' => ['auth'],
	]);


	Route::post('/marketplace/create', [
	'uses'=>'\App\Http\Controllers\AdvertController@postAdvertForm',
	'as'=>'marketplace.post',
	'middleware' => ['auth'],
	]);

	

/*
Events
*/
	Route::get('/event', [
	'uses'=>'\App\Http\Controllers\HomeController@getEventTab',
	'as'=>'event.index'
	
	]);

	Route::get('/event/{eventId}/{slug}/edit', [
	'uses'=>'\App\Http\Controllers\EventController@getEditEvent',
	'as'=>'event.edit',
	'middleware' => ['auth'],
	]);

	Route::post('/event/{eventId}/{slug}/edit', [
	'uses'=>'\App\Http\Controllers\EventController@postEditEvent',
	'as'=>'event.edit',
	'middleware' => ['auth'],
	]);

	Route::get('/event/{eventId}/{slug}/image1/delete', [
	'uses'=>'\App\Http\Controllers\EventController@deleteFirstImage',
	'as'=>'event.image1.delete',
	'middleware' => ['auth'],
	]);

	Route::get('/event/{eventId}/{slug}/image2/delete', [
	'uses'=>'\App\Http\Controllers\EventController@deleteSecondImage',
	'as'=>'event.image2.delete',
	'middleware' => ['auth'],
	]);

	Route::get('/event/{eventId}/{slug}/image3/delete', [
	'uses'=>'\App\Http\Controllers\EventController@deleteThirdImage',
	'as'=>'event.image3.delete',
	'middleware' => ['auth'],
	]);

	Route::get('/event/{eventId}/{slug}/file/delete', [
	'uses'=>'\App\Http\Controllers\EventController@deleteFile',
	'as'=>'event.file.delete',
	'middleware' => ['auth'],
	]);

	Route::get('/event/{eventId}/{slug}/delete', [
	'uses'=>'\App\Http\Controllers\EventController@deleteEvent',
	'as'=>'event.delete',
	'middleware' => ['auth'],
	]);

	Route::post('/event/{eventId}/going', [
	'uses'=>'\App\Http\Controllers\EventController@Going',
	'as'=>'event.going',
	'middleware' => ['auth'],
	]);

	Route::post('/event/{eventId}/like', [
	'uses'=>'\App\Http\Controllers\EventController@Like',
	'as'=>'event.like',
	'middleware' => ['auth'],
	]);

	Route::get('/event/{eventId}/{slug}/report', [
	'uses'=>'\App\Http\Controllers\EventController@getReport',
	'as'=>'event.report'
	]);

	Route::post('/event/{eventId}/{slug}/report', [
	'uses'=>'\App\Http\Controllers\EventController@postReport',
	'as'=>'event.report'
	]);

	Route::get('/event/{id}/{slug}', [
	'uses'=>'\App\Http\Controllers\EventController@getEvent',
	'as'=>'event.view'
	]);

	Route::get('/event/create', [
	'uses'=>'\App\Http\Controllers\EventController@getEventForm',
	'as'=>'event.post',
	'middleware' => ['auth'],
	]);

	Route::post('/event/create', [
	'uses'=>'\App\Http\Controllers\EventController@postEventForm',
	'as'=>'event.post',
	'middleware' => ['auth'],
	]);

	
	/*
Campus forum
*/	
	

	Route::post('forum/{topicId}/like', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@Like',
	'as'=>'campustopic.like',
	'middleware' => ['auth'],
	]);	

	Route::get('forum/{topicId}/delete', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@deleteTopic',
	'as'=>'campustopic.delete',
	'middleware' => ['auth'],
	]);

	Route::get('forum/{topicId}/{slug}/report', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@getReport',
	'as'=>'campustopic.report'
	]);	

	Route::post('forum/{topicId}/{slug}/report', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@postReport',
	'as'=>'campustopic.report'
	]);	

	

	Route::get('forum/{topicId}/{topicSlug}/{postId}/post/image1/delete', [
	'uses'=>'\App\Http\Controllers\CampusPostController@deleteFirstImage',
	'as'=>'campuspost.image1.delete',
	'middleware' => ['auth'],
	]);

	Route::get('forum/{topicId}/{topicSlug}/{postId}/post/image2/delete', [
	'uses'=>'\App\Http\Controllers\CampusPostController@deleteSecondImage',
	'as'=>'campuspost.image2.delete',
	'middleware' => ['auth'],
	]);

	Route::get('forum/{topicId}/{topicSlug}/{postId}/post/image3/delete', [
	'uses'=>'\App\Http\Controllers\CampusPostController@deleteThirdImage',
	'as'=>'campuspost.image3.delete',
	'middleware' => ['auth'],
	]);

	Route::get('forum/{topicId}/{topicSlug}/{postId}/post/file/delete', [
	'uses'=>'\App\Http\Controllers\CampusPostController@deleteFile',
	'as'=>'campuspost.file.delete',
	'middleware' => ['auth'],
	]);

	Route::get('forum/{topicId}/{topicSlug}/image1/delete', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@deleteFirstImage',
	'as'=>'campustopic.image1.delete',
	'middleware' => ['auth'],
	]);

	Route::get('forum/{topicId}/{topicSlug}/image2/delete', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@deleteSecondImage',
	'as'=>'campustopic.image2.delete',
	'middleware' => ['auth'],
	]);

	Route::get('forum/{topicId}/{topicSlug}/image3/delete', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@deleteThirdImage',
	'as'=>'campustopic.image3.delete',
	'middleware' => ['auth'],
	]);

	Route::get('forum/{topicId}/{topicSlug}/file/delete', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@deleteFile',
	'as'=>'campustopic.file.delete',
	'middleware' => ['auth'],
	]);

	Route::get('forum/{topicId}/{topicSlug}/{postId}/post/modify', [
	'uses'=>'\App\Http\Controllers\CampusPostController@getUpdatePost',
	'as'=>'campuspost.update',
	'middleware' => ['auth'],
	]);

	Route::post('forum/{topicId}/{topicSlug}/{postId}/post/modify', [
	'uses'=>'\App\Http\Controllers\CampusPostController@postUpdatePost',
	'as'=>'campuspost.update',
	'middleware' => ['auth'],
	]);

	Route::post('forum/{topicId}/{topicSlug}/reply', [
	'uses'=>'\App\Http\Controllers\CampusPostController@postReply',
	'as'=>'campustopic.reply',
	'middleware' => ['auth'],
	]);

	Route::post('forum/{topicId}/{topicSlug}/closethread', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@closeThread',
	'as'=>'campustopic.closethread',
	'middleware' => ['auth'],
	]);

	Route::post('forum/{topicId}/{topicSlug}/openthread', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@openThread',
	'as'=>'campustopic.openthread',
	'middleware' => ['auth'],
	]);

	Route::Get('forum/{topicId}/{topicSlug}/modify', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@getUpdateTopic',
	'as'=>'campustopic.update',
	'middleware' => ['auth'],
	]);

	Route::post('forum/{topicId}/{topicSlug}/modify', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@postUpdateTopic',
	'as'=>'campustopic.update',
	'middleware' => ['auth'],
	]);

	

	

    Route::get('/forum/create', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@createCampusTopic',
	'as'=>'campustopic.create',
	'middleware' => ['auth'],
	]);

    Route::post('/forum/create', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@postCampusTopic',
	'as'=>'campustopic.create',
	'middleware' => ['auth'],
	]);

    Route::get('/forum/{id}/{slug}', [
	'uses'=>'\App\Http\Controllers\CampusTopicController@viewCampusTopic',
	'as'=>'campustopic.view'
	
	]);

	Route::post('forum/{topicId}/{slug}/reply', [
	'uses'=>'\App\Http\Controllers\CampusPostController@postReply',
	'as'=>'campustopic.reply',
	'middleware' => ['auth'],
	]);

	

	/*
General forum
*/


	Route::post('/{category}/{topicId}/{postId}/post/like', [
	'uses'=>'\App\Http\Controllers\GeneralPostController@Like',
	'as'=>'generalpost.like',
	'middleware' => ['auth'],
	]);

	

	Route::get('/{category}/{topicId}/{slug}/{postId}/post/report', [
	'uses'=>'\App\Http\Controllers\GeneralPostController@getReport',
	'as'=>'generalpost.report'
	
	]);

	Route::post('/{category}/{topicId}/{slug}/{postId}/post/report', [
	'uses'=>'\App\Http\Controllers\GeneralPostController@postReport',
	'as'=>'generalpost.report'
	]);

	Route::get('{category}/{topicId}/{slug}/{postId}/post/image1/delete', [
	'uses'=>'\App\Http\Controllers\GeneralPostController@deleteFirstImage',
	'as'=>'generalpost.image1.delete',
	'middleware' => ['auth'],
	]);

	Route::get('{category}/{topicId}/{slug}/{postId}/post/image2/delete', [
	'uses'=>'\App\Http\Controllers\GeneralPostController@deleteSecondImage',
	'as'=>'generalpost.image2.delete',
	'middleware' => ['auth'],
	]);

	Route::get('{category}/{topicId}/{slug}/{postId}/post/image3/delete', [
	'uses'=>'\App\Http\Controllers\GeneralPostController@deleteThirdImage',
	'as'=>'generalpost.image3.delete',
	'middleware' => ['auth'],
	]);

	Route::get('{category}/{topicId}/{slug}/{postId}/post/file/delete', [
	'uses'=>'\App\Http\Controllers\GeneralPostController@deleteFile',
	'as'=>'generalpost.file.delete',
	'middleware' => ['auth'],
	]);

	
	Route::post('/{category}/{topicId}/like', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@Like',
	'as'=>'generaltopic.like',
	'middleware' => ['auth'],
	]);

	Route::post('/{category}/{topicId}/{slug}/closethread', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@closeThread',
	'as'=>'generaltopic.closethread',
	'middleware' => ['auth'],
	]);

	Route::post('/{category}/{topicId}/{slug}/openthread', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@openThread',
	'as'=>'generaltopic.openthread',
	'middleware' => ['auth'],
	]);

	Route::get('/{category}/{topicId}/{slug}/report', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@getReport',
	'as'=>'generaltopic.report'
	]);

	Route::post('/{category}/{topicId}/{slug}/report', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@postReport',
	'as'=>'generaltopic.report'
	]);

	Route::post('/{category}/{id}/{slug}/reply', [
	'uses'=>'\App\Http\Controllers\GeneralPostController@generalPostReply',
	'as'=>'generaltopic.reply',
	'middleware' => ['auth'],
	]);

	Route::get('/{category}/{topicId}/{slug}/{postId}/post/modify', [
	'uses'=>'\App\Http\Controllers\GeneralPostController@getGeneralPostUpdate',
	'as'=>'generalpost.update',
	'middleware' => ['auth'],
	]);

	Route::post('/{category}/{topicId}/{slug}/{postId}/post/modify', [
	'uses'=>'\App\Http\Controllers\GeneralPostController@postGeneralPostUpdate',
	'as'=>'generalpost.update',
	'middleware' => ['auth'],
	]);

	Route::get('{category}/{topicId}/{slug}/image1/delete', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@deleteFirstImage',
	'as'=>'generalpost.image1.delete',
	'middleware' => ['auth'],
	]);

	Route::get('{category}/{topicId}/{slug}/image2/delete', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@deleteSecondImage',
	'as'=>'generalpost.image2.delete',
	'middleware' => ['auth'],
	]);

	Route::get('{category}/{topicId}/{slug}/image3/delete', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@deleteThirdImage',
	'as'=>'generalpost.image3.delete',
	'middleware' => ['auth'],
	]);

	Route::get('{category}/{topicId}/{slug}/file/delete', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@deleteFile',
	'as'=>'generalpost.file.delete',
	'middleware' => ['auth'],
	]);

	Route::get('/{category}/{topicId}/{slug}/modify', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@getGeneralTopicUpdate',
	'as'=>'generaltopic.update',
	'middleware' => ['auth'],
	]);

	Route::post('/{category}/{topicId}/{slug}/modify', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@postGeneralTopicUpdate',
	'as'=>'generaltopic.update',
	'middleware' => ['auth'],
	]);

	Route::get('/{category}', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@getCategory',
	'as'=>'category',
	'middleware' => ['auth'],
	]);
	 Route::post('/{category}/create', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@postGeneralTopic',
	'as'=>'generaltopic.create',
	'middleware' => ['auth'],
	]);

    Route::get('/{category}/{id}/{slug}', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@viewGeneralTopic',
	'as'=>'generaltopic.view',
	'middleware' => ['auth'],
	]);

	

	Route::get('/{category}/create', [
	'uses'=>'\App\Http\Controllers\GeneralTopicController@createGeneralTopic',
	'as'=>'generaltopic.create',
	'middleware' => ['auth'],
	]);

	
	


   