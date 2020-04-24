@extends('layouts.main')
@section('title')
    Редактор аккаунта пользователя
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')

    <div class="container" style="min-height: 500px;">
        <div class="row justify-content-center">
            <div class="col-md-8 card">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.indexUser') }}">Edit Users</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.editUser',$user) }}">Edit User</a></li>
                        </ol>
                    </nav>

                </div>
                <h2>Аккаунт пользователя</h2>
                <form method="POST" action="{{ route('admin.update', $user) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="userName">Имя пользователя</label>
                        <input name='name' type="text" class="form-control" id="userName"
                               value="{{  $user->name ?? old('name') }}">
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
                               value="{{ $user->email ?? old('email') }}">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('email') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="userNewPassword">Новый пароль</label>
                        <input name='newPassword' type="text" class="form-control" placeholder="Новый пароль"
                               value="{{ $user->password ?? old('password') }}"
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

