<?php
require_once('db.php');

$nick = !empty($_POST['nick']) ? $_POST['nick'] : false;
$text = !empty($_POST['text']) ? $_POST['text'] : false;
$ip = !empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
$media_id = !empty($_POST['media_id']) ? $_POST['media_id'] : false;
$captcha = !empty($_POST['captcha']) ? $_POST['captcha'] : false;
$date = date('Y-m-d h-i-s');

if ($nick && $text && $ip && $captcha && $media_id) {
	$sql = "INSERT INTO comments(nick, text, ip, media_id, date) VALUES (:nick, :text, :ip, :media_id, :date)";
	$params = [':nick' => $nick, ':text' => $text, ':ip' => $ip, ':media_id' => $media_id, ':date' => $date];

	$stmt = $pdo->prepare($sql);
	if ($stmt->execute($params)) {
		$result = $pdo->query("SELECT nick, text, date FROM comments WHERE media_id = '" . $media_id . "' ORDER BY date DESC LIMIT 1");
		$row = $result->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($row);
	}
};