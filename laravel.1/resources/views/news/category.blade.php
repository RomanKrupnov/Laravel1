@extends('layouts.main')
@section('title')
    Категории новостей
@endsection
@section('menu')
    @include('menu')
@endsection
@section('content')
    <h1 style="margin-top: 15px; margin-bottom: 10%; margin-left: 30vw; font-size: 55px;">Категории новостей</h1>
    <ul style="display: flex;list-style: none; margin-bottom: 50px;">
        @forelse($category as $item)
            <li style="margin-right: 20px; font-size: 20px">
                <a href="{{ route('news.category.show', $item['slug'])  }}" style="text-decoration: none; color: black;">
                    {{ $item['title'] }}</a> </li>
        @empty
            <h3>Нет категорий</h3>
        @endforelse
    </ul>
@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection




