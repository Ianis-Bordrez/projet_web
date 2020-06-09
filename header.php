<?php
require_once('script/config.php');

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Metin 2</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class = "darkblue">
            <div class="sidebar-header">
                <h3>Metin 2</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                    <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Profile</a>
                    <ul class="collapse list-unstyled" id="profileSubmenu">
                        <li>
                            <a href="account.php">Compte</a>
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
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Télécharger</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content" class= "lightblue">

            <nav class="navbar navbar-expand-lg darkblue">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn darkblue">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
						<?php
						if (isConnected()) { ?>
							<li class='nav-item'>
								<a class='nav-link white' href='script/s_signout.php'>Déconnexion</a>
							</li>
						<?php
						} else { ?>
							<li class='nav-item white'>
								<a class='nav-link' href='signin_signup.php'>Connexion</a>
							</li>
							<li class='nav-item'>
								<a class='nav-link white' href='signin_signup.php'>Inscription</a>
							</li>

						<?php
						} ?>
                        </ul>
                    </div>
                </div>
			</nav>