@extends('layouts.main')
@section('title')
    {{ $category['slug'] }}
@endsection
@section('menu')
    @include('menu')
@endsection
@section('content')
    @forelse ($news as $item)
        <a href=" {{ route('news.one', $item['id'])  }}"
           style="text-decoration: none; color: black;margin-right: 20px; font-size: 20px">
            <h3>{{ $item['title'] }}</h3></a>
    @empty
        <h3>Нет новостей</h3>
    @endforelse
@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
