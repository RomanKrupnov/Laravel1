@extends('layouts.main')
@section('title')
    Работа с пользователями
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User Edit</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h1 style="text-align: center;">Работа с аккаунтами пользователей</h1>
                    <ul style="flex-wrap: wrap; list-style: none; margin-bottom: 50px; width: 1000px;">

                        <ul style="list-style: none; margin-bottom: 50px;">
                            @forelse($user as $item)
                                @if($item->role == false)
                                <li style="margin-right: 20px; font-size: 20px">
                                    <h4>{{ $item->name }}</h4> <h4>{{ $item->email }}</h4>
                                    <form action="{{ route('admin.user.destroy', $item)  }}" method="post">
                                        <a href="{{ route('admin.user.update', $item) }}" style="text-decoration: none;">
                                            <button type="button" style="background-color: #2a9055;"
                                                    class="btn btn-primary">Редактировать</button> </a>
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </li>
                                @endif
                            @empty
                                <h3>Нет пользователей</h3>
                            @endforelse
                        </ul>
                        <br>
                        {{ $user->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
