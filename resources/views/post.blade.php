@extends('layouts.app')


@section('content')
    <h1>Post Page</h1>
@endsection

@section('footer')
    <script>
        alert('hello:' + '{{$name}}');
    </script>
@endsection