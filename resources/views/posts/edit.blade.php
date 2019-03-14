@extends('layouts.app')


@section('content')
    <form method="post" action="/posts">
        <input type="text" name="title" placeholder="提交标题">
        {{csrf_field()}}
        <input type="submit" name="submit">
    </form>

@endsection