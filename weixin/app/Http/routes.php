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





















