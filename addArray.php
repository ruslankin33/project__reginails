<?php
require_once('db.php');

	/*Создаёт массив с изображениями*/

$result = $pdo->query('SELECT id, url FROM nails');
$row = $result->fetchAll(PDO::FETCH_ASSOC);

	/*Создаёт массив с записями*/

$resultApp = $pdo->query("SELECT a.date, t.time, a.customer FROM appointment a INNER JOIN time t ON a.time_id = t.id ORDER BY a.date, t.time");
$rowApp = $resultApp->fetchAll(PDO::FETCH_ASSOC);
$date = time();
$month = [];
for($i = $date; $i < $date + 30 * 24 * 60 * 60; $i += 86400) {
	$dateYMD = date('Y-m-d', $i);
	$month[$dateYMD] = [];
}
$app = [];
foreach ($rowApp as $key => $value) {
	foreach ($month as $k => $v) {
		if ($value['date'] == $k) {
			$app['time'] = $value['time'];
            $app['customer'] = $value['customer'];
				if ( $value['customer'] ) {
					$app['color'] = '#F3A0A3';
				} else {
					$app['color'] = '#B5EEA0';
				}
			$month[$k][] = $app;
		}
	}
}
function rus_date() {
    $translate = array(
    "am" => "дп",
    "pm" => "пп",
    "AM" => "ДП",
    "PM" => "ПП",
    "Monday" => "Понедельник",
    "Mon" => "Пн",
    "Tuesday" => "Вторник",
    "Tue" => "Вт",
    "Wednesday" => "Среда",
    "Wed" => "Ср",
    "Thursday" => "Четверг",
    "Thu" => "Чт",
    "Friday" => "Пятница",
    "Fri" => "Пт",
    "Saturday" => "Суббота",
    "Sat" => "Сб",
    "Sunday" => "Воскресенье",
    "Sun" => "Вс",
    "January" => "Января",
    "Jan" => "Янв",
    "February" => "Февраля",
    "Feb" => "Фев",
    "March" => "Марта",
    "Mar" => "Мар",
    "April" => "Апреля",
    "Apr" => "Апр",
    "May" => "Мая",
    "May" => "Мая",
    "June" => "Июня",
    "Jun" => "Июн",
    "July" => "Июля",
    "Jul" => "Июл",
    "August" => "Августа",
    "Aug" => "Авг",
    "September" => "Сентября",
    "Sep" => "Сен",
    "October" => "Октября",
    "Oct" => "Окт",
    "November" => "Ноября",
    "Nov" => "Ноя",
    "December" => "Декабря",
    "Dec" => "Дек",
    "st" => "ое",
    "nd" => "ое",
    "rd" => "е",
    "th" => "ое"
    );
    if (func_num_args() > 1) {
        $timestamp = func_get_arg(1);
        return strtr(date(func_get_arg(0), $timestamp), $translate);
    } else {
        return strtr(date(func_get_arg(0)), $translate);
    }
}

	/*Создаёт массив с комментариями*/

$resultComment = $pdo->query('SELECT text, nick, date, media_id FROM comments');
$rowComment = $resultComment->fetchAll(PDO::FETCH_ASSOC);
$photoComment = [];
foreach ($rowComment as $key => $value) {
	$photoComment[$value['media_id']][] = ['date'=>$value['date'], 'nick'=>$value['nick'], 'text'=>$value['text'] ];
}

	/*Заполнение пустых записей в расписании*/

$dateStart = time() + 0 * 24 * 60 * 60; // День, с которого мы хотим начать заливать пустые записи
$monthArr = [];
for($i = $dateStart; $i < $dateStart + 30 * 24 * 60 * 60; $i += 86400) { //тут x * 24 * 60 * 60 - это количество дней, на которые я хочу увеличить число пустых записей
	$monthArr[] = date('Y-m-d', $i);
}
$time = [1,2,3,4,5,6];
foreach ($monthArr as $key => $value) {
	foreach ($time as $k => $v) {
		$sql = "INSERT INTO appointment (date, time_id) SELECT * FROM (SELECT :date, :time_id) AS tmp WHERE NOT EXISTS ( SELECT date FROM appointment WHERE date = :date AND time_id = :time_id) LIMIT 1";
		$params = [':date' => $value, ':time_id' => $v];

		$stmt = $pdo->prepare($sql);
		$stmt->execute($params);
	}
}