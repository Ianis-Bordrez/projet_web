<?php
require_once("header.php");

$query = "SELECT * FROM item";

if (isset($_POST["submit"])) {
    $conditions = array();
    $conditions2 = array();
    
    if(!empty($_POST["PriceMin"])) {
        if(is_numeric($_POST["PriceMin"])) {
            $conditions[] = "price >= ".$_POST['PriceMin'];
        }
    }

    if(!empty($_POST["PriceMax"])) {
        if(is_numeric($_POST["PriceMax"])) {
            $conditions[] = "price <= ".$_POST['PriceMax'];
        }
    }

    if(!empty($_POST["levelMin"])) {
        if(is_numeric($_POST["levelMin"])) {
            $conditions[] = "level >= ".$_POST['levelMin'];
        }
    }

    if(!empty($_POST["levelMax"])) {
        if(is_numeric($_POST["levelMax"])) {
            $conditions[] = "level <= ".$_POST['levelMax'];
        }
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

$req = $db->prepare($query);
$req->execute();
$items = $req->fetchAll();
$req->closeCursor();

?>

<script src="js/wiki.js"></script>


<section>
    <div class="row">
        <div class="col-md-2 card bg-darkblue" style="width: 18rem;">
            <div class="card-body">
                <form action="wiki.php" method="post" class="form-example">
                    <h5 class="card-title txt-white">Filtres</h5>
                    <p class="card-text txt-white">Prix</p>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-lightlightblue txt-white" id="inputGroup-sizing-sm">Min</span>
                        </div>
                        <input name="PriceMin" type="text" class="form-control bg-lightblue txt-white" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-lightlightblue txt-white" id="inputGroup-sizing-sm">Max</span>
                        </div>
                        <input name="PriceMax" type="text" class="form-control bg-lightblue txt-white" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <p class="card-text txt-white">Niveaux</p>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-lightlightblue txt-white" id="inputGroup-sizing-sm">Min</span>
                        </div>
                        <input name="levelMin" type="text" class="form-control bg-lightblue txt-white" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-lightlightblue txt-white" id="inputGroup-sizing-sm">Max</span>
                        </div>
                        <input name="levelMax" type="text" class="form-control bg-lightblue txt-white" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <p class="card-text txt-white">Classes</p>
                    <div class="form-check form-check-inline">
                        <input name="check_box_class[]" class="form-check-input" type="checkbox" value="WARRIOR" id="checkWarrior">
                        <label class="form-check-label txt-white" for="checkWarrior">
                            Guerrier
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="check_box_class[]" class="form-check-input" type="checkbox" value="NINJA" id="checkNinja">
                        <label class="form-check-label txt-white" for="checkNinja">
                            Ninja
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="check_box_class[]" class="form-check-input" type="checkbox" value="SHAMAN" id="checkShaman">
                        <label class="form-check-label txt-white" for="checkShaman">
                            Chamane
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="check_box_class[]" class="form-check-input" type="checkbox" value="SURA" id="checkSura">
                        <label class="form-check-label txt-white" for="checkSura">
                            Sura
                        </label>
                    </div>
                    <button type="submit" name="submit" class="btn-sm btn-primary">Rechercher</button>
                </form>
            </div>
        </div>
        <div class="col-md-10">
            <input type="text" class="form-control text-center bg-darkblue txt-white" id="search_bar" onkeyup="search_bar()" placeholder="Rechercher un objet..">
            <div class="row mx-auto my-auto items">
                <?php
                foreach($items as $item){
                    $item_name = $item["name"];
                    $item_price = $item["price"];
                    $item_level = $item["level"];
                    ?>
                    <div class="item card col bg-darkblue" style="margin:20px; min-width: 12rem;">
                        <div class="card-body">
                            <h5 class="card-title txt-white"><?php echo $item_name ?></h5>
                            <ul class='list-group list-group-flush list-unstyled'>
                                <li class='list-group-item bg-lightblue txt-white'>Prix : <?php echo $item_price ?></li>
                                <li class='list-group-item bg-lightblue txt-white'>Niveaux : <?php echo $item_level ?></li>
                            </ul>
                        </div>
                    </div>
            <?php } ?>
            </div>
        </div>
    </div>
</section>


<script>
function search_bar() {
    var input, filter, items, item, i, txtValue;
    input = document.getElementById("search_bar");
    filter = input.value.toUpperCase();
    items = document.getElementById("items");
    item = document.getElementsByClassName("item");
    for (i = 0; i < item.length; i++) {
        text = item[i].getElementsByTagName("h5")[0];
        txtValue = text.textContent || text.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            item[i].style.display = "";
        } else {
            item[i].style.display = "none";
        }
    }
}
</script>


<?php
require_once("footer.php");
?>