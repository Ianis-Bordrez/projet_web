<?php

//fetch_user.php

require_once('config.php');

$req = $db->prepare(" SELECT * FROM account WHERE account_id != :id ");
$req->execute(array('id' => $_SESSION['account_id']));
$result = $req->fetchAll();

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <td>Username</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
';

foreach($result as $row) {
    $status = '';
    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    $user_last_activity = fetch_user_last_activity($row['account_id'], $db);

    if($user_last_activity > $current_timestamp) {
        $status = '<span class="label label-success">Online</span>';
    }
    else {
        $status = '<span class="label label-danger">Offline</span>';
    }

    $output .= '
    <tr>
        <td>'.$row['username'].'</td>
        <td>'.$status.'</td>
        <td><button type="button" class="btn btn-info btn-xs start_chat" data-receiverid="'.$row['account_id'].'" data-receiverusername="'.$row['username'].'">Start Chat</button></td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>