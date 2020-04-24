@extends('layouts.main')
@section('title')
    Работа со ссылками парсера
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container" style="min-height: 500px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.resourcesIndex') }}">Parser Edit</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h1 style="text-align: center;">Работа со ссылками парсера</h1>
                    <ul style="flex-wrap: wrap; list-style: none; margin-bottom: 50px; width: 1000px;">

                        <ul style="list-style: none; margin-bottom: 50px;">
                            @forelse($resources as $item)
                                <li style="margin-right: 20px; font-size: 20px">
                                    <h4>{{ $item->link }}</h4>
                                    <a href="{{ route('admin.editResources', $item) }}" style="text-decoration: none;">
                                        <button type="button"
                                                class="btn btn-primary btn-success">Редактировать
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.destroy', $item) }}" style="text-decoration: none;">
                                        <button type="button"
                                                class="btn btn-primary btn-danger">Удалить
                                        </button>
                                    </a>
                                </li>

                            @empty
                                <h3>Нет ссылок</h3>
                            @endforelse
                        </ul>
                        <br>
                        {{ $resources->links() }}
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
