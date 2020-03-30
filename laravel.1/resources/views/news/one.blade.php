@extends('layouts.main')
@section('title')
    {{ $news['title'] }}
@endsection
@section('menu')
    @include('menu')
@endsection
@section('content')
    @if (!$news['isPrivate'])
        <h3> {{ $news['title'] }}</h3>
        <h4> {{ $news['text'] }}</h4>
    @else
        <h2>У вас нет доступа к этой новости</h2>
    @endif
@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection


