<?php

include('includes/header.php');
include('includes/nav.php');
include('includes/dbconnect.php');
?>
  <div class='container'>
    <h1>Compose Message</h1>
    <form action='compose.php' method='post'>
      <div class='form-group row'>
        <label class='col-xs-2' for='to'>To</label>
        <input class='col-xs-10' type='email' name='to' id='to' maxlength='50' value='<?php if(isset($_GET["mailto"])) { echo $_GET["mailto"]."' readonly "; } ?>' />
      </div>
      <div class='form-group row'>
        <label class='col-xs-2' for='message'>Message</label>
        <textarea class='col-xs-10' type='text' name='message' id='message' maxlength='500' placeholder='Your Message'></textarea>
      </div>
      <button name='submit' id='submit' type='submit' class='btn btn-success' style='display: block; width: 100%'>Send Message</button>
    </form>
  </div>

  <?php
    if(isset($_POST['submit'])) {
      if(isset($_GET['setreplied'])) {
        
      }
      message_user($_POST['to'], $_POST['message']);
    }

    include('includes/footer.php');
    ?>