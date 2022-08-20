<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">О нас</h4>
                    <p class="text-muted">Самый передовой агрегатор новостей. Будьте в курсе событий вместе с нами.</p>
                </div>
                <nav class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Меню</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('news.index') }}" class="text-white">Новости</a></li>
                        <li><a href="{{ route('category.index') }}" class="text-white">Категории</a></li>
                        <li><a href="{{ route('orders.index') }}" class="text-white">Заказать</a></li>
                        <li><a href="{{ route('reviews.index') }}" class="text-white">Отзывы</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="{{ route('welcome') }}" class="navbar-brand d-flex align-items-center">
                <img class="me-1" src="{{ asset('assets/svg/newspaper-report-svgrepo-com.svg') }}" width="30px" alt="Лого">
                <strong> News Aggregator</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
