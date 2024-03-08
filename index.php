<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css\style.css">
    <title>Moscow ski tracks</title>
</head>


<body>

    <!-- Прелоадер -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- Навигационная панель -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="fas fa-snowflake-o" aria-hidden="true"></span> Moscow ski tracks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tracks.php">Найти трассу</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <section class="py-4 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 tc">
                    <h1 class="display-4">
                        <!-- добавить иконки -->
                        <span class=""></span> Moscow Ski Tracks
                    </h1>
                    <p class="lead">Сервис для поиска лыжных трасс в Москве</p>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="images\1693271243_pushinka-top-p-katanie-na-lizhakh-kartinki-dlya-detei-pin-59.jpg"
                        class="img-fluid rounded" alt="Привлекательная картинка">
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Особенности сервиса</h2>
            <div class="row">
                <div class="col-md-4">
                    <img class="possibilities" src="icons\Headset-PNG-Image.png" alt="">
                    <h4>Связь с администрацией</h4>
                    <p>Предоставим контактные данные администрации трассы</p>
                </div>
                <div class="col-md-4">
                    <img class="possibilities" src="icons\cross_country_skiing-1024.webp" alt="">
                    <h4>Большое количество трасс</h4>
                    <p>Вам доступны более 400 различных трасс в городе Москва</p>
                </div>
                <div class="col-md-4">
                    <img class="possibilities" src="icons\noun_people_1277303_000000.png" alt="">
                    <h4>Клиентоориентированность</h4>
                    <p>Мы предоставляем большое количество характеристик о лыжных трассах</p>
                </div>
            </div>
        </div>
    </section>


    <section id="search-tracks" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images\hm-web-image-3-w1500.jpg" class="img-fluid rounded" alt="Изображение трассы">
                </div>
                <div class="col-md-6">
                    <h2>Поиск лыжных трасс</h2>
                    <p class="lead">Подбор лыжных трасс по характеристикам</p>
                    <a href="tracks.php" class="btn btn-primary">Найти трассу</a>
                </div>
            </div>
        </div>
    </section>


    <div class="map">
        <div id="yandexMap" style="width: 100%; height: 590px;"></div>
    </div>


    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Свяжитесь с нами</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Имя</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Сообщение</label>
                            <textarea class="form-control" id="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-light text-center py-3">
        <div class="container">
            <div class="row">
                <!-- Колонка "Специализация сервиса" -->
                <div class="col-lg-6">
                    <h5>Специализация сервиса</h5>
                    <ul class="specialization-list">
                        <li><i class="fas fa-skiing"></i> Лыжные трассы</li>
                        <li><i class="fas fa-skiing-nordic"></i> Горнолыжные трассы</li>
                        <li><i class="fas fa-th-large"></i> Другое</li>
                    </ul>
                </div>
                <!-- Колонка "Поддержка" -->
                <div class="col-lg-6">
                    <h5>Поддержка</h5>
                    <ul class="support-list">
                        <li><i class="fas fa-phone"></i> Телефон: +7 (911) 500-00-70 </li>
                        <li><i class="fas fa-envelope"></i> Почта: mikzakaryan@mail.ru</li>
                        <li><i class="fas fa-globe"></i> Источник данных: <a
                                href="https://data.mos.ru/opendata/1233?pageSize=10&pageIndex=1&isDynamic=false"
                                target="_blank">data.mos.ru</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p>© 2024 Moscow ski tracks. Все права защищены.</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // JavaScript для скрытия прелоадера после загрузки страницы
        window.addEventListener("load", function () {
            var preloader = document.getElementById("preloader");
            preloader.style.display = "none";
        });
    </script>


    <script src="https://api-maps.yandex.ru/2.1/?apikey=748f4927-077a-4a37-85e3-12a909fb54f6&lang=ru_RU"
        type="text/javascript"></script>

    <script>
        ymaps.ready(init);

        // Функция инициализации карты
        function init() {
            // Создание объекта карты
            var myMap = new ymaps.Map('yandexMap', {
                center: [55.7558, 37.6176], // Координаты центра карты (центр Москвы)
                zoom: 10 // Уровень масштабирования
            });

            // Добавление метки на карту
            var myPlacemark = new ymaps.Placemark([55.7558, 37.6176], {
                hintContent: 'Москва!', // Всплывающая подсказка при наведении на метку
                balloonContent: 'Столица России' // Содержание информационного окна при клике на метку
            });

            // Добавление метки на карту через геообъекты
            myMap.geoObjects.add(myPlacemark);

            // Добавление поискового контрола
            var searchControlRight = new ymaps.control.SearchControl({
                options: {
                    noPlacemark: true, // Отключение отображения метки результата поиска на карте
                    float: 'right', // Размещение контрола справа
                    provider: 'yandex#search' // Поставщик данных для поиска 
                }
            });

            // Добавление поискового контрола на карту
            myMap.controls.add(searchControlRight);

            // Обработка события изменения границ карты 
            myMap.events.add('boundschange', function (event) {
                // Установка границ для поискового контрола, основанного на событии изменения границ
                searchControlRight.options.set('boundedBy', event.get('newBounds'));
            });
        }

    </script>


</body>

</html>