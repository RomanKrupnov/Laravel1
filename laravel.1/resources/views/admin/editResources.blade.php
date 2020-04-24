@extends('layouts.main')
@section('title')
    Редактор ссылки парсера
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')

    <div class="container" style="min-height: 500px;">
        <div class="row justify-content-center">
            <div class="col-md-8 card">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.resourcesIndex') }}">Parser Edit</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.editResources',$resources) }}">Edit Link </a></li>
                        </ol>
                    </nav>

                </div>
                <h2>Редактор ссылки парсера</h2>
                <form method="POST" action="{{ route('admin.updateResources', $resources) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="linkName">Адрес ссылки на ресурс</label>
                        <input name='link' type="text" class="form-control" id="linkName"
                               value="{{  $resources->link ?? old('link') }}">
                        @if ($errors->has('link'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('link') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary"
                            style="margin-left:23vw;margin-bottom: 30px; margin-top: 20px;">Изменить</button>
                </form>
            </div>
        </div>
    </div>
@endsection

