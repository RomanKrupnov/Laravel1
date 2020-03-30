@extends('layouts.main')
@section('title')
Войти в учетную запись
@endsection
@section('menu')
@include('menu')
@endsection
@section('content')
    <div style="width: 100%; text-align:  center;">
        <h3>Войдите в ваш аккаунт</h3>
        <form class="form-inline" style=" min-height: 500px;">
            <div class="form-group" style="margin-left: 30%">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
            </div>
            <div class="form-check">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>

@endsection

@section('footer')
<div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
