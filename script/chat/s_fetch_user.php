<?php
require_once('../config.php');

$req = $db->prepare("SELECT * FROM account WHERE account_id != :account_id ");
$req->bindParam('account_id', $_SESSION['account_id']);
$req->execute();
$results = $req->fetchAll();
$req->closeCursor();

$output = '
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Utilisateur</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
';

foreach($results as $result) {
    $status = '';
    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 15 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);

    if($result["last_activity"] > $current_timestamp) {
        $status = '<span class="bg-success">En ligne</span>';
    }
    else {
        $status = '<span class="bg-danger">Hors-ligne</span>';
    }

    $output .= '
    <tr>
      <td>'.$result['username'].'</td>
      <td>'.$status.'</td>
      <td><button type="button" class="btn btn-info btn-xs start_chat bg-purple" data-receiverid="'.$result['account_id'].'" data-receiverusername="'.$result['username'].'">Discuter</button></td>
    </tr>
    ';
}

$output .= '
</tbody>
</table>
';

echo $output;

?>