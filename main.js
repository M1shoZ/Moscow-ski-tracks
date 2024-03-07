//  Скрипт Ajax
$(document).ready(function () {
    // Обработка отправки формы с фильтрами через Ajax
    $(document).on("submit", "#filterForm", function (e) {
        e.preventDefault(); // Предотвращение отправки формы по умолчанию
        $.ajax({
            type: "POST",
            url: "tracks.php",
            data: $(this).serialize(), // Сериализация данных формы
            success: function (response) {
                $("#recordsTable tbody").html(response); // Замена содержимого tbody результатами
            }
        });
    });
});



