@extends('layouts.main')
@section('title')
    Добавить новость
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <h1 style="margin-top: 20px;margin-left: auto;margin-right: auto;font-size: 55px;">Добавление новости</h1>
    <form class="was-validated" style="width: 1000px !important;margin-left: auto;margin-right: auto;">
        <div class="form-group">
            <label class="sr-only" for="exampleInputTitle">Заголовок новости</label>
            <input type="text" class="form-control" id="exampleInputTitle" placeholder="Заголовок новости" required>
        </div>
        <div class="mb-3">
            <label for="validationTextarea">Текст новости</label>
            <textarea class="form-control is-invalid" id="exampleInputText" placeholder="Введите текст новости" required></textarea>
        </div>
        <div class="form-group">
            <label class="sr-only" for="exampleInputLink">Ссылка на новость</label>
            <input type="text" class="form-control" id="exampleInputLink" placeholder="Ссылка на новость" required>
        </div>
        <div class="form-group">
            <select class="custom-select" required>
                <option value="">Категория новости</option>
                <option value="1">Спорт</option>
                <option value="2">Экономика</option>
                <option value="3">Политика</option>
                <option value="4">Мировые новости</option>
            </select>
            <div class="invalid-feedback">Выберите категорию</div>
        </div>

        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="customIsPrivate" name="radio-stacked" required>
            <label class="custom-control-label" for="customIsPrivate">
                Новость только для зарегистрированных пользователей</label>
        </div>
        <div class="custom-control custom-radio mb-3">
            <input type="radio" class="custom-control-input" id="customIsPrivate2" name="radio-stacked" required>
            <label class="custom-control-label" for="customIsPrivate2">Новость для всех посетителей</label>
            <div class="invalid-feedback">Выберите охват показа новости</div>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputPhotoNews" required>
            <label class="custom-file-label" for="inputPhotoNews">Добавьте фотографию к новости</label>
            <div class="invalid-feedback">Прикрепите фотографию к новости</div>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-left:30vw;margin-bottom: 30px;">Добавить новость</button>
    </form>
@endsection

@section('footer')
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
@endsection
