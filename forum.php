<?php
require_once("header.php");


$req = $db->prepare('SELECT post_id, account_id, title, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS "CreationDateFr" FROM post ORDER BY creation_date DESC LIMIT 0, 5');
$req->execute();
$posts = $req->fetchall();
$req->closeCursor();
?>

<section>

<?php
if ($posts) { ?>

    <?php
    foreach($posts as $post) {
        $post_id = htmlspecialchars($post["post_id"]);
        $account_id = htmlspecialchars($post["account_id"]);
        $title = htmlspecialchars($post["title"]);
        $creation_date = htmlspecialchars($post["CreationDateFr"]);

        $req = $db->prepare('SELECT username FROM account WHERE account_id = :account_id');
        $req->bindParam('account_id', $account_id);
        $req->execute();
        $username = $req->fetch()['username'];
        $req->closeCursor();

        ?>

        <article>
            <div class='card darkblue white borderpost'>
                <div class='card-header'>
                    <?php echo $title; ?>
                </div>
                <div class='card-body'>
                    <form action='post.php' method='post'>
                        <button class="btn btn-outline-light" type='submit' name='pid' value='<?php echo $post_id; ?>'>Voir le post</button>
                    </form>
                </div>
                <div class='card-footer text-muted'>
                    <div class="row">
                        <div class="col-md-10">
                            <blockquote class='blockquote mb-0'>
                            <footer class='blockquote-footer'><cite title='Source Title'><?php echo $username; ?></cite></footer>
                            </blockquote>
                            <?php echo $creation_date; ?>
                        </div>
                        <div class="col-md-2">
                            <?php
                            if($_SESSION["account_id"] == $account_id || $_SESSION["status"] == "ADMIN") { ?>
                                <form action="script/post/s_delete_post.php" method="post">
                                    <button class="btn btn-primary" type="submit" name="pid" value="<?php echo $post_id; ?>">Supprimer</button>
                                </form>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    <?php
    }

} else { ?>
<?php
}
if (isConnected()) { ?>
<article>
    <form action='script/post/s_post.php' method='post'>
        <div class="form-group white">
            <h3>Nouveau post</h3>
            <label for="post_title" class="col-4 col-form-label">Titre*</label> 
            <input id="post_title" name="post_title" placeholder="Titre" class="form-control here" required="required" type="text">
            <label for="post_text" class="col-4 col-form-label">Contenu*</label> 
            <textarea class="form-control" placeholder="Contenu de votre post" id="post_text" name="post_text" rows="3"></textarea>
        </div>
        <button class="btn btn-outline-light" type='submit' name='pid'>Écrire</button>
    </form>
</article>
<?php } ?>

</section>

<?php
require_once("footer.php");
?>