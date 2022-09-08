<div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link @if(route('admin.index') == url()->current())active @endif" aria-current="page" href="{{ route('admin.index') }}">
                <span data-feather="home" class="align-text-bottom"></span>


                Панель управления
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(route('admin.categories.index') == url()->current())active @endif" href="{{ route('admin.categories.index') }}">
                <span data-feather="folder" class="align-text-bottom"></span>
                Категории
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(route('admin.news.index') == url()->current())active @endif" href="{{ route('admin.news.index') }}">
                <span data-feather="file" class="align-text-bottom"></span>
                Новости
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(route('admin.reviews.index') == url()->current())active @endif" href="{{ route('admin.reviews.index') }}">
                <span data-feather="file" class="align-text-bottom"></span>
                Отзывы
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(route('admin.orders.index') == url()->current())active @endif" href="{{ route('admin.orders.index') }}">
                <span data-feather="file" class="align-text-bottom"></span>
                Заказы
            </a>
        </li>
    </ul>
</div>
