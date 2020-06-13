<?php
require_once('header.php');

isNotConnectedRedirect();


$req = $db->prepare('SELECT SUM(account_id) AS "number_of_player" FROM player WHERE account_id=:account_id');
$req->bindParam('account_id', $_SESSION['account_id']);
$req->execute();
$nb_char = $req->fetch()["number_of_player"];
$req->closeCursor();

$req = $db->prepare('SELECT account_id, name, level, class, gender, hp, mp, gold FROM player WHERE account_id=:account_id');
$req->bindParam('account_id', $_SESSION['account_id']);
$req->execute();
$characters = $req->fetchall();
$req->closeCursor();
?>

<section>
	<div class="row mx-auto my-auto">
<?php
if ($characters) {
	foreach($characters as $character) {
		$char_name = $character["name"];
		$char_level = $character["level"];
		$char_gold = $character["gold"];
		$char_class = $character["class"];
		$char_gender = $character["gender"];

		if ($char_gender == "MALE") {
			$char_img = "img/char/char_m_".$char_class.".png";
		} else {
			$char_img = "img/char/char_w_".$char_class.".png";
		}
		
		?>
		<article class="col-md-3">
			<div class="card" style="width: 15em;">
				<img class="card-img-top" src="<?php echo $char_img; ?>" alt="Image personnage">
				<div class="card-body">
					<h5 class="card-title"><?php echo $char_name; ?></h5>
					<ul class='list-group list-group-flush list-unstyled'>
						<li class='list-group-item'><?php echo "Niveaux $char_level"; ?></li>
						<li class='list-group-item'><?php echo "$char_gold Yangs"; ?></li>
					</ul>
				</div>
			</div>
		</article>
	<?php
	}
}
?>
	</div>
</section>

<?php
if ($nb_char < 4) { ?>

	<a href="create_char.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Créer un personnage</a>

<?php
}

?>




<?php
require_once('footer.php');
?>