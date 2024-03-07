<?php
// Функция для вывода данных трасс
function displayTracks($result)
{
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ObjectName"] . "</td>";
        echo "<td>" . $row["NameWinter"] . "</td>";
        echo "<td>" . $row["Address"] . "</td>";
        echo "</tr>";
    }
}
?>
