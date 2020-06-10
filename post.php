<?php
require_once("header.php");

$pid = null;

if (isset($_GET["pid"])){
    $pid = $_GET["pid"];
} else if (isset($_POST["pid"])) {
    $pid = $_POST["pid"];
} else {
    // redirect("forum.php");
}

$req = $db->prepare('SELECT post_id, account_id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM post WHERE post_id = :pid');
$req->bindParam('pid', $pid);
$req->execute();
$post = $req->fetch();
$req->closeCursor();

if (!$post) {
    redirect("forum.php");
}

$post_id = htmlspecialchars($post["post_id"]);
$account_id = htmlspecialchars($post["account_id"]);
$title = htmlspecialchars($post["title"]);
$content = nl2br(htmlspecialchars($post["content"]));
$creation_date = htmlspecialchars($post["creation_date_fr"]);

$req = $db->prepare('SELECT username FROM account WHERE account_id = :account_id');
$req->bindParam('account_id', $account_id);
$req->execute();
$username = $req->fetch()['username'];
$req->closeCursor();

?>

<section>
    <article>
        <div class='card darkblue'>
            <div class='card-header'>
                <h2 class='text-uppercase white font-weight-bold'><?php echo $title; ?></h2>
                <footer class='blockquote-footer'><?php echo "Écrit par $username le $creation_date"; ?> </footer>
            </div>
        </div>
    </article>

    <article>
        <div class='card darkblue white borderpost'>
            <div class='card-body'>
                <p><?php echo $content; ?></p>
            </div>
            <div class='card-footer text-muted'>
                <blockquote class='blockquote mb-0'>
                <footer class='blockquote-footer font-weight-bold'><cite title='Source Title'><?php echo $username; ?></cite></footer>
                </blockquote>
                <?php echo $creation_date; ?>
            </div>
        </div>
    </article>

    <?php

    $req = $db->prepare('SELECT account_id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM answer WHERE post_id = :post_id');
    $req->bindParam('post_id', $post_id);
    $req->execute();
    $answers = $req->fetchAll();
    $req->closeCursor();

    foreach($answers as $answer) {
        $account_id2 = htmlspecialchars($answer["account_id"]);
        $content2 = nl2br(htmlspecialchars($answer["content"]));
        $creation_date2 = htmlspecialchars($answer["creation_date_fr"]);

        $req = $db->prepare('SELECT username FROM account WHERE account_id = :account_id');
        $req->bindParam('account_id', $account_id2);
        $req->execute();
        $username2 = $req->fetch()['username'];
        $req->closeCursor();

    ?>
    <article>
        <div class='card darkblue'>
            <div class='card-body'>
                <p><?php echo $content2; ?></p>
            </div>
            <div class='card-footer text-muted'>
                <blockquote class='blockquote mb-0'>
                <footer class='blockquote-footer font-weight-bold'><cite title='Source Title'><?php echo $username2; ?></cite></footer>
                </blockquote>
                <?php echo $creation_date2; ?>
            </div>
        </div>
    </article>
<?php } ?>
    

    <?php
    if (isConnected()) { ?>
    <article>
        <form action='script/s_answer.php' method='post'>
            <div class="form-group white">
                <h3>Nouvelle réponse</h3>
                <label for="answer" class="col-4 col-form-label">Contenu*</label> 
                <textarea class="form-control" placeholder="Contenu de votre réponse" id="answer" name="answer" rows="3"></textarea>
            </div>
            <button class="btn btn-outline-light" type='submit' name='pid' value='<?php echo $post_id; ?>'>Écrire</button>
        </form>
    </article>
    <?php } ?>
</section>

<?php
require_once("footer.php");
?>