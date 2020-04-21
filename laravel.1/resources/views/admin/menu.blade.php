<li class="nav-item">
    <a class="nav-link {{request()->routeIs('admin.index')? 'active':''}}"
       href="{{ route('index') }}">Главная</a></li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle"
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
<li class="nav-item">
    <a class="nav-link {{request()->routeIs('admin.updateUser')? 'active':''}}"
       href="{{ route('admin.updateUser') }}">Работа с профилями</a></li>
<li class="nav-item">
    <a class="nav-link {{request()->routeIs('admin.parser')? 'active':''}}"
       href="{{ route('admin.parser') }}">Спарсить новости</a></li>
