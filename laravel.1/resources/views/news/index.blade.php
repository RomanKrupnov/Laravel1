@extends('layouts.main')
@section('title')
    Новости
@endsection
@section('menu')
    @include('menu')
@endsection
@section('content')
    <h1 style="margin-top: 15px; margin-bottom: 10%; margin-left: 30vw; font-size: 55px;">Последние новости</h1>
    <ul style="display: flex;list-style: none; margin-bottom: 50px;">

        @forelse ($news as $item)
            <li>{{ $item['title']  }}
                @if (!$item['isPrivate'])
                    <a href="{{route('news.one', $item['id'])}} ">Перейти к новости</a>
                @endif
            </li>
        @empty
            <h3>Нет новостей</h3>
        @endforelse
    </ul>
@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
