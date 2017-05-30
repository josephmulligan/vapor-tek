<?php

/*

* compose.php

* this file contains methods to create and send messages to users
* there is the option of the $_GET array being passed through the url if replying to another message
* the message will be sent with no html code in the text

*/

include('includes/header.php');
include('includes/nav.php');
//include database connection in order to use variable $conn (the database connection object), and query the database.
include('includes/dbconnect.php');
?>

<!--create simple form for creating a message-->
<div class='container'>
    <h1>Compose Message</h1>
    <!--send the form back to the same page but populate the $_POST array-->
    <form action='' method='post'>
        <div class='form-group row'>
            <!--email address of the recipient-->
            <label class='col-xs-2' for='to'>To</label>
            <!--if the $_GET array is already in use (i.e. the message is being replied to) then set the value of this here and make it read only-->
            <input class='col-xs-10' type='email' name='to' id='to' maxlength='50' value='<?php if(isset($_GET["mailto"])) { echo $_GET["mailto"]."' readonly "; } ?>' />
        </div>
        <div class='form-group row'>
            <!--message content
                this will be stripped of html code in the send_message function so as to avoid XSS attacks-->
            <label class='col-xs-2' for='message'>Message</label>
            <textarea class='col-xs-10' type='text' name='message' id='message' maxlength='500' placeholder='Your Message'></textarea>
        </div>
        <!--simple submit button-->
        <button name='submit' id='submit' type='submit' class='btn btn-success' style='display: block; width: 100%'>Send Message</button>
    </form>
</div>

<?php
if(isset($_POST['submit'])) {
    //check the user is part of the database
    $result = $conn->query("SELECT * FROM users WHERE email = '".$_POST['to']."';");
    if(mysqli_num_rows($result) > 0) { //user is in database
        message_user($_POST['to'], htmlspecialchars($_POST['message'])); //send message to user
    } else { //user not in database
        echo "Error: User not found in database. Please try again.";
    }
}

include('includes/footer.php');
?>