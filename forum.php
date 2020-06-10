<?php
require_once("header.php");


$req = $db->prepare('SELECT post_id, account_id, title, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 5');
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
        $creation_date = htmlspecialchars($post["creation_date_fr"]);

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
                    <blockquote class='blockquote mb-0'>
                    <footer class='blockquote-footer'><cite title='Source Title'><?php echo $username; ?></cite></footer>
                    </blockquote>
                    <?php echo $creation_date; ?>
                </div>
            </div>
        </article>
    <?php
    }

} else { ?>

<?php
}
?>

</section>

<?php
require_once("footer.php");
?>