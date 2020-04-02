@extends('layouts.main')
@section('title','Добавить новость')
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.addNews') }}">Add News</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h1 style="margin-top: 20px;margin-left: auto;margin-right: auto;font-size: 55px;">Добавление новости</h1>
                    <form method="POST" action="{{ route('admin.addNews') }}">
                        @csrf
                        <div class="form-group">
                            <label for="newsTitle">Название новости</label>
                            <input name="title" type="text" class="form-control" id="newsTitle" value="">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-primary" value="Добавить новость"
                                   id="addNews">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
