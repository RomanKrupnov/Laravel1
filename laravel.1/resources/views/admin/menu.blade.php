<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #adb5bd !important;">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('main') }}"> Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.addNews') }}"> Добавить новость <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.deleteNews') }}"> Удалить новость <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

