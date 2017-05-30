<?php 

/*

* create.php

* this file will contain the form for creation of users in the database
* this works only if the user is an admin or an account admin
* the form results are passed to the file register.php

*/

include('includes/header.php');
include('includes/nav.php');
if(isset($_COOKIE['loggedIn'])) {
    $admin = check_admin_status($_COOKIE['loggedIn']);
    if($admin == 1 || $admin == 3) {
        //user is an AA Or MD
        //create form for user creation
        echo "
        <div class='container'>
            <form id='create-user' action='register.php' method='post' accept-charset='UTF-8'>
                <div class='form-group'>
                    <legend>Create User</legend>
                    <input type='hidden' name='submitted' id='submitted' value='1' />
                </div>
                <div class='form-group'>
                    <label for='first-name'>First Name </label>
                    <input type='text' name='first-name' id='first-name' maxlength='50'/>
                </div>
                <div class='form-group'>
                    <label for='last-name'>Surame </label>
                    <input type='text' name='last-name' id='last-name' maxlength='50'/>
                </div>
                <div class='form-group'>
                    <label for='email'>Email Address </label>
                    <input type='email' name='email' id='email' maxlength='50'/>
                </div>
                <div class='form-group'>
                    <label for='password'>Password </label>
                    <input type='password' name='password' id='password' maxlength='50'/>
                </div>";
        echo "
                <div class='form-group'><label for='admin_type'>Admin Type </label>
                <select name='admin_type'>
                    <option value='customer'>Customer</option>
                    <option value='admin'>Administrator</option>
                    <option value='prod_man'>Product Manager</option>
                    <option value='acc_admin'>Account Administrator</option>
                </select>";
        echo "<button class='btn btn-success' type='submit'>Create User</button></form></div>";
    }
}
?>



<?php include('includes/footer.php');