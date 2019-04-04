@extends('layouts.app')

@section('content')
<h1 align="center">{{$title}}</h1>
@if(!empty($image))
    <img width="100px" height="100px" src="{{config('app.url')}}/storage/images/cms/{{$image}}" alt="xaxax" align="left" class="padLR">
@else
    <img width="100px" height="100px" src="{{config('app.url')}}/storage/images/cms/no_image.png" alt="xaxax" align="left" class="padLR">
@endif
<p>{!!$description!!}</p>

@if(count($services) > 0)
<h3>Apply Custom Css </h3>
	<ul class="service">
	@foreach($services as $row)
		<li>{{$row}}</li>
	@endforeach

	</ul>
@endif
@endsection