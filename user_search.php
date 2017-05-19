<?php
include('includes/header.php');
include('includes/nav.php');
?>
  <!-- Search Engine Bar for logged in users to search for contact details -->
  <div class="container">
    <h1>Vapor-tek User Search</h1>
    <div class="row">
      <div class="col-md-6">
        <div id="custom-search-input">
          <form action="" method="POST">
            <div class="input-group col-md-12">
              <input type="text" name="name" class="form-control input-lg" placeholder="Search users by name" />
              <span class="input-group-btn">
                <button class="btn btn-info btn-lg" name="btnSubmit" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br/>
  <form action="" method="POST">
    <div class="container">
      <button class="btn btn-info btn-lg" name="btnAll" type="submit" style="display: block; width: 100%;">Display All Data</button>
    </div>
  </form>

  <!-- PHP for the search bar to see of certain contacts are in the database -->
  <?php
  if(isset($_POST['btnSubmit'])) {
    // if(isset($_GET['Go'])){}
     if(isset($_POST['name'])){
        if(preg_match("/^[A-Za-z]+$/", $_POST['name'])){
          $name= $_POST['name'];
          // Connect to the database
          include('includes/dbconnect.php');
          // Query the database table
          $query= "SELECT * FROM users WHERE name LIKE '%{$name}%'";		
          // Run the query against the mysqli query function
		  $result= mysqli_query($conn, $query);
          //Create the table headers
          echo "<div class='contatiner'><h3 style='text-align:center'>Search Results</h3>";
          echo "<table class='table'>";
          echo "<tr>";
          echo "<th>User ID</th>";
          echo "<th>Password</th>";
          echo "<th>Name</th>";
          echo "<th>Email</th>";
          echo "<th>Phone Number</th>";
          echo "<th>Geolocation</th>";
          echo "</tr>";
		  // Create while loop and loop through result set
		  while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$user_id= $row['userID'];
			$password= $row['password'];
			$name= $row['name'];
			$email= $row['email'];
			$phone= $row['phone_no'];
			$lat= $row['lat'];
            $long = $row['long'];
		    // Display the result of the array
			echo "<tr>";
			echo "<td>".$user_id."</td>";
			echo "<td>".$password."</td>";
			echo "<td>".$name."</td>";
			echo "<td>".$email."</td>";
			echo "<td>".$phone."</td>";
			echo "<td>".$lat.", ".$long."</td>";
			echo "</tr>";
		  }
		  echo "</table></div>";
		}
     } else {
       echo "<p>Please enter a search query</p>";
     }
  }
if(isset($_POST['btnAll'])) {
  // Connect to the database
  include('includes/dbconnect.php');
  //sql query for selection of all users
  $sqlistatement = "SELECT * FROM users"; 
  //test the query on the database
  $sqli_result = mysqli_query($conn, $sqlistatement) or die("<<STEP 4 IS DEAD!>> Couldn't execute the SQL SELECT statement");
  //Create the table headings for results
  echo "<div class='contatiner'>
  <h3 style='text-align:center'>Search Results</h3>";
  echo "<table class='table'>";
  echo "<tr>";
  echo "<th>User ID</th>";
  echo "<th>Password</th>";
  echo "<th>Name</th>";
  echo "<th>Email</th>";
  echo "<th>Phone Number</th>";
  echo "<th>Geolocation</th>";
  echo "</tr>";
  //loop through the results by row
  while ($row = mysqli_fetch_array($sqli_result)) { 
    $user_id = $row['userID']; 
    $password = $row['password'];
    $name = $row['name']; 
    $email = $row['email']; 
    $phone = $row['phone_no']; 
    $lat = $row['lat'];
    $long = $row['long'];
    echo"<tr>";
    echo "<td>".$user_id."</td><td>".$password."</td><td>".$name."</td><td>".$email."</td><td>".$phone."</td><td>".$lat.", ".$long."</td>";
    echo "</tr>";
  }
  // Free up any memory holding the database records
  mysqli_free_result($sqli_result);
}
echo "</table></div>";
include('includes/footer.php');
?>