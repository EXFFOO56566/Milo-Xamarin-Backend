<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home']['get'] = 'home_controller';
$route['about-us']['get'] = 'home_controller/about';
$route['plans']['get'] = 'home_controller/plans';
$route['faq']['get'] = 'home_controller/faq';
$route['contact-us']['get'] = 'home_controller/contact';
$route['terms-and-conditions']['get'] = 'home_controller/terms';
$route['privacy-policy']['get'] = 'home_controller/privacy';
$route['cookies']['get'] = 'home_controller/cookies';
$route['registration-success'] = 'home_controller/registration_success';
$route['forgotton-password'] = 'home_controller/forgotton_password';
$route['reset-password/(:any)'] = 'home_controller/reset_password/$1';
$route['forgotton-password-success']['post'] = 'home_controller/forgotton_password_success';
$route['login-success']['post'] = 'home_controller/login_success';
$route['user-logout']['get'] = 'home_controller/user_logout';
$route['author']['get'] = 'author';
$route['send-verified-link']['post'] = 'author/send_verification_link';
$route['email-verified/(:any)']['get'] = 'author/email_verified/$1';
$route['author/update-profile']['get'] = 'user_controller/update_profile';
$route['author/update-profile-success']['post'] = 'user_controller/update_profile_success';
$route['author/dashboard']['get'] = 'author_dashboard';
$route['author/user-list']['get'] = 'author_dashboard/user_list';
$route['author/add-user']['get'] = 'author_dashboard/add_user';
$route['author/update-user/(:any)']['get'] = 'author_dashboard/update_user/$1';
$route['author/delete-user/(:any)']['get'] = 'author_dashboard/delete_user/$1';
$route['logout']['get'] = 'author/logout';
$route['author/change-password'] = 'author/change_password';

$route['author/meeting-schedule']['get'] = 'calender_controller/meetting_schedule';
$route['author/meeting-create-success']['post'] = 'calender_controller/meeting_create_success';
$route['author/get-event-list']['post'] = 'calender_controller/get_event_list';
$route['author/get-agenda']['post'] = 'calender_controller/get_agenda';
$route['author/get-takeaway']['post'] = 'calender_controller/get_takeaway';
$route['author/takeaway-success']['post'] = 'calender_controller/takeaway_success';
$route['author/get-meetingview/(:any)']['get'] = 'calender_controller/get_meetingview/$1';
$route['author/accept-meeting']['post'] = 'calender_controller/accept_metting_by_user';



/*............................. new......................... */

$route['author/change-status/(:any)/(:any)']['get'] = 'author_dashboard/changeStatus/$1/$2';
$route['author/category-list']['get'] = 'master_controller/category_list';
$route['author/add-category']['get'] = 'master_controller/add_category';
$route['author/update-category/(:num)']['get'] = 'master_controller/update_category/$1';
$route['author/delete-category']['get'] = 'master_controller/category_list';
$route['author/sub-category-list']['get'] = 'master_controller/sub_category_list';
$route['author/add-sub-category']['get'] = 'master_controller/add_sub_category';
$route['author/update-sub-category/(:num)']['get'] = 'master_controller/update_sub_category/$1';
$route['author/delete-sub-category/(:any)']['get'] = 'master_controller/delete_sub_category/$1';
$route['author/video-upload']['get'] = 'Post_controller/index';
$route['author/add-post']['get'] = 'Post_controller/add_post';
$route['author/update-video/(:num)']['get'] = 'Post_controller/update_video/$1';
$route['author/delete-video/(:num)']['get'] = 'Post_controller/delete_video/$1';

$route['author/news-list']['get'] = 'Post_controller/news_list';
$route['author/add-news']['get'] = 'Post_controller/add_news';
$route['author/update-news/(:num)']['get'] = 'Post_controller/update_news/$1';
$route['author/delete-news/(:num)']['get'] = 'Post_controller/delete_news/$1';

$route['get-meeting-data'] = 'home_controller/get_meeting_data';

/* For File sharing */

$route['author/file-share'] = 'FileShare_controller/view';
$route['author/add-file'] = 'FileShare_controller/add';
$route['author/file-success'] = 'FileShare_controller/addsuccess';
$route['author/update-file'] = 'FileShare_controller/update';
$route['author/delete-file'] = 'FileShare_controller/delete';

/* End file sharing config */


/* Subscription */

$route['author/subscription'] = 'subscription_controller/view';
$route['author/add-subscription'] = 'subscription_controller/add';
$route['author/add-subscription-success'] = 'subscription_controller/addsuccess';
$route['author/update-subscription/(:num)'] = 'subscription_controller/update/$1';
$route['author/delete-subscription/(:num)'] = 'subscription_controller/delete/$1';
$route['author/active-plan'] = 'subscription_controller/active_plan';
$route['author/active-subscription/(:num)'] = 'subscription_controller/active_subscription/$1';
$route['author/deactive-subscription/(:num)'] = 'subscription_controller/deactive_subscription/$1';

$route['buy-now'] = 'subscription_controller/buy_now';
$route['pay-now/(:any)'] = 'subscription_controller/paynow/$1';


/* End Subscription part */


$route['logout']['get'] = 'author/logout';
$route['author/change-password'] = 'author/change_password';


$route['api/register'] = 'api/register_api/register';
$route['api/register-by-media'] = 'api/register_api/register_by_media';
$route['api/login'] = 'api/register_api/login';
$route['api/send-verification-link'] = 'api/register_api/sendverificationlink';
$route['api/verified-email'] = 'api/register_api/verifiedEmail';
$route['api/verified-mobile-no'] = 'api/register_api/verifiedMobileno';
$route['api/reset-password'] = 'api/register_api/forgotten_password';
$route['api/reset-password'] = 'api/register_api/forgotten_password_success';
$route['api/update-profile'] = 'api/register_api/update_profile';


$route['api/category'] = 'api/service_api/category';
$route['api/video-category'] = 'api/service_api/video_category';
$route['api/news-category'] = 'api/service_api/news_category';
$route['api/news'] = 'api/service_api/news';
$route['api/video'] = 'api/service_api/video';
$route['api/all-news'] = 'api/service_api/all_news';
$route['api/all-video'] = 'api/service_api/all_video';
$route['api/latest-news'] = 'api/service_api/latest_news';
$route['api/latest-video'] = 'api/service_api/latest_video';
$route['api/newsby-id'] = 'api/service_api/newsbyId';
$route['api/videoby-id'] = 'api/service_api/videobyId';
$route['api/cancel-meeting'] = 'api/calender_controller/cancel_meeting';
$route['api/get-takeway/(:any)/(:any)'] = 'api/calender_controller/get_takeway/$1/$2';

$route['api/get-country'] = 'api/register_api/getCity';

$route['api/all-register-data'] = 'api/calender_controller/registered_list';

$route['api/search-user'] = 'api/calender_controller/search_user';
$route['api/user-details'] = 'api/calender_controller/user_details';
$route['api/create-new-meeting'] = 'api/calender_controller/add_meeting';
$route['api/update-meeting'] = 'api/calender_controller/update_meeting';

$route['api/view-profile'] = 'api/register_api/view_profile';

$route['api/join-meeting-bb'] = 'api/Calender_controller/join_meeting_db';

$route['api/get-meeting'] = 'api/calender_controller/getMeetingList';

$route['api/accept-meeting'] = 'api/calender_controller/accept_meeting';
$route['api/reject-meeting'] = 'api/calender_controller/reject_meeting';
$route['api/add-meeting-history'] = 'api/calender_controller/add_meeting_history';
$route['api/get-meeting-history'] = 'api/calender_controller/get_meeting_history';
$route['api/update-takeaway'] = 'api/calender_controller/update_takeaway';
$route['api/share-file'] = 'api/file_controller/share_file';
$route['api/share-list'] = 'api/file_controller/file_list';

$route['my-stripe'] = "StripeController";
$route['stripePost']['post'] = "StripeController/stripePost";
$route['features']['get'] = 'Features_controller/our_features';



$route['author/master-features'] = 'Features_controller/index';
$route['author/master-delete/(:any)'] = 'Features_controller/deletemaster/$1';

$route['author/features'] = 'Features_controller/features';
$route['author/features-delete/(:any)'] = 'Features_controller/deletefeatures/$1';


// For Gallery list

$route['author/gallery'] = 'Gallery_controller/view';
$route['author/add-gallery'] = 'Gallery_controller/add';
$route['author/gallery-success'] = 'Gallery_controller/addsuccess';
$route['author/gallery-update'] = 'Gallery_controller/update';
$route['author/delete-gallery/(:any)'] = 'Gallery_controller/delete/$1';

$route['author/view-photo/(:num)'] = 'Gallery_controller/view_photo/$1';



// For Doc list

$route['author/doc'] = 'Doc_controller/view';
$route['author/add-doc'] = 'Doc_controller/add';
$route['author/doc-success'] = 'Doc_controller/addsuccess';
$route['author/doc-update'] = 'Doc_controller/update';
$route['author/delete-doc/(:any)'] = 'Doc_controller/delete/$1';


// For Appointment List

$route['author/appointment'] = 'Appointment_controller/view';
$route['author/add-appointment'] = 'Appointment_controller/add';
$route['author/appointment-success'] = 'Appointment_controller/addsuccess';
$route['author/appointment-update'] = 'Appointment_controller/update';
$route['author/delete-appointment/(:any)'] = 'Appointment_controller/delete/$1';

// For Occasion List

$route['author/occasion'] = 'Occasion_controller/view';
$route['author/add-occasion'] = 'Occasion_controller/add';
$route['author/occasion-success'] = 'Occasion_controller/addsuccess';
$route['author/occasion-update'] = 'Occasion_controller/update';
$route['author/delete-occasion/(:any)'] = 'Occasion_controller/delete/$1';

// For Reminder list

$route['author/reminder'] = 'Reminder_controller/view';
$route['author/add-reminder'] = 'Reminder_controller/add';
$route['author/reminder-success'] = 'Reminder_controller/addsuccess';
$route['author/reminder-update'] = 'Reminder_controller/update';
$route['author/delete-reminder/(:any)'] = 'Reminder_controller/delete/$1';

// For Todo list

$route['author/todo'] = 'Todo_controller/view';
$route['author/add-todo'] = 'Todo_controller/add';
$route['author/todo-success'] = 'Todo_controller/addsuccess';
$route['author/todo-update'] = 'Todo_controller/update';
$route['author/delete-todo/(:any)'] = 'Todo_controller/delete/$1';
$route['invite-meeting/(:any)'] = 'calender_controller/invite_meeting/$1';