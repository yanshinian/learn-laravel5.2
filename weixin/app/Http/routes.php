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

use LucaDegasperi\OAuth2Server\Facades\Authorizer;// 后加的
 // use Input;  //后加的

Route::get('/', function () {
    return view('index');
});


Route::get('/', function () {
    return view('welcome');
});


Route::get('about', function () {
    return view('about');
});

Route::post('dev', function () {
    return "公众号开发";
});

Route::post('dev/article/', function () {
    return "公众号开发：文章";
});

Route::post('dev/picture', function () {
    return "公众号开发：图片";
});

Route::get('text/{tid}', function ($tid) {
    return '文本消息id='.$tid;
})
->where('tid', '[0-9]+');

Route::get('text/{catId}/{tid}', function ($catId,$tid) {
    return '文本分类：'.$catId.'文本消息id='.$tid;
});

// Route::get('article', function () {
//     return view('article', ['title'=> 'CSRF攻击', 'content'=> '很危险的攻击']);
// });
Route::get('article', function () {
    return view('article')->withTitle('CSRF攻击')->withContent('的确很危险');

});

Route::get('article', function () {
    return view('article')->with(['title'=> 'CSRF攻击', 'content'=> '防止危险啊']);

});

Route::get('article', function () {
    return view('article')->with('content','警惕起来');
});
Route::get('article', function () {
    return View::make('article.article')->with('content','奥巴马病毒')->nest('listview', 'article.listview');
});

Route::get('article', function () {
    return view('article.article')->with('content','奥巴马病毒')->nest('listview', 'article.listview', ['articleCatName'=> '病毒防治']);
});
Route::get('qrcode', function () {
    return view('qrcode');
});

// Route::get('article', "ArticleController@index");
// Route::get('article/add', "ArticleController@add");
// Route::get('article/delete', "ArticleController@delete");
// Route::get('article/update', "ArticleController@update");
// Route::post('article/add', "ArticleController@commit");
Route::resource('article', 'ArticleController');
Route::get('aaa', function () {
    echo '输出文章';
});

 
Route::get('linkdb', function () {
    echo  env('DB_DATABASE');
    echo DB::connection()->getDatabaseName();

    var_dump($users = DB::select('select * from wx_article'));
});

// 这是需要经过OAuth2.0授权后才能访问的资源，不信你直接访问绝对会报错
Route::get('/', ['middleware' => ['oauth'], function () {
    return view('welcome');
}]);

Route::get('auth/login', function() {
    return view('auth.login');
});

Route::post('auth/login', function()
{
    if(Auth::attempt(Request::only('email', 'password'))){
        return Redirect::intended('oauth');
    }
    echo  Hash::make('secret');
    return "登陆失败";
});
Route::get('oauth/authorize', ['as' => 'oauth.authorize.get', 'middleware' => ['check-authorization-params', 'auth'], function() {
   $authParams = Authorizer::getAuthCodeRequestParams();

   $formParams = array_except($authParams,'client');

   $formParams['client_id'] = $authParams['client']->getId();

   $formParams['scope'] = implode(config('oauth2.scope_delimiter'), array_map(function ($scope) {
       return $scope->getId();
   }, $authParams['scopes']));
   // var_dump($formParams);
   // print_r($authParams['client']);
   // return ;
   return View::make('oauth.authorization-form', ['params' => $formParams, 'client' => $authParams['client']]);
}]);
Route::post('oauth/authorize', ['as' => 'oauth.authorize.post', 'middleware' => ['csrf', 'check-authorization-params', 'auth'], function() {

    $params = Authorizer::getAuthCodeRequestParams();
    $params['user_id'] = Auth::user()->id;
    $redirectUri = '/';

    // If the user has allowed the client to access its data, redirect back to the client with an auth code.
    if (Request::has('approve')) {
        $redirectUri = Authorizer::issueAuthCode('user', $params['user_id'], $params);
    }

    // If the user has denied the client to access its data, redirect back to the client with an error message.
    if (Request::has('deny')) {
        $redirectUri = Authorizer::authCodeRequestDeniedRedirectUri();
    }

    return Redirect::to($redirectUri);
}]);

// Route::post('oauth/access_token', function() {
//     return Response::json(Authorizer::issueAccessToken());
// });
Route::post('oauth/access_token', ['as' => 'access_token', function() {
    header('Content-Type:application/json; charset=utf-8');
    return Response::json(Authorizer::issueAccessToken());
}]);

Route::get('/callback', function(){
    if(Request::has('code')){
        return view('callback');
    }
});
