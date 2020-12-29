<?php

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



Route::get('/', function () {
    return view('welcome');
});

//Route::get('/myadmin' , function () {
//	return 'Hello World';
//});

Route::get('foo' , function () {
	return 'Hello World';
});

Route::get("hello" , function () {
	return 'hello';
});


Route::get('test13', function(){
	return '111';
});


// Route::get('/', function () {
//    //
//  })->middleware('web');Route::get('/', function () {
//    //
//  })->middleware('web');



//设置不同的路由规则
Route::get('pro/{sid}',function($sid){
	return 'pro--'.$sid;
})->where("sid","[0-9]+");

//通过路由来控制对应的输出
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return $postId.'-'.$commentId;
});




//重新定义一个路由来进行配置
Route::get("a/{x}/b/{y}",function ($x,$y) {
	return 'a:'.$x.'--'.'b:'.$y;
})->where(['x'=>'[0-9]+','y'=>'[0-9]+']);

Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

Route::get('search/{search}' , function($search) {
	return $search;
})->where('search','.*');

//定义一个控制器的名称 -路由和控制器来关联
Route::get('member/p/{sid}',[
	'uses'	=>'MemberController@info',
	'as'	=>'memberinfo',
])->where('sid','[0-9]+'); //验证数字类型

// Route::any('member/{id}','MemberController@info');

Route::match(['post','get'],'multi',function(){
	return 'multi';
});

//响应素有的路由


Route::get('user/{id}', 'UserController@show');

#指定一个特殊的
// Route::get('user/index', 'UserController@index');
//群组使用 --有了一定的从属关系，方便来进行区分。
// Route::group(['prefix' =>'member'],function(){


Route::any('multi2',function(){
		return 'member-multi2';
	});


//路由对数组的输出

Route::get('view', function () {
    return view('welcome');
});

//通过中间件来进行注入
Route::group(['middleware' => 'auth'],function(){
	Route::get('dashboard', function () {
        return view('dashboard');
    });
    Route::get('account', function () {
        return view('account');
    });
});

//设置对应的数据信息
Route::get('/async/task' , function () {
	return 'async task';
});

//对于API访问我们可用设置分组模型来处理
Route::prefix('api')->group(function(){
	Route::get('/',function(){
		 // 处理 /api 路由
	})->name('api.index');
	Route::get('disk',function(){
			return 111;
	})->name('api.disk');
	//处理apiuser的路由请求
	Route::get('users', function () {
		return "My moudle is users";
        // 处理 /api/users 路由
    })->name('api.users');
});

//设置主域名
Route::domain('admin.blog.test')->group(function(){
	Route::get('/',function(){
		return 'admin.blog.test11'; //处理domain子域名的路由请求
	});
});

// 路由命名+路径前缀 --处理不同的命名放肆
// Route::name('user.')->prefix('user')->group(function () {
//     Route::get('{id?}', function ($id = 1) {
//         // 处理 /user/{id} 路由，路由命名为 user.show
//         return route('user.show');
//     })->name('show');
//     Route::get('posts', function () {
//         // 处理 /user/posts 路由，路由命名为 user.posts
//     })->name('posts');
// });
Route::get('/task','TaskController@index');
Route::get('/task/home','TaskController@home'); #指定不同的控制器方法
Route::get('/task/candy','TaskController@candy'); #指定不同的控制器方法
Route::get('/task/candy2','TaskController@candy2'); #指定不同的控制器方法

//DB对table的函数操作的数据库操作
Route::group(['prefix'=>'/item'],function(){
	Route::get('select','ItemController@select'); #DB添加相关的路由操作
	Route::get('add','ItemController@add'); #DB添加相关的路由操作
	Route::get('edit','ItemController@edit'); #DB添加相关的路由操作
	Route::get('del','ItemController@del'); #DB添加相关的路由操作
});

// Route::get('/admin/goods/index','Admin\IndexController@index'); //分组访问
