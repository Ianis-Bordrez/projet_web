<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/hamburger.css" rel="stylesheet">
    <title>bootstrap 4 sidebar</title>
  </head>
  <body>
   
    <div class="wrapper">
   		<nav id="sidebar">
   			<div class="sidebar-header">
   				<h3>Metin 2</h3>
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
   					<a href="#">Chat</a>
   				</li>
   				<li>
   					<a href="#">Wiki</a>
   				</li>
				<li>
   					<a href="#">Forum</a>
   				</li>
   			</ul>
		</nav>
   	<div class="content">
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
		</nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script>
	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
		});  
	</script>
  	<script>
		// Look for .hamburger
		var hamburger = document.querySelector(".hamburger");
		// On click
		hamburger.addEventListener("click", function() {
		// Toggle class "is-active"
		hamburger.classList.toggle("is-active");
		// Do something else, like open/close menu
		});
	</script>
  </body>
</html>