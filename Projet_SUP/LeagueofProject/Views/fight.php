<!doctype html>
	<head>
		<title>Choose your Game</title>
		<meta name="description" content="Jeu en POO">
		<meta name="keywords" content="POOgame">
		<meta name="author" content="Guillaume Flambard, Romain Grelet, Benjamin Guibault, Bastien Henry, Faustine Larmagna">
		<meta charset="UTF-8">
		<link rel= "stylesheet" href= "assets/styles/style.css"/>
		<link href='http://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="assets/js/jquery.js"></script>
	</head>
	
	<body>
		<header>
			<span id="title">EpicAwesomeAnimalsWarTournament</span>
			<a href="index.php?action=home"><button id="restart_button" style="text-align:center">Start New Game</button></a>
		</header>
		<section>
			<div id="wrapper">
				<div id="interfaces">
					<div class="player1" id="player1game">
						<h1 class="h1player1" id="h1player1game">Player 1 - <?php echo $player1->data['classe']; ?></h1><br><br>
						<div class="stats">
							<!--<img src="../images/<?php $player1->data['classe']; ?>.jpg" alt="classe's picture"><br>-->
							<span class="stat_style">Health :</span> <span class="health"><?php echo $player1->data['health_point']; ?></span>/<?php echo $player1->data['max_hp']; ?> pts<br>
							<span class="stat_style">Strength :</span> <span class="strength"><?php echo $player1->data['strength']; ?></span> pts<br>
							<span class="stat_style">Intelligence :</span> <span class="intelligence"><?php echo $player1->data['intelligence']; ?></span> pts<br>
						</div>
						<div class="power">
							<?php
								$i=0;
								foreach ($player1->getSkills() as $key => $skill) {
									$i++;
									echo '<button class="action action'.$i.'" name="'.$key.'">'.$skill.'</button><br>';
								}
							?>
						</div>
					</div>
					<div class="player1" id="player1dead">
						<h1 class="h1player1" id="h1player1dead">Player 1 - <?php echo $player1->data['classe']; ?> </h1><br><br>
						<p style="margin-top:170px;font-family:ABeeZee;font-size:45px;color:#fff;font-weight:bold;">YOU LOOSE</p>
					</div>
					<div class="player1" id="player1win">
						<h1 class="h1player1" id="h1player1win">Player 1 - <?php echo $player1->data['classe']; ?> </h1><br><br>
						<p style="margin-top:170px;font-family:ABeeZee;font-size:45px;color:#fff;font-weight:bold;">YOU WIN</p>
					</div>
					<div class="player2" id="player2game">
						<h1 class="h1player2" id="h1player2game">Player 2 - <?php echo $player2->data['classe']; ?></h1><br><br>
						<div class="stats">
							<!--<img src="../images/<?php $player2->data['classe']; ?>.jpg" alt="classe's picture"><br>-->
							<span class="stat_style">Health :</span> <span class="health"><?php echo $player2->data['health_point']; ?></span>/<?php echo $player2->data['max_hp']; ?> pts<br>
							<span class="stat_style">Strength :</span> <span class="strength"><?php echo $player2->data['strength']; ?></span> pts<br>
							<span class="stat_style">Intelligence :</span> <span class="intelligence"><?php echo $player2->data['intelligence']; ?></span> pts<br>
						</div>
						<div class="power">
							<?php
								$i=0;
								foreach ($player2->getSkills() as $key => $skill) {
									$i++;
									echo '<button class="action action'.$i.'" name="'.$key.'">'.$skill.'</button><br>';
								}
							?>
						</div>
					</div>
					<div class="player2" id="player2dead">
						<h1 class="h1player2" id="h1player2dead">Player 2 - <?php echo $player2->data['classe']; ?> </h1><br><br>
						<p style="margin-top:170px;font-family:ABeeZee;font-size:45px;color:#fff;font-weight:bold;">YOU LOOSE</p>
					</div>
					<div class="player2" id="player2win">
						<h1 class="h1player2" id="h1player2win">Player 2 - <?php echo $player2->data['classe']; ?></h1><br><br>
						<p style="margin-top:170px;font-family:ABeeZee;font-size:45px;color:#fff;font-weight:bold;">YOU WIN</p>
					</div>
				</div>
			</div>
		</section>
		<footer></footer>
	</body>
	<script type="text/javascript">
		$('.player1 .action1').click(function() {
//on fait un appel ajax en reperant chaque bouton par classe player et par classe action
		$.post('index.php?action=attack', {
			attaquant: "player1",
			action: $('.player1 .action1').attr('name'),
			enemy: "player2"
		}, function(data) {
				console.log(data);
				stats = $.parseJSON(data);
				console.log(stats);
			//on récupere un tableau qui a deux clé 1 et 2
			//1 donne accès au $this->data de l'attaquant et 2 a celui de l'ennemi
			//on check chaque stat 1 a 1
				if ($('.player1 .health').html != stats[1]['health_point']){
					$('.player1 .health').html(stats[1]['health_point']);
				}

				if (stats[1]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player2win').fadeIn('slow');
					$('#player1dead').fadeIn('slow');
				}
				
				if (stats[2]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player1win').fadeIn('slow');
					$('#player2dead').fadeIn('slow');
				}


				if ($('.player1 .strength').html != stats[1]['strength']){
					$('.player1 .strength').html(stats[1]['strength']);
				}

				if ($('.player1 .intelligence').html != stats[1]['intelligence']) {
					$('.player1 .intelligence').html(stats[1]['intelligence']);
				}

				if ($('.player2 .health').html != stats[2]['health_point']) {
					$('.player2 .health').html(stats[2]['health_point']);
				}

				if ($('.player2 .strength').html != stats[2]['strength']) {
					$('.player2 .strength').html(stats[2]['strength']);
				}

				if ($('.player2 .intelligence').html != stats[2]['intelligence']) {
					$('.player2 .intelligence').html(stats[2]['intelligence']);
				}
			});
		});

		$('.player1 .action2').click(function() {

			$.post('index.php?action=attack', {
				attaquant: "player1",
				action: $('.player1 .action2').attr('name'),
				enemy: "player2"
			}, function(data) {
				console.log(data);
				stats = $.parseJSON(data);
				console.log(stats);
				if ($('.player1 .health').html != stats[1]['health_point']){
					$('.player1 .health').html(stats[1]['health_point']);
				}

				if (stats[1]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player2win').fadeIn('slow');
					$('#player1dead').fadeIn('slow');
				}
				
				if (stats[2]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player1win').fadeIn('slow');
					$('#player2dead').fadeIn('slow');
				}

				if ($('.player1 .strength').html != stats[1]['strength']){
					$('.player1 .strength').html(stats[1]['strength']);
				}

				if ($('.player1 .intelligence').html != stats[1]['intelligence']) {
					$('.player1 .intelligence').html(stats[1]['intelligence']);
				}

				if ($('.player2 .health').html != stats[2]['health_point']) {
					$('.player2 .health').html(stats[2]['health_point']);
				}

				if ($('.player2 .strength').html != stats[2]['strength']) {
					$('.player2 .strength').html(stats[2]['strength']);
				}

				if ($('.player2 .intelligence').html != stats[2]['intelligence']) {
					$('.player2 .intelligence').html(stats[2]['intelligence']);
				}
			});
		});

		$('.player1 .action3').click(function() {

			$.post('index.php?action=attack', {
				attaquant: "player1",
				action: $('.player1 .action3').attr('name'),
				enemy: "player2"
			}, function(data) {
				console.log(data);
				stats = $.parseJSON(data);
				console.log(stats);
				if ($('.player1 .health').html != stats[1]['health_point']){
					$('.player1 .health').html(stats[1]['health_point']);
				}

				if (stats[1]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player2win').fadeIn('slow');
					$('#player1dead').fadeIn('slow');
				}
				
				if (stats[2]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player1win').fadeIn('slow');
					$('#player2dead').fadeIn('slow');
				}

				if ($('.player1 .strength').html != stats[1]['strength']){
					$('.player1 .strength').html(stats[1]['strength']);
				}

				if ($('.player1 .intelligence').html != stats[1]['intelligence']) {
					$('.player1 .intelligence').html(stats[1]['intelligence']);
				}

				if ($('.player2 .health').html != stats[2]['health_point']) {
					$('.player2 .health').html(stats[2]['health_point']);
				}

				if ($('.player2 .strength').html != stats[2]['strength']) {
					$('.player2 .strength').html(stats[2]['strength']);
				}

				if ($('.player2 .intelligence').html != stats[2]['intelligence']) {
					$('.player2 .intelligence').html(stats[2]['intelligence']);
				}
			});
		});

		$('.player1 .action4').click(function() {

			$.post('index.php?action=attack', {
				attaquant: "player1",
				action: $('.player1 .action4').attr('name'),
				enemy: "player2"
			}, function(data) {
				console.log(data);
				stats = $.parseJSON(data);
				console.log(stats);
				if ($('.player1 .health').html != stats[1]['health_point']){
					$('.player1 .health').html(stats[1]['health_point']);
				}

				if (stats[1]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player2win').fadeIn('slow');
					$('#player1dead').fadeIn('slow');
				}
				
				if (stats[2]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player1win').fadeIn('slow');
					$('#player2dead').fadeIn('slow');
				}

				if ($('.player1 .strength').html != stats[1]['strength']){
					$('.player1 .strength').html(stats[1]['strength']);
				}

				if ($('.player1 .intelligence').html != stats[1]['intelligence']) {
					$('.player1 .intelligence').html(stats[1]['intelligence']);
				}

				if ($('.player2 .health').html != stats[2]['health_point']) {
					$('.player2 .health').html(stats[2]['health_point']);
				}

				if ($('.player2 .strength').html != stats[2]['strength']) {
					$('.player2 .strength').html(stats[2]['strength']);
				}

				if ($('.player2 .intelligence').html != stats[2]['intelligence']) {
					$('.player2 .intelligence').html(stats[2]['intelligence']);
				}
			});
		});

		$('.player1 .action5').click(function() {

			$.post('index.php?action=attack', {
				attaquant: "player1",
				action: $('.player1 .action5').attr('name'),
				enemy: "player2"
			}, function(data) {
				console.log(data);
				stats = $.parseJSON(data);
				console.log(stats);
				if ($('.player1 .health').html != stats[1]['health_point']){
					$('.player1 .health').html(stats[1]['health_point']);
				}

				if (stats[1]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player2win').fadeIn('slow');
					$('#player1dead').fadeIn('slow');
				}
				
				if (stats[2]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player1win').fadeIn('slow');
					$('#player2dead').fadeIn('slow');
				}

				if ($('.player1 .strength').html != stats[1]['strength']){
					$('.player1 .strength').html(stats[1]['strength']);
				}

				if ($('.player1 .intelligence').html != stats[1]['intelligence']) {
					$('.player1 .intelligence').html(stats[1]['intelligence']);
				}

				if ($('.player2 .health').html != stats[2]['health_point']) {
					$('.player2 .health').html(stats[2]['health_point']);
				}

				if ($('.player2 .strength').html != stats[2]['strength']) {
					$('.player2 .strength').html(stats[2]['strength']);
				}

				if ($('.player2 .intelligence').html != stats[2]['intelligence']) {
					$('.player2 .intelligence').html(stats[2]['intelligence']);
				}
			});
		});

		$('.player2 .action1').click(function() {

			$.post('index.php?action=attack', {
				attaquant: "player2",
				action: $('.player2 .action1').attr('name'),
				enemy: "player1"
			}, function(data) {
				console.log(data);
				stats = $.parseJSON(data);
				console.log(stats)
				if ($('.player2 .health').html != stats[1]['health_point']){
					$('.player2 .health').html(stats[1]['health_point']);
				}

				if (stats[1]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player1win').fadeIn('slow');
					$('#player2dead').fadeIn('slow');
				}

				if (stats[2]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player2win').fadeIn('slow');
					$('#player1dead').fadeIn('slow');
				}

				if ($('.player2 .strength').html != stats[1]['strength']){
					$('.player2 .strength').html(stats[1]['strength']);
				}

				if ($('.player2 .intelligence').html != stats[1]['intelligence']) {
					$('.player2 .intelligence').html(stats[1]['intelligence']);
				}

				if ($('.player1 .health').html != stats[2]['health_point']) {
					$('.player1 .health').html(stats[2]['health_point']);
				}

				if ($('.player1 .strength').html != stats[2]['strength']) {
					$('.player1 .strength').html(stats[2]['strength']);
				}

				if ($('.player1 .intelligence').html != stats[2]['intelligence']) {
					$('.player1 .intelligence').html(stats[2]['intelligence']);
				}
			});
		});

		$('.player2 .action2').click(function() {

			$.post('index.php?action=attack', {
				attaquant: "player2",
				action: $('.player2 .action2').attr('name'),
				enemy: "player1"
			}, function(data) {
				console.log(data);
				stats = $.parseJSON(data);
				console.log(stats)
				if ($('.player2 .health').html != stats[1]['health_point']){
					$('.player2 .health').html(stats[1]['health_point']);
				}

				if (stats[1]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player1win').fadeIn('slow');
					$('#player2dead').fadeIn('slow');
				}

				if (stats[2]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player2win').fadeIn('slow');
					$('#player1dead').fadeIn('slow');
				}


				if ($('.player2 .strength').html != stats[1]['strength']){
					$('.player2 .strength').html(stats[1]['strength']);
				}

				if ($('.player2 .intelligence').html != stats[1]['intelligence']) {
					$('.player2 .intelligence').html(stats[1]['intelligence']);
				}

				if ($('.player1 .health').html != stats[2]['health_point']) {
					$('.player1 .health').html(stats[2]['health_point']);
				}

				if ($('.player1 .strength').html != stats[2]['strength']) {
					$('.player1 .strength').html(stats[2]['strength']);
				}

				if ($('.player1 .intelligence').html != stats[2]['intelligence']) {
					$('.player1 .intelligence').html(stats[2]['intelligence']);
				}
			});
		});

		$('.player2 .action3').click(function() {

			$.post('index.php?action=attack', {
				attaquant: "player2",
				action: $('.player2 .action3').attr('name'),
				enemy: "player1"
			}, function(data) {
				console.log(data);
				stats = $.parseJSON(data);
				console.log(stats)
				if ($('.player2 .health').html != stats[1]['health_point']){
					$('.player2 .health').html(stats[1]['health_point']);
				}

				if (stats[1]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player1win').fadeIn('slow');
					$('#player2dead').fadeIn('slow');
				}

				if (stats[2]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player2win').fadeIn('slow');
					$('#player1dead').fadeIn('slow');
				}

				if ($('.player2 .strength').html != stats[1]['strength']){
					$('.player2 .strength').html(stats[1]['strength']);
				}

				if ($('.player2 .intelligence').html != stats[1]['intelligence']) {
					$('.player2 .intelligence').html(stats[1]['intelligence']);
				}

				if ($('.player1 .health').html != stats[2]['health_point']) {
					$('.player1 .health').html(stats[2]['health_point']);
				}

				if ($('.player1 .strength').html != stats[2]['strength']) {
					$('.player1 .strength').html(stats[2]['strength']);
				}

				if ($('.player1 .intelligence').html != stats[2]['intelligence']) {
					$('.player1 .intelligence').html(stats[2]['intelligence']);
				}
			});
		});

		$('.player2 .action4').click(function() {

			$.post('index.php?action=attack', {
				attaquant: "player2",
				action: $('.player2 .action4').attr('name'),
				enemy: "player1"
			}, function(data) {
				console.log(data);
				stats = $.parseJSON(data);
				console.log(stats)
				if ($('.player2 .health').html != stats[1]['health_point']){
					$('.player2 .health').html(stats[1]['health_point']);
				}

				if (stats[1]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player1win').fadeIn('slow');
					$('#player2dead').fadeIn('slow');
				}

				if (stats[2]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player2win').fadeIn('slow');
					$('#player1dead').fadeIn('slow');
				}

				if ($('.player2 .strength').html != stats[1]['strength']){
					$('.player2 .strength').html(stats[1]['strength']);
				}

				if ($('.player2 .intelligence').html != stats[1]['intelligence']) {
					$('.player2 .intelligence').html(stats[1]['intelligence']);
				}

				if ($('.player1 .health').html != stats[2]['health_point']) {
					$('.player1 .health').html(stats[2]['health_point']);
				}

				if ($('.player1 .strength').html != stats[2]['strength']) {
					$('.player1 .strength').html(stats[2]['strength']);
				}

				if ($('.player1 .intelligence').html != stats[2]['intelligence']) {
					$('.player1 .intelligence').html(stats[2]['intelligence']);
				}
			});
		});

		$('.player2 .action5').click(function() {

			$.post('index.php?action=attack', {
				attaquant: "player2",
				action: $('.player2 .action5').attr('name'),
				enemy: "player1"
			}, function(data) {
				console.log(data);
				stats = $.parseJSON(data);
				console.log(stats)
				if ($('.player2 .health').html != stats[1]['health_point']){
					$('.player2 .health').html(stats[1]['health_point']);
				}

				if (stats[1]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player1win').fadeIn('slow');
					$('#player2dead').fadeIn('slow');
				}

				if (stats[2]['health_point'] <= 0) {
					$('#player2game').hide();
					$('#player1game').hide();
					$('#player2win').fadeIn('slow');
					$('#player1dead').fadeIn('slow');
				}

				if ($('.player2 .strength').html != stats[1]['strength']){
					$('.player2 .strength').html(stats[1]['strength']);
				}

				if ($('.player2 .intelligence').html != stats[1]['intelligence']) {
					$('.player2 .intelligence').html(stats[1]['intelligence']);
				}

				if ($('.player1 .health').html != stats[2]['health_point']) {
					$('.player1 .health').html(stats[2]['health_point']);
				}

				if ($('.player1 .strength').html != stats[2]['strength']) {
					$('.player1 .strength').html(stats[2]['strength']);
				}

				if ($('.player1 .intelligence').html != stats[2]['intelligence']) {
					$('.player1 .intelligence').html(stats[2]['intelligence']);
				}
			});
		});
	</script>
</html>

				