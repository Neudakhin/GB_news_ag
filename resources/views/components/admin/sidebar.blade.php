<div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">
                <span data-feather="home" class="align-text-bottom"></span>
                Панель управления
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.category.index') }}">
                <span data-feather="folder" class="align-text-bottom"></span>
                Категории
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.news.index') }}">
                <span data-feather="file" class="align-text-bottom"></span>
                Новости
            </a>
        </li>
    </ul>
</div>