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
                    <h1 style="margin-top: 17vw; margin-bottom: 10%;font-size: 55px; text-align: center;">Приветствуем тебя</h1>
                    </div>
            </div>
        </div>
    </div>


@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection


