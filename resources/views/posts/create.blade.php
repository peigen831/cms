@extends('layouts.app')


@section('content')
    <h1>CREATE POST</h1>
    <form method="post" action="/posts">
        <input type="text" name="title" placeholder="提交标题">
        {{csrf_field()}}
        <input type="submit" name="submit">
    </form>
@endsection