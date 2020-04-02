@extends('layouts.main')
@section('title','Регистрация')
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
                                <li class="breadcrumb-item"><a href="{{ route('registration') }}">Registration</a></li>
                            </ol>
                        </nav>

                    </div>
                    <div style="width: 100%; text-align:  center;">
                        <h3>Введите ваши данные для регистрации</h3>
                        <form class="form-inline" style=" min-height: 350px;
     display: block;margin-left: auto;margin-right: auto;width: 6em;margin-top:50px;">

                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputName">Имя</label>
                                <input type="text" class="form-control" id="exampleInputName" placeholder="Имя">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputLastName">Password</label>
                                <input type="text" class="form-control" id="exampleInputLastName" placeholder="Фамилия">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputTelephone">Номер телефона</label>
                                <input type="phone" class="form-control" id="exampleInputTelephone" placeholder="Телефон">
                            </div>
                            <div class="form-check">
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-left: 64px;">Войти</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection

