@extends('layouts.app')


@section('content')
    <h1>EDIT POST</h1>
    <form method="post" action="/posts/{{$post->id}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" placeholder="提交标题" value="{{$post->title}}">
        <input type="submit" name="submit" value="编辑">
    </form>

    <form method="post" action="/posts/{{$post->id}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" name="DELETE" value="删除">
    </form>
@endsection