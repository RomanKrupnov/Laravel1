@extends('layouts.main')
@section('title')
    {{ $news->title }}
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
                                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('news.show', $news->id)}}">{{ $news->title }}</a></li>
                            </ol>
                        </nav>
                    </div>

                    @if ($news->isPrivate == 0)
                        <div
                            style="background-image: url({{ $news->image ?? asset('storage/news.jpg') }});height: 200px;width: 200px;
                                background-position: center; background-size: cover;background-repeat: no-repeat;"></div>
                        <h3> {{ $news->title }}</h3>
                        <h4> {{ $news->text }}</h4>
                    @else
                        <h2>У вас нет доступа к этой новости</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="footer"
         style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection


