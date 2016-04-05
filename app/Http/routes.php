<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Config::set('app.azone','Asia/Shanghai');
$value=Config::get('app.azone');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('/calendar',function(){return view('calendar');});

//below of all it's just my test
Route::get('me',function(){	
	Config::set('app.azone','Asia/Shanghai');
	$value=Config::get('app.azone');
	return $value;
});

Route::get('/me',function(){
	return "asia";
});
// result: 都可以,但是会匹配后来的那个


Route::put('/requestways',function(){
	return "put prossed";
});

Route::get('/requestways',function(){
	echo csrf_token();
	return "get prossed";
});

Route::post('/requestways',function(){
	return "post prossed";
});
//result: 记住非get方式时需在请求参数里加入 _token



Route::get('shops/{id}',function($id){
	echo $id.'<br>';
	return;
})
->where ('id','[0-9]+');
// result: /shops/as将会not found(404),因为不匹配  匹配的路由将echo $id
// 可选参数的路由 Route::get('shops/{id?}',......function($id = null){});  
// 带默认值的路由 Route::get('shops/{id?}',function($id = 1){});



use Illuminate\Http\Request;
//匹配路由跳到某视图
Route::get('/user/{id}/profile','UserController@index'); //方式1 
//方式2
Route::get('/user/{id}/profile',function(Request $req){
	echo $req->route('id');  //另一种方式拿id
	return view('user');
});

Route::post('/user/{id}/profile',function(Request $req){
	echo 'name'.$req->name.'<br>'.'password'. $req->password .'<br>';
	// echo '<code>' . json_encode($req,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) . '</code><br><hr>'; 此行很失望,并没有什么用,所以注释掉
	return $req;
});

//$request->input('age')也可以得到 表单提交的age字段
//result: 输出表单提交的请求,非常开心,顺利拿到了我想要的东西




//现在开始命名路由
Route::get('/customer/profile',['as' => 'profile',function(){
	echo $url=route('profile').'<br>';//输出url
	echo $name=Route::currentRouteName();
	return ;
}]);

Route::get('cus',function(){
	echo route('profile');
	$redirect=redirect()->route('profile');
	echo $name=Route::currentRouteName();
	return ;
});


// 路由中间件 做过滤 拦截之类的 middleware 依据数组顺序执行
// Route::group(['middleware'=>['foo','bar']],function(){

// 	Route::get('student',function(){
// 		return 'student';
// 	});

// 	Route::get('teacher',function(){
// 		return 'teacher';
// 	});
// });



// 路由组 NameSpace  控制器的命名空间
// Route::group(['namespace' => 'Admin'],function(){

// 	  Route::group(['namespace' => 'User'],function(){

// 	  });
// });


//子域名路由
// Route::group(['domain' => '{account}.site.com'],function(){

// });


// 路由前缀分组
Route::group([
	'prefix' => '/color/{id}',
	'where' =>['id' => '[0-9]+']
	],
	function(){
		Route::get('/red',function($id){
			echo $id;
			return 'red';
		});
	  
		Route::get('/green',function(){
		    return 'green';
		});

		Route::get('/blue',function($id){
		    echo $id;
			return 'blue';
		});
	});


Route::get('/login', ['as' => 'lelogin', function(){ return view('lelogin.login');}]);
// 2015-08-12 开始尝试使用middleware
Route::group(['middleware' => 'tesmiddle'], function(){
	Route::post('/login', ['as' => 'lelogin', function(){ return view('lelogin.login');}]);
});


// 2015-08-12 15:42 now  i start try controller部分
Route::group(['prefix' => 'cont'], function(){

	// 基础控制器
	Route::get('user/{id?}','UuController@index');

	//控制器路由中指定中间件
	Route::get('user/{id?}/profile',['middleware' => 'tesmiddle','uses' => 'UuController@profile']);
	Route::post('user/{id?}/profile',['middleware' => 'tesmiddle','uses' => 'UuController@profile']);


});

//隐式路由控制器
Route::controller('hidecont','UhideController');

Route::get('/views/first', function(){ return view('firstlevel.first'); });
Route::get('/views/second', function(){ return view('secondlevel.second'); });

Route::get('/views/first', function(){ return view('firstlevel.first',['name' => 'liliy']); });

Route::get('/views/first', function(){
	$view = view('firstlevel.first')->with('name','victorial');
	return $view;
});

Route::get('/views/first', function(){
	$view = view('firstlevel.first')->withName('vector')
									->withPass(1234);
	return $view;
});

Route::get('/views/first', function(){
	$data = '[
			{"name":"lisi","pass":1234},
			{"name":"张三","pass":4321},
			{"name":"哈理","pass":4321,"like":[
												{"music":"pop","want":"artist"},
												{"picture":"dog-picture"}
											  ]
			}
		  ]';
	$data = json_decode($data);
	//echo $data[2]->like[0]->music; //pop 不加true
	// echo $data;
	// $data = array('data' => $data);
	$view = view('firstlevel.first',$data);
	return $view;
});