@extends('layouts.main')
@section('title')

@endsection
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
                                <li class="breadcrumb-item"><a href="{{ route('news.category.index') }}">Category</a></li>
                            </ol>
                        </nav>

                    </div>
                    @forelse ($news as $item)
                        <div style="background-image: url({{ $item['image'] ?? asset('storage/news.jpg') }});height: 120px;
                            width: 120px;background-position: center; background-size: cover;background-repeat: no-repeat;"></div>
                        <a href=" {{ route('news.one', $item->id)  }}"
                           style="text-decoration: none; color: black;margin-right: 20px; font-size: 20px">
                            <h3>{{ $item->title }}</h3></a>
                    @empty
                        <h3>Нет новостей</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
