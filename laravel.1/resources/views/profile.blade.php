@extends('layouts.main')
@section('title')
    Аккаунт пользователя
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card">
                <h2>Аккаунт пользователя</h2>
                <form method="post" action="{{ route('updateProfile') }}">
                    @csrf
                    <div class="form-group">
                        <label for="userName">Имя пользователя</label>
                        <input name='name' type="text" class="form-control" id="userName"
                               value="{{ $user->name ?? old('title') ?? "" }}">
                        @if ($errors->has('name'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('name') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email пользователя</label>
                        <input name='email' type="text" class="form-control" id="userEmail"
                               value="{{ old('title') ?? $user->email }}">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('email') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="userPassword">Пароль пользователя</label>
                        <input name='password' type="text" class="form-control" placeholder="Текущий пароль"
                               id="userPassword">
                        @if ($errors->has('password'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('password') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="userNewPassword">Новый пароль</label>
                        <input name='newPassword' type="text" class="form-control" placeholder="Новый пароль"
                               id="userNewPassword">
                    </div>
                    <button type="submit" class="btn btn-primary"
                            style="margin-left:30vw;margin-bottom: 30px; margin-top: 20px;">
                        Изменить
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

