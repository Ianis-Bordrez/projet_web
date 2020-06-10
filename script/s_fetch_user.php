<?php

//fetch_user.php

require_once('config.php');

$req = $db->prepare(" SELECT * FROM account WHERE account_id != :account_id ");
$req->bindParam('account_id', $_SESSION['account_id']);
$req->execute();
$result = $req->fetchAll();

$output = '
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
';

foreach($result as $row) {
    $status = '';
    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    $user_last_activity = fetch_user_last_activity($row['account_id'], $db);

    if($user_last_activity > $current_timestamp) {
        $status = '<span class="bg-success">Online</span>';
    }
    else {
        $status = '<span class="bg-danger">Offline</span>';
    }

    $output .= '
    <tr>
      <td>'.$row['username'].'</td>
      <td>'.$status.'</td>
      <td><button type="button" class="btn btn-info btn-xs start_chat purple" data-receiverid="'.$row['account_id'].'" data-receiverusername="'.$row['username'].'">Start Chat</button></td>
    </tr>
    ';
}

$output .= '
</tbody>
</table>
';

echo $output;

?>