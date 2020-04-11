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

                    <form enctype="multipart/form-data" method="POST" action="@if(!$news->id){{ route('admin.addNews') }}@else{{ route('admin.update', $news) }}@endif"
                          style="width: 800px !important;margin-left: auto;margin-right: auto;">
                        @csrf
                        <div class="form-group">
                            <label for="newsTitle">Название новости</label>
                            <input name="title" type="text" class="form-control" id="newsTitle" value="{{ $news->title ?? old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="newsText">Текст новости</label>
                            <textarea name="text" class="form-control" rows="6" id="exampleInputText">
                                {{ $news->text ?? old('text') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="newsCategory">Категория новости</label>
                            <select name="category_id" class="form-control" id="newsCategory">
                                @forelse($category as $item)
                                    <option @if($item['id'] === old('title')) selected @endif value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                @empty
                                    <h2>Нет категории</h2>
                                @endforelse

                            </select>

                        </div>
                         <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputPhotoNews" name="image"
                                   value="{{ old('image') }}" >
                            <label class="custom-file-label" for="inputPhotoNews">Добавьте фотографию к новости</label>
                            <div class="invalid-feedback">Прикрепите фотографию к новости</div>
                        </div>
                        <div class="form-check">
                            <input @if ( $news->isPrivate == 1 || old('isPrivate') == 1 ) checked @endif name="isPrivate" class="form-check-input" type="checkbox" value="0"
                                   id="newsPrivate">
                            <label class="form-check-label" for="newsPrivate">
                                Только для зарегистрированных пользователей
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left:30vw;margin-bottom: 30px;">
                           @if($news->id) Изменить @else Добавить @endif
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
