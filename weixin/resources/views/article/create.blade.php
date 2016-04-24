<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>文章添加页面</title>
</head>
<body>
<h1>添加文章页面</h1>

<hr />
	{!! Form::open(array('url' => 'article')) !!}
	<div>
    {!! Form::label('title', '标题:') !!}
    {!! Form::text('title', null, ['placeholder' => '请输入标题']) !!}
    </div>
	<div>
	{!! Form::label('content', '内容:') !!}
    {!! Form::textarea('content', null, ['placeholder' => '请输入内容']) !!}
    </div>
    <div>{!! Form::submit("添加", ['class' => 'submit']) !!}</div>
    
	{!! Form::close() !!}
</body>
</html>