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

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>


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
            <!-- ---------SUB-NAV--------- -->
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
					if (isConnected()) { ?>
							<li class='nav-item'>
								<a class='nav-link' href='script/s_signout.php'>Déconnexion</a>
							</li>
                    <?php
					} else { ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='signin_signup.php'>Connexion</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='signin_signup.php'>Inscription</a>
                        </li>

                    <?php
                    } ?>
					</ul>
				</div>
			</nav>
            <!-- ---------SUB-NAV-END--------- -->