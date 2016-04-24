<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title></title>
	{{ URL::asset('css/bootstrap.min.css') }}
	{!! asset('image/avatar.png') !!}
	{{ url('js/jquery.js')}}
	
</head>
<body>
<hr />
	{{ URL::to('http://baidu.com', '百度君') }}
	<?php echo $content; ?>


	<?php echo $listview; ?>

	<hr/>
	{{ $content }}
	{!! $listview !!}
	{{ time() }}
	<hr />

@if (count($content) > 2)
	大于 2
@elseif (count($content) == 100)
	等于100
@else
	就是1
@endif

<hr />

{!! Form::open(array('url' => 'foo/bar')) !!}
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'common']) !!}
{!! Form::select('city',array(1=>'北京', 2=>'上海', 3=>'还是上海') , 2, ['class' => 'select']) !!}
{!! Form::radio('sexy','1') !!}
    {!! Form::textarea('content', null, ['class' => 'first-class  second-class', 'id' => 'textarea-id', 'cols'=>'50', 'rows'=>20]) !!}
    {!! Form::submit("提交", ['class' => 'submit']) !!}

{!! Form::close() !!}
{!! Recaptcha::render() !!}

</body>
</html>

