<?php
require_once("header.php");

$query = "SELECT * FROM item";

if (isset($_POST["submit"])) {
    $conditions = array();

    if(!empty($_POST["PriceMin"])) {
      $conditions[] = "price >= " . $_POST['PriceMin'];
    }
    if(!empty($_POST["PriceMax"])) {
        $conditions[] = "price <= " . $_POST['PriceMax'];
    }

    if (count($conditions) > 0) {
      $query .= " WHERE " . implode(' AND ', $conditions);
    }

}

$req = $db->prepare($query);
$req->execute();
$items = $req->fetchAll();
$req->closeCursor();


?>

<script src="js/wiki.js"></script>

<div class="card darkblue" style="width: 18rem;">
  <div class="card-body">
    <form action="wiki.php" method="post" class="form-example">
        <h5 class="card-title white">Filtres</h5>
        <p class="card-text white">Prix</p>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Min</span>
            </div>
            <input name="PriceMin" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Max</span>
            </div>
            <input name="PriceMax" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        <p class="card-text white">Niveaux</p>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Min</span>
            </div>
            <input name="NiveauMin" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Max</span>
            </div>
            <input name="NiveauMax" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        <p class="card-text white">Classes</p>
        <div class="form-check form-check-inline">
            <input name="checkWarrior" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label white" for="defaultCheck1">
                Guerrier
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input name="checkNinja" class="form-check-input" type="checkbox" value="" id="defaultCheck2">
            <label class="form-check-label white" for="defaultCheck2">
                Ninja
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input name="checkChamane" class="form-check-input" type="checkbox" value="" id="defaultCheck3">
            <label class="form-check-label white" for="defaultCheck3">
                Chamane
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input name="checkSure" class="form-check-input" type="checkbox" value="" id="defaultCheck4">
            <label class="form-check-label white" for="defaultCheck4">
                Sura
            </label>
        </div>
        <button type="submit" name="submit" lass="btn btn-sm">Rechercher</button>
    </form>
  </div>
</div>



<?php


foreach($items as $item){
    $item_name = $item["name"];

    ?>
    <div class="white"> <?php echo $item_name ?></div>

    <?php
}

?>



<?php
require_once("footer.php");
?>