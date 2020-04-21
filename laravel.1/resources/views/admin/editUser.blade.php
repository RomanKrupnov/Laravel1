@extends('layouts.main')
@section('title')
    Редактор аккаунта пользователя
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card">
                <h2>Аккаунт пользователя</h2>
                <form method="post" action="{{ route('admin.user.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn btn-primary"
                            style="margin-left:30vw;margin-bottom: 30px; margin-top: 20px;">
                        Изменить
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

