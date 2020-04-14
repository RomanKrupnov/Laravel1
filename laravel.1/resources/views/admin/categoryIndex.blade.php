@extends('layouts.main')
@section('title')
    Работа с каталогами
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.cindex') }}">Catalog Edit</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h1 style="text-align: center;">Работа с каталогами</h1>
                    <ul style="flex-wrap: wrap; list-style: none; margin-bottom: 50px; width: 1000px;">

                        <ul style="list-style: none; margin-bottom: 50px;">
                            @forelse($category as $item)
                                <li style="margin-right: 20px; font-size: 20px">
                                    <a href="{{ route('news.category.show', $item->slug)  }}" style="text-decoration: none; color: black;">
                                        {{ $item->category }}</a>
                                    <br>
                                    <a href="{{ route('admin.editС', $item) }}" style="text-decoration: none;">
                                        <button type="button" style="background-color: #2a9055;"
                                                class="btn btn-primary">Редактировать</button> </a>
                                    <a href="{{ route('admin.destroyС', $item) }}" style="text-decoration: none;">
                                        <button type="button" style="background-color: #b91d19;"
                                                class="btn btn-primary">Удалить</button> </a>
                                </li>
                            @empty
                                <h3>Нет категорий</h3>
                            @endforelse
                        </ul>
                        <br>
                        {{ $category->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
