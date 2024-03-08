<?php
include "db.php";
include "display_tracks.php";

// Обработка формы с фильтрами
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Получите значения фильтров
    $equipment = isset($_POST['equipment']) ? 'Да' : 'Нет';
    $maintenanceService = isset($_POST['maintenanceService']) ? 'Да' : 'Нет';
    $dressingRoom = isset($_POST['dressingRoom']) ? 'Да' : 'Нет';
    $HasEatery = isset($_POST['HasEatery']) ? 'Да' : 'Нет';
    $HasWifi = isset($_POST['HasWifi']) ? 'Да' : 'Нет';
    $HasFirstAidPost = isset($_POST['HasFirstAidPost']) ? 'Да' : 'Нет';
    $surfaceType = isset($_POST['surfaceType']) ? $_POST['surfaceType'] : '';
    $paid = isset($_POST['paid']) ? $_POST['paid'] : '';

    $perPage = isset($_POST['per_page']) ? intval($_POST['per_page']) : 10; // Количество записей на странице
    $currentPage = isset($_POST['page']) ? intval($_POST['page']) : 1; // Текущая страница

    // SQL-запрос с учетом выбранных фильтров
    $sql = "SELECT * FROM `tracks` WHERE 1";

    if ($equipment !== 'Нет') {
        $sql .= " AND HasEquipmentRental = 'Да'";
    }

    if ($maintenanceService !== 'Нет') {
        $sql .= " AND HasTechService = 'Да'";
    }

    if ($dressingRoom !== 'Нет') {
        $sql .= " AND HasDressingRoom = 'Да'";
    }
    if ($HasEatery !== 'Нет') {
        $sql .= " AND HasEatery = 'Да'";
    }
    if ($HasWifi !== 'Нет') {
        $sql .= " AND HasWifi = 'Да'";
    }
    if ($HasFirstAidPost !== 'Нет') {
        $sql .= " AND HasFirstAidPost = 'Да'";
    }
    if ($surfaceType !== '') {
        $sql .= " AND SurfaceTypeWinter = '$surfaceType'";
    }
    if ($paid !== '') {
        $sql .= " AND paid = '$paid'";
    }


    $offset = ($currentPage - 1) * $perPage;

    // Пагинация
    // Добавление LIMIT и OFFSET к SQL-запросу
    $sql .= " LIMIT $offset, $perPage";

    $result = mysqli_query($link, $sql);

    // Выводите результаты с использованием функции displayTracks
    displayTracks($result);

    exit; // Прерывание выполнения скрипта после отправки данных
}
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

    <div class="container mt-5">
        <!-- Форма с фильтрами -->
        <form id="filterForm">
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="equipment" id="equipmentCheckbox">
                        <label class="form-check-label" for="equipmentCheckbox">
                            Возможность проката оборудования
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="maintenanceService"
                            id="maintenanceServiceCheckbox">
                        <label class="form-check-label" for="maintenanceServiceCheckbox">
                            Наличие сервиса технического обслуживания
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dressingRoom" id="dressingRoomCheckbox">
                        <label class="form-check-label" for="dressingRoomCheckbox">
                            Наличие гардеробной
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="HasEatery" id="HasEateryCheckbox">
                        <label class="form-check-label" for="HasEateryCheckbox">
                            Наличие точки питания
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="HasWifi" id="HasWifiCheckbox">
                        <label class="form-check-label" for="HasWifiCheckbox">
                            Наличие WI-FI
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="HasFirstAidPost"
                            id="HasFirstAidPostCheckbox">
                        <label class="form-check-label" for="HasFirstAidPostCheckbox">
                            Наличие медпункта
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="surfaceTypeSelect" class="form-label">Тип снега</label>
                    <select class="form-select" name="surfaceType" id="surfaceTypeSelect">
                        <option value="">Тип покрытия</option>
                        <option value="Натуральный снег">Натуральный снег</option>
                        <option value="Искусственный снег">Искусственный снег</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="paidSelect" class="form-label">Цена</label>
                    <select class="form-select" name="paid" id="paid">
                        <option value="">Выберите цену</option>
                        <option value="Бесплатно">Бесплатно</option>
                        <option value="Платно">Платно(уточните цену)</option>
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <button type="submit" class="btn btn-primary" id="findButton">Найти</button>
                </div>
                <div class="pagination-info">
                    <span>
                        Показывать по
                        <select name="per-page" class="per-page-btn">
                            <option>5</option>
                            <option selected>10</option>
                            <option>15</option>
                            <option>20</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                        записей на странице
                    </span>
                    <span class="current-interval-info">
                        Показаны записи с <span class="current-interval-start">1</span> по <span
                            class="current-interval-end">10</span><span class="total-count"></span>
                    </span>
                    <ul class="pagination"></ul>
                </div>
        </form>
    </div>
    </div>

    <div class="container-fluid table-responsive">
        <table class="table" id="recordsTable">
            <!-- Заголовки таблицы -->
            <thead>
                <tr>
                    <th scope="col">Наименование</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">График работы</th>
                </tr>
            </thead>
            <tbody>
                <!-- Содержимое tbody -->
                <?php
                // Вывод данных
                if (isset($result)) {
                    displayTracks($result);
                }
                ?>
            </tbody>
        </table>
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
</body>

</html>