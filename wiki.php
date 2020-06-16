<?php
require_once("header.php");
?>

<script src="js/wiki.js"></script>

<div class="card darkblue" style="width: 18rem;">
  <div class="card-body">
    <form action="script/s_wiki.php" method="post" class="form-example">
        <h5 class="card-title white">Filtres</h5>
        <p class="card-text white">Prix</p>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Min</span>
            </div>
            <input name="PrixMin" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Max</span>
            </div>
            <input name="PrixMax" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
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
        <button type="submit" class="btn btn-sm">Rechercher</button>
    </form>
  </div>
</div>





















<?
require_once("footer.php");
?>