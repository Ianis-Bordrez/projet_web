<?php
require_once('script/config.php');
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/hamburger.css">
	<link rel="stylesheet" href="css/main.css">

    <title>Metin 2</title>

  </head>
  <body>
    <div class="wrapper">
		<!-- ---------------------NAVIGATION--------------------- -->
   		<nav id="sidebar" class="darkblue">
   			<div class="sidebar-header">
   				<h1>Metin 2</h1>
   			</div>
   			<ul class="list-unstyled components">
   				<li class="active">
   					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Accueil</a>
   				</li>
   				<li>
					<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile</a>
					<ul class="collapse list-unstyled" id="pageSubmenu">
						<li>
							<a href="#">Compte</a>
						</li>
						<li>
							<a href="#">Personnage</a>
						</li>
   					</ul> 
   				</li>
   				<li>
   					<a href="chat.php">Chat</a>
   				</li>
   				<li>
   					<a href="#">Wiki</a>
   				</li>
				<li>
   					<a href="#">Forum</a>
   				</li>
   			</ul>
			<ul class="list-unstyled CTAs">
				<li>
					<a href="#" class="download">Télécharger</a>
				</li>
   			</ul>
		</nav>
		<!-- ---------------------NAVIGATION-END--------------------- -->

		<!-- ---------------------CONTENT--------------------- -->
		<div class="content lightblue">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button id="sidebarCollapse" class="hamburger hamburger--emphatic is-active" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
				<!--<a class="navbar-brand" href="#">Navbar</a> -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
					</li>
					<?php
					if (isConnected()) {
						echo"
							<li class='nav-item'>
								<a class='nav-link' href='script/s_signout.php'>Déconnexion</a>
							</li>
						";
					} else {
						echo"
							<li class='nav-item'>
								<a class='nav-link' href='signin_signup.php'>Connexion</a>
							</li>
							<li class='nav-item'>
								<a class='nav-link' href='signin_signup.php'>Inscription</a>
							</li>
						";
					}
					?>
					</ul>
				</div>
			</nav>

			<div class="row mx-auto my-auto">
				<?php
					if (isConnected()) {
						echo "<div class='col-9'>";
					} else {
						echo "<div class='col'>";
					}
				?>
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
				$username = $_SESSION['username'];
				echo "
					<div class='col'>
						<div class='card' style='width: 18rem;'>
							<div class='card-header'>
								Pannel utilisateur
							</div>
							<div class='card-body'>
								<ul class='list-group list-group-flush list-unstyled'>
									<li class='list-group-item'><h5 class='card-title'>Bienvenue $username</h5></li>
									<a href='..' class='list-group-item list-group-item-action'><li><img src='img/person.svg' alt='person'> Mon compte</li></a>
									<a href='..' class='list-group-item list-group-item-action'><li>Mes personnages</li></a>
									<a href='..' class='list-group-item list-group-item-action'><li>Rechargement</li></a>
								</ul>
							</div>
						</div>
					</div>
				";
			}
			echo "
				</div>
				<div class='row mx-auto my-auto main-content'>
					<section class='col-9'>";

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
				$req->closeCursor();
				echo "<article>";
				echo "
						<div class='card'>
							<div class='card-header'>
								$title
							</div>
							<div class='card-body'>
								<blockquote class='blockquote mb-0'>
								<p>$content</p>
								<footer class='blockquote-footer'><cite title='Source Title'>$username</cite></footer>
								</blockquote>
							</div>
							<div class='card-footer text-muted'>
								$date
							</div>
						</div>
					</article>
					";
				}

			echo "
				</section>
				<aside class='col'>
				";

			echo "
				<div class='card aside-card' style='width: 18rem;'>
					<div class='card-header'>
						Statistiques
					</div>
					<div class='card-body'>
						<ul class='list-group list-group-flush list-unstyled'>
							<li class='list-group-item'>Joueurs connectés </li>
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
				
			";
			
			?>
			</aside>
		</div>

	</div>
		<!-- ---------------------CONTENT-END--------------------- -->
	</div>

    <!-- ---------------------OPTION--------------------- -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- ---------------------OPTION-END--------------------- -->
	
	<script>
	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
		});  
	</script>

	<!-- ---------------------HAMBURGER--------------------- -->
  	<script>
		var hamburger = document.querySelector(".hamburger");
		hamburger.addEventListener("click", function() {
		hamburger.classList.toggle("is-active");
		});
	</script>
	<!-- ---------------------HAMBURGER-END--------------------- -->
  </body>
</html>