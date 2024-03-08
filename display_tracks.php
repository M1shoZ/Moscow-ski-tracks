<?php
// Функция для вывода данных трасс
function displayTracks($result)
{
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ObjectName"] . "</td>";
        echo "<td>" . $row["Address"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["HelpPhone"] . "</td>";
        echo "<td>" . $row["WorkingHoursWinter"] . "</td>";
        echo "</tr>";
    }
}
?>