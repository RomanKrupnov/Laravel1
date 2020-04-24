@extends('layouts.main')
@section('title','Главная')
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
                            </ol>
                        </nav>

                    </div>
                    <ul style="display:inline-flex;list-style: none;margin-top:30px;">
                        <li><h5 style="text-align: center;">Категории новостей</h5>
                            <hr>
                            <ul style="list-style: none; margin-bottom: 50px;">
                                @forelse($category as $item)
                                    <li style="margin-right: 20px; font-size: 25px; font-weight: bold;" class="scale" >
                                        <a href="{{ route('news.category.show', $item->slug)  }}"
                                           style="text-decoration: none; color: black;" class="scale">
                                            {{ $item->category }}</a></li>
                                @empty
                                    <h3>Нет категорий</h3>
                                @endforelse
                            </ul>
                        </li>
                        <li><h3 style="text-align: center;">Актуальные новости</h3>
                            <ul style="flex-wrap: wrap; list-style: none; margin-bottom: 50px; width: 850px;">
                                @forelse ($news as $item)
                                    <li style="margin-bottom: 20px;"> @if ($item->isPrivate == 0 || Auth::check())
                                            <a href="{{route('news.show', $item->id)}}" style="list-style: none;
                                            text-decoration: none; color: #1b1e21;">
                                                @if ($item->image == null)
                                                    <img src="storage/news.jpg" alt="Новости"
                                                         style="width:120px; height:100px;">
                                                @else <img src="{{$item->image}}" class="photo_card" style="width:150px;
                                     height:100px;" alt="{{ $item->title  }}">
                                                @endif
                                                <p style="display: inline-flex;">{{ $item->title  }}</p></a>
                                        @endif
                                    </li>
                                @empty
                                    <h3>Нет новостей</h3>
                                @endforelse
                                {{ $news->links() }}
                            </ul>
                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>


@endsection

@section('footer')
    <div class="footer"
         style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection


