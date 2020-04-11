<li class="nav-item">
    <a class="nav-link {{request()->routeIs('index')? 'active':''}}" href="{{ route('index') }}">Главная</a>
</li>
<li class="nav-item">
    <a class="nav-link {{request()->routeIs('about')? 'active':''}}" href="{{ route('about') }}">О нас</a>
</li>
<li class="nav-item">
    <a class="nav-link {{request()->routeIs('news.index')? 'active':''}}"
       href="{{ route('news.index') }}">Новости</a></li>
<li class="nav-item">
    <a class="nav-link {{request()->routeIs('news.category.index')? 'active':''}}"
       href="{{ route('news.category.index') }}">Категории</a></li>
  <li class="nav-item">
    <a class="nav-link {{request()->routeIs('admin.index')? 'active':''}}"
       href="{{ route('admin.index') }}">Админка</a></li>
<!-- <li class="nav-item">
    <a class="nav-link {{request()->routeIs('auth')? 'active':''}}"
       href="{{ route('auth') }}">Вход</a></li>
<li class="nav-item">
    <a class="nav-link {{request()->routeIs('registration')? 'active':''}}"
       href="{{ route('registration') }}">Регистрация</a></li>-->

