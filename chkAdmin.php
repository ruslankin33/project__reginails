<?php

require_once 'db.php';

if ( isset($_SESSION['user_login']) ) {
} else {
	die('Нет доступа к странице');
}