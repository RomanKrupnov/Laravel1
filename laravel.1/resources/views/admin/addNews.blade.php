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
                                <li class="breadcrumb-item"><a href="{{ route('admin.news.create') }}">
                                        @if($news->id){{__('Edit News')}}@else{{__('Add News')}}@endif</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h1 style="margin-top: 20px;margin-left: auto;margin-right: auto;font-size: 55px;">@if($news->id){{__('Редактирование')}}@else{{__('Добавление')}}@endif новости</h1>

                    <form enctype="multipart/form-data" method="POST" action="@if(!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif"
                          style="width: 800px !important;margin-left: auto;margin-right: auto;">
                        @csrf
                        @if($news->id) @method('PATCH') @endif
                        <div class="form-group">
                            <label for="newsTitle">Название новости</label>
                            <input name="title" type="text" class="form-control" id="newsTitle" value="{{ old('title') ?? $news->title }}">
                            @if ($errors->has('title'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('title') as $error)
                                        <p  class="is-valid">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">Текст новости</label>
                            <textarea name="text" class="form-control" rows="3" id="exampleInputText">{{old('text') ?? $news->text ?? ""}}</textarea>
                            @if ($errors->has('text'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('text') as $error)
                                        <p  class="is-valid">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="newsCategory">Категория новости</label>
                            <select name="category_id" class="form-control" id="newsCategory">
                                @forelse($category as $item)
                                    <option @if($item->id == old('category_id') ?? $item->id == $news->category_id) selected @endif value="{{ $item->id }}">{{ $item['category'] }}</option>
                                @empty
                                    <h2>Нет категории</h2>
                                @endforelse
                            </select>
                            @if ($errors->has('category_id'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('category_id') as $error)
                                        <p  class="is-valid">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                        <div class="form-check">
                            <input @if (($news->isPrivate == true) or (old('isPrivate') == true)) checked @endif
                            name="isPrivate" class="form-check-input" type="checkbox"  id="isPrivate" value="1">
                            <label class="form-check-label" for="isPrivate">
                                Только для зарегистрированных пользователей
                            </label>
                            @if ($errors->has('isPrivate'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('isPrivate') as $error)
                                        <p  class="is-valid">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                         <div class="custom-file" style="margin-bottom: 30px;">
                            <input type="file" class="custom-file-input"   id="inputPhotoNews" name="image"
                                   value="{{ old('image') }}" >
                             <label class="custom-file-label" for="inputPhotoNews">Добавьте фотографию к новости</label>
                             @if ($errors->has('image'))
                                 <div class="alert alert-danger" role="alert">
                                     @foreach ($errors->get('image') as $error)
                                         <p  class="is-valid">{{ $error }}</p>
                                     @endforeach
                                 </div>
                             @endif
                             </div>
                        <button type="submit" class="btn btn-primary" style="margin-left:30vw;margin-bottom: 30px; margin-top: 20px;">
                           @if($news->id){{__('Изменить')}}@else{{__('Добавить')}}@endif
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
