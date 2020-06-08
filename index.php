<?php
require_once("header.php");
?>


<div class="row mx-auto my-auto"> <!-- Sub-Header -->
<?php
if (isConnected()) { ?>
	<div class='col-9'>
<?php
} else { ?>
	<div class='col'>
<?php
} ?>
		<!-- ---------CAROUSEL--------- -->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
				<!-- Taille img : 2767 x 657 -->
				<img class="d-block w-100" src="img/mainlogo.png" alt="First slide">
				</div>
				<div class="carousel-item">
				<img class="d-block w-100" src="img/mainlogo.png" alt="Second slide">
				</div>
				<div class="carousel-item">
				<img class="d-block w-100" src="img/mainlogo.png" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<!-- ---------CAROUSEL-END--------- -->
<?php
if (isConnected()) {
	$username = $_SESSION['username'];?>
	<div class='col'>
		<div class='card' style='width: 18rem;'>
			<div class='card-header'>
				Pannel utilisateur
			</div>
			<div class='card-body'>
				<ul class='list-group list-group-flush list-unstyled'>
					<li class='list-group-item'><h5 class='card-title'>Bienvenue <?php echo $username; ?></h5></li>
					<a href='..' class='list-group-item list-group-item-action'><li><img src='img/person.svg' alt='person'> Mon compte</li></a>
					<a href='..' class='list-group-item list-group-item-action'><li>Mes personnages</li></a>
					<a href='..' class='list-group-item list-group-item-action'><li>Rechargement</li></a>
				</ul>
			</div>
		</div>
	</div>
<?php
} ?>
</div> <!-- Sub-Header -->

<div class='row mx-auto my-auto sub-sontent'> <!-- Sub-Content -->
	<section class='col-9'>
		<?php

		$req = $db->prepare('SELECT title, account_id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM news ORDER BY creation_date DESC LIMIT 0, 5');
		$req->execute();
		$news = $req->fetchall();
		$req->closeCursor();
		foreach ($news as $new) {
			$title = htmlspecialchars($new['title']);
			$account_id = htmlspecialchars($new['account_id']);
			$content = nl2br(htmlspecialchars($new['content']));
			$date = htmlspecialchars($new['creation_date_fr']);

			$req = $db->prepare('SELECT username FROM account WHERE account_id=:account_id');
			$req->execute(array('account_id' => $account_id));
			$username = $req->fetch()['username'];
			$req->closeCursor(); ?>
			<article>
				<div class='card'>
					<div class='card-header'>
						<?php echo $title; ?>
					</div>
					<div class='card-body'>
						<blockquote class='blockquote mb-0'>
						<p><?php echo $content; ?></p>
						<footer class='blockquote-footer'><cite title='Source Title'><?php echo $username; ?></cite></footer>
						</blockquote>
					</div>
					<div class='card-footer text-muted'>
						<?php echo $date; ?>
					</div>
				</div>
			</article>
		<?php
		} ?>
	</section>
	<aside class='col'>
		<div class='card aside-card' style='width: 18rem;'>
			<div class='card-header'>
				Statistiques
			</div>
			<div class='card-body'>
				<ul class='list-group list-group-flush list-unstyled'>
					<li class='list-group-item'>Comptes connectés </li>
					<li class='list-group-item'>Comptes créés </li>
					<li class='list-group-item'>Joueurs créés </li>
				</ul>
			</div>
		</div>

		<div class='card aside-card' style='width: 18rem;'>
			<div class='card-header'>
				Classement
			</div>
			<div class='card-body'>
				<ul class='list-group list-group-flush list-unstyled'>
					<li class='list-group-item'><h5 class='card-title'>Joueurs/guildes</h5></li>
					<li class='list-group-item'>- Joueur</li>
					<li class='list-group-item'>- Joueur</li>
					<li class='list-group-item'>- Joueur</li>
				</ul>
			</div>
		</div>
	</aside>
</div> <!-- Sub-Content -->

<?php
require_once("footer.php");
?>