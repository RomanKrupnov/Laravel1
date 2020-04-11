@extends('layouts.main')
@section('title')
    Админка
@endsection
@section('menu')
    @include('admin.menu')
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                            </ol>
                        </nav>

                    </div>
                    <ul style="flex-wrap: wrap; list-style: none; margin-bottom: 50px; width: 1000px;">

                        @forelse ($news as $item)
                            <li style="margin-bottom: 20px;">  @if ($item->image == null)
                                    <img src="storage/news.jpg" alt="Новости" style="width:120px; height:100px;">
                                @else <img src="{{$item->image}}" class="photo_card" style="width:120px;
                                     height:100px;" alt="{{ $item->title  }}">
                                @endif
                                {{ $item->title  }}
                                @if ($item->isPrivate == 0)
                                    <a href="{{route('news.show', $item)}} ">Перейти к новости</a>
                                @endif <br>
                                <a href="{{ route('admin.edit', $item) }}" style="text-decoration: none;">
                                <button type="button" style="background-color: #2a9055;"
                                        class="btn btn-primary">Редактировать</button> </a>
                                <a href="{{ route('admin.destroy', $item) }}" style="text-decoration: none;">
                                    <button type="button" style="background-color: #b91d19;"
                                                    class="btn btn-primary">Удалить</button> </a>
                            </li>
                        @empty
                            <h3>Нет новостей</h3>
                        @endforelse
                        {{ $news->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
