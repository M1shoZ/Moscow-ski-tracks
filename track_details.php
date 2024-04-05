<?php
include "db.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="main.js" defer></script>
    <link rel="stylesheet" href="css\style.css">
    <title>Moscow ski tracks</title>
</head>


<body>
    <!-- Навигационная панель -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
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



    <div class="container mt-5  mb-3">
    <h1>Подробнее о трассе</h1>
    <div class="track-details">
        <?php
        // Вывод данных
        if (isset($_GET['id'])) {
            // Получаем идентификатор трассы из URL
            $trackId = $_GET['id'];

            // Формируем SQL-запрос для получения данных о трассе по ее идентификатору
            $sql = "SELECT * FROM `tracks` WHERE `global_id` = '$trackId'";
            $result = mysqli_query($link, $sql);

            // Проверяем, есть ли результаты запроса
            if (mysqli_num_rows($result) > 0) {
                // Получаем данные трассы
                $trackData = mysqli_fetch_assoc($result);
                ?>
                <div>
                    <strong>Наименование:</strong> <?php echo $trackData['ObjectName']; ?>
                </div>
                <div>
                    <strong>Адрес:</strong> <?php echo $trackData['Address']; ?>
                </div>
                <div>
                    <strong>Почта:</strong> <?php echo $trackData['Email']; ?>
                </div>
                <div>
                    <strong>Номер телефона:</strong> +7 <?php echo $trackData['HelpPhone']; ?>
                </div>
                <div>
                    <strong>Сайт:</strong> <?php echo $trackData['WebSite']; ?>
                </div>
                <div>
                    <strong>Прокат оборудования: </strong> <?php echo $trackData['HasEquipmentRental']; ?>
                </div>
                <div>
                    <strong>Сервис технического обслуживания:</strong> <?php echo $trackData['HasTechService']; ?>
                </div>
                <div>
                    <strong>Гардероб:</strong> <?php echo $trackData['HasDressingRoom']; ?>
                </div>
                <div>
                    <strong>Наличие точки питания:</strong> <?php echo $trackData['HasEatery']; ?>
                </div>
                <div>
                    <strong>WI-FI:</strong> <?php echo $trackData['HasWifi']; ?>
                </div>
                <div>
                    <strong>Музыка:</strong> <?php echo $trackData['HasMusic']; ?>
                </div>
                <div>
                    <strong>Освещение:</strong> <?php echo $trackData['Lighting']; ?>
                </div>
                <div>
                    <strong>Сиденья:</strong> <?php echo $trackData['Seats']; ?>
                </div>
                <div>
                    <strong>Цена:</strong> <?php echo $trackData['Paid']; ?>
                </div>
                <div>
                    <strong>Возможность передвижения коньковым ходом:</strong> <?php echo $trackData['IsFreestyleSki']; ?>
                </div>
                <div>
                    <strong>График работы:</strong> <?php echo $trackData['WorkingHoursWinter']; ?>
                </div>
                
                <?php
            } else {
                echo "<p>Трасса с указанным идентификатором не найдена.</p>";
            }
        } else {
            echo "<p>Идентификатор трассы не указан.</p>";
        }
        ?>
    </div>
</div>

    <!-- Карта -->
    <div class="map" style="margin-bottom: 40px;">
        <div id="yandexMap" style="width: 80%; height: 400px; margin: 0 auto;"></div>
    </div>

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


    <script src="https://api-maps.yandex.ru/2.1/?apikey=748f4927-077a-4a37-85e3-12a909fb54f6&lang=ru_RU"
        type="text/javascript"></script>

    <script>
        ymaps.ready(init);

        // Функция инициализации карты
        function init() {
            console.log("Initializing map...");

            <?php
            $sql = "SELECT 
            SUBSTRING_INDEX(SUBSTRING_INDEX(geoData, '[', -1), ',', 1) AS longitude,
            SUBSTRING_INDEX(SUBSTRING_INDEX(geoData, ',', -2), ']', 1) AS latitude, ObjectName, Address
            FROM tracks WHERE `global_id` = '$trackId'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            // Получение координат трассы
            $latitude = $row['latitude'];
            $longitude = $row['longitude'];
            ?>

            // Создание объекта карты
            var myMap = new ymaps.Map('yandexMap', {
                center: [<?= $latitude ?>, <?= $longitude ?>], // Координаты центра карты (центр Москвы)
                zoom: 15 // Уровень масштабирования
            });

            // Создание метки на карте с координатами трассы
            var placemark = new ymaps.Placemark([<?= $latitude ?>, <?= $longitude ?>], {
                hintContent: '<?= $row["ObjectName"] ?>',
                // balloonContent: 'Название объекта: <?= $row["ObjectName"] ?><br>Адрес: <?= $row["Address"] ?>',
            });
            myMap.geoObjects.add(placemark);
            console.log("Markers added to map.");

            // Добавление поискового контрола
            var searchControlRight = new ymaps.control.SearchControl({
                options: {
                    noPlacemark: true,
                    float: 'right',
                    provider: 'yandex#search'
                }
            });

            // Добавление поискового контрола на карту
            myMap.controls.add(searchControlRight);

            // Обработка события изменения границ карты 
            myMap.events.add('boundschange', function (event) {
                // Установка границ для поискового контрола, основанного на событии изменения границ
                searchControlRight.options.set('boundedBy', event.get('newBounds'));
            });
            console.log("Map initialization complete.");
        }
    </script>


</body>

</html>