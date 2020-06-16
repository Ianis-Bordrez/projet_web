<?php
require_once("header.php");

$query = "SELECT * FROM item";

if (isset($_POST["submit"])) {
    $conditions = array();
    $conditions2 = array();
    
    if(!empty($_POST["PriceMin"])) {
      $conditions[] = "price >= ".$_POST['PriceMin'];
    }

    if(!empty($_POST["PriceMax"])) {
        $conditions[] = "price <= ".$_POST['PriceMax'];
    }

    if(!empty($_POST["levelMin"])) {
        $conditions[] = "level >= ".$_POST['levelMin'];
    }

    if(!empty($_POST["levelMax"])) {
        $conditions[] = "level <= ".$_POST['levelMax'];
    }

    if (!empty($_POST["check_box_class"])) {
        foreach($_POST["check_box_class"] as $check_class) {
            $conditions2[] = "class LIKE '%".$check_class."%'";
        }
    }
    
    if (count($conditions) > 0) {
        $query .= " WHERE " . implode(' AND ', $conditions);
    }

    if (count($conditions2) > 0) {
        if (!strpos($query, "WHERE")) {
            $query .= " WHERE ";
        } else {
            $query .= " AND ";
        }

        $query .=  implode(' OR ', $conditions2);
    }

}
echo $query;


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
            <input name="levelMin" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Max</span>
            </div>
            <input name="levelMax" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        <p class="card-text white">Classes</p>
        <div class="form-check form-check-inline">
            <input name="check_box_class[]" class="form-check-input" type="checkbox" value="WARRIOR" id="checkWarrior">
            <label class="form-check-label white" for="checkWarrior">
                Guerrier
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input name="check_box_class[]" class="form-check-input" type="checkbox" value="NINJA" id="checkNinja">
            <label class="form-check-label white" for="checkNinja">
                Ninja
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input name="check_box_class[]" class="form-check-input" type="checkbox" value="SHAMAN" id="checkShaman">
            <label class="form-check-label white" for="checkShaman">
                Chamane
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input name="check_box_class[]" class="form-check-input" type="checkbox" value="SURA" id="checkSura">
            <label class="form-check-label white" for="checkSura">
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