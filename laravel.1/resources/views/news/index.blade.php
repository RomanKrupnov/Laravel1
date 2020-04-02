@extends('layouts.main')
@section('title','Новости')
@section('menu')
    @include('menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h1 style="margin-top: 15px; margin-bottom: 10%;text-align: center; font-size: 55px;">Последние новости</h1>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
