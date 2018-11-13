<?php
require_once 'addArray.php';
require_once 'chkAdmin.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Страница админа</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>
<body>

	<section id="header">
		<div class="container">
			<div class="head">
				<p>Панель администратора!</p>
				<p><a href="logout.php"><button type="button" class="btn btn-secondary">Выход из аккаунта</button></a></p>
			</div>
		</div>
	</section>

	<section id="admin">
		<div class="container">
			<div class="row">
				<div class="buttons">
					<a data-toggle="modal" data-target="#addApp"><button type="button" class="btn btn-secondary">Добавить запись</button></a>
					<a data-toggle="modal" data-target="#dropApp"><button type="button" class="btn btn-secondary">Удалить запись</button></a>
					<a data-toggle="modal" data-target="#myModal"><button type="button" class="btn btn-secondary">Загрузить фото</button></a>
				</div>
				<div class="calendar">
					<div class="calendar_head">
						<p>Расписание</p>
					</div>
					<div class="calendar_body owl-carousel">
						<?php foreach ($month as $key => $value) { ?>

						<div class="one_day">
							<div class="date"><b><?= date('d.m.y', strtotime($key)) ?><br/><?= rus_date('D', strtotime($key)); ?></b></div> <!-- В расписание подставляем дату из БД -->
							<?php foreach ($value as $val) { ?>

							<div class="one_time" style="background-color: <?= $val['color'] ?>"><?= $val['time'] ?><br><span class="customer"><?= $val['customer'] ?></span></div> <!-- В расписание подставляем время и статус из БД -->

							<?php } ?>
						</div>

						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Модальное окно добавления записи-->

	<div class="modal fade" id="addApp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title" id="myModalLabel">Добавление записи</h4>
	      </div>
	      <div class="modal-body">
	        <form action="addApp.php" method="post">
				<p>Выберите дату записи:
					<input type="date" name="date" class="btn btn-secondary" required/>
				</p>
				<p>Выберите время записи:
					<select name="time">
					    <option value="10:00">10:00</option>
					    <option value="12:00">12:00</option>
					    <option value="14:00">14:00</option>
					    <option value="16:00">16:00</option>
					    <option value="18:00">18:00</option>
					    <option value="20:00">20:00</option>
				   </select>
				<p>Клиент:
					<input type="text" name="customer" class="btn btn-secondary" required/>
				</p>
				<input type="submit" value="Отправить" class="btn btn-primary"/>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Модальное окно удаления записи-->

	<div class="modal fade" id="dropApp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title" id="myModalLabel">Удаление записи</h4>
	      </div>
	      <div class="modal-body">
	        <form action="delApp.php" method="post">
				<p>Выберите дату записи:
					<input type="date" name="date" class="btn btn-secondary" required/>
				</p>
				<p>Выберите время записи:
					<select name="time">
				    <option value="10:00">10:00</option>
				    <option value="12:00">12:00</option>
				    <option value="14:00">14:00</option>
				    <option value="16:00">16:00</option>
				    <option value="18:00">18:00</option>
				    <option value="20:00">20:00</option>
				   </select>
				<input type="submit" value="Удалить запись" class="btn btn-primary"/>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Модальное окно загрузки фото-->

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title" id="myModalLabel">Загрузка фотографий</h4>
	      </div>
	      <div class="modal-body">
	        <form action="action.php" method="post" enctype="multipart/form-data">
				<p>Выбрать фотографию:
					<input type="file" name="pictures" class="btn btn-secondary"/>
					<input type="submit" value="Отправить" class="btn btn-primary"/>
				</p>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
