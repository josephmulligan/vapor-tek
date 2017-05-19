<?php include('includes/header.php');
include('includes/nav.php');
?>

  <div class="container">
    <form id="create-user" action="register.php" method="post" accept-charset="UTF-8">
      <div class="form-group">
        <legend>Create User</legend>
        <input type="hidden" name="submitted" id="submitted" value="1" />
      </div>
      <div class="form-group">
        <label for="first-name">First Name </label>
        <input type="text" name="first-name" id="first-name" maxlength="50">
      </div>
      <div class="form-group">
        <label for="last-name">Surame </label>
        <input type="text" name="last-name" id="last-name" maxlength="50">
      </div>
      <div class="form-group">
        <label for="email">Email Address </label>
        <input type="email" name="email" id="email" maxlength="50">
      </div>
      <div class="form-group">
        <label for="password">Password </label>
        <input type="password" name="password" id="password" maxlength="50">
      </div>
      <button class="btn btn-success" type="submit">Create User</button>
    </form>
  </div>

  <?php include('includes/footer.php');