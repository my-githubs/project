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



//注册页面

Route::get('/signup', 'UserController@signup');
Route::post('/signup','UserController@dosignup');
Route::get('/message', 'CommonController@message');
//登录页面
Route::get('/login', 'UserController@login');
Route::post('/login','UserController@dologin');

//前台首页
Route::get('home','HomeController@index');

//前台商品列表
Route::get('/goods/list', 'GoodsController@glist');

//商品详情页

Route::get('/goods/{id}', 'GoodsController@show')->where('id','\d+');

//品牌列表页
Route::get('/pinpai/list','PinpaiController@plist');

//联系客服
Route::get('/touch','TouchController@touch');

//前台
Route::group(['middleware'=>'login'],function(){
	//支付页面
	Route::get('dingdan/pay','PayController@index');

	//购物车
	Route::get('/cart','CartController@index');
	Route::post('/cart','CartController@store');
	Route::get('/cart/delete', 'CartController@delete');

	//订单
	Route::resource('dingdan','DingdanController');
	Route::post('dingdan/confirm','DingdanController@confirm');

	//个人中心
	Route::get('/center', 'UserController@center');
	Route::resource('address', 'AddressController');
	Route::get('/getarea', 'AddressController@getArea');
	Route::get('/lianxi','LianxiController@index');

	//个人信息编辑
	Route::get('/personal','PersonalController@index');
	Route::post('/personal','PersonalController@store');
	Route::get('/personal/houtai','PersonalController@houtai');

	//品牌列表页
	Route::get('/pinpai/list','PinpaiController@plist');

	//我的订单
	Route::get('/order/list','OrderController@list');

	//联系客服
	Route::get('/touch','TouchController@touch');

	//关于我们
	Route::get('/about/list', 'AboutController@alist');

	//支付
	// Route::get('/pro.com/home','HomeController@index');

	//退出
	Route::post('/out','OutController@out');

});
//后台
Route::group(['middleware'=>'Signin'],function(){

	//后台首页
	Route::get('admin','AdminController@index');

	//用户管理
	Route::resource('user','UserController');

	//商品管理
	Route::resource('goods','GoodsController')->except(['show']);

	//订单管理
	Route::resource('order','OrderController');

	//分类管理
	Route::resource('cate','CateController');

	//管理员管理
	Route::resource('/manger','ManagerController');

	//Catelog管理
	Route::resource('/catelog','CatelogController');

	//banner管理
	Route::resource('banners','BannerController');

	//项链管理
	Route::resource('necklace','NecklaceController');

	//相关产品管理
	Route::resource('relate','RelateController');

	//品牌管理
	Route::resource('pinpai','PinpaiController');

	//关于我们
	Route::resource('about','AboutController')->except(['show']);
});
//后台登录
Route::get('/admin/signin','SigninController@signin');
Route::post('/admin/signin','SigninController@dosignin');



