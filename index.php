<?php
require_once("header.php");


$req = $db->prepare('SELECT sum(account_id) AS "NumberOfUsers" FROM account');
$req->execute();
$nb_accounts = $req->fetch()["NumberOfUsers"];
if (!$nb_accounts){
	$nb_accounts = 0;
}
$req->closeCursor();

$req = $db->prepare('SELECT sum(player_id) AS "NumberOfPlayers" FROM player');
$req->execute();
$nb_players = $req->fetch()["NumberOfPlayers"];
if (!$nb_players){
	$nb_players = 0;
}
$req->closeCursor();

$req = $db->prepare('SELECT account_id, last_activity FROM account');
$req->execute();
$accounts = $req->fetchAll();
$req->closeCursor();

$online_account = 0;

foreach($accounts as $account) {
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 15 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	if($account["last_activity"] > $current_timestamp) {
        $online_account++;
    }
}

$req = $db->prepare('SELECT title, account_id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS "CreationDateFr" FROM news ORDER BY creation_date DESC LIMIT 0, 5');
$req->execute();
$news = $req->fetchall();
$req->closeCursor();

$req = $db->prepare('SELECT name, point FROM player ORDER BY point DESC LIMIT 0, 7');
$req->execute();
$players = $req->fetchall();
$req->closeCursor();

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
		<div class='card bg-darkblue txt-white' style='max-width: 18rem;'>
			<div class='card-header bg-lightlightblue'>
				Pannel utilisateur
			</div>
			<div class='card-body'>
				<ul class='list-group list-group-flush list-unstyled'>
					<li class='list-group-item bg-darkblue'><h5 class='card-title'>Bienvenue <?php echo $username; ?></h5></li>
					<a href='account.php' class='list-group-item list-group-item-action bg-darkblue txt-white bg-hover-purple'><li>Mon compte</li></a>
					<a href='char.php' class='list-group-item list-group-item-action bg-darkblue txt-white bg-hover-purple'><li>Mes personnages</li></a>
					<!-- <a href='..' class='list-group-item list-group-item-action bg-darkblue txt-white'><li>Rechargement</li></a> -->
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
		foreach ($news as $new) {
			$title = htmlspecialchars($new['title']);
			$account_id = htmlspecialchars($new['account_id']);
			$content = nl2br(htmlspecialchars($new['content']));
			$date = htmlspecialchars($new['CreationDateFr']);

			$req = $db->prepare('SELECT username FROM account WHERE account_id=:account_id');
			$req->bindParam('account_id', $account_id);
			$req->execute();
			$username = $req->fetch()['username'];
			$req->closeCursor();
			?>
			<article>
				<div class='card bg-darkblue borderpost txt-white'>
					<div class='card-header bg-lightlightblue'> 
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
		<div class='card aside-card bg-darkblue txt-white' style='max-width: 18rem;'>
			<div class='card-header bg-lightlightblue'>
				Statistiques
			</div>
			<div class='card-body'>
				<ul class='list-group list-group-flush list-unstyled'>
					<li class='list-group-item bg-darkblue'>Comptes connectés : <?php echo $online_account; ?></li>
					<li class='list-group-item bg-darkblue'>Comptes créés : <?php echo $nb_accounts; ?></li>
					<li class='list-group-item bg-darkblue'>Joueurs créés : <?php echo $nb_players; ?></li>
				</ul>
			</div>
		</div>
		<div class='card aside-card bg-darkblue txt-white' style='max-width: 18rem; min-width: 17rem'>
			<div class='card-header bg-lightlightblue'>
				Classement
			</div>
			<div class='card-body'>
				<ul class='list-group list-group-flush list-unstyled'>
					<ul class="nav nav-tabs row" id="myTab" role="tablist">
						<li class="nav-item col-md-6">
							<a
								class="nav-link active"
								id="home-tab"
								data-toggle="tab"
								href="#home"
								role="tab"
								aria-controls="home"
								aria-selected="true"
							>Joueurs</a>
						</li>
						<li class="nav-item col-md-6">
							<a
								class="nav-link"
								id="profile-tab"
								data-toggle="tab"
								href="#profile"
								role="tab"
								aria-controls="profile"
								aria-selected="false"
							>Guildes</a>
						</li>
					</ul>
						<div class="tab-content" id="myTabContent">
							<div
								class="tab-pane fade show active"
								id="home"
								role="tabpanel"
								aria-labelledby="home-tab"
								>
								<ul class='list-group list-group-flush list-unstyled'>
									<li class='list-group-item bg-darkblue'>
										<div class="row font-weight-bold">
											<div class="col text-left"><?php echo "Nom" ?></div>
											<div class="col text-right"><?php echo "Points" ?></div>
										</div>
									</li>
									<?php
									if ($players) {
										foreach ($players as $player) {
											$name = htmlspecialchars($player['name']);
											$point = htmlspecialchars($player['point']);
											?>
											<li class='list-group-item bg-darkblue'>
												<div class="row">
													<div class="col-9 text-left"><?php echo "$name" ?></div>
													<div class="col text-center"><?php echo "$point" ?></div>
												</div>
											</li>
									<?php } 
									} else { ?>
										<li class='list-group-item'><?php echo "Aucun joueur" ?></li>
								<?php } ?>
								</ul>
							</div>
						<div
							class="tab-pane fade"
							id="profile"
							role="tabpanel"
							aria-labelledby="profile-tab"
							>
							<ul class='list-group list-group-flush list-unstyled'>
								<li class='list-group-item bg-darkblue'>
									<div class="row font-weight-bold">
										<div class="col text-left"><?php echo "Nom" ?></div>
										<div class="col text-right"><?php echo "Points" ?></div>
									</div>
								</li>
								<li class='list-group-item bg-darkblue'>
									<div class="row">
										<div class="col-9 text-left">Guilde</div>
										<div class="col text-center">20</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</aside>
</div> <!-- Sub-Content -->
<?php
require_once("footer.php");
?>