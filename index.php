<?php
require_once('addArray.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Reginails. Маникюр, педикюр</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/slick.css"/>
  	<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
  	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>

<body>
	<section id="main">
		<div class="container">
			<div class="row">
				<div class="nav_panel_left">
               <p>Reginails</p>
            </div>
            <div class="nav_panel_right">
					<div class="nav_btn">
						<a href="#2">Запись</a>
					</div>
					<div class="nav_btn">
						<a href="#3">Портфолио</a>
					</div>
					<div class="nav_btn">
						<a href="#4">Прайс</a>
					</div>
					<div class="nav_btn">
						<a href="#5">Карта</a>
					</div>
					<div class="nav_btn">
						<a data-toggle="modal" data-target="#auth_modal">Вход</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<a name="2"></a>
	<section id="appointment">
		<div class="container">
         <div class="calendar">
   			<div class="calendar_head">
   				<h2>Расписание</h2>
   			</div>
   			<div class="calendar_body owl-carousel">
   				<?php foreach ($month as $key => $value) { ?>

   				<div class="one_day">
   					<div class="date"><b><?= date('d.m.y', strtotime($key)) ?><br/><?= rus_date('D', strtotime($key)); ?></b></div> <!-- В расписание подставляем дату из БД -->
   					<?php foreach ($value as $val) { ?>

   					<div class="one_time" style="background-color: <?= $val['color'] ?>"><?= $val['time'] ?></div> <!-- В расписание подставляем время и статус из БД -->

   					<?php } ?>
   				</div>

   				<?php } ?>
   			</div>
            <div class="calendar_foot">
               <p><img src="/image/logo/phone-logo.png"> +7-917-499-45-25</p>
               <p><img src="/image/logo/whatsapp.png"> +7-917-499-45-25</p>
               <p><img src="/image/logo/vk-logo.png"> vk.com/idregina_m777</p>
            </div>
         </div>
		</div>
	</section>
	
	<a name="3"></a>
	<section id="nails">
		<div class="container">
			<div class="row">
				<div class="nails_head">
					<h2>Портфолио</h2>
				</div>
				
				<div class="main_block">
					<?php foreach ($row as $key => $value) { ?>
					<div class="image" onclick="photoModal(<?= $value['id'] ?>); return false;">
						<img src="/image/nails/<?= $value['url'] ?>" alt="nail">
					</div>
					<?php } ?>
				</div>
				
				
				<div class="blocks">
					<?php foreach ($row as $key => $value) { ?>
					<div class="image">
						<img src="/image/nails/<?= $value['url'] ?>" alt="nail">
					</div>
					<?php } ?>
				</div>
				
			</div>
		</div>
	</section>

	<a name="4"></a>
	<section id="price">
		<div class="container">
			<div class="row">
				<div class="price_head">
					<h2>Стоимость услуг</h2>
				</div>
				<div class="price_body">
					<p><span>Маникюр+гель-лак</span><span>300р</span></p>
					<p><span>Маникюр комбинированный</span><span>100р</span></p>
					<p><span>Снятие гель-лака</span><span>50р</span></p>
					<p><span>Педикюр+гель-лак</span><span>400р</span></p>
					<p><span>Педикюр с обработкой стоп</span><span>600р</span></p>
				</div>
			</div>
		</div>
	</section>

	<a name="5"></a>
	<section id="map">
		<div class="container">
			<div class="row">
				<div class="map_head">
					<h2>Как проехать</h2>
				</div>
				<div class="map_body">
					<img src="/image/map.gif">
				</div>
			</div>
		</div>		
	</section>

	<section id="footer">
		<div class="container">
			<p>© Reginails, 2018. Все права защищены.</p>
		</div>
	</section>

	<!-- Модальное окно авторизации-->

	<div class="modal fade" id="auth_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title" id="myModalLabel">Авторизация</h4>
	      </div>
	      <div class="modal-body">
	        <form action="auth.php" method="post">
				<input type="text" name="login">
				<input type="password" name="pwd">
				<button type="submit" name="button" class="btn btn-primary">Войти</button>
			</form>
	      </div>
	      <div class="modal-footer">
	        <!-- <a href="signup.php" class="btn btn-primary">Страница регистрации</a> -->
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Модальное окно комментариев -->

	<?php foreach ($row as $key => $value) { ?>
		<div class="modal fade" id="photo_modal_<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		        <h4 class="modal-title">Фото <?= $value['id'] ?></h4>
		      </div>
		      <div class="modal-body">
		        <img src="/image/nails/<?= $value['url'] ?>" class="img-fluid" alt="nail">
				<div id="comment_container_<?= $value['id'] ?>">
				    <?php if (!empty($photoComment[$value['id']])) {
				    foreach ($photoComment[$value['id']] as $k => $v) { ?>
				        <div>
				        	<p><?= $v['text'] ?></p>
				        </div>
				    <?php } } ?>
				</div>
		      </div>
			      <form action="" method="post" id="ajax_form_<?= $value['id'] ?>">
				      <input type="hidden" name="media_id" value="<?= $value['id'] ?>">
				      <div class="form-group col-xs-6">
					    <label class="sr-only" for="exampleInputName3">Name address</label>
					    <input type="text" class="form-control" name="nick" placeholder="Enter Name">
					  </div>
					  <div class="form-group col-xs-6">
					    <label class="sr-only" for="exampleInputCaptcha3">Captcha</label>
					    <input type="text" class="form-control" name="captcha" placeholder="Captcha">
					  </div>
				      <div class="form-group col-xs-12">
					    <label for="exampleTextarea">Example textarea</label>
					    <textarea class="form-control" name="text" rows="3"></textarea>
					  </div>
					  <div class="text-right">
					  	<button type="button" class="btn btn-success pull-right ajax_btn" onclick="photoComment(<?= $value['id'] ?>); return false;">Success</button>
					  </div>
			      </form>
			      
		      <div class="modal-footer">
		        <!-- <a href="signup.php" class="btn btn-primary">Страница регистрации</a> -->
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
	<?php } ?>

   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
   <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/slick.min.js"></script>
  	<script src="js/owl.carousel.min.js"></script>
  	<script src="js/main.js"></script>

</body>
</html>