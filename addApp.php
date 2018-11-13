<?php
require_once('db.php');

$dateApp = $_POST['date'];
$timeApp = $_POST['time'];
$custApp = $_POST['customer'];

if ( !empty($dateApp) && !empty($timeApp) && !empty($custApp) ) {

	$resultAdd = $pdo->query("SELECT a.customer FROM appointment a INNER JOIN time t ON a.time_id = t.id WHERE a.date = '" . $dateApp . "' AND t.time = '" . $timeApp . "' ");
	$rowAdd = $resultAdd->fetchAll(PDO::FETCH_ASSOC);

	if ( empty($rowAdd[0]['customer']) ) {

		$sql = "UPDATE appointment a INNER JOIN time t ON a.time_id = t.id SET a.customer = :customer WHERE a.date = :date AND t.time = :time";
		$params = [':customer' => $custApp, ':date' => $dateApp, ':time' => $timeApp];
		$stmt = $pdo->prepare($sql);
		$stmt->execute($params);

		echo 'Запись успешно внесена!';
	} else {
		echo 'Запись уже существует, сначала удалите её!';
	} ?>
	<a href="admin.php">Вернуться назад</a>
<?php
} else {
	echo 'Пожалуйста, заполните все поля';
}