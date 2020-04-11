<li class="nav-item">
    <a class="nav-link {{request()->routeIs('admin.index')? 'active':''}}"
       href="{{ route('index') }}">Главная</a></li>
<li class="nav-item">
    <a class="nav-link {{request()->routeIs('admin.addNews')? 'active':''}}"
       href="{{ route('admin.addNews') }}">Добавить новость</a></li>
