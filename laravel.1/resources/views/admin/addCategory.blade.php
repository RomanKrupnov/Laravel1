@extends('layouts.main')
@section('title','Добавить категорию')
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.cindex') }}"></a></li>
                            </ol>
                        </nav>

                    </div>
                    <h1 style="text-align: center;">Добавление новой категории новостей</h1>
                    <form  method="POST" action="{{ route('admin.addCategory') }}" enctype="multipart/form-data"
                          style="width: 800px !important;margin-left: auto;margin-right: auto;">
                        @csrf
                        <div class="form-group">
                            <label for="categoryTitle">Название категории</label>
                            <input name="category" type="text" class="form-control is-invalid" id="categoryTitle"
                                   value="{{ $categories->category ?? old('category') }}">
                            @if ($errors->has('category'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('category') as $error)
                                        <p  class="is-valid">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="categorySlug">Slug транскрипция (без пробелов)</label>
                            <input name="slug" type="text" class="form-control is-invalid" id="categorySlug"
                                   value="{{ $categories->slug ?? old('slug') }}">
                            @if ($errors->has('slug'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('slug') as $error)
                                        <p  class="is-valid">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left:30vw;margin-bottom: 30px; margin-top: 20px;">
                            Добавить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="footer"
         style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
