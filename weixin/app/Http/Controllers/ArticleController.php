<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('article.article',['content'=>'今天填上掉了很多橙子'])->nest('listview', 'article.listview', ['articleCatName'=> '养生系列']);
        $articleList = DB::select('select * from wx_article');

        return view('article.index')->with("articleList", $articleList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// echo $request->path();
// echo $request->url();
// echo $request->fullurl();
// echo $request->input('title');
// echo $request->content;
        // var_dump(DB::insert('insert into wx_article (title, content) values (?, ?)', [$request->title, $request->content]));
if (DB::insert('insert into wx_article (title, content) values (?, ?)', [$request->title, $request->content])) {
    // echo "插入成功";
    return redirect('article/index');
} else {
    echo "插入失败";
}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
