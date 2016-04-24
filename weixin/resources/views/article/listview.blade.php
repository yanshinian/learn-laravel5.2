
@extends('layout.commonpage')
<p>文章分类--<?php echo $articleCatName?>--列表</p>

@section('articleListView')
<ul>
	<li>文章1</li>
	<li>文章2</li>
	<li>文章3</li>
	<li>文章4</li>
	<li>文章5</li>
</ul>
@stop



@section('gallery')
	@parent
	来自 listview
<ul>
	<li>图片1</li>
	<li>图片2</li>
	<li>图片3</li>
</ul>
@stop


