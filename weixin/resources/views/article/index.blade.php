<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>文章的列表</title>
</head>
<body>
	<h1>文章的列表</h1>
	<hr />
	<table>
	<tr> 
		<td>文章id</td>
		<td>文章标题</td>
		<td>文章内容</td>
		<td>修改</td>
		<td>删除</td>
	@foreach ($articleList as $article)
		<tr> 
		<td>{{ $article->article_id }}</td>
		<td>{{ $article->title }}</td>
		<td>{{ $article->content }}</td>
		<td><a href="{{ url('artile/show')}}/{{ $article->article_id}}">修改</a></td>
		<td>
	       {!! Form::open(['method' => 'DELETE', 'route' => ['article.destroy', $article->article_id]]) !!}
	       <a href="javascript:;" onclick="document.forms[{{ $article->article_id - 1 }}].submit()">删除</a>
 
            {!! Form::close() !!}
		</td>
		</tr>
	@endforeach
	</table>
</body>
</html>