<li class="nav-item">
    <a class="nav-link"
       href="{{ route('index') }}">Главная</a></li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" {{request()->routeIs('admin.index')? 'active':''}}
       href="{{ route('admin.news.index') }}" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false" v-pre>Работа с новостями</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown
        {{request()->routeIs('admin.addNews')? 'active':''}}">
        <a class="dropdown-item" href="{{ route('admin.news.create') }}">Добавить новость</a>
        <a class="dropdown-item" href="{{ route('admin.news.index') }}">Редактировать новости</a>

    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle"
       href="{{ route('admin.category.index') }}" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false" v-pre>Работа с категориями</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown
        {{request()->routeIs('admin.addCategory')? 'active':''}}">
        <a class="dropdown-item" href="{{ route('admin.category.create') }}">Добавить категорию</a>
        <a class="dropdown-item" href="{{ route('admin.category.index') }}">Работа с категориями</a>
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle"
       href="{{ route('admin.indexUser') }}" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false" v-pre>Работа с профилями</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown
        {{request()->routeIs('admin.indexUser')? 'active':''}}">
        <a class="dropdown-item" href="{{ route('admin.indexUser') }}">Редактирование акаунтов</a>
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" {{request()->routeIs('admin.index')? 'active':''}}
    href="{{ route('admin.news.index') }}" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false" v-pre>Работа с парсером</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown
        {{request()->routeIs('admin.parser')? 'active':''}}">
        <a class="dropdown-item" href="{{ route('admin.parser') }}">Спарсить новости</a>
        <a class="dropdown-item" href="{{ route('admin.addResources') }}">Добавить ссылку для парсера</a>
        <a class="dropdown-item" href="{{ route('admin.resourcesIndex') }}">Редактировать ссылки парсера</a>
    </div>
</li>
