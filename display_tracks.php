<?php
// Функция для вывода данных трасс
function displayTracks($result)
{
    while ($row = $result->fetch_assoc()) {
        // Преобразование расписания работы
        // $row['WorkingHoursWinter'] = formatWorkingHours($row['WorkingHoursWinter']);
        echo "<tr>";
        echo "<td>" . $row["ObjectName"] . "</td>";
        echo "<td>" . $row["Address"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>+7" . $row["HelpPhone"] . "</td>";
        echo "<td>" . $row["WorkingHoursWinter"] . "</td>";
        echo "<td><a href='track_details.php?id=" . $row['global_id'] . "' class='btn btn-primary'>Подробнее</a></td>";
        echo "</tr>";
    }
}
?>