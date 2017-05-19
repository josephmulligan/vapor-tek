<?php

include('includes/header.php');
include('includes/nav.php');
include('includes/dbconnect.php');

echo "<div class='container'><h1>Inbox</h1><table class='table table-hover'>";
echo "<tr><th>Message ID</th><th>From</th><th>To</th><th>Message</th><th>Time Sent</th></tr>";

if(isset($_COOKIE[$cookie_name])) {
  //check for all messages sent to the user
  $query = "SELECT * FROM messages WHERE user_to = '$cookie_value'";
  //$query = "SELECT * FROM messages";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result)) {
    $id = $row['messageID'];
    $from = $row['user_from'];
    $to = $row['user_to'];
    $message = $row['message'];
    $time = $row['time_sent'];
    echo "<tr>
            <td>$id</td>
            <td>$from</td>
            <td>$to</td>
            <td>$message</td>
            <td>$time</td>
            <td><a href='compose.php?mailto=$from&setreplied=$id'><i class='fa fa-mail-reply fa-lg'></i></a></td>
          </tr>";
  }
  if($row['is_read'] < 1) {//message is unread
    $query = "UPDATE messages SET is_read = 1 WHERE messageID = $id;";
    if($conn->query($query) === TRUE) {
      //echo "messages read.";
    } else {
      echo "error: messages not read.".$conn->error;
    }
  }
}

echo "</table><h1>Outbox</h1><table class='table table-hover'>";
echo "<tr><th>Message ID</th><th>From</th><th>To</th><th>Message</th><th>Time Sent</th></tr>";

if(isset($_COOKIE[$cookie_name])) {
  //check for all messages sent to the user
  $query = "SELECT * FROM messages WHERE user_from = '$cookie_value'";
  //$query = "SELECT * FROM messages";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result)) {
    $id = $row['messageID'];
    $from = $row['user_from'];
    $to = $row['user_to'];
    $message = $row['message'];
    $time = $row['time_sent'];
    echo "<tr>
            <td>$id</td>
            <td>$from</td>
            <td>$to</td>
            <td>$message</td>
            <td>$time</td>
          </tr>";
  }
}
echo "</table></div>";
include('includes/footer.php');

?>