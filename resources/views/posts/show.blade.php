@extends('layouts.app')


@section('content')
    {{--<h1><a href="/posts/{{$post->id}}/edit">{{$post->title}}</a></h1>--}}
    <h1><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></h1>
@endsection