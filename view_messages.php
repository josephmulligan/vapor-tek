<?php

/***VIEW MESSAGES***

* This file gives the user the ability to see their messages in an inbox / outbox layout.
* All messages are displayed as panels, for which the template can be found below.
* The major message functions are to be displayed, and each message has a reply arrow which, 
    when clicked, will go straight to a compose window to reply to the conversation.

* One improvement that could be made is to store messages as 'conversations' between two users,
    finding messages to and from each other and displaying them in a single panel or as a modal
    window a la Facebook messenger.

***/

include('includes/header.php');
include('includes/nav.php');
//include database connection in order to use variable $conn, and query the database.
include('includes/dbconnect.php');

/*

TEMPLATE FOR PRODUCT PANEL -- INBOX

<div class='panel panel-default'>
  <div class='panel-heading'><h2 class='panel-title'>{$from}</h2><br/>
    <span>Sent: {$time}</span>
  </div>
  <div class='panel-content'>
    <em>{$message}</em><br/>
    <a href='compose.php?mailto={$from}&setreplied={$id}'><i class='fa fa-mail-reply fa-lg'></i></a>
  </div>
</div>

*/

//INBOX

echo "<div class='container'>";
echo "<h1>Inbox</h1><hr/>";

if(isset($_COOKIE[$cookie_name])) {
    //check for all messages sent to the user
    $query = "SELECT * FROM messages WHERE user_to = '$cookie_value';";
    //$query = "SELECT * FROM messages";
    $result = $conn->query($query);
    $counter = 0;
    while($row = mysqli_fetch_array($result)) {
        //make sure that messages are presented as rows of three that stack up neatly together.
        if($counter % 3 == 0) {
            echo "<div class='row'>";//open row
        }
        //get data from message params
        $id = $row['messageID'];
        $from = $row['user_from'];
        $to = $row['user_to'];
        $message = $row['message'];
        $time = $row['time_sent'];
        $is_read = $row['is_read'];
        //create panel from data
        //on inbox items have a delete button which removes the panel from the inbox view
        /*incomplete delete function - solution:

                * in the messages table, create two fields (tinyint / boolean): deleted-from and deleted-to, which are both initially 0.
                * if one user deletes a message, increment either depending on whether the user is user_from or user_to
                * check for deleted_to in the inbox and if it is 1, do not display it
                    * for instance, SELECT * FROM messages WHERE user_to = '$cookie_value' AND deleted_to = '0';
                * if both users have deleted a message, remove it from the table.

            */
        echo "<div id='message-$id' class='panel panel-default col-sm-4'>
            <div class='panel-heading row'><h2 class='panel-title'>
            <form action='delete-message.php?id=$id'>
            <button type='submit' class='close' data-target='#message-$id' data-dismiss='alert'>
            <span aria-hidden='false'><i class='fa fa-trash fa-lg'></i></span>
            </button></form>";
        //create envelope icons depending on whether the message has been read or not
        if($is_read > 0) {
            echo "<i class='fa fa-envelope-open fa-lg'></i>";
        } else {
            echo "<i class='fa fa-envelope fa-lg'></i>";
        }
        //create panel heading and body
        echo "$from</h2></div>
            <div class='panel-content'><hr/>
            Sent: $time<hr/>
            <em>$message</em>
            <a class='pull-right' href='compose.php?mailto=$from&setreplied=$id'><i class='fa fa-mail-reply fa-lg'></i></a><hr/>
            </div></div>";//close panel div
        $counter++;
        //every 3 counters start a new row
        if($counter % 3 == 0) {
            echo "</div>";//row
        }
    }
    //make the message read if it is not read already.
    //technically this could be run every time the messages are
    //opened but this has a slightly better performance
    if($row['is_read'] < 1) {//message is unread
        $query = "UPDATE messages SET is_read = 1 WHERE messageID = $id;";
        if($conn->query($query) === TRUE) {
            //echo "messages read.";
        } else {
            echo "error: messages not read.".$conn->error;
        }
    }
}

echo "</div>";//container

echo "<div class='container'>";
echo "<h1>Outbox</h1><hr/>";

if(isset($_COOKIE[$cookie_name])) {
    //check for all messages sent by the user
    $query = "SELECT * FROM messages WHERE user_from = '$cookie_value';";
    $result = mysqli_query($conn, $query);
    $counter = 0;
    while($row = mysqli_fetch_array($result)) {
        //make sure that messages are presented as rows of three that stack up neatly together
        //could add delete function here in order to increment the delete_from field in the messages table
        //when user deletes an outgoing mail it should still show up in the inbox of the recipient
        if($counter % 3 == 0) {
            echo "<div class='row'>";
        }
        //get message data
        $id = $row['messageID'];
        $from = $row['user_from'];
        $to = $row['user_to'];
        $message = $row['message'];
        $time = $row['time_sent'];
        $is_read = $row['is_read'];

        //display message as panel
        echo "<div class='panel panel-default col-sm-4'>
            <div class='panel-heading row'><h2 class='panel-title'>";//opened 3 divs
        if($is_read > 0) {
            echo "<i class='fa fa-envelope-open fa-lg'></i>";
        } else {
            echo "<i class='fa fa-envelope fa-lg'></i>";
        }
        //create panel head and body
        echo "$to</h2></div><div class='panel-content'><hr/>
            Sent: $time<hr/>
            <em>$message</em>
            <a class='pull-right' href='compose.php?mailto=$to&setreplied=$id'>
            <i class='fa fa-mail-reply fa-lg'></i></a><hr/>
            </div></div>";//closed divs within panel
        $counter++;
        if($counter % 3 == 0) {
            echo "</div>";//row
        }
    }
}
echo "</div>";//container
include('includes/footer.php');
?>