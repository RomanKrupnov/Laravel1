@extends('layouts.main')
@section('title','Редактор категорий')
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.category.create') }}">
                                        @if($category->id){{__('Edit category')}}@else{{__('Add category')}}@endif</a></li>
                            </ol>
                        </nav>
                    </div>
                    <h1 style="margin-top: 20px;margin-left: auto;margin-right: auto;font-size: 55px;">Редактирование категории</h1>

                    <form enctype="multipart/form-data" method="POST" action="{{ route('admin.category.update',$category) }}"
                          style="width: 800px !important;margin-left: auto;margin-right: auto;">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="categoryTitle">Название категории</label>
                            <input name="category" type="text" class="form-control is-invalid" id="categoryTitle"
                                   value="{{ $category->category ?? old('category') }}">
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
                                   value="{{ $category->slug ?? old('slug') }}">
                            @if ($errors->has('slug'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('slug') as $error)
                                        <p  class="is-valid">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left:30vw;margin-bottom: 30px; margin-top: 20px;">
                            Изменить
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
