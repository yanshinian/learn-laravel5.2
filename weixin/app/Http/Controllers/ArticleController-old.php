<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ArticleController extends Controller {
	public function index() {

		return view('article.article',['content'=>'今天填上掉了很多橙子'])->nest('listview', 'article.listview', ['articleCatName'=> '养生系列']);
	}
	public function create(Request $request) {
		if ($request->isMethod('get')) { //get请求处理
			return view('article.add');
		} else if ($request->isMethod('post')){ //post 表单处理
			// var_dump($reques t->all());
			return 'post';
		}
		return '什么鬼';
	}
	public function store(Request $request) {
		echo $request->path();
		echo $request->url();
		echo $request->fullurl();
		echo $request->input('title');
		echo $request->content;
		$input = $request->only(['title', 'content']);

		var_dump($input);
		$input = $request->all();
		var_dump($input);
		// echo $request;
// 		var_dump( Request::wantsJson());
// 		var_dump( Request::method());
// 		var_dump(Request::path());
// var_dump(Request::isMethod('post'));
		if ($request->isMethod('post')) {
			echo 'post请求';
			// var_dump($request)
		}
		return "提交成功";
	}
	public function destroy() {
		return '删';
	}
	public function update() {
		return '改';
	}
}