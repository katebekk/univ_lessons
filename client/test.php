<?php
/*$now = new \DateTime(); // текущее время (метка времени)
$now1= date_format($now, 'Y-m-d');
$your_date = strtotime("2020-10-01"); // какая-то дата в строке (1 января 2017 года)
$datediff = $now1 - $your_date; // получим разность дат (в секундах)

echo floor($datediff / (60 * 60 * 24)); // вычислим количество дней из разности да*/
$date1 = new \DateTime();
$date2 = new DateTime('2020-11-15');
$datediff = $date1->diff($date2);
echo $datediff->format('%a')*2;
