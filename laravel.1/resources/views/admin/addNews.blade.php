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
                    <h1 style="margin-top: 20px;margin-left: auto;margin-right: auto;font-size: 55px;">Добавление
                        новости</h1>

                    <form method="POST" class="was-validated" enctype="multipart/form-data" action="{{ route('admin.addNews') }}"
                          style="width: 800px !important;margin-left: auto;margin-right: auto;">
                        @csrf
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputTitle">Заголовок новости</label>
                            <input type="text" class="form-control" id="exampleInputTitle" name="title"
                                   placeholder="Заголовок новости" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="newsText">Текст новости</label>
                            <textarea name="text" class="form-control" rows="5" id="exampleInputText">{{ old('text') }}</textarea>
                        </div>

                          <div class="form-group">
                            <select class="custom-select" name="category_id"  required>
                                <option>Категория новости</option>
                                @forelse($category as $cat)

                                    <option @if($cat->id == old('category_id')) selected @endif
                                        value="{{ $cat->id }}"> {{$cat->title}}</option>
                                @empty
                                    <h3>Нет категории</h3>
                                @endforelse
                            </select>
                            <div class="invalid-feedback">Выберите категорию</div>
                        </div>
                         <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputPhotoNews" name="image"
                                   value="{{ old('image') }}" required>
                            <label class="custom-file-label" for="inputPhotoNews">Добавьте фотографию к новости</label>
                            <div class="invalid-feedback">Прикрепите фотографию к новости</div>
                        </div>
                        <div class="form-check">
                            <input @if(old('isPrivate') == 0)  @endif class="form-check-input" type="radio" name="isPrivate" id="isPrivate" value=0 checked>
                            <label class="form-check-label" for="isPrivate">
                                Не приватная новость
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if(old('isPrivate')== 1)  @endif class="form-check-input" type="radio" name="isPrivate" id="isPrivate" value=1>
                            <label class="form-check-label" for="isPrivate">
                                Приватная новость
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin-left:30vw;margin-bottom: 30px;">
                            Добавить новость
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
